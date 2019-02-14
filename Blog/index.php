
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "includes/header.php"; ?>

<body>
  <?php include "includes/navbar.php";
    include "includes/connection.php" ;
  ?> 

    <div class="container">

    <div id="result"></div>
      <h3>POSTS</h3>
      <?php 
       require_once('includes/show_alldata.php'); 
       
      ?>      
      </div>
      <br><br>
    <?php include "includes/footer.php" ?>

</body>
</html>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"login_signup/fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

