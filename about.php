<?php include __DIR__ . '/includes/db_connect.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>About Us | SmartDine</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom Style -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-warning" href="index.php">SmartDine 🍽️</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
        <li class="nav-item"><a class="nav-link active" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="reserve_table.php">Reserve Table</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- ABOUT SECTION -->
<section class="py-5 text-center">
  <div class="container">
    <h1 class="text-warning mb-4">About SmartDine</h1>
    <p class="lead mb-5">Bringing flavor, comfort, and joy to every dining experience.</p>

    <div class="row g-4 text-start">
      <div class="col-md-6">
        <div class="card p-4">
          <h4>🍲 Our Story</h4>
          <p>SmartDine began with a simple vision — to combine technology and taste in one seamless dining experience. Since our founding, we’ve been committed to delivering not just delicious meals but moments of happiness for every guest.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card p-4">
          <h4>🎯 Our Mission</h4>
          <p>To provide our customers with high-quality meals, quick service, and a warm atmosphere — all while making online ordering and table reservations effortless and enjoyable.</p>
        </div>
      </div>
    </div>

    <div class="row g-4 mt-4 text-start">
      <div class="col-md-12">
        <div class="card p-4">
          <h4>👨‍🍳 Our Team</h4>
          <p>Our chefs, servers, and developers work hand-in-hand to make SmartDine a perfect blend of culinary art and smart technology. Together, we strive to give you a dining experience that’s efficient, elegant, and unforgettable.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <p>© <?php echo date('Y'); ?> SmartDine Restaurant | Designed with ❤️ by SmartDine Team</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

