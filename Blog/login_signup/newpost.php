
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('session.php');
include('../includes/header2.php');
include('../includes/navbar4.php');

$uname=$login_session;
if(isset($_POST['submit'])){

    if(! $conn ) {
        die('Could not connect: ' . mysql_error());
     }
    $id=$_POST['id'];
    $name=$_POST['name'];
    $category=$_POST['category'];
    $description=$_POST['description'];
    $sql = "INSERT INTO content (c_id,c_name,c_category,c_description, uname) VALUES ('$id','$name','$category','$description','$uname')";

    if (mysqli_query($conn, $sql)) {
		echo "<h3>Succcess.</h3>";
	} else {
		echo "<h3>The unique value is already taken, try something new!!";
	}

}


?>

<div class="container">
  <h2>Enter Blog contents</h2>
  <form action="" name="content_submit" method="POST">

  <div class="form-group">
      <label for="id">Unique value:</label>
      <input type="text" class="form-control" id="id" placeholder="Enter unique value" name="id" required>
    </div>  

    <div class="form-group">
      <label for="name">Title:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter title" name="name" required>
    </div>

    <div class="form-group">
      <label for="category">Category:</label>
      <input type="text" class="form-control" id="namcategory" placeholder="Enter category" name="category" required>
    </div>

    <div class="form-group">
      <label for="description">Description:</label>
      <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" required>
    </div>
    
   
    <button type="submit" class="btn btn-success" name="submit">Submit</button>
  </form>
</div>







<?php
include('../includes/footer.php');
?>
