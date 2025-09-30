<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $conn->query("INSERT INTO services (title, description) VALUES ('$title', '$desc')");
    header("Location: admin-panel.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Service</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #d7efff, #ffffff);
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
      color: #007acc;
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
      background-color: #007acc;
      color: white;
      border: none;
      padding: 12px;
      width: 100%;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background-color: #005a99;
    }
    .back-link {
      display: inline-block;
      margin-top: 16px;
      text-decoration: none;
      color: #007acc;
    }
    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Add New Service</h2>
    <form method="post">
      <input type="text" name="title" placeholder="Service Title" required>
      <textarea name="description" placeholder="Description..." required></textarea>
      <button type="submit">Add Service</button>
    </form>
    <a class="back-link" href="admin-panel.php">← Back to Admin Panel</a>
  </div>
</body>
</html>
