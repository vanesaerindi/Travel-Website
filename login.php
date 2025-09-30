<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = strtolower($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $role = strtolower($_POST['role'] ?? '');

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND role=?");
    $stmt->bind_param("ss", $username, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $username;
            $_SESSION['role'] = $role;

            if ($role === 'admin') {
                header("Location: admin-panel.php");
                exit();
            } else {
                header("Location: user.html");
                exit();
            }
        } else {
            $error = "Wrong password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #b6fbff, #83a4d4);
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-container {
      background: white;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      width: 320px;
    }
    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    input, select, button {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
    }
    button {
      background-color: #4caf50;
      color: white;
      font-weight: bold;
      border: none;
      cursor: pointer;
    }
    button:hover {
      background-color: #43a047;
    }
    .error {
      color: red;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <select name="role" required>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
