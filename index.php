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
	<link rel="stylesheet" type="text/css" href="">


<div id="container" style="width: 100%">
	<div id="header" style="background-color:#FFA500;">
		<h1 style="text-align:center">水云居</h1>
	</div>

	<div id="menu">
		<button onclick="clickChooseProductFunction(1)">美味快餐</button>
		<button onclick="clickChooseProductFunction(2)">火锅</button>
		<button onclick="clickChooseProductFunction(3)">饮料</button>
		<button onclick="clickChooseProductFunction(4)">其他</button>
		
	</div>

</div>
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



