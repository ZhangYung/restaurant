<?php
	session_start();
	// $_SESSION['purchaseProducts']=array();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../stylesheet/homepage.css">
	<title>水云居</title>
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

//显示页面
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
echo "</table>";

	echo "<br>";
	// echo "<form method=\"post\" id=\"form1\">";
	// echo "<input type=\"hidden\" name=\"createOrder\" value=\"" . "createOrder" . "\">";
	echo "<button class=\"elementButton\" onclick=\"javascript:location.replace('createOrder.php?createOrder=createOrder')\">下单</button>";
	// echo "</form>";
	echo "<br>";
	echo "<br>";

	echo "<button class=\"elementGrayButton\" onclick=\"javascript:location.replace('../index.php?seatNum=" . $_SESSION['eatSeatNum'] . "&tableNum=" . $_SESSION['eatTableNum'] . "');\">返回再选选</button> <br><br>";

	echo "<button class=\"elementGrayButton\" onclick=\"javascript:location.replace('../index.php?action=clearProduct&seatNum=" . $_SESSION['eatSeatNum'] . "&tableNum=" . $_SESSION['eatTableNum'] . "');\">全部清空</button> <br><br>";
	// echo "<input class=\"elementGrayButton\" name=\"submit\" onclick=\"javascript:history.back(1);\" value=\"返回再选选\">";
	echo "</tr><br>";


//判断是否创建订单

if ($_GET["createOrder"] != NULL) {
	$priceSum = 0;
	$sqlProductIdArray = array();
	$sqlProductNameArray = array();
	$sqlProductPriceArray = array();
	$sqlProductNumberArray = array();

	for ($i=0; $i < $count; $i++) { 
		$model = new shopProduct();
		$subProduct = $products[$i];
		$model->initWithDic($subProduct);
		$priceSum = $priceSum + ($model->price) * $productIdNumDic[$model->productId];
		$sqlProductIdArray[$i] = $model->productId;
		$sqlProductNameArray[$i] = $model->name;
		$sqlProductPriceArray[$i] = $model->price;
		$sqlProductNumberArray[$i] = $productIdNumDic[$model->productId];
	}
	date_default_timezone_set("Asia/Shanghai");
	$success = addOrEditOrder(NULL, $_SESSION['eatTableNum'], $_SESSION['eatSeatNum'], intval(time()), $priceSum, implode(",", $sqlProductIdArray), implode(",", $sqlProductNameArray), implode(",", $sqlProductPriceArray), implode(",", $sqlProductNumberArray), 1);
	if ($success) {
		$_SESSION['purchaseProducts'] = NULL;
		echo "<script language=\"javascript\" > alert(\"下单成功\"); location.replace('../index.php?seatNum=" . $_SESSION['eatSeatNum'] . "&tableNum=" . $_SESSION['eatTableNum'] . "')</script>";
	} else {
		echo "<script language=\"javascript\" >alert(\"下单失败，请联系店主手动下单\"); location.replace('../index.php');</script>";
	}
}

?>
</body>
</html>