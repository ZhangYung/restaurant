<?php
	session_start();
	$_SESSION['purchaseProduct']=array();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="stylesheet/homepage.css" />
<title>水云居</title>
</head>

<!-- <frameset rows="80%, *" frameBorder="1"> -->
<frameset cols="20%, *" frameBorder="1">
	<frame name="selectContent" src="category/homePageLeft.php" noresize="noresize"></frame>
	<frame name="mainContent" src="category/fastFood.php?category=1"></frame>
</frameset>
<!-- 
	<frame name="priceContent" src="category/priceBottom.php"></frame>
</frameset> -->
</html>



