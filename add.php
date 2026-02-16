<?php
include 'config.php';
if(isset($_POST['submit'])){
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $desc = $_POST['description'];
    $regret = $_POST['regret'];

    mysqli_query($conn,"INSERT INTO expenses (amount,category,date,description,regret_level)
    VALUES ('$amount','$category','$date','$desc','$regret')");

    header("Location: index.php");
}
?>
