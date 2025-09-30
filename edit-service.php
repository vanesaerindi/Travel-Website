<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $conn->query("UPDATE services SET title='$title', description='$desc' WHERE id=$id");
    header("Location: admin-panel.php");
    exit();
}
$row = $conn->query("SELECT * FROM services WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Service</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #e3f2fd, #ffffff);
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
    h2 {
      margin-bottom: 20px;
      text-align: center;
      color: #1565c0;
    }
    input, textarea {
      width: 100%;
      padding: 12px;
      margin: 8px 0 16px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
    }
    textarea {
      height: 100px;
      resize: vertical;
    }
    button {
      background-color: #1565c0;
      color: white;
      border: none;
      padding: 12px;
      width: 100%;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background-color: #0d47a1;
    }
    .back-link {
      display: inline-block;
      margin-top: 16px;
      text-decoration: none;
      color: #1565c0;
    }
    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Edit Service</h2>
    <form method="post">
      <input type="text" name="title" value="<?= $row['title'] ?>" required>
      <textarea name="description" required><?= $row['description'] ?></textarea>
      <button type="submit">Update Service</button>
    </form>
    <a class="back-link" href="admin-panel.php">← Back to Admin Panel</a>
  </div>
</body>
</html>
