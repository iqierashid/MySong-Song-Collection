<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html>
<head>
<title>MySong </title>
<link rel="stylesheet" href="/Group Project/css/menuStyle.css">
<link rel="stylesheet" href="/Group Project/css/editStyle.css">
</head>
<?php
    $UserType = "user";
?>
<body>
<nav>
          <div class="wrapper">
          <div class="logo"><a href="/Group Project/menu.php">MySong</a></div>
          <input type="checkbox" id="menu-btn">
          <input type="checkbox" id="close-btn">
            <ul class="nav-links">
            <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
           <li><a href="/Group Project/index.html">Home</a></li>
            <li>
              <a href="#" class="desktop-item">Users</a>
              <input type="checkbox" id="showDrop">
              <label for="showDrop" class="mobile-item">Users Song Collection</label>
              <ul class="drop-menu">
                <li><a href="/Group Project/Admin Only/songviewAdmin.php">Song View</a></li>
                <li><a href="/Group Project/Admin Only/songeditViewAdmin.php">Song Approval</a></li>
                <li><a href="/Group Project/Admin Only/userModView.php">User Moderator</a></li>            
              </ul>
            </li>
            <li><a href="/Group Project/Login Page/logout.php">Logout</a></li>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
          </ul>
        </div>
      </nav>
<br><br><br><br>
<h2>All User</h2>
<br>
<p> Choose which record you want to update </p>
<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "song_collection";

$conn = new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{

    $queryview ="SELECT * FROM USERS where UserType= '".$UserType."'";
    $resultQ =$conn->query($queryview);

?>

<form action="userModDetails.php" method="POST" >
<table border ="2">
<tr>
    <th> Choose</th>
    <th> Username</th>
    <th> User Password</th>
    <th> User Type</th>
</tr>

<?php
if ($resultQ->num_rows > 0){
    while($row = $resultQ->fetch_assoc()) {
?>
<tr>
    <td><input type="radio" name="UserName" value="<?php echo $row["UserName"];?>"></td>
    <td><?php echo $row["UserName"];?></td>
    <td><?php echo $row["UserPwd"];?></td>
    <td><?php echo $row["UserType"];?></td>

</tr>

<?php
        }
    } else {
        echo "<tr><th colspan='8' style='color:red;'No Data Selected</td></tr>";
    }
}
?>
</table>
<?php
$conn->close();
?>

<br><br>
<div class="form-field">
<button class="btn" type="submit" value="View record to Edit" >View record to edit</button>
</div>
<br><br>

</form>

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
