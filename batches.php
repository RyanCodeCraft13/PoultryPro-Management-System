<?php
include 'db.php';
if(!isset($_SESSION['user'])) header("Location: login.php");

if(isset($_POST['save'])){
    $stmt = $conn->prepare("INSERT INTO batches(batch_name,type,total_chickens,start_date) VALUES(?,?,?,?)");
    $stmt->bind_param("ssis",$_POST['name'],$_POST['type'],$_POST['total'],$_POST['date']);
    $stmt->execute();
}

$result = $conn->query("SELECT * FROM batches");
?>

<link rel="stylesheet" href="style.css">
<h2>Batch Management</h2>

<form method="POST">
<input name="name" placeholder="Batch Name" required>
<select name="type">
<option>Broiler</option>
<option>Layer</option>
</select>
<input type="number" name="total" placeholder="Total Chickens" required>
<input type="date" name="date" required>
<button name="save">Save</button>
</form>

<hr>

<table>
<tr><th>Name</th><th>Type</th><th>Total</th><th>Date</th></tr>
<?php while($row=$result->fetch_assoc()){ ?>
<tr>
<td><?= $row['batch_name'] ?></td>
<td><?= $row['type'] ?></td>
<td><?= $row['total_chickens'] ?></td>
<td><?= $row['start_date'] ?></td>
</tr>
<?php } ?>
</table>
