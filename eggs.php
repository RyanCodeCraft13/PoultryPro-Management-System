<?php
include 'db.php';
if(isset($_POST['save'])){
    $stmt=$conn->prepare("INSERT INTO egg_production(batch_id,production_date,total_eggs) VALUES(?,?,?)");
    $stmt->bind_param("isi",$_POST['batch'],$_POST['date'],$_POST['eggs']);
    $stmt->execute();
}
$batches=$conn->query("SELECT * FROM batches");
?>

<link rel="stylesheet" href="style.css">
<h2>Egg Production</h2>

<form method="POST">
<select name="batch">
<?php while($b=$batches->fetch_assoc()){ ?>
<option value="<?= $b['id'] ?>"><?= $b['batch_name'] ?></option>
<?php } ?>
</select>
<input type="date" name="date" required>
<input type="number" name="eggs" placeholder="Total Eggs" required>
<button name="save">Save</button>
</form>
