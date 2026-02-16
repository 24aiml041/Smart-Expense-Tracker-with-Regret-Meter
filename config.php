<?php
$conn = mysqli_connect("localhost", "root", "", "smart_expenses");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>