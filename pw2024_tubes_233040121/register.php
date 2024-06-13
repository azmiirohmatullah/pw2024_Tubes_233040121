<?php
require 'function.php';

if ( isset($_POST['register']) ) {
    if( register($_POST) > 0) {
        echo "<script>
                alert('user berhasil ditambahkan!');
            </script>";
    } else {
        echo mysqli_error($Berita_Edukasi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
<div class="container">
      <div class="wrapper">
        <div class="title"><span>Register</span></div>
        <?php if(isset($error)) : ?>
            <p style="color: red;">Username/Password salah!</p>
        <?php endif; ?>
        <form action="#" method="POST">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Konfirmasi Password" name="password2" required>
          </div>
          <div class="row button">
          <input type="submit" name="register" class="btn">
          </div>
          <div class="signup-link">Not a member? <a href="login.php">Login</a></div>
        </form>
      </div>
    </div>

</body>
</html>