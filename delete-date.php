<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
if (isset($_POST['confirm'])) {
    $conn->query("DELETE FROM travel_dates WHERE id=$id");
    header("Location: admin-panel.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Delete Travel Date</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #ffebee, #ffcdd2);
      margin: 0;
      padding: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .box {
      background: white;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 0 12px rgba(0,0,0,0.1);
      text-align: center;
      width: 400px;
    }
    h2 {
      margin-bottom: 20px;
      color: #c62828;
    }
    form {
      margin-top: 20px;
    }
    button {
      background-color: #c62828;
      color: white;
      border: none;
      padding: 12px 20px;
      margin: 10px;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background-color: #b71c1c;
    }
    .cancel {
      background-color: #aaa;
    }
    .cancel:hover {
      background-color: #888;
    }
  </style>
</head>
<body>
  <div class="box">
    <h2>Are you sure you want to delete this travel date?</h2>
    <form method="post">
      <button type="submit" name="confirm">Yes, Delete</button>
      <a href="admin-panel.php"><button type="button" class="cancel">Cancel</button></a>
    </form>
  </div>
</body>
</html>
