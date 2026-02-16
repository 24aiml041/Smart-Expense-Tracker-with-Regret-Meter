<?php
include 'config.php';

$id = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM expenses WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $desc = $_POST['description'];
    $regret = $_POST['regret'];

    mysqli_query($conn,"UPDATE expenses SET 
        amount='$amount',
        category='$category',
        date='$date',
        description='$desc',
        regret_level='$regret'
        WHERE id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Update Expense</title>
</head>
<body>
<div class="container">
<h2>Update Expense</h2>

<form method="POST">

<div class="form-group">
<input type="number" step="0.01" name="amount" 
value="<?php echo $row['amount']; ?>" required>
</div>

<div class="form-group">
<select name="category">
<option <?php if($row['category']=="Food") echo "selected"; ?>>Food</option>
<option <?php if($row['category']=="Shopping") echo "selected"; ?>>Shopping</option>
<option <?php if($row['category']=="Bills") echo "selected"; ?>>Bills</option>
<option <?php if($row['category']=="Travel") echo "selected"; ?>>Travel</option>
<option <?php if($row['category']=="Other") echo "selected"; ?>>Other</option>
</select>
</div>

<div class="form-group">
<input type="date" name="date" value="<?php echo $row['date']; ?>" required>
</div>

<div class="form-group">
<input type="text" name="description" 
value="<?php echo $row['description']; ?>">
</div>

<div class="form-group">
<select name="regret">
<option <?php if($row['regret_level']=="No Regret") echo "selected"; ?>>No Regret</option>
<option <?php if($row['regret_level']=="Slight Regret") echo "selected"; ?>>Slight Regret</option>
<option <?php if($row['regret_level']=="Moderate Regret") echo "selected"; ?>>Moderate Regret</option>
<option <?php if($row['regret_level']=="High Regret") echo "selected"; ?>>High Regret</option>
</select>
</div>

<button name="update">Update Expense</button>

</form>
</div>
</body>
</html>
