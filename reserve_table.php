<?php
include __DIR__ . '/includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $guests = $_POST['guests'];
  $date = $_POST['date'];
  $time = $_POST['time'];

  $sql = "INSERT INTO reservations (name, email, phone, guests, date, time) 
          VALUES ('$name', '$email', '$phone', '$guests', '$date', '$time')";
  if ($conn->query($sql)) {
    $success = "Table reserved successfully!";
  } else {
    $error = "Error: " . $conn->error;
  }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Reserve a Table | SmartDine</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #fff8e7, #f0e6ff);
      font-family: 'Poppins', sans-serif;
    }
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: 0.3s;
    }
    .card:hover { transform: translateY(-5px); }
    .btn-primary { background-color: #6f42c1; border: none; }
    .btn-primary:hover { background-color: #59359c; }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="card p-4 mx-auto" style="max-width: 600px;">
    <h3 class="text-center text-primary fw-bold mb-3">Reserve a Table 🍽️</h3>

    <?php if (!empty($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="POST">
      <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>No. of Guests</label>
        <input type="number" name="guests" class="form-control" min="1" required>
      </div>
      <div class="mb-3">
        <label>Date</label>
        <input type="date" name="date" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Time</label>
        <input type="time" name="time" class="form-control" required>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary w-100">Reserve Now</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>
