<?php
    // starting the session
    session_start();

    // analytics tracking
    include_once("analyticstracking.php");

    // connect to the database
    $db = mysqli_connect("db0.stevens.edu","w3_visdec","J9r1CbDR","w3_visdec"); 

    if (mysqli_connect_errno()) {
    echo printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

    $t = microtime(true);
    $micro = sprintf("%06d",($t - floor($t)) * 1000000);
    $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );

    if (isset($_POST['Submit'])) { 
    $_SESSION['NotSadOneTagged'] = $_POST['NotSadOneTagged'];
    $_SESSION['NotSadTwoTagged'] = $_POST['NotSadTwoTagged'];
    $_SESSION['NotSadThreeTagged'] = $_POST['NotSadThreeTagged'];
    $_SESSION['NotSadFourTagged'] = $_POST['NotSadFourTagged'];
    $_SESSION['NotSadFiveTagged'] = $_POST['NotSadFiveTagged'];
    $_SESSION['NotSadSixTagged'] = $_POST['NotSadSixTagged'];
    $_SESSION['NotSadSevenTagged'] = $_POST['NotSadSevenTagged'];
    $_SESSION['NotSadEightTagged'] = $_POST['NotSadEightTagged'];
    $_SESSION['tsSubmitNotSad'] = $d->format("Y-m-d H:i:s.u");
    } 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>FACES</title>
<link rel="stylesheet" href="style.css">
</head>
<br>
<body>
<h1>How do you feel now?</h1>
<form action="11.php" method="post">
    <p>
        <strong>Happy?</strong>
        <br>
        Not at all
        <span class="radiogroup">
            <input type="radio" name="radioHappyAfter" id="radioHappyAfter1" value="1" required/>
            <label for="radioHappyAfter1">1</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioHappyAfter" id="radioHappyAfter2" value="2" required/>
            <label for="radioHappyAfter2">2</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioHappyAfter" id="radioHappyAfter3" value="3" required/>
            <label for="radioHappyAfter3">3</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioHappyAfter" id="radioHappyAfter4" value="4" required/>
            <label for="radioHappyAfter4">4</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioHappyAfter" id="radioHappyAfter5" value="5" required/>
            <label for="radioHappyAfter5">5</label>
        </span>
        Extremely
    </p>
    <p>
        <strong>Sad?</strong>
        <br>
        Not at all
        <span class="radiogroup">
            <input type="radio" name="radioSadAfter" id="radioSadAfter1" value="1" required/>
            <label for="radioSadAfter1">1</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSadAfter" id="radioSadAfter2" value="2" required/>
            <label for="radioSadAfter2">2</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSadAfter" id="radioSadAfter3" value="3" required/>
            <label for="radioSadAfter3">3</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSadAfter" id="radioSadAfter4" value="4" required/>
            <label for="radioSadAfter4">4</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSadAfter" id="radioSadAfter5" value="5" required/>
            <label for="radioSadAfter5">5</label>
        </span>
        Extremely
    </p>
    <p>
        <strong>Angry?</strong>
        <br>
        Not at all
        <span class="radiogroup">
            <input type="radio" name="radioAngryAfter" id="radioAngryAfter1" value="1" required/>
            <label for="radioAngryAfter1">1</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioAngryAfter" id="radioAngryAfter2" value="2" required/>
            <label for="radioAngryAfter2">2</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioAngryAfter" id="radioAngryAfter3" value="3" required/>
            <label for="radioAngryAfter3">3</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioAngryAfter" id="radioAngryAfter4" value="4" required/>
            <label for="radioAngryAfter4">4</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioAngryAfter" id="radioAngryAfter5" value="5" required/>
            <label for="radioAngryAfter5">5</label>
        </span>
        Extremely
    </p>
        <strong>Scared?</strong>
        <br>
        Not at all
        <span class="radiogroup">
            <input type="radio" name="radioScaredAfter" id="radioScaredAfter1" value="1" required/>
            <label for="radioScaredAfter1">1</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioScaredAfter" id="radioScaredAfter2" value="2" required/>
            <label for="radioScaredAfter2">2</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioScaredAfter" id="radioScaredAfter3" value="3" required/>
            <label for="radioScaredAfter3">3</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioScaredAfter" id="radioScaredAfter4" value="4" required/>
            <label for="radioScaredAfter4">4</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioScaredAfter" id="radioScaredAfter5" value="5" required/>
            <label for="radioScaredAfter5">5</label>
        </span>
        Extremely
    </p>
        <strong>Surprised?</strong>
        <br>
        Not at all
        <span class="radiogroup">
            <input type="radio" name="radioSurprisedAfter" id="radioSurprisedAfter1" value="1" required/>
            <label for="radioSurprisedAfter1">1</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSurprisedAfter" id="radioSurprisedAfter2" value="2" required/>
            <label for="radioSurprisedAfter2">2</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSurprisedAfter" id="radioSurprisedAfter3" value="3" required/>
            <label for="radioSurprisedAfter3">3</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSurprisedAfter" id="radioSurprisedAfter4" value="4" required/>
            <label for="radioSurprisedAfter4">4</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSurprisedAfter" id="radioSurprisedAfter5" value="5" required/>
            <label for="radioSurprisedAfter5">5</label>
        </span>
        Extremely
    </p>
    <input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>