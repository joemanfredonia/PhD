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

    $_SESSION['SurprisedOne'] = $img1;
    $_SESSION['SurprisedTwo'] = $img2;
    $_SESSION['SurprisedThree'] = $img3;
    $_SESSION['SurprisedFour'] = $img4;
    $_SESSION['SurprisedFive'] = $img5;
    $_SESSION['SurprisedSix'] = $img6;
    $_SESSION['SurprisedSeven'] = $img7;
    $_SESSION['SurprisedEight'] = $img8;

<<<<<<< HEAD
    $t = microtime(true);
    $micro = sprintf("%06d",($t - floor($t)) * 1000000);
    $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );

=======
>>>>>>> origin/master
    if (isset($_POST['Submit'])) { 
    $_SESSION['ScaredOneTagged'] = $_POST['ScaredOneTagged'];
    $_SESSION['ScaredTwoTagged'] = $_POST['ScaredTwoTagged'];
    $_SESSION['ScaredThreeTagged'] = $_POST['ScaredThreeTagged'];
    $_SESSION['ScaredFourTagged'] = $_POST['ScaredFourTagged'];
    $_SESSION['ScaredFiveTagged'] = $_POST['ScaredFiveTagged'];
    $_SESSION['ScaredSixTagged'] = $_POST['ScaredSixTagged'];
    $_SESSION['ScaredSevenTagged'] = $_POST['ScaredSevenTagged'];
    $_SESSION['ScaredEightTagged'] = $_POST['ScaredEightTagged'];
<<<<<<< HEAD
    $_SESSION['tsSubmitScared'] = $d->format("Y-m-d H:i:s.u");
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
<h1>Which of these faces look 'Surprised'?</h1>
<br>
=======
<body>
	<h1>Which of these faces look 'Surprised'?</h1>
>>>>>>> origin/master
<form action="8.php" method="post">
    <label class="checkbox-label">
        <input type="hidden" name="SurprisedOneTagged" value="0" />
        <input type="checkbox" name="SurprisedOneTagged" value="1" />
        <?php echo '<img src="'.$img1.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="SurprisedTwoTagged" value="0"/>
        <input type="checkbox" name="SurprisedTwoTagged" value="1"/>
        <?php echo '<img src="'.$img2.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="SurprisedThreeTagged" value="0" />
        <input type="checkbox" name="SurprisedThreeTagged" value="1" />
        <?php echo '<img src="'.$img3.'" height=120px width=160px>'?>
    </label>  
    <label class="checkbox-label">
        <input type="hidden" name="SurprisedFourTagged" value="0" />
        <input type="checkbox" name="SurprisedFourTagged" value="1" />
        <?php echo '<img src="'.$img4.'" height=120px width=160px>'?>
    </label>
<<<<<<< HEAD
    <br>
=======
>>>>>>> origin/master
    <label class="checkbox-label">
        <input type="hidden" name="SurprisedFiveTagged" value="0" />
        <input type="checkbox" name="SurprisedFiveTagged" value="1" />
        <?php echo '<img src="'.$img5.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="SurprisedSixTagged" value="0" />
        <input type="checkbox" name="SurprisedSixTagged" value="1" />
        <?php echo '<img src="'.$img6.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="SurprisedSevenTagged" value="0" />
        <input type="checkbox" name="SurprisedSevenTagged" value="1" />
        <?php echo '<img src="'.$img7.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="SurprisedEightTagged" value="0" />
        <input type="checkbox" name="SurprisedEightTagged" value="1" />
        <?php echo '<img src="'.$img8.'" height=120px width=160px>'?>
    </label>
<<<<<<< HEAD
    <br>
    <br>
=======
>>>>>>> origin/master
    <input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>