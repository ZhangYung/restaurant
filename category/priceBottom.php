<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../stylesheet/homepage.css">
	<title></title>
</head>

<script type="text/javascript">
	function clickCreateOrder() {
		<?php echo "clickCreateOrder"; ?>
	}
</script>

<body>
	<table border="1" width="100%" height="100%">
		<tr>
			<td width="80%">
				
<?php
echo $_SESSION['purchaseProduct'];
?>
			</td>
			<td width="20%">
			<button class="fullSelect" onclick="clickCreateOrder()">下单</button> 
			</td>
		</tr>
	</table>
</body>
</html>