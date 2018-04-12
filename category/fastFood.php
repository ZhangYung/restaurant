<?php
$currentCategory = $_GET["category"];
if ($currentCategory == NULL) {
	$currentCategory = 1;
}

echo "<table class=\"table\">";
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
	echo "<td >";
	if ($model->imagePath != NULL) {
		echo "<img width=\"80px\" height=\"80px\" src=" . $webHttpAddress . $model->imagePath . " "  . "/>";
	}
	echo "</td>";

	echo "<td>";
	echo "<br>";
	echo "" . $model->name . "<br>";
	echo "" . $model->detail . "<br>";
	echo "剩余：" . $model->number . "<br>";
	echo "</td>";

	echo "<td>";
	// echo "<form action=\"managerAddProduct.php\" method=\"get\" id=\"form" . $i . "\">";
	// echo "<input type=\"hidden\" name=\"addType\" value=\"" . $currentCategory . "\">";
	// echo "<input type=\"hidden\" name=\"changeProductId\" value=\"" . $model->productId . "\">";
	echo "<input class=\"elementButton\" type=\"button\" on_click=\"clickAdd()\" value=\"添加\">";
	// echo "</form>";
	echo "</td>";

	echo " </tr>";
}
echo "</table>";
?>