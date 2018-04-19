<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../stylesheet/homepage.css">
	<title></title>
</head>

<body>
	<table border="1" width="100%" height="100%">
		<tr height="100%">
			<td width="80%">
				
<?php
require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
require $databaseManagerphpPath;
echo "<p>";
echo "已选择数量： ";
$orderProductIds = $_SESSION['purchaseProducts'];
if (strlen($orderProductIds) > 0) {
	$productIdArray = explode(",", $orderProductIds);
	$productIdNumDic = array();
	$idCount = count($productIdArray);
} else {
	$idCount = 0;
}

echo $idCount . " 。总价¥：";

for ($i=0; $i < $idCount; $i++) { 
	$productId = $productIdArray[$i];
	if ($productIdNumDic[$productId] == NULL) {
		$productIdNumDic[$productId] = 1;
	} else {
		$productIdNumDic[$productId] = $productIdNumDic[$productId] + 1;
	}
}

$productsJson = getProductsByIds($productIdArray);
$products = json_decode($productsJson, TRUE);
$count = count($products);
$priceSum = 0;
for ($i=0; $i < $count; $i++) { 
	$model = new shopProduct();
	$subProduct = $products[$i];
	$model->initWithDic($subProduct);
	$priceSum = $priceSum + ($model->price) * $productIdNumDic[$model->productId];
}
echo $priceSum;
echo "</p>";
?>
			</td>
			<td width="20%">
			<button class="fullSelect" onclick="javascript:parent.window.location.replace('createOrder.php');">订单详情</button> 
			</td>
		</tr>
	</table>
</body>
</html>