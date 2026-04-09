<?php
include __DIR__ . '/includes/db_connect.php';

if ($conn) {
    echo "Database connected successfully!";
} else {
    echo "Failed to connect.";
}
?>
