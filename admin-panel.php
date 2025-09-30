<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$services = $conn->query("SELECT * FROM services");
$destinations = $conn->query("SELECT * FROM destinations");
$dates = $conn->query("SELECT td.*, d.name AS destination FROM travel_dates td JOIN destinations d ON td.destination_id = d.id");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f9ff;
      margin: 0;
      padding: 20px;
    }
    h2 {
      color: #2c3e50;
      margin-top: 40px;
    }
    .section {
      background: #ffffff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      margin-bottom: 30px;
    }
    .item {
      margin-bottom: 15px;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background: #fcfcfc;
    }
    .actions a {
      margin-right: 10px;
      text-decoration: none;
      color: white;
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 0.9em;
    }
    .add-btn {
      display: inline-block;
      margin-top: 10px;
      background: #4CAF50;
      color: white;
      padding: 8px 14px;
      border-radius: 6px;
      text-decoration: none;
    }
    .edit {
      background: #3498db;
    }
    .delete {
      background: #e74c3c;
    }
  </style>
</head>
<body>

<h1>Welcome, Admin 👋</h1>

<div class="section">
  <h2>Services</h2>
  <?php while ($s = $services->fetch_assoc()) : ?>
    <div class="item">
      <strong><?= htmlspecialchars($s['title']) ?></strong><br>
      <?= nl2br(htmlspecialchars($s['description'])) ?>
      <div class="actions">
        <a class="edit" href="edit-service.php?id=<?= $s['id'] ?>">Edit</a>
        <a class="delete" href="delete-service.php?id=<?= $s['id'] ?>">Delete</a>
      </div>
    </div>
  <?php endwhile; ?>
  <a class="add-btn" href="add-service.php">+ Add Service</a>
</div>

<div class="section">
  <h2>Destinations</h2>
  <?php while ($d = $destinations->fetch_assoc()) : ?>
    <div class="item">
      <strong><?= htmlspecialchars($d['name']) ?> (<?= htmlspecialchars($d['country']) ?>)</strong><br>
      Image: <?= htmlspecialchars($d['image']) ?>
      <div class="actions">
        <a class="edit" href="edit-destination.php?id=<?= $d['id'] ?>">Edit</a>
        <a class="delete" href="delete-destination.php?id=<?= $d['id'] ?>">Delete</a>
      </div>
    </div>
  <?php endwhile; ?>
  <a class="add-btn" href="add-destination.php">+ Add Destination</a>
</div>

<div class="section">
  <h2>Travel Dates</h2>
  <?php while ($t = $dates->fetch_assoc()) : ?>
    <div class="item">
      <strong><?= htmlspecialchars($t['destination']) ?></strong><br>
      From: <?= $t['depart_date'] ?> → To: <?= $t['return_date'] ?>
      <div class="actions">
        <a class="edit" href="edit-date.php?id=<?= $t['id'] ?>">Edit</a>
        <a class="delete" href="delete-date.php?id=<?= $t['id'] ?>">Delete</a>
      </div>
    </div>
  <?php endwhile; ?>
  <a class="add-btn" href="add-date.php">+ Add Travel Date</a>
</div>

</body>
</html>
