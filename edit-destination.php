<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $country = $_POST['country'];
    $image = $_POST['image'];
    $conn->query("UPDATE destinations SET name='$name', country='$country', image='$image' WHERE id=$id");
    header("Location: admin-panel.php");
    exit();
}
$row = $conn->query("SELECT * FROM destinations WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Destination</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #e0f7fa, #e1f5fe);
      margin: 0;
      padding: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .form-box {
      background: white;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 0 12px rgba(0,0,0,0.1);
      width: 400px;
    }
    .form-box h2 {
      margin-bottom: 20px;
      text-align: center;
      color: #333;
    }
    input {
      width: 100%;
      padding: 12px;
      margin: 8px 0 16px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    button {
      background-color: #00796b;
      color: white;
      border: none;
      padding: 12px;
      width: 100%;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background-color: #004d40;
    }
    .back-link {
      display: inline-block;
      margin-top: 16px;
      text-decoration: none;
      color: #00796b;
    }
    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Edit Destination</h2>
    <form method="post">
      <input type="text" name="name" value="<?= $row['name'] ?>" required>
      <input type="text" name="country" value="<?= $row['country'] ?>" required>
      <input type="text" name="image" value="<?= $row['image'] ?>">
      <button type="submit">Update Destination</button>
    </form>
    <a class="back-link" href="admin-panel.php">← Back to Admin Panel</a>
  </div>
</body>
</html>
