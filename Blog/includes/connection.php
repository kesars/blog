<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'webkul');
   define('DB_DATABASE', 'myblog');
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	  }
?>
