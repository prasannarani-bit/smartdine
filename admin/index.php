<?php
// admin/index.php
$conn = mysqli_connect("localhost", "root", "", "smartdine");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$totalOrders = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM orders"))['count'];
$totalItems = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM menu_items"))['count'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>SmartDine Admin Dashboard</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    body { font-family: Arial; background-color: #fafafa; padding: 20px; }
    .dashboard { display: flex; gap: 20px; }
    .card {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 5px #ccc;
      flex: 1;
      text-align: center;
    }
    a.btn {
      display: inline-block;
      background: #28a745;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <h1>🍽️ SmartDine Admin Dashboard</h1>

  <div class="dashboard">
    <div class="card">
      <h2>Total Orders</h2>
      <p><?php echo $totalOrders; ?></p>
    </div>
    <div class="card">
      <h2>Menu Items</h2>
      <p><?php echo $totalItems; ?></p>
    </div>
  </div>

  <br>
  <a href="add_item.php" class="btn">Add New Menu Item</a>
  <a href="view_orders.php" class="btn">View Orders</a>
  <a href="view_reservations.php" class="btn btn-success mt-3">View Reservations</a>
</body>
</html>
