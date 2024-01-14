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
<h2>All Collection Song</h2>
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

    $queryview ="SELECT * FROM SONGS";
    $resultQ =$conn->query($queryview);

?>

<form action="songeditDetailsAdmin.php" method="POST" >
<table border ="2">
<tr>
    <th> Choose </th>
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
    while($row = $resultQ->fetch_assoc()) {
?>
<tr>
    <td><input type="radio" name="SongID" value="<?php echo $row["SongID"]; ?>" required> </td>
    <td><?php echo $row["SongTitle"];?></td>
    <td><?php echo $row["SongArtist"];?></td>
    <td><?php echo $row["SongUrl"];?></td>
    <td><?php echo $row["SongGenre"];?></td>
    <td><?php echo $row["SongLanguage"];?></td>
    <td><?php echo $row["SongReleaseDate"];?></td>
    <td><?php echo $row["OtherDetails"];?></td>
    <td><?php echo $row["SongStatus"];?></td>
    <td><?php echo $row["OwnerID"];?></td>
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
