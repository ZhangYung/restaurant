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

<script type="text/javascript">
	function clickAdd(productId) {
		var producIds = <% session.getAttribute("purchaseProducts") %>;
		alert(producIds);
		alert(productId);
	}
</script>

<body>
<?php
$currentCategory = $_GET["category"];
if ($currentCategory == NULL) {
	$currentCategory = 1;
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
	echo "<td >";
	if ($model->imagePath != NULL) {
		echo "<img width=\"80px\" height=\"80px\" src=" . $webHttpAddress . $model->imagePath . " "  . "/>";
	}
	echo "</td>";

	echo "<td>";
	echo "<br>";
	echo "" . $model->namproductIde . "<br>";
	echo "" . $model->detail . "<br>";
	echo "剩余：" . $model->number . "<br>";
	echo "</td>";

	echo "<td>";
	// echo "<form action=\"managerAddProduct.php\" method=\"get\" id=\"form" . $i . "\">";
	// echo "<input type=\"hidden\" name=\"addType\" value=\"" . $currentCategory . "\">";
	// echo "<input type=\"hidden\" name=\"changeProductId\" value=\"" . $model->productId . "\">";

	echo "<button class=\"elementButton\" onclick=\"clickAdd(\"sdk\")\">添加</button> ";
	echo "</td>";

	echo " </tr>";
}
echo "</table>";
?>
</body>
</html>