<?php
	session_start();
	$_SESSION['categoryShow'] = "5";
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
	$tableNum = $_SESSION['eatTableNum'];
	$seatNum = $_SESSION['eatSeatNum'];
	$ordersJson = customGetOrders(NULL, $tableNum, $state);

	$orders = json_decode($ordersJson, TRUE);
	$count = count($orders);

	$priceSum = 0;

	for ($i=0; $i < $count; $i++) { 
		$model = new shopOrder();
		$subOrder = $orders[$i];
		$model->initWithDic($subOrder);

	echo "<tr>";
	echo "<td width=\"70%\">";
	echo "<br>";
	$productNameArray = explode(",", $model->productNames);
	$productPriceArray = explode(",", $model->productPrices);
	$productNumbersArray = explode(",", $model->productNumbers);
	$productCount = count($productNameArray);
	for ($j=0; $j < $productCount; $j++) { 
		echo $productNameArray[$j] . " (" . $productPriceArray[$j] . ") " . "x ¥" . $productNumbersArray[$j] . "<br>";
	}
	echo "<br>";
	echo "</td>";
	echo "<td width=\"30%\">";
	date_default_timezone_set("Asia/Shanghai");
	echo $tableNum . "号" . $seatNum . "座" . "<br>创建时间：" . date("H:i",$model->createData) . "<br>总价¥：" . $model->totalPrice;
	$priceSum = $priceSum + $model->totalPrice;
	echo "</td>";
	echo "</tr>";
	}

	echo "<tr>";
	echo "<td colspan=\"2\">";
	echo $tableNum . " 号" . "总价¥：" . $priceSum;
	echo "</td>";
	echo "</tr>";

	echo "</table>";
	?>
</body>
</html>