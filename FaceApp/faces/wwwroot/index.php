<?php
 	// starting the session
 	session_start();

    // analytics tracking
    include_once("analyticstracking.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>FACES</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <br>
    <h1>Welcome!</h1>
    <br>
    <h2>You are about to play a small GAME.
        <br>
        We are going to ask you some simple QUESTIONS, and then you will be asked to tap on some FACES. 
        <br>
        <br>
        Please read the instructions carefully!
        <br>
    </h2>
    <form action="1.php" method="post">
        <br>
        <input type="submit" name="Submit" value="Begin">
    </form>
</body>
<footer>
  <p>Written by: Joe Manfredonia
  <br>Contact information: <a href="mailto:jmanfred@stevens.edu">jmanfred@stevens.edu</a></p>
  <p>Face images provided from the 2010 Cohn-Kanade dataset (CK+) with permission from authors.</p>
  <p>Lucey, P., Cohn, J. F., Kanade, T., Saragih, J., Ambadar, Z., & Matthews, I. (2010). 
  <br> The extended Cohn–Kanade dataset (CK+): A complete dataset for action unit and emotion-specified expression. In CVPR Workshop on human communicative behavior analysis.</p>
</footer>
</html>