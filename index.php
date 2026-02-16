<?php
session_start();
include 'config.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Smart Expenses</title>
</head>
<body>
<div class="container">
<h2>Welcome <?php echo $_SESSION['user']; ?> 👋</h2>
<a href="logout.php">Logout</a>

<form method="POST" action="add.php">

<div class="form-group">
<input type="number" step="0.01" name="amount" placeholder="Amount" required>
</div>

<div class="form-group">
<select name="category">
<option>Food</option>
<option>Shopping</option>
<option>Bills</option>
<option>Travel</option>
<option>Other</option>
</select>
</div>

<div class="form-group">
<input type="date" name="date" required>
</div>

<div class="form-group">
<input type="text" name="description" placeholder="Description">
</div>

<div class="form-group">
<select name="regret">
<option>No Regret</option>
<option>Slight Regret</option>
<option>Moderate Regret</option>
<option>High Regret</option>
</select>
</div>

<button name="submit">Add Expense</button>

</form>


<?php
$result = mysqli_query($conn,"SELECT * FROM expenses ORDER BY date DESC");
$total = mysqli_query($conn,"SELECT SUM(amount) as total FROM expenses");
$rowTotal = mysqli_fetch_assoc($total);
?>

<h3>Total Spending: ₹ <?php echo $rowTotal['total'] ?? 0; ?></h3>

<table>
<tr>
<th>Amount</th>
<th>Category</th>
<th>Date</th>
<th>Description</th>
<th>Regret</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?php echo $row['amount']; ?></td>
<td><?php echo $row['category']; ?></td>
<td><?php echo $row['date']; ?></td>
<td><?php echo $row['description']; ?></td>
<td>
<?php
$class="green";
if($row['regret_level']=="Slight Regret") $class="yellow";
if($row['regret_level']=="Moderate Regret") $class="red";
if($row['regret_level']=="High Regret") $class="black";
?>
<span class="badge <?php echo $class; ?>">
<?php echo $row['regret_level']; ?>
</span>
</td>

<td>
<a class="btn-update" href="edit.php?id=<?php echo $row['id']; ?>">Update</a>
<a class="btn-delete" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>


</tr>
<?php } ?>
</table>
</div>
</body>
</html>
