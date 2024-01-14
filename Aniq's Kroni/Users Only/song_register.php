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
    <title>MySong </title>
    <link rel="stylesheet" href="/Group Project/css/viewStyle.css">
</head>
<?php

    $songTitle = $_POST['songTitle'];
    $artistName = $_POST['artistName'];
    $songMedia = $_POST['songUrl'];
    $genre = $_POST['genre'];
    $language = $_POST['language'];
    $releaseDate = $_POST['releaseDate'];
    $otherDetails = $_POST['otherDetails'];
?>
<body>
<h1>Song Registration Details</h1>
<table border="2">
        <tr>
            <th>Song Attribute</th>
            <th>Details</th>
        </tr>
        <tr>
            <td>Title of the Song</td>
            <td style="color: blue"><?php echo $songTitle; ?></td>
        </tr>
        <tr>
            <td>Artist/Band Name</td>
            <td><?php echo $artistName; ?></td>
        </tr>
        <tr>
            <td>Audio/Video URL</td>
            <td><?php echo $songMedia; ?></td>
        </tr>
        <tr>
            <td>Genre</td>
            <td><?php echo $genre; ?></td>
        </tr>
        <tr>
            <td>Language</td>
            <td><?php echo $language; ?></td>
        </tr>
        <tr>
            <td>Release Date</td>
            <td><?php echo $releaseDate; ?></td>
        </tr>
        <tr>
            <td>Other Relevant Details</td>
            <td><?php echo $otherDetails; ?></td>
        </tr>
</table>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "song_collection";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
}
else
{
	$queryInsert = "INSERT INTO songs (SongTitle, SongArtist, SongURL, SongGenre, SongLanguage, SongReleaseDate, OtherDetails,OwnerID)
    VALUES ('$songTitle', '$artistName', '$songMedia', '$genre', '$language', '$releaseDate', '$otherDetails','".$_SESSION["UID"]."')";
		
        
	if ($conn->query($queryInsert) === TRUE) {
		echo "<p style='color: blue;'>Success insert song data.</p>";
		}
	else{
		echo "<p style=color:red;'>Fail to insert" . $conn->error."</p>";
		}
}
$conn->close();
?>
       
<br><br>

<p>Click <a href="song_form.php">here</a> to enter new Song details </p>
<p>Click <a href="songview.php">here</a> to view ALL song details </p>
<br><br>

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
