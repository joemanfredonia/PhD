<?php
    // starting the session
    session_start();

    // connect to the database
    $db = mysqli_connect("127.0.0.1","rogueone","Pehseses1","faces"); 

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

    $_SESSION['ScaredOne'] = $img1;
    $_SESSION['ScaredTwo'] = $img2;
    $_SESSION['ScaredThree'] = $img3;
    $_SESSION['ScaredFour'] = $img4;
    $_SESSION['ScaredFive'] = $img5;
    $_SESSION['ScaredSix'] = $img6;
    $_SESSION['ScaredSeven'] = $img7;
    $_SESSION['ScaredEight'] = $img8;

    if (isset($_POST['Submit'])) { 
    $_SESSION['AngryOneTagged'] = $_POST['AngryOneTagged'];
    $_SESSION['AngryTwoTagged'] = $_POST['AngryTwoTagged'];
    $_SESSION['AngryThreeTagged'] = $_POST['AngryThreeTagged'];
    $_SESSION['AngryFourTagged'] = $_POST['AngryFourTagged'];
    $_SESSION['AngryFiveTagged'] = $_POST['AngryFiveTagged'];
    $_SESSION['AngrySixTagged'] = $_POST['AngrySixTagged'];
    $_SESSION['AngrySevenTagged'] = $_POST['AngrySevenTagged'];
    $_SESSION['AngryEightTagged'] = $_POST['AngryEightTagged'];
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
	<h1>Which of these faces look 'Scared'?</h1>
<form action="7.php" method="post">
    <label class="checkbox-label">
        <input type="hidden" name="ScaredOneTagged" value="0" />
        <input type="checkbox" name="ScaredOneTagged" value="1" />
        <?php echo '<img src="'.$img1.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="ScaredTwoTagged" value="0"/>
        <input type="checkbox" name="ScaredTwoTagged" value="1"/>
        <?php echo '<img src="'.$img2.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="ScaredThreeTagged" value="0" />
        <input type="checkbox" name="ScaredThreeTagged" value="1" />
        <?php echo '<img src="'.$img3.'" height=120px width=160px>'?>
    </label>  
    <label class="checkbox-label">
        <input type="hidden" name="ScaredFourTagged" value="0" />
        <input type="checkbox" name="ScaredFourTagged" value="1" />
        <?php echo '<img src="'.$img4.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="ScaredFiveTagged" value="0" />
        <input type="checkbox" name="ScaredFiveTagged" value="1" />
        <?php echo '<img src="'.$img5.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="ScaredSixTagged" value="0" />
        <input type="checkbox" name="ScaredSixTagged" value="1" />
        <?php echo '<img src="'.$img6.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="ScaredSevenTagged" value="0" />
        <input type="checkbox" name="ScaredSevenTagged" value="1" />
        <?php echo '<img src="'.$img7.'" height=120px width=160px>'?>
    </label>
    <label class="checkbox-label">
        <input type="hidden" name="ScaredEightTagged" value="0" />
        <input type="checkbox" name="ScaredEightTagged" value="1" />
        <?php echo '<img src="'.$img8.'" height=120px width=160px>'?>
    </label>
    <input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>