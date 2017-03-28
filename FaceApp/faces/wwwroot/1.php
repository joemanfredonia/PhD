<?php
 	// starting the session
 	session_start();

    // analytics tracking
    include_once("analyticstracking.php");

    $t = microtime(true);
    $micro = sprintf("%06d",($t - floor($t)) * 1000000);
    $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );

    if (isset($_POST['Submit'])) { 
    $_SESSION["tsBegin"] = $d->format("Y-m-d H:i:s.u");
    } 
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
    <h1>First, please tell us a little bit about yourself...</h1>
    <br>
    <form action="2.php" method="post">
        <p>
            <table align="center">
                <tr>
                    <td align="right">
                        <label for="Age">Age:</label>
                    </td>
                    <td>
                        <input type="number" name="age" id="Age" required/>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="Gender">Gender:</label>
                    </td>
                    <td>
                        <select name="gender" id="Gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="NativeSpeaker">Are you a native english speaker?:</label>
                    </td>
                    <td>
                        <select name="nativeSpeaker" id="NativeSpeaker" required>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </td>
                </tr>
            </table>
        </p>
        <br>
        <input type="submit" name="Submit" value="Submit">
    </form>
</body>
</html>