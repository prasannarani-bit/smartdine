<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SmartDine - Smart Restaurant Experience</title>

  <!-- ✅ Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



  <!-- ✅ Custom Style -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- ✅ Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fs-3 fw-bold" href="index.php">SmartDine</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
        <li class="nav-item"><a class="nav-link" href="admin/index.php">Admin</a>
        <li class="nav-item"><a class="nav-link" href="reserve_table.php">Reserve Table</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="delivery.php">Home Delivery</a></li>


      </ul>
    </div>
  </div>
</nav>

<!-- ✅ Hero Section -->
<section class="hero-section text-center text-white d-flex align-items-center justify-content-center">
  <div class="hero-content">
    <h1 class="display-4 fw-bold">Welcome to SmartDine</h1>
    <p class="lead mb-4">Enjoy a smarter, faster, and contactless dining experience!</p>
    <a href="menu.php" class="btn btn-lg btn-success">Explore Menu</a>
  </div>
</section>

<!-- ✅ About Section -->
<section class="py-5 text-center">
  <div class="container">
    <h2 class="text-warning mb-4">Why Choose SmartDine?</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card p-4">
          <h4>🍕 Quality Food</h4>
          <p>We use the freshest ingredients and expert chefs to craft every dish to perfection.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4">
          <h4>⚡ Fast Service</h4>
          <p>Our team ensures you’re served quickly — with warmth and professionalism.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4">
          <h4>🏠 Cozy Ambience</h4>
          <p>Enjoy your meals in a relaxing atmosphere that feels like home.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ✅ Footer -->
<footer class="bg-dark text-white text-center py-3">
  <p class="mb-0">&copy; 2025 SmartDine | Designed for Smarter Dining</p>
</footer>

<!-- ✅ Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

