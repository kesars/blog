<?php 
session_start();
if(isset($_SESSION['login_user'])){
  header("location:userblog.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  function newuser(){
      window.open("registration.php");
  }
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="../static/css/home.css">
<link rel="stylesheet" href="../static/css/index.css">
</head>
<body>
<?php include"../includes/navbar2.php" ?>
<h2><font color="#287AB2">Webkul</font></h2>

<form action="login.php" name="home" method="POST">
  <div class="imgcontainer">
    <img src="../static/images/man.png" alt="dp" class="dp" width="250">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
   
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <input type="submit" class="btn-success" value="Login">
    <input type="button" class="btn-primary" value="New User ?" onclick="newuser()">
  </div>

</form>
<?php include "../includes/footer.php" ?>

</body>
</html>
