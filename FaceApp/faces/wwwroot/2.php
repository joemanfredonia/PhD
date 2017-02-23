<?php
    // starting the session
    session_start();

    if (isset($_POST['Submit'])) { 
    $_SESSION['Age'] = $_POST['age'];
    $_SESSION['Gender'] = $_POST['gender'];
    } 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>FACES</title>
</head>
<body>
    <h1>How are you feeling today?</h1>
<form action="3.php" method="post">
    <p>
        <strong>Happy?</strong>
        <br>
        <label class="radio-inline">
            Not Happy at All:
            <input type="radio" name="radioHappy" value="1">1
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioHappy" value="2">2
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioHappy" value="3">3
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioHappy" value="4">4
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioHappy" value="5">5: Extremely Happy
        </label>
    </p>
    <p>
        <strong>Sad?</strong>
        <br>
        <label class="radio-inline">
            Not Sad at All:
            <input type="radio" name="radioSad" value="1">1
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSad" value="2">2
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSad" value="3">3
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSad" value="4">4
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSad" value="5">5: Extremely Sad
        </label>
    </p>
    <p>
        <strong>Angry?</strong>
        <br>
        <label class="radio-inline">
            Not Angry at All:
            <input type="radio" name="radioAngry" value="1">1
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioAngry" value="2">2
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioAngry" value="3">3
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioAngry" value="4">4
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioAngry" value="5">5: Extremely Angry
        </label>
    </p>
    <p>
        <strong>Afraid?</strong>
        <br>
        <label class="radio-inline">
            Not Scared at All:
            <input type="radio" name="radioScared" value="1">1
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioScared" value="2">2
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioScared" value="3">3
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioScared" value="4">4
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioScared" value="5">5: Extremely Scared
        </label>
    </p>
    <p>
        <strong>Surprised?</strong>
        <br>
        <label class="radio-inline">
            Not Surprised at All:
            <input type="radio" name="radioSurprised" value="1">1
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSurprised" value="2">2
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSurprised" value="3">3
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSurprised" value="4">4
        </label>
        <label class="radio-inline">
            <input type="radio" name="radioSurprised" value="5">5: Extremely Surprised
        </label>
    </p>
    <input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>