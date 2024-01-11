<?php
session_start();
//if sesh exist
//sesh userid gets value form text field named userid, shown in login.php
if(isset ($_SESSION["UID"])) {
?>
<html>
<head>
<title> Song Collection </title>
<link rel="stylesheet" href="/Group Project/css/menuStyle.css">
</head>
<body>
<?php

    if ($_SESSION["UserType"] == "admin") {
    ?>

    <a href = "admin_management.php"> Admin Management </a><br><br>

    <?php
    }
    else {
    ?>
    <nav>
    <div class="wrapper">
      <div class="logo"><a href="menu.php">MySong</a></div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
        <li><a href="/Group Project/index.html">Home</a></li>
        <li><a href="./Users Only/song_form.php">Song Register</a></li>
        <li>
          <a href="#" class="desktop-item">Song Collection</a>
          <input type="checkbox" id="showDrop">
          <label for="showDrop" class="mobile-item">Song Collection</label>
          <ul class="drop-menu">
            <li><a href="./Users Only/songview.php">Song View</a></li>
            <li><a href="./Users Only/songupdate.php">Song Update</a></li>
            <li><a href="./Users Only/songdelete.php">Song Delete</a></li>            
          </ul>
        </li>
        <li><a href="./Login Page/logout.php">Logout</a></li>
    </div>
  </nav>
  
  <div class="body-text">
    <div class="title">Welcome, Hi <?php echo $_SESSION["UID"];?></div>
  </div>
    <?php
    }
    ?>
<a href="logout.php">Logout</a><br>
</body>
</html>
<?php
}
else
{
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href='login.html'>Login </a>";
}
?>
</html>