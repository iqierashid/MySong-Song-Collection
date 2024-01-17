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
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
        <li><a href="/Group Project/index.html">Home</a></li>
        <li><a href="/Group Project/Users Only/song_form.php">Song Register</a></li>
        <li>
          <a href="#" class="desktop-item">Song Collection</a>
          <input type="checkbox" id="showDrop">
          <label for="showDrop" class="mobile-item">Song Collection</label>
          <ul class="drop-menu">
            <li><a href="/Group Project/Users Only/songview.php">Song View</a></li>
            <li><a href="#">Song Update</a></li>
            <li><a href="/Group Project/Users Only/songdeleteView.php">Song Delete</a></li>            
          </ul>
        </li>
        <li><a href="/Group Project/Login Page/logout.php">Logout</a></li>
    </div>
    </nav>
<br><br><br><br>
<h2><?php echo $_SESSION["UID"];?>'s Collection Song</h2>
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
    <form action="songeditSave.php" name="UpdateForm" method="POST">

<?php
    while($row = $resultGet->fetch_assoc()){
?>

Song ID: <b><?php echo $row ['SongID'];?></b><br><br>

Title of the Song:<input type="text" name="songTitle" value="<?php echo $row ['SongTitle'];?>" maxlength="30" size="45" required><br>

Artist/Band Name:<input type="text" name="artistName" value="<?php echo $row ['SongArtist'];?>" maxlength="30"  size="45" required><br>

Audio/Video URL:<input type="url" name="songUrl" value="<?php echo $row['SongUrl']?>" style="height:50px;font-size:12px"required><br>

Genre:<input type="text"  name="genre" value="<?php echo $row['SongGenre']?>" required><br>

Language:
<?php $SLang = $row['SongLanguage'];?>
<select name="language" required>
    <option value="">-Please Choose- </option>
    <option value="English" <?php if ($SLang == "English") echo "selected"; ?>>English </option>
    <option value="Malay" <?php if ($SLang == "Malay") echo "selected"; ?>>Malay </option>
    <option value="Chinese" <?php if ($SLang == "Chinese") echo "selected"; ?>>Chinese </option>
    <option value="Spanish" <?php if ($SLang == "Spanish") echo "selected"; ?>>Spanish </option>
    <option value="Other" <?php if ($SLang == "Other") echo "selected"; ?>>Other </option>
</select><br>

Release Date:<input type="date" name="releaseDate" value="<?php echo $row['SongReleaseDate']?>" 
placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31" required><br>

Other Relevant Details:<br><textarea name="otherDetails" style="height:100px;width:350px"><?php echo $row['OtherDetails']?></textarea><br>

<br>
<input type="hidden" name="SongID" value="<?php echo $row['SongID'];?>">
<button class="btn" type="submit" value="Update New Details">Update New Details</button>
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