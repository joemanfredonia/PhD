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

    $_SESSION['HappyOne'] = $img1;
    $_SESSION['HappyTwo'] = $img2;
    $_SESSION['HappyThree'] = $img3;
    $_SESSION['HappyFour'] = $img4;
    $_SESSION['HappyFive'] = $img5;
    $_SESSION['HappySix'] = $img6;
    $_SESSION['HappySeven'] = $img7;
    $_SESSION['HappyEight'] = $img8;

    $t = microtime(true);
    $micro = sprintf("%06d",($t - floor($t)) * 1000000);
    $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );

    if (isset($_POST['Submit'])) { 
    $_SESSION['FeelHappy'] = $_POST['radioHappy'];
    $_SESSION['FeelSad'] = $_POST['radioSad'];
    $_SESSION['FeelAngry'] = $_POST['radioAngry'];
    $_SESSION['FeelScared'] = $_POST['radioScared'];
    $_SESSION['FeelSurprised'] = $_POST['radioSurprised'];
    $_SESSION['tsSubmitMoodBefore'] = $d->format("Y-m-d H:i:s.u");
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
<h1>Which of these faces look 'Happy'?</h1>
<br>
<form action="4.php" method="post">
    <label class="checkbox-label">
        <input type="hidden" name="HappyOneTagged" value="0" />
        <input type="checkbox" name="HappyOneTagged" value="1" />
        <?php echo '<img src="'.$img1.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="HappyTwoTagged" value="0"/>
        <input type="checkbox" name="HappyTwoTagged" value="1"/>
        <?php echo '<img src="'.$img2.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="HappyThreeTagged" value="0" />
        <input type="checkbox" name="HappyThreeTagged" value="1" />
        <?php echo '<img src="'.$img3.'" height=120px width=160px>'?>
    </label>  
    <label class="checkbox-label">
        <input type="hidden" name="HappyFourTagged" value="0" />
        <input type="checkbox" name="HappyFourTagged" value="1" />
        <?php echo '<img src="'.$img4.'" height=120px width=160px>'?>
    </label>
    <br>
    <label class="checkbox-label">
        <input type="hidden" name="HappyFiveTagged" value="0" />
        <input type="checkbox" name="HappyFiveTagged" value="1" />
        <?php echo '<img src="'.$img5.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="HappySixTagged" value="0" />
        <input type="checkbox" name="HappySixTagged" value="1" />
        <?php echo '<img src="'.$img6.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="HappySevenTagged" value="0" />
        <input type="checkbox" name="HappySevenTagged" value="1" />
        <?php echo '<img src="'.$img7.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="HappyEightTagged" value="0" />
        <input type="checkbox" name="HappyEightTagged" value="1" />
        <?php echo '<img src="'.$img8.'" height=120px width=160px>'?>
    </label>
    <br>
    <br>
    <input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>