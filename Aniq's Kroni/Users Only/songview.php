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
</head>

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

    $queryview ="SELECT * FROM SONGS where OwnerID = '".$_SESSION["UID"]."' "; // only user's songs collection visible
    $resultQ =$conn->query($queryview);

    ?>
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
            <li><a href="#">Song View</a></li>
            <li><a href="./Users Only/songupdate.php">Song Update</a></li>
            <li><a href="./Users Only/songdelete.php">Song Delete</a></li>            
          </ul>
        </li>
        <li><a href="./Login Page/logout.php">Logout</a></li>
    </div>
  </nav>

    <br><br><br><br>
    <h2><?php echo $_SESSION["UID"];?>'s Song Collection</h2><br>
    <center>
    <table border ="2">
    <tr>
    <th> Title of the Song</th>
    <th> Artist/Band</th>
    <th> Youtube link/URL</th>
    <th> Genre</th>
    <th> Language</th>
    <th> Release Date</th>
    <th> Other relevant Details</th>
    <th> Approved/Rejected</th>
    <th> Owner Id</th>
    </tr>
<?php
    if ($resultQ->num_rows > 0){
        while($row = $resultQ->fetch_assoc()){
?>



<tr>
    <td><?php echo $row["SongTitle"];?></td>
    <td><?php echo $row["SongArtist"];?></td>
    <td><a href="<?php echo $row["SongUrl"];?>"><?php echo $row["SongUrl"];?></a></td>
    <td><?php echo $row["SongGenre"];?></td>
    <td><?php echo $row["SongLanguage"]; ?></td>
    <td><?php echo $row["SongReleaseDate"];?></td>
    <td><?php echo $row["OtherDetails"];?></td>
    <td><?php echo $row["SongStatus"];?></td>
    <td><?php echo $row["OwnerID"];?></td>
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
</center>
<br>
Click <a href="song_form.php">here</a> to INSERT new song details.
<br>
Click <a href="song_deleteView.php">here</a> to DELETE Song Collection.
<br>
Click <a href="song_editView.php">here</a> to EDIT Song Collection.
<br>
Click <a href="/Group Project/menu.php"> here </a> back to MENU page.
<br><br>
</body>
</html>
<?php
}
else
{
echo "No session exists or session has expired. Please
log in again.<br>";
echo "<a href=login.html> Login </a>";
}
?>
