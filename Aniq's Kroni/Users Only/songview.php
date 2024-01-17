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

<body>

<?php


$host = "localhost";
$user = "root";
$pass = "";
$db = "song_collection";

$conn = new mysqli($host,$user,$pass,$db); // connect to database

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{

    $queryview ="SELECT * FROM SONGS where SongStatus = 'Approved'"; // only user's songs collection visible
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
            <li><a href="/Group Project/Users Only/songeditView.php">Song Update</a></li>
            <li><a href="/Group Project/Users Only/songdeleteView.php">Song Delete</a></li>            
          </ul>
        </li>
        <li><a href="/Group Project/Login Page/logout.php">Logout</a></li>
    </div>
    </nav>

    <br><br><br><br>
    <h2>All Song Collection</h2><br>
    
<?php
    if ($resultQ->num_rows > 0){
        echo "<table border ='2'>
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
        </tr>";

    while($row = $resultQ->fetch_assoc()){
        echo "<tr>
              <td>{$row['SongTitle']}</td>
              <td>{$row['SongArtist']}</td>
              <td><a href='{$row['SongUrl']}'>{$row['SongUrl']}</a></td>
              <td>{$row['SongGenre']}</td>
              <td>{$row['SongLanguage']}</td>
              <td>{$row['SongReleaseDate']}</td>
              <td>{$row['OtherDetails']}</td>
              <td>{$row['SongStatus']}</td>
              <td>{$row['OwnerID']}</td>
            </tr>";
    }
    echo "</table>";
    } else {
    // Display a message when there are no songs approved
    echo "<p style='color:red;'>There are no songs that have been approved.</p>";
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