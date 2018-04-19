<?php
	session_start();
	$_SESSION['eatTableNum'] = isset($_GET["tableNum"]) ? $_GET["tableNum"] : 2;
	$_SESSION['eatSeatNum'] = isset($_GET["seatNum"]) ? $_GET["seatNum"] : 2;
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
	<div id="header" style="height: 60px; width: 100%;">
		<h1 style="text-align:center">水云居</h1>
	</div>

	<div id="menu" style="width:20%;float:left;height:90%;background-color: red">

		<ul>
			<li><a class="selected" href="category/fastFood.php?category=1" target="mainContent" style="text-decoration:none;height: 20%">美味快餐</a></li><br>
			<li><a href="category/fastFood.php?category=2" target="mainContent" style="text-decoration:none;height: 20%">火锅</a></li><br>
			<li><a href="category/fastFood.php?category=3" target="mainContent" style="text-decoration:none;height: 20%">饮料</a></li><br>
			<li><a href="category/fastFood.php?category=4" target="mainContent" style="text-decoration:none;height: 20%">其他</a></li><br>
			<li><a href="category/orderList.php" target="mainContent" style="text-decoration:none;height: 20%">已下订单</a></li><br>
		</ul>
		<!-- <button class="categorySelect" onclick="clickChooseProductFunction(1)">美味快餐</button> <br><br>
		<button class="categorySelect" onclick="clickChooseProductFunction(2)">火锅</button> <br><br>
		<button class="categorySelect" onclick="clickChooseProductFunction(3)">饮料</button> <br><br>
		<button class="categorySelect" onclick="clickChooseProductFunction(4)">其他</button> <br><br> -->
	</div>

	<div id="content" style="width:80%;float:right;height:70%;">
		<iframe src="category/fastFood.php?category=1" name="mainContent" id="mainContent" frameborder=0 width="100%" height="100%" ></iframe>
	</div>

	<div id="content" style="width:80%;float:right;height:20%;">
		<iframe src="category/priceBottom.php" name="priceBottom" id="priceBottom" frameborder=0 width="100%" height="100%" ></iframe>
	</div>

	<div id="footer" style="text-align:center;height:10%;width:100%;float:left;">
		Copyright ©2017-2018水云居
	</div>

</div>

</body>
</html>



