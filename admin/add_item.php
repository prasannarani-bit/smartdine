<?php
include __DIR__ . '/../includes/db_connect.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = floatval($_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $image = '';

    // Handle Image Upload
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../assets/images/";
        $image = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    $query = "INSERT INTO menu (name, description, price, image, category)
              VALUES ('$name', '$description', '$price', '$image', '$category')";

    if (mysqli_query($conn, $query)) {
        $message = "<div class='alert alert-success'>Item added successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Menu Item - SmartDine</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, rgba(255,140,0,0.85), rgba(255,255,255,0.8)), 
                  url('../assets/images/bg.jpg') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Poppins', sans-serif;
    }
    .container {
      background: rgba(255,255,255,0.9);
      padding: 30px;
      margin-top: 80px;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }
    .form-label {
      font-weight: 600;
    }
    .btn-custom {
      background-color: #ff6600;
      color: #fff;
      border-radius: 25px;
      border: none;
      transition: background 0.3s;
    }
    .btn-custom:hover {
      background-color: #e65c00;
    }
    .navbar {
      background-color: rgba(0,0,0,0.8);
    }
    .navbar a {
      color: white !important;
      font-weight: 500;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand text-white fw-bold" href="#">SmartDine Admin</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="add_item.php" class="nav-link">Add Item</a></li>
        <li class="nav-item"><a href="view_reservations.php" class="nav-link">View Reservations</a></li>
        <li class="nav-item"><a href="../menu.php" class="nav-link">View Menu</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Add Item Form -->
<div class="container">
  <h2 class="text-center mb-4">Add New Menu Item</h2>
  <?= $message; ?>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="name" class="form-label">Item Name</label>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" id="description" rows="3" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
      <label for="price" class="form-label">Price (₹)</label>
      <input type="number" step="0.01" name="price" id="price" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select name="category" id="category" class="form-select" required>
        <option value="">-- Select Category --</option>
        <option value="veg">Veg</option>
        <option value="nonveg">Non-Veg</option>
        <option value="drinks">Drinks</option>
        <option value="desserts">Desserts</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Upload Image</label>
      <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-custom px-4">Add Item</button>
    </div>
  </form>
</div>

</body>
</html>
