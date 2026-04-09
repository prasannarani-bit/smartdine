<?php
include __DIR__ . '/includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";
  if ($conn->query($sql)) {
    echo "<script>alert('Thank you for contacting us!'); window.location.href='contact.php';</script>";
  } else {
    echo "<script>alert('Error saving your message. Please try again.'); window.location.href='contact.php';</script>";
  }
}
?>
