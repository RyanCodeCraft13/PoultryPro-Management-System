<?php
include 'db.php';
if(!isset($_SESSION['user'])) header("Location: login.php");

$batches = $conn->query("SELECT COUNT(*) as total FROM batches")->fetch_assoc()['total'];
$eggs = $conn->query("SELECT SUM(total_eggs) as total FROM egg_production")->fetch_assoc()['total'] ?? 0;
$sales = $conn->query("SELECT SUM(amount) as total FROM sales")->fetch_assoc()['total'] ?? 0;
$expenses = $conn->query("SELECT SUM(amount) as total FROM expenses")->fetch_assoc()['total'] ?? 0;
$profit = $sales - $expenses;
?>

<link rel="stylesheet" href="style.css">
<h1>Dashboard</h1>

<a href="batches.php">Batches</a> |
<a href="eggs.php">Eggs</a> |
<a href="feeds.php">Feeds</a> |
<a href="sales.php">Sales</a> |
<a href="expenses.php">Expenses</a> |
<a href="logout.php">Logout</a>

<hr>

<p>Total Batches: <?= $batches ?></p>
<p>Total Eggs: <?= $eggs ?></p>
<p>Total Sales: ₱<?= $sales ?></p>
<p>Total Expenses: ₱<?= $expenses ?></p>
<h3>Net Profit: ₱<?= $profit ?></h3>
