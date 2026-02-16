<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>

<h2>Welcome <?php echo $_SESSION['user']; ?> 🎉</h2>
<a href="index.php">Go to Expense Tracker</a><br>
<a href="logout.php">Logout</a>
