<?php
 	// starting the session
 	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>FACES</title>
</head>
<body>
	<h1>Welcome! Tell us a little about yourself.</h1>
<form action="2.php" method="post">
    <p>
        <label for="Age">Age:</label>
        <input type="number" name="age" id="Age">
    </p>
    <p>
        <label for="Gender">Gender:</label>
        <select name="gender" id="Gender">
        	<option value="Male">Male</option>
        	<option value="Female">Female</option>
        </select>
    </p>
    <input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>