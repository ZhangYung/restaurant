<?php
	session_start();
	$_SESSION['eatTableNum'] = isset($_GET["tableNum"]) ? $_GET["tableNum"] : -1;
	$_SESSION['eatSeatNum'] = isset($_GET["seatNum"]) ? $_GET["seatNum"] : -1;
	if ($_GET["action"] == "clearProduct") {
		$_SESSION['purchaseProducts'] = "";
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<link rel="stylesheet" type="text/css" href="stylesheet/homepage.css"/>
<script type="text/javascript" src="stylesheet/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
  {
	$("ul li").click(function(){
		$("a.selected").removeClass("selected");

		$(this)
		.children("a")
        .addClass("selected");
	});
});
</script>
<title>水云居</title>

</head>
<body>
	<?php 
	require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
	require $databaseManagerphpPath;
	checkAndCreateTable($meimeiShopOrderTable);
	?>

<div id="container" style="width:100%;position:absolute;top:0px;bottom:0px;height:100%">
	<!-- <div id="header" style="height: 60px; width: 100%;">
		<h1 style="text-align:center">水云居</h1>
	</div>
 -->
	<div id="menu" style="width:20%;float:left;height:100%;">
		<iframe src="category/homepageLeft.php" name="homepageLeft" id="homepageLeft" frameborder=0 width="100%" height="100%" ></iframe>
	</div>

	<div id="content" style="width:80%;float:right;height:100%;">
		<iframe src="category/priceBottom.php" name="priceBottom" id="priceBottom" frameborder=0 width="100%" height="30%" ></iframe>

		<iframe src="category/fastFood.php?category=1" name="mainContent" id="mainContent" frameborder=0 width="100%" height="70%" scrolling="yes" ></iframe>
	</div>

	<!-- <div id="content" style="width:80%;float:right;height:20%;">
	 </div>-->

	<!-- <div id="footer" style="text-align:center;height:10%;width:100%;float:left;">
		Copyright ©2017-2018水云居
	</div> -->

</div>

</body>
</html>



