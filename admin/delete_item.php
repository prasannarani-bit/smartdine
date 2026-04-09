<?php
$conn = mysqli_connect("localhost", "root", "", "smartdine");
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM menu_items WHERE id=$id");
header("Location: ../menu.php");
?>
