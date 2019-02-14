
<?php
   session_start();
   if(session_destroy()) {
      header("Location: home.php");
	  mysqli_close($conn);
   }
?>

