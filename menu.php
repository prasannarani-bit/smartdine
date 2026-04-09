<?php
session_start();
include 'includes/db_connect.php';

// Initialize dine-in cart session
if (!isset($_SESSION['restaurant_cart'])) {
    $_SESSION['restaurant_cart'] = [];
}

// Handle Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $itemName = $_POST['item_name'];
    $itemPrice = floatval($_POST['price']);

    $_SESSION['restaurant_cart'][] = [
        'name' => $itemName,
        'price' => $itemPrice
    ];

    $added = true;
}

// Determine category or search
$category = isset($_GET['category']) ? $_GET['category'] : 'all';
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Fetch menu items
if ($search !== '') {
    $stmt = $conn->prepare("SELECT * FROM menu WHERE name LIKE ? OR description LIKE ?");
    $like = "%{$search}%";
    $stmt->bind_param("ss", $like, $like);
    $stmt->execute();
    $result = $stmt->get_result();
} elseif ($category === 'all') {
    $result = $conn->query("SELECT * FROM menu");
} else {
    $stmt = $conn->prepare("SELECT * FROM menu WHERE category = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SmartDine - Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      background: url('assets/images/restaurant_bg.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
    }
    .navbar {
      background: rgba(0, 0, 0, 0.85);
    }
    .navbar-brand {
      color: #ffcc00 !important;
      font-weight: bold;
    }
    .card {
      background: rgba(0,0,0,0.75);
      border: none;
      border-radius: 15px;
      color: #f8f9fa;
      box-shadow: 0 0 10px rgba(255,255,255,0.1);
      transition: transform 0.2s ease-in-out;
    }
    .card:hover {
      transform: scale(1.05);
    }
    .price {
      font-size: 1.2rem;
      color: #ffcc00;
      font-weight: bold;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
    }
    .category-btns a {
      margin: 0 5px;
    }
    .alert {
      background-color: rgba(0, 255, 0, 0.2);
      color: #fff;
    }
    .search-bar input {
      width: 70%;
      max-width: 400px;
      border-radius: 25px;
      border: none;
      padding: 8px 15px;
      outline: none;
    }
    .search-bar button {
      border-radius: 25px;
      padding: 8px 20px;
    }
  </style>
</head>
<body>
  <!-- ✅ Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">🍽️ SmartDine</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="menu.php" class="nav-link active">Menu</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
          <li class="nav-item"><a href="cart.php" class="nav-link">🛒 Cart (<?= count($_SESSION['restaurant_cart']) ?>)</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <h2 class="text-center mb-4">🍴 Explore Our Menu</h2>

    <?php if (isset($added)): ?>
      <div class="alert alert-success text-center">✅ Item added to your cart!</div>
    <?php endif; ?>

    <!-- ✅ Search Bar -->
    <form method="GET" class="text-center mb-4 search-bar">
      <input type="text" name="search" placeholder="Search your favorite dish..." value="<?= htmlspecialchars($search) ?>">
      <button type="submit" class="btn btn-warning btn-sm">Search</button>
    </form>

    <!-- ✅ Category Filter Buttons -->
    <div class="text-center mb-4 category-btns">
      <a href="menu.php?category=all" class="btn btn-light btn-sm">All</a>
      <a href="menu.php?category=veg" class="btn btn-success btn-sm">Veg</a>
      <a href="menu.php?category=nonveg" class="btn btn-danger btn-sm">Non-Veg</a>
      <a href="menu.php?category=drinks" class="btn btn-primary btn-sm">Drinks</a>
      <a href="menu.php?category=desserts" class="btn btn-warning btn-sm">Desserts</a>
    </div>

    <!-- ✅ Menu Items Grid -->
    <div class="row">
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="col-md-3 mb-4">
            <div class="card p-3 text-center">
              <img src="assets/images/<?= htmlspecialchars($row['image']) ?>" 
                   class="img-fluid rounded mb-2" 
                   alt="<?= htmlspecialchars($row['name']) ?>"
                   style="height:180px; object-fit:cover;">
              <h5><?= htmlspecialchars($row['name']) ?></h5>
              <p><?= htmlspecialchars($row['description']) ?></p>
              <p class="price">₹<?= number_format($row['price'], 2) ?></p>

              <form method="POST">
                <input type="hidden" name="item_name" value="<?= htmlspecialchars($row['name']) ?>">
                <input type="hidden" name="price" value="<?= htmlspecialchars($row['price']) ?>">
                <button type="submit" name="add_to_cart" class="btn btn-outline-warning btn-sm">
                  Add to Cart
                </button>
              </form>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="text-center">⚠️ No items found for your search or category.</p>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>
