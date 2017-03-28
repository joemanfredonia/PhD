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

    $_SESSION['SadOne'] = $img1;
    $_SESSION['SadTwo'] = $img2;
    $_SESSION['SadThree'] = $img3;
    $_SESSION['SadFour'] = $img4;
    $_SESSION['SadFive'] = $img5;
    $_SESSION['SadSix'] = $img6;
    $_SESSION['SadSeven'] = $img7;
    $_SESSION['SadEight'] = $img8;

    $t = microtime(true);
    $micro = sprintf("%06d",($t - floor($t)) * 1000000);
    $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );

    if (isset($_POST['Submit'])) { 
    $_SESSION['HappyOneTagged'] = $_POST['HappyOneTagged'];
    $_SESSION['HappyTwoTagged'] = $_POST['HappyTwoTagged'];
    $_SESSION['HappyThreeTagged'] = $_POST['HappyThreeTagged'];
    $_SESSION['HappyFourTagged'] = $_POST['HappyFourTagged'];
    $_SESSION['HappyFiveTagged'] = $_POST['HappyFiveTagged'];
    $_SESSION['HappySixTagged'] = $_POST['HappySixTagged'];
    $_SESSION['HappySevenTagged'] = $_POST['HappySevenTagged'];
    $_SESSION['HappyEightTagged'] = $_POST['HappyEightTagged'];
    $_SESSION['tsSubmitHappy'] = $d->format("Y-m-d H:i:s.u");
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
<h1>Which of these faces look 'Sad'?</h1>
<br>
<form action="5.php" method="post">
    <label class="checkbox-label">
        <input type="hidden" name="SadOneTagged" value="0" />
        <input type="checkbox" name="SadOneTagged" value="1" />
        <?php echo '<img src="'.$img1.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="SadTwoTagged" value="0" />
        <input type="checkbox" name="SadTwoTagged" value="1"/>
        <?php echo '<img src="'.$img2.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="SadThreeTagged" value="0" />
        <input type="checkbox" name="SadThreeTagged" value="1" />
        <?php echo '<img src="'.$img3.'" height=120px width=160px>'?>
    </label>  
    <label class="checkbox-label">
        <input type="hidden" name="SadFourTagged" value="0" />
        <input type="checkbox" name="SadFourTagged" value="1" />
        <?php echo '<img src="'.$img4.'" height=120px width=160px>'?>
    </label>
    <br>
    <label class="checkbox-label">
        <input type="hidden" name="SadFiveTagged" value="0" />
        <input type="checkbox" name="SadFiveTagged" value="1" />
        <?php echo '<img src="'.$img5.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="SadSixTagged" value="0" />
        <input type="checkbox" name="SadSixTagged" value="1" />
        <?php echo '<img src="'.$img6.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="SadSevenTagged" value="0" />
        <input type="checkbox" name="SadSevenTagged" value="1" />
        <?php echo '<img src="'.$img7.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="SadEightTagged" value="0" />
        <input type="checkbox" name="SadEightTagged" value="1" />
        <?php echo '<img src="'.$img8.'" height=120px width=160px>'?>
    </label>
    <br>
    <br>
    <input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>