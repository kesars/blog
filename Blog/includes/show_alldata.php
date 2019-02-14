<?php
  
  $results_per_page = 4;

  // find out the number of results stored in database
  $sql='SELECT * FROM content';
  $result = mysqli_query($conn, $sql);
  $number_of_results = mysqli_num_rows($result);

  // determine number of total pages available
  $number_of_pages = ceil($number_of_results/$results_per_page);

  // determine which page number visitor is currently on
  if (!isset($_GET['page'])) {
    $page = 1;
  } else {
    $page = $_GET['page'];
  }

  // determine the sql LIMIT starting number for the results on the displaying page
  $this_page_first_result = ($page-1)*$results_per_page;
  // retrieve selected results from database and display them on page

  $sql='SELECT * FROM content LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    echo '<h3> ' . $row['c_name'].   '</h3><h4>Blog-Category[' .$row['c_category']. ']</h4><br>' .$row['c_description'].'<br>';
  }
  ?>
  <div class="pagination">
  <?php
  // display the links to the pages
  for ($page=1;$page<=$number_of_pages;$page++) {
    echo '<a class="active" href="index.php?page=' . $page . '">' . $page . '</a> ';
  }

?>
  </div>  
