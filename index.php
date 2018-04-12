<?php
	session_start();
	$_SESSION['purchaseProduct']=array();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="stylesheet/homepage.css"/>
<title>水云居</title>
</head>

<script type="text/javascript">
	function clickChooseProductFunction(category) {

	}
</script>
<body>

<div id="container" style="width:100%;position:absolute;top:0px;bottom:0px;">
	<div id="header" style="height: 60px; width: 100%;">
		<h1 style="text-align:center">水云居</h1>
	</div>

	<div id="menu" style="width:20%;float:left;height:90%;">
		<ul>
			<li><a href="category/fastFood.php?category=1" target="mainContent" style="text-decoration:none;">美味快餐</a></li>
			<li><a href="category/fastFood.php?category=2" target="mainContent" style="text-decoration:none;">火锅</a></li>
			<li><a href="category/fastFood.php?category=3" target="mainContent" style="text-decoration:none;">饮料</a></li>
			<li><a href="category/fastFood.php?category=4" target="mainContent" style="text-decoration:none;">其他</a></li>
		</ul>
		<!-- <button class="categorySelect" onclick="clickChooseProductFunction(1)">美味快餐</button> <br><br>
		<button class="categorySelect" onclick="clickChooseProductFunction(2)">火锅</button> <br><br>
		<button class="categorySelect" onclick="clickChooseProductFunction(3)">饮料</button> <br><br>
		<button class="categorySelect" onclick="clickChooseProductFunction(4)">其他</button> <br><br> -->
	</div>

	<div id="content" style="width:80%;float:right;height:70%;background:#ff0000;">
		<iframe src="category/fastFood.php?category=1" name="mainContent" frameborder=0 width="100%" ></iframe>
		<!-- <?php 
			// require "category/fastFood.php";
		?> -->
	</div>

	<div id="content" style="width:80%;float:right;height:20%;">
		<?php 
			require "category/priceBottom.php";
		?>
	</div>

	<div id="footer" style="text-align:center;height:10%;width:100%;float:left;">
		Copyright ©2017-2018水云居
	</div>

</div>

</body>
</html>



