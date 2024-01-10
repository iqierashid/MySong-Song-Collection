<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song Collection</title>   
</head>

<body>
    <h1>SONG REGISTRATION FORM</h1>

    <form id="songForm" method="post" action="song_register.php">
        <p style="font-weight: bold;">Enter song details:</p>
        <p style="color: red; font-style: italic;">*ALL fields are required</p>

        <label for="songTitle">Title of the Song:</label>
        <input type="text" id="songTitle" name="songTitle" required><br><br>

        <label for="artistName">Artist/Band Name:</label>
        <input type="text" id="artistName" name="artistName" required><br><br>

        <label for="songMedia">Audio/Video URL:</label>
        <input type="url" id="songMedia" name="songMedia" required><br><br>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required><br><br>

        <label for="language">Language:</label>
        <input type="text" id="language" name="language" required><br><br>

        <label for="releaseDate">Release Date:</label>
        <input type="date" id="releaseDate" name="releaseDate" required><br><br>

        <label for="otherDetails">Other Relevant Details:</label>
        <input id="otherDetails" name="otherDetails" ></input><br><br>

        <br>
        <input type="submit" value="Register Song">
        <input type="reset" value="Cancel">
    </form>
</head>

</html>
