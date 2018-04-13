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
	$tableNum = $_SESSION['eatTableNum'];
	$ordersJson = customGetOrders(NULL, $tableNum, $state);

	$orders = json_decode($ordersJson, TRUE);
	$count = count($orders);

	$priceCount = 0;

	for ($i=0; $i < $count; $i++) { 
		$model = new shopOrder();
		$subOrder = $orders[$i];
		$model->initWithDic($subOrder);

	echo "<tr>";
	echo "<td width=80%>";
	$productNameArray = explode(",", $model->productNames);
	$productPriceArray = explode(",", $model->productPrices);
	$productNumbersArray = explode(",", $model->productNumbers);
	$productCount = count($productNameArray);
	for ($j=0; $j < $productCount; $j++) { 
		echo $productNameArray[$j] . " (" . $productPriceArray[$j] . ") " . "x " . $productNumbersArray[$j] . "<br>";
	}
	echo "</td>";
	echo "<td width=20%>";
	echo $tableNum . "号" . "<br>创建时间：" . $model->createData . "<br>总价：" . $model->totalPrice;
	echo "</td>";
	echo "</tr>";



		echo "<td>";
		echo "<br>";
		echo "" . $model->namproductIde . "<br>";
		echo "" . $model->detail . "<br>";
		echo "剩余：" . $model->number . "<br>";
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
		echo "</table>";
	}

	echo "<tr>";
	echo "<td >";
	echo $tableNum . " 号" . "总价：" . "";
	echo "</td>";
	echo "</tr>";
	?>
</body>
</html>