<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> Sign In </h2>
      <br>
      <?php
      if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
          echo "<h2>Username dan Password tidak sesuai !</h2>";
        }
      }
      ?>
      <!-- Login Form -->
      <form method="post" action="">
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="username">
        <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
        <input type="submit" class="fadeIn fourth" name="login" value="Log In">
      </form>
    </div>
  </div>
  
</body>
</html>

<?php 
include 'config.php';

$conn = Config();

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $query = mysqli_query($conn, $sql);
  $cek = mysqli_num_rows($query);
  if($cek > 0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location: admin/index.php");
  }else{
    header("location: login.php?pesan=gagal");
  }
}

?>

