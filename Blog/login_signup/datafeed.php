
<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	session_start();
	$uname1=$_SESSION['uname1'];
	$fname1=$_SESSION['fname1'];
	$lname1=$_SESSION['fname1'];
	$email1=$_SESSION['email1'];
	$pass=$_SESSION['pass'];
	$mobile1=$_SESSION['mobile1'];
	$addr1=$_SESSION['addr1'];
	$image=$_SESSION['picture'];


	$servername = "localhost";
	$username = "root";
	$password = "webkul";
	$dbname = "myblog";

	// Create connection
	include("../includes/connection.php");

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$file=addslashes(file_get_contents($image));		
	$sql="INSERT INTO users (uname,fname,lname,email, mobile,addr,pass,images)VALUES('$uname1','$fname1','$lname1','$email1','$mobile1','$addr1','$pass','$file')";

	if (mysqli_query($conn, $sql)) {
		echo "<h3>You are Registered!!<br><br> You are being redirected to Login Page.....</h3>";
	} else {
		echo  "<script>alert('User already registered')</script>" ;
	}
	mysqli_close($conn);
	session_destroy();
	header("refresh:2;url=home.php");
?> 


