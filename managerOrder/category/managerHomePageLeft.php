<!DOCTYPE html>
<html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="../stylesheet/managerHomepage.css"> -->
<link rel="stylesheet" type="text/css" href="../../stylesheet/homepage.css"/>
<script type="text/javascript" src="../../stylesheet/jquery-3.3.1.min.js"></script>
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
	<li><a  <?php if($currentCategory == 1) { echo " class=\"selected\" ";} ?>  href="managerOrderList.php?state=1" target="mainContent"> 新订单 </a></li><br>
	<li><a  <?php if($currentCategory == 2) { echo " class=\"selected\" ";} ?>  href="managerOrderList.php?state=2" target="mainContent"> 待上菜 </a></li><br>
	<li><a  <?php if($currentCategory == 3) { echo " class=\"selected\" ";} ?>  href="managerOrderList.php?state=3" target="mainContent"> 待付款 </a></li><br>
	<li><a  <?php if($currentCategory == 4) { echo " class=\"selected\" ";} ?>  href="managerOrderList.php?state=4" target="mainContent"> 已付款 </a></li><br>
	</ul>
</body>
</html>