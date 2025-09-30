<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination_id = $_POST['destination_id'];
    $depart = $_POST['depart_date'];
    $return = $_POST['return_date'];

    $conn->query("INSERT INTO travel_dates (destination_id, depart_date, return_date)
                  VALUES ('$destination_id', '$depart', '$return')");
    header("Location: admin-panel.php");
    exit();
}

$dest = $conn->query("SELECT id, name FROM destinations");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Travel Date</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #f3e5f5, #e1bee7);
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
    }
    input, select {
      width: 100%;
      padding: 12px;
      margin: 8px 0 16px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    button {
      background-color: #6a1b9a;
      color: white;
      border: none;
      padding: 12px;
      width: 100%;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background-color: #4a148c;
    }
    .back-link {
      display: inline-block;
      margin-top: 16px;
      text-decoration: none;
      color: #6a1b9a;
    }
    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Add Travel Date</h2>
    <form method="post">
      <select name="destination_id" required>
        <?php while ($row = $dest->fetch_assoc()) {
          echo "<option value='{$row['id']}'>{$row['name']}</option>";
        } ?>
      </select>
      <input type="date" name="depart_date" required>
      <input type="date" name="return_date" required>
      <button type="submit">Add Date</button>
    </form>
    <a class="back-link" href="admin-panel.php">← Back to Admin Panel</a>
  </div>
</body>
</html>
