
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../includes/connection.php");
    session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
    
    $sql = "SELECT uname FROM users WHERE uname = '$myusername' and pass = '$mypassword'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQL_ASSOC);
    $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count == 1) {
         $_SESSION['login_user'] = $myusername;
      
        header('Location:userblog.php');
      /*   header('Location:profile.php');*/
    }else {
       echo '<script>alert("Your Login Name or Password is invalid");</script>';
	   mysqli_close($conn);
    }
	header( "refresh:0;url=home.php" );
 }
?>
