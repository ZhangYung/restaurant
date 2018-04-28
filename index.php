<?php
	session_start();
	$_SESSION['eatTableNum'] = isset($_GET["tableNum"]) ? $_GET["tableNum"] : -1;
	$_SESSION['eatSeatNum'] = isset($_GET["seatNum"]) ? $_GET["seatNum"] : -1;
	if ($_GET["action"] == "clearProduct") {
		//提交订单后，清理缓存下的订单
		$_SESSION['purchaseProducts'] = "";
	}
	if ($_SESSION['categoryShow'] == NULL) {
		$_SESSION['categoryShow'] = "1";
	}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<link rel="stylesheet" type="text/css" href="stylesheet/homepage.css"/>
<title>水云居</title>

</head>

<frameset rows="10%, 90%" frameBorder="1">	
		<frame src="category/priceBottom.php" name="priceBottom" id="priceBottom">
<frameset cols="20%, 80%" frameBorder="1">
		<frame <?php echo "src=\"category/homepageLeft.php?selectedCategory=" . $_SESSION['categoryShow'] . "\"";?> name="homepageLeft" id="homepageLeft">
		<frame <?php echo "src=\"category/fastFood.php?category=" . $_SESSION['categoryShow'] . "\"";?> name="mainContent" id="mainContent">
</frameset>
</frameset>

</html>



