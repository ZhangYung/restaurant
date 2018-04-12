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
echo "<table width=\"100%\" height=\"100%\" border=\"0\">";
require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
require $databaseManagerphpPath;
$orderProductIds = $_SESSION['purchaseProducts'];
$productIdArray = explode(",", $orderProductIds);

$productIdNumDic = array();
$idCount = count($productIdArray);
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

for ($i=0; $i < $count; $i++) { 
	echo "<tr>";
	$model = new shopProduct();
	$subProduct = $products[$i];
	$model->initWithDic($subProduct);
	echo "<td>";
	if ($model->imagePath != NULL) {
		echo "<img width=\"80px\" height=\"80px\" src=" . $webHttpAddress . $model->imagePath . " "  . "/>";
	}
	echo "</td>";

	echo "<td>";
	echo "<br>";
	echo "" . $model->name . "<br><br>";
	echo "" . $model->detail . "<br><br>";
	echo "</td>";

	echo "<td>";
	echo "数量：x " . $productIdNumDic[$model->productId] . "<br>";
	echo "</td>";

	echo " </tr>";
}

	echo "<tr>";
	echo "<form action=\"createOrder.php\" method=\"post\" id=\"form1\" >";
	echo "<input type=\"hidden\" name=\"createOrder\" value=\"" . "createOrder" . "\">";
	echo "<input class=\"elementButton\" type=\"submit\" name=\"submit\" value=\"确定下单\">";
	echo "</form>";
	echo "</tr>";

	echo "<tr><br>";
	echo "<button class=\"elementGrayButton\" onclick=\"javascript:history.back(1);\">返回再选选</button> <br><br>";
	// echo "<input class=\"elementGrayButton\" name=\"submit\" onclick=\"javascript:history.back(1);\" value=\"返回再选选\">";
	echo "</tr><br>";

echo "</table>";
?>
</body>
</html>