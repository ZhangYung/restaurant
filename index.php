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

<frameset rows="70%, 30%" frameBorder="0">	
<frameset cols="20%, 80%" frameBorder="0">
		<frame src="category/homepageLeft.php" name="homepageLeft" id="homepageLeft" frameborder=0 >
		<frame src="category/fastFood.php?category=1" name="mainContent" id="mainContent" frameborder=0 scrolling="yes" >
</frameset>
		<frame src="category/priceBottom.php" name="priceBottom" id="priceBottom" frameborder=0>
</frameset>

</body>
</html>



