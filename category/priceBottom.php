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
echo "已选择 ";
$orderProductIds = $_SESSION['purchaseProducts'];
$productIdArray = explode(",", $orderProductIds);
$productsJson = getProductsByIds($productIdArray);
$products = json_decode($productsJson, TRUE);
$count = count($products);
echo $count . " 个。总价¥：";
$priceSum = 0;
for ($i=0; $i < $count; $i++) { 
	$model = new shopProduct();
	$subProduct = $products[$i];
	$model->initWithDic($subProduct);
	$priceSum = $priceSum + $model->price;
}
echo $priceSum;
?>
			</td>
			<td width="20%">
			<button class="fullSelect" onclick="clickCreateOrder()">下单</button> 
			</td>
		</tr>
	</table>
</body>
</html>