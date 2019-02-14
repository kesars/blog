
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('session.php');
include('../includes/header2.php');
include('../includes/navbar3.php');

if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $category=$_POST['category'];
    $description=$_POST['description'];
   
    $sql = "UPDATE content  SET c_name='$name', c_description='$description', c_category='$category'  WHERE c_id= '$id' ";

    if (mysqli_query($conn, $sql)) {
		echo "<h3>Succcess Updated.</h3>";
	} else {
		echo "<h3>The id is wrong, Enter correct ID!!";
	}

}



if(isset($_POST['delete'])){
    $uname=$login_session;
    $id=$_POST['id'];
    $sql = "DELETE from  content  WHERE c_id= '$id' and uname='$uname' ";
    print_r($sql);
    if (mysqli_query($conn, $sql)) {
     echo "<h3>Successfully Deleted .</h3>";

    } else {
     echo "<h3>The id is wrong, Enter correct ID!!";
    }
}


?>


<div class="container">
  <h2>Enter Blog contents to Edit</h2>
  <form action="" name="content_submit" method="POST">

  <div class="form-group">
      <label for="id">Enter Content Unique ID:</label>
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







<br><br>
<br><div class="container">
  <h2>Delete a blog</h2>
  <form action="" name="content_submit" method="POST">

  <div class="form-group">
      <label for="id">Enter Content Unique ID:</label>
      <input type="text" class="form-control" id="id" placeholder="Enter unique value" name="id" required>
    </div>  

    <button type="submit" class="btn btn-success" name="delete">Submit</button>
  </form>
</div>

<br><br>
<br>
<br><br>
<br>

<?php
include('../includes/footer.php');
?>