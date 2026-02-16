<?php
session_start();
include 'config.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if($user && password_verify($password,$user['password'])){
        $_SESSION['user'] = $user['name'];
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid Login";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Login</title>
</head>
<body>
<div class="container">
<h2>Login</h2>
<!-- <form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button name="login">Login</button>
</form> -->
<form method="POST">

<div class="form-group">
<input type="email" name="email" placeholder="Enter Email" required>
</div>

<div class="form-group">
<input type="password" name="password" placeholder="Enter Password" required>
</div>

<button name="login">Login</button>

</form>

<p>New user? <a href="register.php">Register</a></p>
</div>
</body>
</html>
