<?php 
if(isset($_SESSION['login_user'])){
  header("location:userblog.php");
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['submit'])) {
	$uname1 =($_POST["uname1"]);
	if (!preg_match("/^[a-zA-Z][a-zA-Z0-9]{3,30}$/",$uname1)) {
		$hasError = true;
	}

	$fname1 =($_POST["fname1"]);
	if (!preg_match("/^[a-zA-Z]{3,}$/",$fname1)) {
		$hasError = true;
	}

	$lname1 =($_POST["lname1"]);
	if (!preg_match("/^[a-zA-Z]{3,}$/",$lname1)) {
		$hasError = true;
	}

	$email1 =($_POST["email1"]);
	if (!preg_match("/^[a-zA-Z_.]{3,}@[a-zA-Z]{3,}[.]{1}[a-zA-Z.]{2,5}$/",$email1)) {
		$hasError = true;
	}


	$pass =($_POST["pass"]);
	if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$pass)) {
		$hasError = true;
	}

	$mobile1 =($_POST["mobile1"]);
	if (!preg_match("/^[6789][0-9]{9}$/",$mobile1)) {
		$hasError = true;
	}


	//If there is no error


	if(!isset($hasError)) {
		session_start();
		$_SESSION['uname1'] = $_POST['uname1'];
		$_SESSION['fname1'] = $_POST['fname1'];
		$_SESSION['lname1'] = $_POST['lname1'];
		$_SESSION['email1'] = $_POST['email1'];
		$_SESSION['pass'] = $_POST['pass'];
		$_SESSION['mobile1'] = $_POST['mobile1'];
		$_SESSION['addr1'] = $_POST['addr1'];


		$filename    = $_FILES["image"]["tmp_name"];
		$destination = $_FILES["image"]["name"]; 
		move_uploaded_file($filename, $destination); 
	
		$_SESSION['picture'] = $destination;
		header("location:datafeed.php");
	}

	
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Registration Form</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<link rel="stylesheet" href="../static/css/index.css">
			<script src="../static/js/registration.js"></script>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="../static/css/registration.css">
	</head>
	<body>	

			<?php include"../includes/navbar2.php" ?>
			
			<h2><font color="#287AB2">Webkul Registration</font></h2>

			<div class="container">	
			<form name="reg" method="POST"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"  enctype="multipart/form-data">
					<div class="imgcontainer">
							<img src="../static/images/man.png" alt="dp" class="dp" width="250">
					</div>
					<br><br>

					<?php if(isset($hasError)) { //If errors are found ?>
					<p class="error">Please check if you've filled all the fields with valid information. Thank you.</p>
					<?php } ?>

					<div class="form-group">
							<label for="uname">*User Name:</label>
							<input type="text" placeholder="Enter Username" class="form-control" id="uname" name="uname1" >
							<span id="uerror" class="text-danger font-weight-bold" ></span>
					</div>
					<div class="form-group">
						<label for="fname">*FirstName:</label>
						<input type="text" placeholder="Enter FirstName" class="form-control" id="fname" name="fname1" >
						<span id="ferror" class="text-danger font-weight-bold" ></span>
					</div>
					<div class="form-group">
						<label for="lname">*LastName:</label>
						<input type="text" placeholder="Enter LastName" class="form-control" id="lname" name="lname1" >
						<span id="lerror" class="text-danger font-weight-bold" ></span>
					</div>
					<div class="form-group">
						<label for="email">*Email address:</label>
						<input type="email" placeholder="Enter Email" class="form-control" id="email"  name="email1" >
						<span id="eerror" class="text-danger font-weight-bold" ></span>
					</div>
					<div class="form-group">
							<label for="pass">*Password</label>
							<input type="password" class="form-control" id="pass" placeholder="Password" name="pass" >
							<span id="perror" class="text-danger font-weight-bold" ></span>
					</div>
					<div class="form-group">
							<label for="tel">*Telephone</label>
							<input class="form-control" placeholder="Enter Mobile Number" type="tel"  id="tel"  name="mobile1" >
							<span id="merror" class="text-danger font-weight-bold" ></span>
					</div>
					<div class="form-group">
						<label for="address">Address:</label>
						<textarea class="form-control" placeholder="Enter Address" rows="5" id="address" name="addr1" ></textarea>
					</div>					
					<div class="form-group">
							<label for="fileinput">*Submit your profile pic</label>
							<input type="file" class="form-control-file" name="image" id="image" accept="image/x-png,image/gif,image/jpeg" >
							<span id="ierror" class="text-danger font-weight-bold" ></span>
					</div>
						
				  <input type="submit" class="btn btn-success" value="Submit" name="submit" onclick="return validate()">
				  <button type="reset" class="btn btn-primary">Reset</button>
			</form>
			<?php include "../includes/footer.php" ?>
		</div>
	</body>
</html>
