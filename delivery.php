<?php
session_start();
include 'includes/db_connect.php';

// Fetch all menu items
$items_result = $conn->query("SELECT * FROM menu");
$items = [];
while ($row = $items_result->fetch_assoc()) {
    $items[] = $row;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_order'])) {
    $customer_name = trim($_POST['customer_name']);
    $phone = trim($_POST['phone']);
    $payment = trim($_POST['payment']);
    $order_items = $_POST['order_item']; // array of item names
    $order_prices = $_POST['order_price']; // array of item prices

    $total_amount = array_sum($order_prices);

    if ($customer_name && $phone && !empty($order_items)) {
        // Insert order
        $stmt = $conn->prepare("INSERT INTO orders (customer_name, phone, payment_method, total_amount, order_time) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssd", $customer_name, $phone, $payment, $total_amount);
        $stmt->execute();
        $order_id = $stmt->insert_id;

        // Insert order items
        $item_stmt = $conn->prepare("INSERT INTO order_items (order_id, item_name, item_price) VALUES (?, ?, ?)");
        foreach ($order_items as $index => $item_name) {
            $item_price = $order_prices[$index];
            $item_stmt->bind_param("isd", $order_id, $item_name, $item_price);
            $item_stmt->execute();
        }

        echo "<script>alert('Your order has been placed successfully!'); window.location='index.php';</script>";
        exit();
    } else {
        $error = "Please fill all details and select at least one item.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SmartDine - Home Delivery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background: url('assets/images/restaurant_bg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }
        .card {
            background: rgba(0,0,0,0.8);
            padding: 20px;
            border-radius: 15px;
        }
        .form-control, .btn {
            border-radius: 10px;
        }
        .btn-add-item {
            margin-top: 5px;
        }
    </style>
    <script>
        // Menu items and prices
        const menuItems = <?= json_encode($items) ?>;

        function updatePrice(selectElem) {
            const row = selectElem.closest('.item-row');
            const priceInput = row.querySelector('.item-price');
            const selectedItem = menuItems.find(item => item.name === selectElem.value);
            priceInput.value = selectedItem ? selectedItem.price : 0;
            calculateTotal();
        }

        function calculateTotal() {
            const priceInputs = document.querySelectorAll('.item-price');
            let total = 0;
            priceInputs.forEach(input => {
                total += parseFloat(input.value) || 0;
            });
            document.getElementById('total_amount').innerText = total.toFixed(2);
        }

        function addItemRow() {
            const container = document.getElementById('items_container');
            const row = document.createElement('div');
            row.classList.add('item-row', 'mb-2', 'd-flex', 'align-items-center');
            row.innerHTML = `
                <select name="order_item[]" class="form-select me-2" onchange="updatePrice(this)" required>
                    <option value="">Select Item</option>
                    ${menuItems.map(item => `<option value="${item.name}">${item.name}</option>`).join('')}
                </select>
                <input type="text" name="order_price[]" class="form-control me-2 item-price" value="0" readonly>
                <button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.item-row').remove(); calculateTotal()">Remove</button>
            `;
            container.appendChild(row);
        }

        window.addEventListener('DOMContentLoaded', () => {
            calculateTotal();
        });
    </script>
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <h3 class="text-center mb-4">🏠 Home Delivery Order</h3>
        <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

        <form method="POST">
            <div class="mb-3">
                <label>Name:</label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            

            <h5>Order Items:</h5>
            <div id="items_container"></div>
            <button type="button" class="btn btn-primary btn-sm btn-add-item" onclick="addItemRow()">➕ Add Item</button>

            <h5 class="mt-3">Total: ₹<span id="total_amount">0.00</span></h5>
            <div class="text-center mt-3">
            <div class="mb-3">
                <label>Payment Method:</label>
                <select name="payment" class="form-control" required>
                    <option value="">Select</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="UPI">UPI</option>
                    <option value="Card">Credit/Debit Card</option>
                </select>
            </div>
                <button type="submit" name="submit_order" class="btn btn-success">Place Order</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
