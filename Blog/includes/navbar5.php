
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../login_signup/userblog.php">My Blog</a>
    </div>

    <ul class="nav navbar-nav navbar-right">
    <li><a href="editprofile.php"><span class="glyphicon glyphicon-wrench"></span> Edit Profile</a></li>
    <li><a href="../login_signup/profile.php"><span class="glyphicon glyphicon-user"></span><?php echo $login_session; ?> </a></li>
      <li><a href="../login_signup/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
