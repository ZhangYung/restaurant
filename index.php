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

<div id="container" style="width: 100%; position:absolute;top:0px;bottom:0px;">
	<div id="header" style="background-color:#FFA500; height: 8%; width: 100%;">
		<h1 style="text-align:center">水云居</h1>
	</div>

	<div id="menu" style="width: 20%; float: left; height: 87%;">
		<button class="categorySelect" onclick="clickChooseProductFunction(1)">美味快餐</button> <br><br>
		<button class="categorySelect" onclick="clickChooseProductFunction(2)">火锅</button> <br><br>
		<button class="categorySelect" onclick="clickChooseProductFunction(3)">饮料</button> <br><br>
		<button class="categorySelect" onclick="clickChooseProductFunction(4)">其他</button> <br><br>
	</div>

	<div id="content" style="width: 80%; float: right; height: 90%;">
		<?php 
			require "category/fastFood.php";
		?>
	</div>

	<div id="footer" style="text-align: center; height: 5%">
		版权 ©2017-2018美美餐厅水云居
	</div>

</div>

<script type="text/javascript">
	function clickAdd() {

	}
</script>
<!-- 
<frameset rows="85%, 15%">
	<frameset cols="20%, 80%">
		<frame name="selectContent" src="category/homePageLeft.php"/>
		<frame name="mainContent" src="category/fastFood.php?category=1"/>
	</frameset>
	<frame name="priceContent" src="category/priceBottom.php"/>
 </frameset>
-->

</body>
</html>



