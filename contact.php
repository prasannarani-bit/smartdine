<?php
// contact.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | SmartDine</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Background styling */
    body {
      background: url('assets/images/restaurant-bg.jpg') no-repeat center center fixed;
      background-size: cover;
      position: relative;
      color: #fff;
      font-family: 'Poppins', sans-serif;
    }

    /* Overlay for readability */
    body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.6);
      z-index: -1;
    }

    /* Navigation bar */
    nav {
      background: rgba(0, 0, 0, 0.8);
      padding: 10px 0;
    }

    nav a {
      color: white;
      text-decoration: none;
      margin: 0 20px;
      font-weight: 500;
    }

    nav a:hover {
      color: #ffcc00;
    }

    /* Contact section */
    .contact-container {
      background: rgba(255, 255, 255, 0.85);
      color: #000;
      padding: 40px;
      border-radius: 20px;
      width: 70%;
      max-width: 700px;
      margin: 100px auto;
      box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }

    h2 {
      text-align: center;
      font-weight: 600;
      margin-bottom: 25px;
      color: #333;
    }

    .btn-custom {
      background-color: #ff6600;
      color: white;
      border: none;
      border-radius: 10px;
      padding: 10px 20px;
      font-size: 16px;
      transition: 0.3s;
    }

    .btn-custom:hover {
      background-color: #e65c00;
    }

    footer {
      text-align: center;
      color: white;
      margin-top: 50px;
      padding: 15px 0;
      background: rgba(0,0,0,0.8);
    }
  </style>
</head>
<body>

  <!-- Navigation -->
  <nav class="text-center">
    <a href="index.php">Home</a>
    <a href="menu.php">Menu</a>
    <a href="reservation.php">Reserve Table</a>
    <a href="contact.php">Contact</a>
  </nav>

  <!-- Contact Form -->
  <div class="contact-container">
    <h2>Contact SmartDine</h2>
    <p class="text-center mb-4">We’d love to hear from you! Reach out for any queries, reservations, or feedback.</p>

    <form action="contact_submit.php" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Full Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
      </div>

      <div class="mb-3">
        <label for="message" class="form-label">Message:</label>
        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Type your message here..." required></textarea>
      </div>

      <div class="text-center">
        <button type="submit" class="btn-custom">Send Message</button>
      </div>
    </form>

    <hr>

    <div class="text-center mt-4">
      <h5>SmartDine Restaurant</h5>
      <p>📍 Vizianagaram, Andhra Pradesh, India</p>
      <p>📧 smartdine@gmail.com</p>
      <p>📞 +91 9876543210</p>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    © 2025 SmartDine | All Rights Reserved
  </footer>

</body>
</html>
