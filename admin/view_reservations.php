<?php
include __DIR__ . '/../includes/db_connect.php';
$result = $conn->query("SELECT * FROM reservations ORDER BY date, time");
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>View Reservations | SmartDine Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #fff8e7, #f0e6ff);
      font-family: 'Poppins', sans-serif;
    }
    .table {
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <h3 class="text-center text-primary fw-bold mb-4">View Reservations 📅</h3>
  <table class="table table-striped text-center align-middle">
    <thead class="table-primary">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Guests</th>
        <th>Date</th>
        <th>Time</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "
            <tr>
              <td>{$row['id']}</td>
              <td>{$row['name']}</td>
              <td>{$row['email']}</td>
              <td>{$row['phone']}</td>
              <td>{$row['guests']}</td>
              <td>{$row['date']}</td>
              <td>{$row['time']}</td>
            </tr>
          ";
        }
      } else {
        echo "<tr><td colspan='7'>No reservations found</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
