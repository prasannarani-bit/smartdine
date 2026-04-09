<?php
include '../includes/db_connect.php';
$result = $conn->query("SELECT * FROM delivery_orders ORDER BY order_time DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - View Deliveries</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url('../assets/images/restaurant_bg.jpg') no-repeat center center fixed;
      background-size: cover;
      color: white;
    }
    .table-container {
      background: rgba(0, 0, 0, 0.7);
      padding: 25px;
      border-radius: 15px;
      margin-top: 50px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="text-center mt-4">🚚 Home Delivery Orders</h2>
    <div class="table-container">
      <table class="table table-bordered table-striped table-dark">
        <thead>
          <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Items</th>
            <th>Amount (₹)</th>
            <th>Payment</th>
            <th>Order Time</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= $row['customer_name'] ?></td>
              <td><?= $row['phone'] ?></td>
              <td><?= $row['address'] ?></td>
              <td><?= $row['items'] ?></td>
              <td><?= $row['total_amount'] ?></td>
              <td><?= $row['payment_method'] ?></td>
              <td><?= $row['order_time'] ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
