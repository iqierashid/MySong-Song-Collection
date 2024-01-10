<html>
<head>
<title> Song Collection </title>
</head>
<body>
<h2> WELCOME, Hi</h2>
<p> Choose your menu : </p>

<?php
    if ($_SESSION["UserType"] == "admin") {
    ?>

    <a href = "admin_management.php"> Admin Management </a><br><br>

    <?php
    }
    else {
    ?>
    <a href = "song_form.html"> Register New Song </a> <br><br>
    <a href = "song_view.php"> View All Song </a> <br><br>
    <a href = "song_updateView.php"> Edit Song </a> <br><br>
    <a href = "song_deleteView.php"> Delete Song </a> <br><br>
    <?php
    }
    ?>
<a href="logout.php">Logout</a><br>
</body>
</html>
<?php
}
else
{
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href='login.html'>Login </a>";
}
?>
</html>