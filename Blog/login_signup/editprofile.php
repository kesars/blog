
<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include('session.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registration Form</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="../static/css/registration.css">
			<link rel=stylesheet href="../static/css/index.css">
			<script src="../static/js/registration.js"></script>
			<script  type="text/javascript">
				$(document).ready(function (){
					$("#reset").click(function(){
						$("#fname").val("");
						$("#lname").val("");
						$("#email").val("");
						$("#mobile").val("");
						$("#addr").val("");
						$("#pass").val("");
					});
				});
			
			</script>

	</head>
	<body>
		<?php 	
				include("../includes/navbar5.php")
		?>
		<h2><font color="#287AB2"><h1>Welcome <?php echo $login_session;?>&nbsp;!</h1> </font></h2>
		<div class="container">	
					<?php			
						$id=$_SESSION['login_user'];
						$sql="SELECT uname,fname,lname,email,mobile,addr,images,pass FROM users where uname='$id' ";
						$result=mysqli_query($conn,$sql);
						if ($result){
								while ($row=mysqli_fetch_row($result)){
					?>			
								<div class="imgcontainer">
										<?php echo '<img style="border-radius:50%" height="250" src="data:image/jpeg;base64,'.base64_encode($row[6]).'"/>'; ?>
								</div>
								<br><br>
							
								<div class="form-group">
										<label for="uname">User Name:</label>
										<input type="text" class="form-control" readonly value="<?php printf ('%s',$row[0]); ?>">
								</div>
								<form action="" method="POST">
								<div class="form-group">
									<label for="fname">FirstName:</label>
									<input type="text" id="fname" class="form-control"  value="<?php printf ('%s',$row[1]); ?>">
									<span id="ferror" class="text-danger font-weight-bold" ></span>
								</div>

								<div class="form-group">
									<label for="lname">LastName:</label>
									<input type="text" class="form-control" id="lname" value="<?php printf ('%s',$row[2]); ?>">
								</div>

								<div class="form-group">
									<label for="email">Email address:</label>
									<input type="email" class="form-control" id="email" value="<?php printf ('%s',$row[3]); ?>">
								</div>
								
								<div class="form-group">
									<label for="pass">Password:</label>
									<input type="pass" class="form-control" id="pass" value="<?php printf ('%s',$row[7]); ?>">
								</div>

								
								<div class="form-group">
										<label for="tel">Telephone</label>
										<input class="form-control" type="tel" id="mobile"  value="<?php printf ('%s',$row[4]); ?>">	
								</div>
								<div class="form-group">
									<label for="address">Address:</label>
									<input type="text" class="form-control" id="addr"  value="<?php printf ('%s',$row[5]); ?>">
								</div>

								<div class="form-group">
									<label for="fileinput">*Submit your profile pic</label>
									<input type="file" class="form-control-file" name="image" id="image" accept="image/x-png,image/gif,image/jpeg" >
								</div>

								<input type="submit" class="btn btn-success" value="Update" onclick="return validate()">	
								<input type="button" value="Reset" id="reset">
								</form>
							</div>
					<?php 
		
					 }
					 // Free result set
						mysqli_free_result($result);
					}
					include("../includes/footer.php")
					?>
				
	</body>
</html>
