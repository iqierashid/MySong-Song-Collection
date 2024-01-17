<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="/Group Project/css/menuStyle.css">
    <link rel="stylesheet" href="/Group Project/css/viewStyle.css">
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
              <li><a href="/Group Project/Admin Only/songeditViewAdmin.php">Song Update</a></li>
              <li><a href="/Group Project/Admin Only/userModView.php">User Moderator</a></li>            
            </ul>
          </li>
          <li><a href="/Group Project/Login Page/logout.php">Logout</a></li>
          <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
          </ul>
      </div>
    </nav>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "song_collection";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search keyword from the query parameters
$keyword = $_GET['keyword'];

// Construct the SQL query
$querySearch = "SELECT * FROM SONGS WHERE 
    SongTitle LIKE '%$keyword%' OR
    SongArtist LIKE '%$keyword%' OR
    SongGenre LIKE '%$keyword%' OR
    SongLanguage LIKE '%$keyword%' OR
    OtherDetails LIKE '%$keyword%'";

$resultSearch = $conn->query($querySearch);

// Display search results in a table
if ($resultSearch->num_rows > 0) {
    echo "<table border = '2'>";
    echo "<tr><th>SongID</th><th>SongTitle</th><th>SongArtist</th><th>SongUrl</th><th>SongGenre</th><th>SongLanguage</th><th>SongReleasedate</th><th>OtherDetails</th><th>SongStatus</th><th>OwnerID</th></tr>";
    echo "<br><br><br><br>";
    echo "<b>Search for '" .$keyword. "'</b>";
    echo "<br>";
    
    while ($row = $resultSearch->fetch_assoc()) {
        
        echo "<tr>";
        echo "<td>" . $row['SongID'] . "</td>";
        echo "<td>" . $row['SongTitle'] . "</td>";
        echo "<td>" . $row['SongArtist'] . "</td>";
        echo "<td>" . $row['SongUrl'] . "</td>";
        echo "<td>" . $row['SongGenre'] . "</td>";
        echo "<td>" . $row['SongLanguage'] . "</td>";
        echo "<td>" . $row['SongReleaseDate'] . "</td>";
        echo "<td>" . $row['OtherDetails'] . "</td>";
        echo "<td>" . $row['SongStatus'] . "</td>";
        echo "<td>" . $row['OwnerID'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No results found.";
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