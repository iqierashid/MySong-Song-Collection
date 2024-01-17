<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html>
<head>
<title>MySong</title>
<link rel="stylesheet" href="/Group Project/css/menuStyle.css">
<link rel="stylesheet" href="/Group Project/css/formStyle.css">
</head>

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
        <li><a href="#">Song Update</a></li>
        <li><a href="/Group Project/Admin Only/userModView.php">User Moderator</a></li>            
        </ul>
    </li>
    <li><a href="/Group Project/Login Page/logout.php">Logout</a></li>
    <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </ul>
</div>
</nav>
<br><br><br><br>
<h2>All Users</h2>
<br>
<div class="container">
<p style="color:blue;font-weight:bold;"> Update User Details </p>

<?php
$UserName = $_POST['UserName'];

$host = "localhost";
$user = "root";
$pass = "";
$db = "song_collection";

$conn = new mysqli($host,$user,$pass,$db);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else
{
    $queryGet = "SELECT * FROM USERS WHERE UserName = '".$UserName."'";

    $resultGet = $conn->query($queryGet);

    if ($resultGet->num_rows > 0){
?>
    <form action="userModSave.php" name="UpdateForm" method="POST">

<?php
    while($row = $resultGet->fetch_assoc()){
?>


Username:<input type="text" name="UserName" value="<?php echo $row ['UserName'];?>" maxlength="30" size="45" required><br>

User Password:<input type="text" name="UserPwd" value="<?php echo $row ['UserPwd'];?>" maxlength="30"  size="45" required><br>

User Status:
<?php $UStats = $row['UserStatus'];?>
<select name="UserStatus" required>
    <option value="">-Please Choose- </option>
    <option value="active" <?php if ($UStats == "active") echo "selected"; ?>>Active </option>
    <option value="block" <?php if ($UStats == "block") echo "selected"; ?>>Block/Suspended </option>
</select>
<br>
<input type="hidden" name="UserName" value="<?php echo $row['UserName'];?>">
<button class="btn" type="submit" value="Update New Details">Update New Details</button>
</div>
</form>

<?php
    }
}
}
$conn->close();
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