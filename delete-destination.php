<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
$id = $_GET['id'];
$conn->query("DELETE FROM destinations WHERE id=$id");
header("Location: admin-panel.php");
?>