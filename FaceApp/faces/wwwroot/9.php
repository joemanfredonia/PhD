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
<<<<<<< HEAD
}
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

    $_SESSION['NotSadOne'] = $img1;
    $_SESSION['NotSadTwo'] = $img2;
    $_SESSION['NotSadThree'] = $img3;
    $_SESSION['NotSadFour'] = $img4;
    $_SESSION['NotSadFive'] = $img5;
    $_SESSION['NotSadSix'] = $img6;
    $_SESSION['NotSadSeven'] = $img7;
    $_SESSION['NotSadEight'] = $img8;

    $t = microtime(true);
    $micro = sprintf("%06d",($t - floor($t)) * 1000000);
    $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );

    if (isset($_POST['Submit'])) { 
    $_SESSION['NotHappyOneTagged'] = $_POST['NotHappyOneTagged'];
    $_SESSION['NotHappyTwoTagged'] = $_POST['NotHappyTwoTagged'];
    $_SESSION['NotHappyThreeTagged'] = $_POST['NotHappyThreeTagged'];
    $_SESSION['NotHappyFourTagged'] = $_POST['NotHappyFourTagged'];
    $_SESSION['NotHappyFiveTagged'] = $_POST['NotHappyFiveTagged'];
    $_SESSION['NotHappySixTagged'] = $_POST['NotHappySixTagged'];
    $_SESSION['NotHappySevenTagged'] = $_POST['NotHappySevenTagged'];
    $_SESSION['NotHappyEightTagged'] = $_POST['NotHappyEightTagged'];
    $_SESSION['tsSubmitNotHappy'] = $d->format("Y-m-d H:i:s.u");
    } 
=======
    }

    if (isset($_POST['Submit'])) { 
    $_SESSION['FeelHappyAfter'] = $_POST['radioHappyAfter'];
    $_SESSION['FeelSadAfter'] = $_POST['radioSadAfter'];
    $_SESSION['FeelAngryAfter'] = $_POST['radioAngryAfter'];
    $_SESSION['FeelScaredAfter'] = $_POST['radioScaredAfter'];
    $_SESSION['FeelSurprisedAfter'] = $_POST['radioSurprisedAfter'];
    } 

    $sql="INSERT INTO responses (Age,
        Gender,
        FeelHappy,
        FeelSad,
        FeelAngry,
        FeelAfraid,
        FeelSurprised,
        HappyOne,
        HappyOneTagged,
        HappyTwo,
        HappyTwoTagged,
        HappyThree,
        HappyThreeTagged,
        HappyFour,
        HappyFourTagged,
        HappyFive,
        HappyFiveTagged,
        HappySix,
        HappySixTagged,
        HappySeven,
        HappySevenTagged,
        HappyEight,
        HappyEightTagged,
        SadOne,
        SadOneTagged,
        SadTwo,
        SadTwoTagged,
        SadThree,
        SadThreeTagged,
        SadFour,
        SadFourTagged,
        SadFive,
        SadFiveTagged,
        SadSix,
        SadSixTagged,
        SadSeven,
        SadSevenTagged,
        SadEight,
        SadEightTagged,
        AngryOne,
        AngryOneTagged,
        AngryTwo,
        AngryTwoTagged,
        AngryThree,
        AngryThreeTagged,
        AngryFour,
        AngryFourTagged,
        AngryFive,
        AngryFiveTagged,
        AngrySix,
        AngrySixTagged,
        AngrySeven,
        AngrySevenTagged,
        AngryEight,
        AngryEightTagged,
        AfraidOne,
        AfraidOneTagged,
        AfraidTwo,
        AfraidTwoTagged,
        AfraidThree,
        AfraidThreeTagged,
        AfraidFour,
        AfraidFourTagged,
        AfraidFive,
        AfraidFiveTagged,
        AfraidSix,
        AfraidSixTagged,
        AfraidSeven,
        AfraidSevenTagged,
        AfraidEight,
        AfraidEightTagged,
        SurprisedOne,
        SurprisedOneTagged,
        SurprisedTwo,
        SurprisedTwoTagged,
        SurprisedThree,
        SurprisedThreeTagged,
        SurprisedFour,
        SurprisedFourTagged,
        SurprisedFive,
        SurprisedFiveTagged,
        SurprisedSix,
        SurprisedSixTagged,
        SurprisedSeven,
        SurprisedSevenTagged,
        SurprisedEight,
        SurprisedEightTagged,
        FeelHappyAfter,
        FeelSadAfter,
        FeelAngryAfter,
        FeelAfraidAfter,
        FeelSurprisedAfter) VALUES ('".$_SESSION['Age']."',
        '".$_SESSION['Gender']."',
        '".$_SESSION['FeelHappy']."',
        '".$_SESSION['FeelSad']."',
        '".$_SESSION['FeelAngry']."',
        '".$_SESSION['FeelScared']."',
        '".$_SESSION['FeelSurprised']."',
        '".$_SESSION['HappyOne']."',
        '".$_SESSION['HappyOneTagged']."',
        '".$_SESSION['HappyTwo']."',
        '".$_SESSION['HappyTwoTagged']."',
        '".$_SESSION['HappyThree']."',
        '".$_SESSION['HappyThreeTagged']."',
        '".$_SESSION['HappyFour']."',
        '".$_SESSION['HappyFourTagged']."',
        '".$_SESSION['HappyFive']."',
        '".$_SESSION['HappyFiveTagged']."',
        '".$_SESSION['HappySix']."',
        '".$_SESSION['HappySixTagged']."',
        '".$_SESSION['HappySeven']."',
        '".$_SESSION['HappySevenTagged']."',
        '".$_SESSION['HappyEight']."',
        '".$_SESSION['HappyEightTagged']."',
        '".$_SESSION['SadOne']."',
        '".$_SESSION['SadOneTagged']."',
        '".$_SESSION['SadTwo']."',
        '".$_SESSION['SadTwoTagged']."',
        '".$_SESSION['SadThree']."',
        '".$_SESSION['SadThreeTagged']."',
        '".$_SESSION['SadFour']."',
        '".$_SESSION['SadFourTagged']."',
        '".$_SESSION['SadFive']."',
        '".$_SESSION['SadFiveTagged']."',
        '".$_SESSION['SadSix']."',
        '".$_SESSION['SadSixTagged']."',
        '".$_SESSION['SadSeven']."',
        '".$_SESSION['SadSevenTagged']."',
        '".$_SESSION['SadEight']."',
        '".$_SESSION['SadEightTagged']."',
        '".$_SESSION['AngryOne']."',
        '".$_SESSION['AngryOneTagged']."',
        '".$_SESSION['AngryTwo']."',
        '".$_SESSION['AngryTwoTagged']."',
        '".$_SESSION['AngryThree']."',
        '".$_SESSION['AngryThreeTagged']."',
        '".$_SESSION['AngryFour']."',
        '".$_SESSION['AngryFourTagged']."',
        '".$_SESSION['AngryFive']."',
        '".$_SESSION['AngryFiveTagged']."',
        '".$_SESSION['AngrySix']."',
        '".$_SESSION['AngrySixTagged']."',
        '".$_SESSION['AngrySeven']."',
        '".$_SESSION['AngrySevenTagged']."',
        '".$_SESSION['AngryEight']."',
        '".$_SESSION['AngryEightTagged']."',
        '".$_SESSION['ScaredOne']."',
        '".$_SESSION['ScaredOneTagged']."',
        '".$_SESSION['ScaredTwo']."',
        '".$_SESSION['ScaredTwoTagged']."',
        '".$_SESSION['ScaredThree']."',
        '".$_SESSION['ScaredThreeTagged']."',
        '".$_SESSION['ScaredFour']."',
        '".$_SESSION['ScaredFourTagged']."',
        '".$_SESSION['ScaredFive']."',
        '".$_SESSION['ScaredFiveTagged']."',
        '".$_SESSION['ScaredSix']."',
        '".$_SESSION['ScaredSixTagged']."',
        '".$_SESSION['ScaredSeven']."',
        '".$_SESSION['ScaredSevenTagged']."',
        '".$_SESSION['ScaredEight']."',
        '".$_SESSION['ScaredEightTagged']."',
        '".$_SESSION['SurprisedOne']."',
        '".$_SESSION['SurprisedOneTagged']."',
        '".$_SESSION['SurprisedTwo']."',
        '".$_SESSION['SurprisedTwoTagged']."',
        '".$_SESSION['SurprisedThree']."',
        '".$_SESSION['SurprisedThreeTagged']."',
        '".$_SESSION['SurprisedFour']."',
        '".$_SESSION['SurprisedFourTagged']."',
        '".$_SESSION['SurprisedFive']."',
        '".$_SESSION['SurprisedFiveTagged']."',
        '".$_SESSION['SurprisedSix']."',
        '".$_SESSION['SurprisedSixTagged']."',
        '".$_SESSION['SurprisedSeven']."',
        '".$_SESSION['SurprisedSevenTagged']."',
        '".$_SESSION['SurprisedEight']."',
        '".$_SESSION['SurprisedEightTagged']."',
        '".$_SESSION['FeelHappyAfter']."',
        '".$_SESSION['FeelSadAfter']."',
        '".$_SESSION['FeelAngryAfter']."',
        '".$_SESSION['FeelScaredAfter']."',
        '".$_SESSION['FeelSurprisedAfter']."')";

    if (mysqli_query($db, $sql)) {
        echo "Successfully inserted " . mysqli_affected_rows($db) . " rows";
    } else {
        echo "Error occurred: " . mysqli_error($db);
    }

>>>>>>> origin/master
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>FACES</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<<<<<<< HEAD
<br>
<h1>Which of these faces do NOT look 'Sad'?</h1>
<br>
<form action="10.php" method="post">
    <label class="checkbox-label">
        <input type="hidden" name="NotSadOneTagged" value="0" />
        <input type="checkbox" name="NotSadOneTagged" value="1" />
        <?php echo '<img src="'.$img1.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="NotSadTwoTagged" value="0"/>
        <input type="checkbox" name="NotSadTwoTagged" value="1"/>
        <?php echo '<img src="'.$img2.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="NotSadThreeTagged" value="0" />
        <input type="checkbox" name="NotSadThreeTagged" value="1" />
        <?php echo '<img src="'.$img3.'" height=120px width=160px>'?>
    </label>  
    <label class="checkbox-label">
        <input type="hidden" name="NotSadFourTagged" value="0" />
        <input type="checkbox" name="NotSadFourTagged" value="1" />
        <?php echo '<img src="'.$img4.'" height=120px width=160px>'?>
    </label>
    <br>
    <label class="checkbox-label">
        <input type="hidden" name="NotSadFiveTagged" value="0" />
        <input type="checkbox" name="NotSadFiveTagged" value="1" />
        <?php echo '<img src="'.$img5.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="NotSadSixTagged" value="0" />
        <input type="checkbox" name="NotSadSixTagged" value="1" />
        <?php echo '<img src="'.$img6.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="NotSadSevenTagged" value="0" />
        <input type="checkbox" name="NotSadSevenTagged" value="1" />
        <?php echo '<img src="'.$img7.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="NotSadEightTagged" value="0" />
        <input type="checkbox" name="NotSadEightTagged" value="1" />
        <?php echo '<img src="'.$img8.'" height=120px width=160px>'?>
    </label>
    <br>
    <br>
    <input type="submit" name="Submit" value="Submit">
</form>
=======
    <h1>Thank You!</h1>
>>>>>>> origin/master
</body>
</html>