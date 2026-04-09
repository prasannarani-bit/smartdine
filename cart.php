<?php
session_start();
include 'includes/db_connect.php';

// Initialize cart if not set
if (!isset($_SESSION['restaurant_cart'])) {
    $_SESSION['restaurant_cart'] = [];
}

// Handle remove item
if (isset($_GET['remove'])) {
    $removeIndex = $_GET['remove'];
    unset($_SESSION['restaurant_cart'][$removeIndex]);
    $_SESSION['restaurant_cart'] = array_values($_SESSION['restaurant_cart']);
}

// Calculate total
$total = 0;
foreach ($_SESSION['restaurant_cart'] as $item) {
    $total += $item['price'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SmartDine - Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      background: url('assets/images/restaurant_bg.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
    }
    .navbar {
      background: rgba(0,0,0,0.85);
    }
    .navbar-brand {
      color: #ffcc00 !important;
      font-weight: bold;
    }
    .card {
      background: rgba(0,0,0,0.75);
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(255,255,255,0.1);
      color: #fff;
    }
    .total-box {
      background: rgba(0,0,0,0.85);
      padding: 20px;
      border-radius: 10px;
      color: #ffcc00;
      font-weight: bold;
      text-align: center;
    }
  </style>
</head>
<body>

<!-- ✅ Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">🍽️ SmartDine</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
        <li class="nav-item"><a href="cart.php" class="nav-link active">🛒 Cart</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h2 class="text-center mb-4">🛒 Your Cart</h2>

  <?php if (empty($_SESSION['restaurant_cart'])): ?>
    <div class="alert alert-warning text-center">
      Your cart is empty. <a href="menu.php" class="alert-link">Browse the menu</a> to add items!
    </div>
  <?php else: ?>
    <div class="row">
      <div class="col-md-8">
        <?php foreach ($_SESSION['restaurant_cart'] as $index => $item): ?>
          <div class="card mb-3 p-3">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h5><?= htmlspecialchars($item['name']) ?></h5>
                <p class="text-warning">₹<?= number_format($item['price'], 2) ?></p>
              </div>
              <a href="cart.php?remove=<?= $index ?>" class="btn btn-outline-danger btn-sm">Remove</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="col-md-4">
        <div class="total-box">
          <h4>Total: ₹<?= number_format($total, 2) ?></h4>
          <a href="checkout.php" class="btn btn-success mt-3">Proceed to Checkout</a>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>
</body>
</html>
