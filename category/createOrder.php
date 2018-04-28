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

$deleteProductId = $_GET["deleteProductId"];
if ($deleteProductId != NULL) {
	for ($i=0; $i < $idCount; $i++) { 
		$productId = $productIdArray[$i];
		if ($productId == $deleteProductId) {
			array_splice($productIdArray, $i, 1);
			$_SESSION['purchaseProducts'] = implode(",", $productIdArray);
			break;
		}
	}
}

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

	echo "<td width=\"150\">";
	echo "<button class=\"elementGrayBigButton\" onclick=\"javascript:location.replace('createOrder.php?deleteProductId=" . $model->productId . "');\">删除一份</button>";
	echo "</td>";

	echo " </tr>";
}
echo "</table>";

	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "餐品仅供下单，实物以店铺是否有存货为准，如有不便，敬请谅解。";
	// echo "<form method=\"post\" id=\"form1\">";
	// echo "<input type=\"hidden\" name=\"createOrder\" value=\"" . "createOrder" . "\">";
	echo "<button class=\"submitButton\" onclick=\"javascript:location.replace('createOrder.php?createOrder=createOrder')\">下单</button>";
	// echo "</form>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";

	echo "<button class=\"elementGrayBigButton\" onclick=\"javascript:location.replace('../index.php?seatNum=" . $_SESSION['eatSeatNum'] . "&tableNum=" . $_SESSION['eatTableNum'] . "');\">返回再选</button> <br><br> <br><br>";

	echo "<button class=\"elementGrayBigButton\" onclick=\"javascript:location.replace('../index.php?action=clearProduct&seatNum=" . $_SESSION['eatSeatNum'] . "&tableNum=" . $_SESSION['eatTableNum'] . "');\">全部清空</button> <br><br>";
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

function checkProductsNumByIdsOfNum($productIdArray, $productIdNumDic)
{
	$productsJson = getProductsByIds($productIdArray);
	$products = json_decode($productsJson, TRUE);

	$count = count($products);
	for ($i=0; $i < $count; $i++) {
		$model = new shopProduct();
		$subProduct = $products[$i];
		$model->initWithDic($subProduct);

		$useNumber = $productIdNumDic[$model->productId];
		if ($model->number < $useNumber) {
			return FAlSE;
		}
	}

	return TRUE;
}

function desProductsNumByIdsOfNum($productIdArray, $productIdNumDic)
{
	$productsJson = getProductsByIds($productIdArray);
	$products = json_decode($productsJson, TRUE);

	$count = count($products);
	for ($i=0; $i < $count; $i++) {
		$model = new shopProduct();
		$subProduct = $products[$i];
		$model->initWithDic($subProduct);

		$useNumber = $productIdNumDic[$model->productId];
		$model->number = $model->number - $useNumber;
		addOrEditProduct($model->productId, NULL, NULL, NULL, NULL, $model->number, NULL, NULL);
	}
}

	$success = checkProductsNumByIdsOfNum($sqlProductIdArray, $productIdNumDic);
	if ($success) {
		$fp = fopen('../productInfoChange.lock', 'r');
		var_dump($fp);
		flock($fp, LOCK_EX);//加锁

		desProductsNumByIdsOfNum($sqlProductIdArray, $productIdNumDic);
		$success = addOrEditOrder(NULL, $_SESSION['eatTableNum'], $_SESSION['eatSeatNum'], intval(time()), $priceSum, implode(",", $sqlProductIdArray), implode(",", $sqlProductNameArray), implode(",", $sqlProductPriceArray), implode(",", $sqlProductNumberArray), 1);

		flock($fp, LOCK_UN);//解锁

		if ($success) {
			$_SESSION['purchaseProducts'] = NULL;
			echo "<script language=\"javascript\" > alert(\"下单成功\"); location.replace('../index.php?seatNum=" . $_SESSION['eatSeatNum'] . "&tableNum=" . $_SESSION['eatTableNum'] . "')</script>";
		} else {
			echo "<script language=\"javascript\" >alert(\"下单失败，请联系店主手动下单\"); location.replace('../index.php');</script>";
		}
	} else {
			echo "<script language=\"javascript\" >alert(\"下单失败，商品剩余数量不足\"); location.replace('../index.php');</script>";
	}


}

?>
</body>
</html>