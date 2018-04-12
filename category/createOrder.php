<?php
	session_start();
	// $_SESSION['purchaseProducts']=array();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../stylesheet/homepage.css">
	<title></title>
</head>

<body>
<?php
echo "<table width=\"100%\" height=\"100%\">";
require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
require $databaseManagerphpPath;
$orderProductIds = $_SESSION['purchaseProducts'];
$productIdArray = explode(",", $orderProductIds);
$productsJson = getProductsByIds($productIdArray);
$products = json_decode($productsJson, TRUE);
$count = count($products);

for ($i=0; $i < $count; $i++) { 
	echo "<tr>";
	$model = new shopProduct();
	$subProduct = $products[$i];
	$model->initWithDic($subProduct);
	echo "<td >";
	if ($model->imagePath != NULL) {
		echo "<img width=\"80px\" height=\"80px\" src=" . $webHttpAddress . $model->imagePath . " "  . "/>";
	}
	echo "</td>";

	echo "<td>";
	echo "<br>";
	echo "" . $model->namproductIde . "<br>";
	echo "" . $model->detail . "<br>";
	echo "数量：" . $model->number . "<br>";
	echo "</td>";

	echo "<td>";
	echo "<form action=\"fastFood.php\" method=\"get\" id=\"form" . $i . "\">";
	echo "<input type=\"hidden\" name=\"category\" value=\"" . $currentCategory . "\">";
	echo "<input type=\"hidden\" name=\"addProductId\" value=\"" . $model->productId . "\">";
	echo "<input class=\"elementButton\" type=\"submit\" name=\"submit\" value=\"添加\">";
	echo "</form>";
	// echo "<button class=\"elementButton\" onclick=\"clickAdd(" . $model->productId .")\">添加</button> ";
	echo "</td>";

	echo " </tr>";
}
echo "</table>";
?>



	<table border="1" width="100%" height="100%">
		<tr>
			<td width="80%">
<?php
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
		</tr>
	</table>
</body>
</html>