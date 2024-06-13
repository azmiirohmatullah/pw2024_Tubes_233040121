<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

require 'function.php';

if(isset($_POST['login'])) {
    $username = $_POST ['username'];
    $password = $_POST ['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if(mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])) {
            // set session
            $_SESSION['login'] = true;
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
<div class="container">
      <div class="wrapper">
        <div class="title"><span>Login</span></div>
        <form action="#" method="POST">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required>
          </div>
          <div class="row button">
          <input type="submit" name=" login" class="btn">
          </div>
          <div class="signup-link">Not a member? <a href="register.php">Register</a></div>
        </form>
      </div>
    </div>

</body>
</html>
