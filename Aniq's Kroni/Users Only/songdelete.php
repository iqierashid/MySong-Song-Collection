<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html>
<head>
<title> MySong </title>
</head>

<body>
<h3> Song Deleted! </h3>

<?php

$SongID = $_POST["SongID"];

//declare DB connection variables
$host = "localhost";
$user = "root";
$pass = "";
$db = "song_collection";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

else
{
    $deleteQuery ="DELETE FROM SONGS where SongID = '".$SongID."' "; 

    if ($conn->query($deleteQuery) === TRUE){
        echo "<p style='color:blue;'> Record has been deleted from database !</p>";
        echo "<br><br>";
        echo "Click <a href='/Group Project/Users Only/songview.php'> here </a> to view song collection ";
    } else{
        echo "<p style='color:red;'>Query problems! : " . $conn->error . "</p>";
    }

}
$conn-> close();
?>
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
