<!DOCTYPE html>
<html>
<head>
<title> Song Collection </title>
</head>

<?php


$userID = $_POST['userID'];
$userPwd = $_POST['userPwd'];

$host = "localhost";
$username = "root";
$password = ""; 
$dbname = " "; //change to new db

$link = new mysqli($host, $username, $password, $dbname);
if ($link->connect_error) {
 die("Connection failed: " . $link->connect_error); 
}
else
{

    $queryCheck = "SELECT * from USERS where UserID = '".$userID."' ";

    $resultCheck = $link->query($queryCheck);

    if ($resultCheck->num_rows == 0) {
        echo "<p style='color:red;'>User ID does not exists </p>";
        echo "<br>Click <a href='login.html'> here </a> to log-in again";
    }
    else
    {
        $row = $resultCheck->fetch_assoc();


        if($row["UserPwd"] == $userPwd)
        {

            session_start();

            $_SESSION["UID"] = $userID ;
            $_SESSION["UserType"] = $row["UserType"];


            header("Location:menu.php");
        } else { 

            echo "<p style='color:red;'>Wrong password!!! </p>";
            echo "Click <a href='login.html'> here </a> to login again ";
        }
    }
}
$link->close();
?>
</html>