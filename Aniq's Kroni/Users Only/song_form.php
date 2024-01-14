<?php
session_start();
//if sesh exist
//sesh userid gets value form text field named userid, shown in login.php
if(isset ($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySong </title>
    <link rel="stylesheet" href="/Group Project/css/menuStyle.css">
    <link rel="stylesheet" href="/Group Project/css/formStyle.css">
</head>

<body>
    
    <nav>
    <div class="wrapper">
      <div class="logo"><a href="/Group Project/menu.php">MySong</a></div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
        <li><a href="/Group Project/index.html">Home</a></li>
        <li><a href="#">Song Register</a></li>
        <li>
          <a href="#" class="desktop-item">Song Collection</a>
          <input type="checkbox" id="showDrop">
          <label for="showDrop" class="mobile-item">Song Collection</label>
          <ul class="drop-menu">
            <li><a href="/Group Project/Users Only/songview.php">Song View</a></li>
            <li><a href="/Group Project/Users Only/songeditView.php">Song Update</a></li>
            <li><a href="/Group Project/Users Only/songdelete.php">Song Delete</a></li>            
          </ul>
        </li>
        <li><a href="/Group Project/Login Page/logout.php">Logout</a></li>
    </div>
    </nav>
    <br><br><br>
    <h1>SONG REGISTRATION FORM</h1>
    <br>
    <div class="container">
    <form id="songForm" method="post" action="song_register.php">
        <p style="font-weight: bold;font-size: 20px;">Enter song details:</p>
        <p style="color: red; font-style: italic;">*ALL fields are required</p>

        Title of the Song:<input type="text" id="songTitle" name="songTitle" maxlength="50" required><br>

        Artist/Band Name:<input type="text" id="artistName" name="artistName" maxlength="30" required><br>

        Audio/Video URL:<input type="url" id="songUrl" name="songUrl" required><br>

        Genre:<input type="text" id="genre" name="genre" required><br>

        Language:<select id="language" name="language" required>
            <option value="">-Please Choose- </option>
            <option value="English">English </option>
            <option value="Malay">Malay </option>
            <option value="Chinese">Chinese </option>
            <option value="Spanish">Spanish </option>
            <option value="Other">Other </option>
        </select><br>

        Release Date:<input type="date" id="releaseDate" name="releaseDate" required><br>

        Other Relevant Details:<textarea name="otherDetails" style="height:100px;width:350px"></textarea>
        <br>
        <div class="form-field">
        <button class="btn" type="submit" value="Register Song">Register Song</button>
        <button class="btn" type="reset" value="Cancel">Cancel</button>
        </div>
    </form>
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