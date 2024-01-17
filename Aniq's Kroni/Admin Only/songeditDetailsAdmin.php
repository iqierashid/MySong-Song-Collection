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

<div class="body-text">
<div class="title">Welcome</div>
<div class="sub-title">Hi <?php echo $_SESSION["UID"];?></div>
</div>
<br><br><br><br>
<h2>All Collection Song</h2>
<br>
<div class="container">
<p style="color:blue;font-weight:bold;"> Update Song Details </p>

<?php
$SongID = $_POST['SongID'];

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
    $queryGet = "SELECT * FROM SONGS WHERE SongID = '".$SongID."'";

    $resultGet = $conn->query($queryGet);

    if ($resultGet->num_rows > 0){
?>
    <form action="songeditSaveAdmin.php" name="UpdateForm" method="POST">

<?php
    while($row = $resultGet->fetch_assoc()){
?>

Song ID: <b><?php echo $row ['SongID'];?></b><br><br>

Title of the Song: <b><?php echo $row ['SongTitle'];?></b><br>

Artist/Band Name:<b><?php echo $row ['SongArtist'];?></b><br>

Audio/Video URL:<br><b><?php echo $row['SongUrl']?></b><br>

Genre:<b><?php echo $row['SongGenre']?></b><br>

Language:
<b><?php echo $row['SongLanguage'];?></b><br>

Release Date:<b><?php echo $row['SongReleaseDate']?></b><br>

Other Relevant Details:<br><b><?php echo $row['OtherDetails']?></b><br>
Approved/Rejected:
<?php $SStats = $row['SongStatus'];?>
<select name="SongStatus" required>
    <option value="">-Please Choose- </option>
    <option value="Approved" <?php if ($SStats == "Approved") echo "selected"; ?>>Approved </option>
    <option value="Rejected" <?php if ($SStats == "Rejected") echo "selected"; ?>>Rejected </option>
    <option value="Pending" <?php if ($SStats == "Pending") echo "selected"; ?>>Pending </option>
<br>
<input type="hidden" name="SongID" value="<?php echo $row['SongID'];?>">
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