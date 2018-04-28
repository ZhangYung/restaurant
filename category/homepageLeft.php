<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../stylesheet/homepage.css"/>
<script type="text/javascript" src="../stylesheet/jquery-3.3.1.min.js"></script>
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
</head>
<body>
	<?php 
	$currentCategory = $_GET["selectedCategory"]; 
	 ?>
		<ul>
			<li ><a <?php if($currentCategory == "1") { echo " class=\"selected\" ";} ?> href="fastFood.php?category=1" target="mainContent" style="text-decoration:none;">美味快餐</a></li><br>
			<li><a <?php if($currentCategory == "2") { echo " class=\"selected\" ";} ?> href="fastFood.php?category=2" target="mainContent" style="text-decoration:none;">火锅</a></li><br>
			<li><a <?php if($currentCategory == "3") { echo " class=\"selected\" ";} ?> href="fastFood.php?category=3" target="mainContent" style="text-decoration:none;">饮料</a></li><br>
			<li><a <?php if($currentCategory == "4") { echo " class=\"selected\" ";} ?> href="fastFood.php?category=4" target="mainContent" style="text-decoration:none;">其他</a></li><br>
			<li><a <?php if($currentCategory == "5") { echo " class=\"selected\" ";} ?> href="orderList.php" target="mainContent" style="text-decoration:none;">已下订单</a></li><br>
		</ul>
</body>
</html>