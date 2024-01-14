<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html>
<head>
<title>MySong</title>
</head>

<body>
<h3> Song Updated </h3>

<?php

$SongID = $_POST['SongID'];
$songStatus = $_POST['SongStatus'];

$host = "localhost";
$user = "root";
$pass = "";
$db = "song_collection";

$conn = new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else
{   
    $queryUpdate = "UPDATE SONGS SET 
    SongStatus = '$songStatus'
    WHERE SongID = '$SongID' ";

    if($conn->query($queryUpdate) === TRUE) {
        echo "Success Update New Data";
        echo "<br><br>";
        echo "Click <a href='/Group Project/Admin Only/songviewAdmin.php'> here </a> to view song collection ";
    } else {
        echo "Error updating record: " . $conn->error;
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
