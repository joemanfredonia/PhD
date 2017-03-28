<?php
    // starting the session
    session_start();

<<<<<<< HEAD
    // analytics tracking
    include_once("analyticstracking.php");

    // connect to the database
    $db = mysqli_connect("db0.stevens.edu","w3_visdec","J9r1CbDR","w3_visdec"); 
=======
    // connect to the database
    $db = mysqli_connect("127.0.0.1","rogueone","Pehseses1","faces"); 
>>>>>>> origin/master

    if (mysqli_connect_errno()) {
    echo printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
<<<<<<< HEAD
    $sql = "SELECT Path FROM ck_tag_data ORDER BY RAND() LIMIT 8";
    $result = mysqli_query($db, $sql);

    $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
    $row2 = mysqli_fetch_array($result, MYSQLI_NUM);
    $row3 = mysqli_fetch_array($result, MYSQLI_NUM);
    $row4 = mysqli_fetch_array($result, MYSQLI_NUM);
    $row5 = mysqli_fetch_array($result, MYSQLI_NUM);
    $row6 = mysqli_fetch_array($result, MYSQLI_NUM);
    $row7 = mysqli_fetch_array($result, MYSQLI_NUM);
    $row8 = mysqli_fetch_array($result, MYSQLI_NUM);

    $img1 = substr($row1[0],1);
    $img2 = substr($row2[0],1);
    $img3 = substr($row3[0],1);
    $img4 = substr($row4[0],1);
    $img5 = substr($row5[0],1);
    $img6 = substr($row6[0],1);
    $img7 = substr($row7[0],1);
    $img8 = substr($row8[0],1);

    $_SESSION['NotHappyOne'] = $img1;
    $_SESSION['NotHappyTwo'] = $img2;
    $_SESSION['NotHappyThree'] = $img3;
    $_SESSION['NotHappyFour'] = $img4;
    $_SESSION['NotHappyFive'] = $img5;
    $_SESSION['NotHappySix'] = $img6;
    $_SESSION['NotHappySeven'] = $img7;
    $_SESSION['NotHappyEight'] = $img8;

    $t = microtime(true);
    $micro = sprintf("%06d",($t - floor($t)) * 1000000);
    $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );
=======
>>>>>>> origin/master

    if (isset($_POST['Submit'])) { 
    $_SESSION['SurprisedOneTagged'] = $_POST['SurprisedOneTagged'];
    $_SESSION['SurprisedTwoTagged'] = $_POST['SurprisedTwoTagged'];
    $_SESSION['SurprisedThreeTagged'] = $_POST['SurprisedThreeTagged'];
    $_SESSION['SurprisedFourTagged'] = $_POST['SurprisedFourTagged'];
    $_SESSION['SurprisedFiveTagged'] = $_POST['SurprisedFiveTagged'];
    $_SESSION['SurprisedSixTagged'] = $_POST['SurprisedSixTagged'];
    $_SESSION['SurprisedSevenTagged'] = $_POST['SurprisedSevenTagged'];
    $_SESSION['SurprisedEightTagged'] = $_POST['SurprisedEightTagged'];
<<<<<<< HEAD
    $_SESSION['tsSubmitSurprised'] = $d->format("Y-m-d H:i:s.u");
=======
>>>>>>> origin/master
    } 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>FACES</title>
<link rel="stylesheet" href="style.css">
</head>
<<<<<<< HEAD
<br>
<body>
<h1>Which of these faces do NOT look 'Happy'?</h1>
<br>
<form action="9.php" method="post">
    <label class="checkbox-label">
        <input type="hidden" name="NotHappyOneTagged" value="0" />
        <input type="checkbox" name="NotHappyOneTagged" value="1" />
        <?php echo '<img src="'.$img1.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="NotHappyTwoTagged" value="0"/>
        <input type="checkbox" name="NotHappyTwoTagged" value="1"/>
        <?php echo '<img src="'.$img2.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="NotHappyThreeTagged" value="0" />
        <input type="checkbox" name="NotHappyThreeTagged" value="1" />
        <?php echo '<img src="'.$img3.'" height=120px width=160px>'?>
    </label>  
    <label class="checkbox-label">
        <input type="hidden" name="NotHappyFourTagged" value="0" />
        <input type="checkbox" name="NotHappyFourTagged" value="1" />
        <?php echo '<img src="'.$img4.'" height=120px width=160px>'?>
    </label>
    <br>
    <label class="checkbox-label">
        <input type="hidden" name="NotHappyFiveTagged" value="0" />
        <input type="checkbox" name="NotHappyFiveTagged" value="1" />
        <?php echo '<img src="'.$img5.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="NotHappySixTagged" value="0" />
        <input type="checkbox" name="NotHappySixTagged" value="1" />
        <?php echo '<img src="'.$img6.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="NotHappySevenTagged" value="0" />
        <input type="checkbox" name="NotHappySevenTagged" value="1" />
        <?php echo '<img src="'.$img7.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="NotHappyEightTagged" value="0" />
        <input type="checkbox" name="NotHappyEightTagged" value="1" />
        <?php echo '<img src="'.$img8.'" height=120px width=160px>'?>
    </label>
    <br>
    <br>
=======
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
>>>>>>> origin/master
    <input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>