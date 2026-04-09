<?php
session_start();
include 'includes/db_connect.php';

// If cart is empty, redirect
if (empty($_SESSION['restaurant_cart'])) {
    header("Location: menu.php");
    exit();
}

// Calculate total
$total = 0;
foreach ($_SESSION['restaurant_cart'] as $item) {
    $total += $item['price'];
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = trim($_POST['customer_name']);
    $phone = trim($_POST['phone']);
    $payment_method = trim($_POST['payment']);
    $order_type = $_POST['order_type']; // "dinein" or "delivery"

    $table_number = null;
    $delivery_address = null;

    if ($order_type === "dinein") {
        $table_number = intval($_POST['table_number']);
    } else if ($order_type === "delivery") {
        $delivery_address = trim($_POST['delivery_address']);
    }

    // Validate required fields
    if ($customer_name && $phone && $payment_method && (($order_type==="dinein" && $table_number) || ($order_type==="delivery" && $delivery_address))) {
        // Insert order
        $stmt = $conn->prepare("INSERT INTO orders (customer_name, phone, table_number, payment_method, total_amount, delivery_address, order_time) VALUES (?, ?, ?, ?, ?, ?, NOW())");

        // Fixed bind_param: ssisss -> 6 placeholders: s,s,i,s,d,s
        $stmt->bind_param("ssisss", $customer_name, $phone, $table_number, $payment_method, $total, $delivery_address);

        if ($stmt->execute()) {
            $order_id = $stmt->insert_id;

            // Insert order items
            $item_stmt = $conn->prepare("INSERT INTO order_items (order_id, item_name, item_price) VALUES (?, ?, ?)");
            foreach ($_SESSION['restaurant_cart'] as $item) {
                $item_stmt->bind_param("isd", $order_id, $item['name'], $item['price']);
                $item_stmt->execute();
            }

            // Clear cart
            $_SESSION['restaurant_cart'] = [];

            // Redirect to order success
            header("Location: order_success.php?order_id=" . $order_id);
            exit();
        } else {
            $error = "Error placing order: " . $conn->error;
        }
    } else {
        $error = "Please fill all required fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SmartDine - Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* SmartDine theme */
        body {
            background: url('assets/images/restaurant_bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }
        .card {
            background: rgba(0,0,0,0.75);
            padding: 30px;
            border-radius: 15px;
            margin-top: 50px;
            box-shadow: 0 0 15px rgba(255,255,255,0.1);
        }
        label {
            font-weight: bold;
            color: #ffcc00;
        }
        h3 {
            color: #ffcc00;
            font-weight: bold;
        }
        .btn-success {
            background-color: #ffcc00;
            color: #000;
            font-weight: bold;
            border: none;
        }
        .list-group-item {
            background: rgba(0,0,0,0.6);
            border: none;
            color: #fff;
        }
    </style>
    <script>
        function toggleOrderType() {
            const type = document.querySelector('input[name="order_type"]:checked').value;
            document.getElementById('dinein_fields').style.display = (type==='dinein') ? 'block' : 'none';
            document.getElementById('delivery_fields').style.display = (type==='delivery') ? 'block' : 'none';
        }
    </script>
</head>
<body>
<div class="container">
    <div class="card">
        <h3 class="text-center mb-4">🛒 Checkout</h3>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label>Name:</label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Order Type:</label><br>
                <input type="radio" name="order_type" value="dinein" onclick="toggleOrderType()" checked> Dine-In
                <input type="radio" name="order_type" value="delivery" onclick="toggleOrderType()" class="ms-3"> Home Delivery
            </div>

            <div id="dinein_fields">
                <div class="mb-3">
                    <label>Table Number:</label>
                    <input type="number" name="table_number" class="form-control">
                </div>
            </div>

            <div id="delivery_fields" style="display:none;">
                <div class="mb-3">
                    <label>Delivery Address:</label>
                    <textarea name="delivery_address" class="form-control" rows="2"></textarea>
                </div>
            </div>

            <div class="mb-3">
                <label>Payment Method:</label>
                <select name="payment" class="form-control" required>
                    <option value="">Select Payment</option>
                    <option value="Cash">Cash</option>
                    <option value="Card">Card</option>
                    <option value="UPI">UPI</option>
                </select>
            </div>

            <h5 class="mt-4">Order Summary:</h5>
            <ul class="list-group mb-3">
                <?php foreach ($_SESSION['restaurant_cart'] as $item): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= htmlspecialchars($item['name']) ?>
                        <span>₹<?= number_format($item['price'], 2) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
            <h5 class="text-warning text-end">Total: ₹<?= number_format($total, 2) ?></h5>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success px-4 py-2">Confirm Order</button>
            </div>
        </form>
    </div>
</div>
<script>toggleOrderType();</script>
</body>
</html>
