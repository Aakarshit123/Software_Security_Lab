<?php
$conn = new mysqli("localhost", "webuser", "webpass123", "webapp");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
