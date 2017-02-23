<?php
    // starting the session
    session_start();

    // connect to the database
    $db = mysqli_connect("127.0.0.1","rogueone","Pehseses1","faces"); 

    if (mysqli_connect_errno()) {
    echo printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

    if (isset($_POST['Submit'])) { 
    $_SESSION['SurprisedOneTagged'] = $_POST['SurprisedOneTagged'];
    $_SESSION['SurprisedTwoTagged'] = $_POST['SurprisedTwoTagged'];
    $_SESSION['SurprisedThreeTagged'] = $_POST['SurprisedThreeTagged'];
    $_SESSION['SurprisedFourTagged'] = $_POST['SurprisedFourTagged'];
    $_SESSION['SurprisedFiveTagged'] = $_POST['SurprisedFiveTagged'];
    $_SESSION['SurprisedSixTagged'] = $_POST['SurprisedSixTagged'];
    $_SESSION['SurprisedSevenTagged'] = $_POST['SurprisedSevenTagged'];
    $_SESSION['SurprisedEightTagged'] = $_POST['SurprisedEightTagged'];
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
    <h1>How do you feel now?</h1>
<form action="9.php" method="post">
    <p>
        <strong>Happy?</strong>
        <br>
        <label class="radio-inline">
            Not Happy at All:
            <input type="radio" name="radioHappyAfter" value="1">1
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioHappyAfter" value="2">2
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioHappyAfter" value="3">3
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioHappyAfter" value="4">4
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioHappyAfter" value="5">5: Extremely Happy
        </label>
    </p>
    <p>
        <strong>Sad?</strong>
        <br>
        <label class="radio-inline">
            Not Sad at All:
            <input type="radio" name="radioSadAfter" value="1">1
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSadAfter" value="2">2
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSadAfter" value="3">3
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSadAfter" value="4">4
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSadAfter" value="5">5: Extremely Sad
        </label>
    </p>
    <p>
        <strong>Angry?</strong>
        <br>
        <label class="radio-inline">
            Not Angry at All:
            <input type="radio" name="radioAngryAfter" value="1">1
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioAngryAfter" value="2">2
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioAngryAfter" value="3">3
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioAngryAfter" value="4">4
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioAngryAfter" value="5">5: Extremely Angry
        </label>
    </p>
    <p>
        <strong>Afraid?</strong>
        <br>
        <label class="radio-inline">
            Not Scared at All:
            <input type="radio" name="radioScaredAfter" value="1">1
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioScaredAfter" value="2">2
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioScaredAfter" value="3">3
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioScaredAfter" value="4">4
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioScaredAfter" value="5">5: Extremely Scared
        </label>
    </p>
    <p>
        <strong>Surprised?</strong>
        <br>
        <label class="radio-inline">
            Not Surprised at All:
            <input type="radio" name="radioSurprisedAfter" value="1">1
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSurprisedAfter" value="2">2
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSurprisedAfter" value="3">3
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSurprisedAfter" value="4">4
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSurprisedAfter" value="5">5: Extremely Surprised
        </label>
    </p>
    <input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>