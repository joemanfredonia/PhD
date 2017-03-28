<?php
    // starting the session
    session_start();

    // analytics tracking
    include_once("analyticstracking.php");

    $t = microtime(true);
    $micro = sprintf("%06d",($t - floor($t)) * 1000000);
    $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );

    if (isset($_POST['Submit'])) { 
    $_SESSION["SessionID"] = session_id();
    $_SESSION['Age'] = $_POST['age'];
    $_SESSION['Gender'] = $_POST['gender'];
    $_SESSION['NativeSpeaker'] = $_POST['nativeSpeaker'];
    $_SESSION['tsSubmitBasics'] = $d->format("Y-m-d H:i:s.u");
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
<h1>How are you feeling today?</h1>
<br>
<form action="3.php" method="post">
    <p>
        <strong>Happy?</strong>
        <br>
        Not at all
        <span class="radiogroup">
            <input type="radio" name="radioHappy" id="radioHappy1" value="1" required/>
            <label for="radioHappy1">1</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioHappy" id="radioHappy2" value="2" required/>
            <label for="radioHappy2">2</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioHappy" id="radioHappy3" value="3" required/>
            <label for="radioHappy3">3</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioHappy" id="radioHappy4" value="4" required/>
            <label for="radioHappy4">4</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioHappy" id="radioHappy5" value="5" required/>
            <label for="radioHappy5">5</label>
        </span>
        Extremely
    </p>
    <p>
        <strong>Sad?</strong>
        <br>
        Not at all
        <span class="radiogroup">
            <input type="radio" name="radioSad" id="radioSad1" value="1" required/>
            <label for="radioSad1">1</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSad" id="radioSad2" value="2" required/>
            <label for="radioSad2">2</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSad" id="radioSad3" value="3" required/>
            <label for="radioSad3">3</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSad" id="radioSad4" value="4" required/>
            <label for="radioSad4">4</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSad" id="radioSad5" value="5" required/>
            <label for="radioSad5">5</label>
        </span>
        Extremely
    </p>
    <p>
        <strong>Angry?</strong>
        <br>
        Not at all
        <span class="radiogroup">
            <input type="radio" name="radioAngry" id="radioAngry1" value="1" required/>
            <label for="radioAngry1">1</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioAngry" id="radioAngry2" value="2" required/>
            <label for="radioAngry2">2</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioAngry" id="radioAngry3" value="3" required/>
            <label for="radioAngry3">3</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioAngry" id="radioAngry4" value="4" required/>
            <label for="radioAngry4">4</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioAngry" id="radioAngry5" value="5" required/>
            <label for="radioAngry5">5</label>
        </span>
        Extremely
    </p>
        <strong>Scared?</strong>
        <br>
        Not at all
        <span class="radiogroup">
            <input type="radio" name="radioScared" id="radioScared1" value="1" required/>
            <label for="radioScared1">1</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioScared" id="radioScared2" value="2" required/>
            <label for="radioScared2">2</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioScared" id="radioScared3" value="3" required/>
            <label for="radioScared3">3</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioScared" id="radioScared4" value="4" required/>
            <label for="radioScared4">4</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioScared" id="radioScared5" value="5" required/>
            <label for="radioScared5">5</label>
        </span>
        Extremely
    </p>
        <strong>Surprised?</strong>
        <br>
        Not at all
        <span class="radiogroup">
            <input type="radio" name="radioSurprised" id="radioSurprised1" value="1" required/>
            <label for="radioSurprised1">1</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSurprised" id="radioSurprised2" value="2" required/>
            <label for="radioSurprised2">2</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSurprised" id="radioSurprised3" value="3" required/>
            <label for="radioSurprised3">3</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSurprised" id="radioSurprised4" value="4" required/>
            <label for="radioSurprised4">4</label>
        </span>
        <span class="radiogroup">
            <input type="radio" name="radioSurprised" id="radioSurprised5" value="5" required/>
            <label for="radioSurprised5">5</label>
        </span>
        Extremely
    </p>
    <br>  
    <input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>