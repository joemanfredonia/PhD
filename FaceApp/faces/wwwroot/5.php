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

    $_SESSION['AngryOne'] = $img1;
    $_SESSION['AngryTwo'] = $img2;
    $_SESSION['AngryThree'] = $img3;
    $_SESSION['AngryFour'] = $img4;
    $_SESSION['AngryFive'] = $img5;
    $_SESSION['AngrySix'] = $img6;
    $_SESSION['AngrySeven'] = $img7;
    $_SESSION['AngryEight'] = $img8;

    $t = microtime(true);
    $micro = sprintf("%06d",($t - floor($t)) * 1000000);
    $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );

    if (isset($_POST['Submit'])) { 
    $_SESSION['SadOneTagged'] = $_POST['SadOneTagged'];
    $_SESSION['SadTwoTagged'] = $_POST['SadTwoTagged'];
    $_SESSION['SadThreeTagged'] = $_POST['SadThreeTagged'];
    $_SESSION['SadFourTagged'] = $_POST['SadFourTagged'];
    $_SESSION['SadFiveTagged'] = $_POST['SadFiveTagged'];
    $_SESSION['SadSixTagged'] = $_POST['SadSixTagged'];
    $_SESSION['SadSevenTagged'] = $_POST['SadSevenTagged'];
    $_SESSION['SadEightTagged'] = $_POST['SadEightTagged'];
    $_SESSION['tsSubmitSad'] = $d->format("Y-m-d H:i:s.u");
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
<h1>Which of these faces look 'Angry'?</h1>
<br>
<form action="6.php" method="post">
    <label class="checkbox-label">
        <input type="hidden" name="AngryOneTagged" value="0" />
        <input type="checkbox" name="AngryOneTagged" value="1" />
        <?php echo '<img src="'.$img1.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="AngryTwoTagged" value="0"/>
        <input type="checkbox" name="AngryTwoTagged" value="1"/>
        <?php echo '<img src="'.$img2.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="AngryThreeTagged" value="0" />
        <input type="checkbox" name="AngryThreeTagged" value="1" />
        <?php echo '<img src="'.$img3.'" height=120px width=160px>'?>
    </label>  
    <label class="checkbox-label">
        <input type="hidden" name="AngryFourTagged" value="0">
        <input type="checkbox" name="AngryFourTagged" value="1" />
        <?php echo '<img src="'.$img4.'" height=120px width=160px>'?>
    </label>
    <br>
    <label class="checkbox-label">
        <input type="hidden" name="AngryFiveTagged" value="0" />
        <input type="checkbox" name="AngryFiveTagged" value="1" />
        <?php echo '<img src="'.$img5.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="AngrySixTagged" value="0"/>
        <input type="checkbox" name="AngrySixTagged" value="1" />
        <?php echo '<img src="'.$img6.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="AngrySevenTagged" value="0" />
        <input type="checkbox" name="AngrySevenTagged" value="1" />
        <?php echo '<img src="'.$img7.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="AngryEightTagged" value="0" />
        <input type="checkbox" name="AngryEightTagged" value="1" />
        <?php echo '<img src="'.$img8.'" height=120px width=160px>'?>
    </label>
    <br>
    <br>
    <input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>