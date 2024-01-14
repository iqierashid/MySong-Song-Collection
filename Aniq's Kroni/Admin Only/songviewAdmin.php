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

$conn = new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{

    $queryview ="SELECT * FROM SONGS"; // only user's songs collection visible
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
    <h2>All Song Collection</h2><br>
    <form action="search.php" method="GET">
    <label for="searchKeyword">Search Keyword:</label>
    <input type="text" id="searchKeyword" name="keyword" required>
    <button type="submit">Search</button>
    </form>
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