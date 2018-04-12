<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../stylesheet/homepage.css">
	<title></title>
</head>

<script type="text/javascript">
	function clickCreateOrder() {
		alert("down");
	}
</script>

<body>
	<table border="1" width="100%" height="100%">
		<tr>
			<td width="80%">
				
<?php
echo "商品";
$orderProductIds = $_SESSION['purchaseProducts'];
$productIdArray = explode(",", $orderProductIds);
var_dump($productIdArray);
var_dump(count($productIdArray));
?>
			</td>
			<td width="20%">
			<button class="fullSelect" onclick="clickCreateOrder()">下单</button> 
			</td>
		</tr>
	</table>
</body>
</html>