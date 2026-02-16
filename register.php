<?php
include 'config.php';
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO users (name,email,password)
    VALUES ('$name','$email','$password')");

    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Register</title>
</head>
<body>
<div class="container">
<h2>Register</h2>
<!-- <form method="POST">
<input type="text" name="name" placeholder="Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button name="register">Register</button>
</form> -->
<form method="POST">

<div class="form-group">
<input type="text" name="name" placeholder="Enter Name" required>
</div>

<div class="form-group">
<input type="email" name="email" placeholder="Enter Email" required>
</div>

<div class="form-group">
<input type="password" name="password" placeholder="Enter Password" required>
</div>

<button name="register">Register</button>

</form>

<p>Already have account? <a href="login.php">Login</a></p>
</div>
</body>
</html>
