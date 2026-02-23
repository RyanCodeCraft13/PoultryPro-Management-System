<?php
include 'db.php';
if(isset($_POST['save'])){
    $stmt=$conn->prepare("INSERT INTO feeds(feed_name,quantity,cost) VALUES(?,?,?)");
    $stmt->bind_param("sid",$_POST['feed'],$_POST['qty'],$_POST['cost']);
    $stmt->execute();
}
?>

<link rel="stylesheet" href="style.css">
<h2>Feed Inventory</h2>

<form method="POST">
<input name="feed" placeholder="Feed Name" required>
<input type="number" name="qty" placeholder="Quantity" required>
<input type="number" step="0.01" name="cost" placeholder="Cost" required>
<button name="save">Save</button>
</form>
