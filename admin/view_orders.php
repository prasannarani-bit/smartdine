<?php
include '../includes/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Orders - SmartDine Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        table th {
            background: #333;
            color: white;
        }
        .items-box {
            background: #fafafa;
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>

<h2>All Customer Orders</h2>

<table>
    <tr>
        <th>Order ID</th>
        <th>Customer Name</th>
        <th>Phone</th>
        <th>Table Number</th>
        <th>Total Amount</th>
        <th>Payment Method</th>
        <th>Order Time</th>
        <th>Items Ordered</th>
    </tr>

<?php
// Fetch all orders
$orderQuery = "SELECT * FROM orders ORDER BY order_id DESC";
$orderResult = $conn->query($orderQuery);

if ($orderResult->num_rows > 0) {

    while ($order = $orderResult->fetch_assoc()) {

        $order_id = $order['order_id'];

        echo "<tr>";
        echo "<td>{$order_id}</td>";
        echo "<td>{$order['customer_name']}</td>";
        echo "<td>{$order['phone']}</td>";
        echo "<td>{$order['table_number']}</td>";
        echo "<td>₹{$order['total_amount']}</td>";
        echo "<td>{$order['payment_method']}</td>";
        echo "<td>{$order['order_time']}</td>";

        // Fetch ordered items for this order
        $itemQuery = $conn->prepare("SELECT item_name, item_price FROM order_items WHERE order_id = ?");
        $itemQuery->bind_param("i", $order_id);
        $itemQuery->execute();
        $itemsResult = $itemQuery->get_result();

        echo "<td><div class='items-box'>";

        if ($itemsResult->num_rows > 0) {
            while ($item = $itemsResult->fetch_assoc()) {
                echo "<strong>{$item['item_name']}</strong> - ₹{$item['item_price']}<br>";
            }
        } else {
            echo "No items found";
        }

        echo "</div></td>";

        echo "</tr>";
    }

} else {
    echo "<tr><td colspan='8'>No orders found</td></tr>";
}
?>

</table>

</body>
</html>
