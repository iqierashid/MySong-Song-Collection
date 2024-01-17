<!DOCTYPE html>
<html>
<head>
<title> MySong </title>
</head>

<?php


$userName = $_POST['username'];//user name
$userPwd = $_POST['userPwd'];// user pass
$userBlock = "block";

$host = "localhost";
$username = "root";
$password = ""; 
$dbname = "song_collection"; //change to new db

$link = new mysqli($host, $username, $password, $dbname);
if ($link->connect_error) {
 die("Connection failed: " . $link->connect_error); 
}
else
{

    $queryCheck = "SELECT * from USERS where UserName = '".$userName."' ";

    $resultCheck = $link->query($queryCheck);

    if ($resultCheck->num_rows == 0) {
        echo "<p style='color:red;'>User ID does not exist</p>";
        echo "<br>Click <a href='login.html'> here </a> to log in again";
    }
    else
    {
        $row = $resultCheck->fetch_assoc();

        if($row["UserPwd"] == $userPwd)
        {
            if ($row["UserStatus"] == $userBlock) 
            {
                echo "<p style='color:red;'>You have been blocked/suspended!!!</p>";
                echo "Click <a href='login.html'> here </a> to return";
            }
            else
            {
                session_start();
                $_SESSION["UID"] = $userName ;
                $_SESSION["UserType"] = $row["UserType"];
                header("Location:/Group Project/menu.php");
            }
        }  
        else 
        { 
            echo "<p style='color:red;'>Wrong password!!! </p>";
            echo "Click <a href='login.html'> here </a> to login again ";
        }
    }
}
$link->close();
?>
</html>