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
		<ul>
			<li ><a class="selected" href="fastFood.php?category=1" target="mainContent" style="text-decoration:none;">美味快餐</a></li><br>
			<li><a href="fastFood.php?category=2" target="mainContent" style="text-decoration:none;">火锅</a></li><br>
			<li><a href="fastFood.php?category=3" target="mainContent" style="text-decoration:none;">饮料</a></li><br>
			<li><a href="fastFood.php?category=4" target="mainContent" style="text-decoration:none;">其他</a></li><br>
			<li><a href="orderList.php" target="mainContent" style="text-decoration:none;">已下订单</a></li><br>
		</ul>
</body>
</html>