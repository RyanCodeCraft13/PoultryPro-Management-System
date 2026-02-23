<?php
include 'db.php';
if(isset($_POST['save'])){
    $stmt=$conn->prepare("INSERT INTO expenses(expense_date,description,amount) VALUES(?,?,?)");
    $stmt->bind_param("ssd",$_POST['date'],$_POST['desc'],$_POST['amount']);
    $stmt->execute();
}
?>

<link rel="stylesheet" href="style.css">
<h2>Expenses</h2>

<form method="POST">
<input type="date" name="date" required>
<input name="desc" placeholder="Description" required>
<input type="number" step="0.01" name="amount" required>
<button name="save">Save</button>
</form>
