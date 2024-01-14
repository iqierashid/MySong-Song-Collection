<!DOCTYPE html>
<html>
<head>
<title> Song Collection </title>
<link rel="stylesheet" href="/Group Project/css/logoutStyle.css">
</head>
<?php
session_start();
if (isset($_SESSION["UID"]))
{
    session_unset();
    session_destroy();
    ?>
    <nav>
    <div class="wrapper">
      <div class="logo"><a href="/Group Project/index.html">MySong</a></div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <li><a href="/Group Project/Login Page/login.html">Login</a></li>
    </div>
    </nav>
    <br><br><br>
    <?php
    echo "<br><p style='color:red;'>You have successfully logged out.</p>";
    } else {
    echo " No session exists or session is expired. Please log in again";
    echo "<br>Click <a href='/Group Project/Login Page/login.html'> here </a> to LOGIN again.";
    }    
?>
</html>
