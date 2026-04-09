<?php
session_start();
include 'includes/db_connect.php';

// Check if order_id is set
if (!isset($_GET['order_id'])) {
    echo "<h3 class='text-center mt-5'>No order found.</h3>";
    exit();
}

$order_id = intval($_GET['order_id']);

// Fetch order details (using correct primary key: order_id)
$stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = ?");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<h3 class='text-center mt-5'>Order not found.</h3>";
    exit();
}

$order = $result->fetch_assoc();

// Fetch order items
$item_stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
$item_stmt->bind_param("i", $order_id);
$item_stmt->execute();
$items_result = $item_stmt->get_result();
$order_items = $items_result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SmartDine - Order Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background: url('../assets/images/restaurant_bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }
        .card {
            background: rgba(0,0,0,0.8);
            border-radius: 15px;
            padding: 30px;
            margin: 50px auto;
            max-width: 600px;
            text-align: center;
        }
        h3 {
            color: #ffcc00;
            font-weight: bold;
        }
        .btn-home {
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
</head>
<body>
<div class="card">
    <h3>✅ Order Successful!</h3>
    <p>Thank you, <strong><?= htmlspecialchars($order['customer_name']) ?></strong>!</p>
    <p>Your order ID is <strong>#<?= $order['order_id'] ?></strong>.</p>

    <h5 class="mt-4">Order Summary:</h5>
    <ul class="list-group mb-3">
        <?php foreach($order_items as $item): ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= htmlspecialchars($item['item_name']) ?>
                <span>₹<?= number_format($item['item_price'],2) ?></span>
            </li>
        <?php endforeach; ?>
    </ul>

    <h5 class="text-warning">Total: ₹<?= number_format($order['total_amount'],2) ?></h5>
    <a href="menu.php" class="nav-link">Back to Menu</a>
</div>
</body>
</html>
