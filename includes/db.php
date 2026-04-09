<?php
$conn = mysqli_connect("localhost", "root", "", "smartdine");

if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
    exit;
}
?>
