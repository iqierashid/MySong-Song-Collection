<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $_SESSION["UID"];?>'s Song Collection </title>
<link rel="stylesheet" href="/Group Project/css/menuStyle.css">
<link rel="stylesheet" href="/Group Project/css/viewStyle.css">
</head>
<?php
    $UserType = "user";
?>
<body>

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

    $queryview ="SELECT * FROM USERS where UserType = '".$UserType."'"; // only user's songs collection visible
    $resultQ =$conn->query($queryview);

    ?>
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
          <li><a href="#">Song View</a></li>
          <li><a href="/Group Project/Admin Only/songeditViewAdmin.php">Song Update</a></li>
          <li><a href="/Group Project/Admin Only/userModView.php">User Moderator</a></li>            
        </ul>
      </li>
      <li><a href="/Group Project/Login Page/logout.php">Logout</a></li>
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
      </ul>
  </div>
</nav>
    <br><br><br><br>
    <h2>All User Registered</h2><br>
    <table border ="2">
    <tr>
    <th> Username</th>
    <th> User Password</th>
    <th> User Type</th>
    <th> User Status</th>
    </tr>
<?php
    if ($resultQ->num_rows > 0){
        while($row = $resultQ->fetch_assoc()){
?>



<tr>
    <td><?php echo $row["UserName"];?></td>
    <td><?php echo $row["UserPwd"];?></td>
    <td><?php echo $row["UserType"];?></a></td>
    <td><?php echo $row["UserStatus"];?></td>
</tr>
<?php
        }
    } else {
        echo "<tr><th colspan='7' style='color:red;'No Data Selected</td></tr>";
    }
}
$conn->close();
?>
</table>
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