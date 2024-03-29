<?php
session_start();
//if sesh exist
//sesh userid gets value form text field named userid, shown in login.php
if(isset ($_SESSION["UID"])) {
?>
<html>
<head>
<title>MySong</title>
<link rel="stylesheet" href="/Group Project/css/menuStyle.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php

    if ($_SESSION["UserType"] == "admin") {
    ?>

    <nav>
        <div class="wrapper">
        <div class="logo"><a href="./menu.php">MySong</a></div>
        <input type="checkbox" id="menu-btn">
        <input type="checkbox" id="close-btn">
          <ul class="nav-links">
          <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
          <li><a href="./index.html">Home</a></li>
          <li>
            <a href="#" class="desktop-item">Users</a>
            <input type="checkbox" id="showDrop">
            <label for="showDrop" class="mobile-item">Users Song Collection</label>
            <ul class="drop-menu">
              <li><a href="./Admin Only/songviewAdmin.php">Song View</a></li>
              <li><a href="./Admin Only/songeditViewAdmin.php">Song Update</a></li>
              <li><a href="./Admin Only/userModView.php">User Moderator</a></li>            
            </ul>
          </li>
          <li><a href="./Login Page/logout.php">Logout</a></li>
          <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
          </ul>
      </div>
    </nav>
    <div class="body-text">
    <div class="title">Welcome</div>
    <div class="sub-title">Hi, <?php echo $_SESSION["UID"];?></div>
  </div>
    <?php
    }
    else {
    ?>
    <nav>
      <div class="wrapper">
      <div class="logo"><a href="menu.php">MySong</a></div>
      <input type="checkbox" id="menu-btn">
      <input type="checkbox" id="close-btn">
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
            <li><a href="./Users Only/songeditView.php">Song Update</a></li>
            <li><a href="./Users Only/songdeleteView.php">Song Delete</a></li>            
          </ul>
        </li>
        <li><a href="./Login Page/logout.php">Logout</a></li>
        <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
      </ul>
    </div>
  </nav>

  <div class="body-text">
    <div class="title">Welcome</div>
    <div class="sub-title">Hi, <?php echo $_SESSION["UID"];?></div>
  </div>

    <?php
    }
    ?>
</body>
</html>
<?php
}
else
{
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href='/Group Project/Login Page/login.html'>Login </a>";
}
?>
</html>