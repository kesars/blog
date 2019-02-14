<?php
//fetch.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$connect = mysqli_connect("localhost", "root", "webkul", "myblog");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM content 
  WHERE c_name LIKE '%".$search."%'
  OR c_description LIKE '%".$search."%' 
  OR c_category LIKE '%".$search."%' ";
}
else
{
 $query = "
  SELECT * FROM content ORDER BY c_category
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Name</th>
     <th>Description</th>
     <th>Category</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["c_name"].'</td>
    <td>'.$row["c_description"].'</td>
    <td>'.$row["c_category"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
