<<?php
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
<h2>Choose a song to delete</h2>

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

    $queryview ="SELECT * FROM SONGS where OwnerID = '".$_SESSION["UID"]."' ";
    $resultQ =$conn->query($queryview);

?>

<form action="songdelete.php" method="POST" onsubmit="return confirm('Are you sure to delete this record?')">
<table border ="2">
<tr>
    <th> Choose </th>
    <th> SongID </th>
    <th> SongTitle </th>
    <th> SongArtist </th>
    <th> SongUrl </th>
    <th> SongGenre</th>
    <th> SongLanguage </th>
    <th> SongReleaseDate </th>
    <th> OtherDetails </th>
    <th> Owner ID </th>
</tr>

<?php
if ($resultQ->num_rows > 0){
    while($row = $resultQ->fetch_assoc()) {
?>
<tr>
    <td><input type="radio" name="SongID" value="<?php echo $row["SongID"]; ?>" required> </td>
    <td><?php echo $row["SongID"];?></td>
    <td><?php echo $row["SongTitle"];?></td>
    <td><?php echo $row["SongArtist"];?></td>
    <td><?php echo $row["SongUrl"];?></td>
    <td><?php echo $row["SongGenre"];?></td>
    <td><?php echo $row["SongLanguage"];?></td>
    <td><?php echo $row["SongReleaseDate"];?></td>
    <td><?php echo $row["OtherDetails"];?></td>
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

<input type="submit" value="Delete Selected Record">
<br><br>
Click <a href ="songview.php"> here </a> to view song collection.
</form>
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