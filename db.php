<?php
session_start();
$conn = new mysqli("localhost","root","","poultry_system");

if($conn->connect_error){
    die("Database connection failed: " . $conn->connect_error);
}
?>
