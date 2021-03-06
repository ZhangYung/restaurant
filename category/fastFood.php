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
$currentCategory = $_GET["category"];
if ($currentCategory == NULL) {
	$currentCategory = 1;
}
$_SESSION['categoryShow'] = $currentCategory;

$addProductId = $_GET["addProductId"];
if ($addProductId != NULL) {
	$orderProductIds = $_SESSION["purchaseProducts"];
	if (strlen($orderProductIds) > 0) {
		$orderProductIds = $orderProductIds . "," . $addProductId;
	} else {
		$orderProductIds = $addProductId;
	}
	$_SESSION["purchaseProducts"] = $orderProductIds;

	echo "<script language=\"javascript\"> parent.priceBottom.location.reload(); </script>";
}

echo "<table width=\"100%\" height=\"100%\">";
require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
require $databaseManagerphpPath;
$productsJson = getProducts(NULL, $currentCategory, 1);
$products = json_decode($productsJson, TRUE);
$count = count($products);
for ($i=0; $i < $count; $i++) { 
	echo "<tr>";

	$model = new shopProduct();
	$subProduct = $products[$i];
	$model->initWithDic($subProduct);
	echo "<td style=\"width:30%;min-height:140px\">";
	if ($model->imagePath != NULL) {
		echo "<img style=\"width:140px; height:140px; vertical-align:middle;\" src=" . $webHttpAddress . $model->imagePath . " "  . "/>";
	}
	echo "</td>";

	echo "<td style=\"width:50%;min-height:140px\">";
	echo "<br>";
	echo "<p>" . $model->name . "</p>";
	echo "<p>" . $model->detail . "</p>";
	echo "<p>剩余：" . $model->number . "</p>";
	echo "<br>";
	echo "</td>";

	echo "<td style=\"width:20%;min-height:140px\">";
	echo "<form action=\"fastFood.php\" method=\"get\" id=\"form" . $i . "\">";
	echo "<input type=\"hidden\" name=\"category\" value=\"" . $currentCategory . "\">";
	echo "<input type=\"hidden\" name=\"addProductId\" value=\"" . $model->productId . "\">";
	echo "<input class=\"elementButton\" type=\"submit\" name=\"submit\" value=\"+\">";
	echo "</form>";
	echo "</td>";

	echo " </tr>";
}
echo "</table>";
?>
</body>
</html>