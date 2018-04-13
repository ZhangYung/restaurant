<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../stylesheet/managerHomepage.css">
	<title></title>
</head>
<body>
		<?php
			require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
			require $databaseManagerphpPath;

			echo "<table class=\"table\">";
			$currentState = $_GET["state"];
			$changeState = $_GET["changeState"];
			$changeOrderid = $_GET["orderId"];
			if ($changeOrderid != NULL) {
				addOrEditOrder($changeOrderid, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $changeState);
			}

			$ordersJson = getOrders(NULL, NULL, $currentState);
			$orders = json_decode($ordersJson, TRUE);
			$count = count($orders);
			for ($i=0; $i < $count; $i++) { 
				echo "<tr>";
				echo "<td>";
				$model = new shopOrder();
				$subOrder = $orders[$i];
				$model->initWithDic($subOrder);

				$productNameArray = explode(",", $model->productNames);
				$productPriceArray = explode(",", $model->productPrices);
				$productNumbersArray = explode(",", $model->productNumbers);
				$productCount = count($productNameArray);
				for ($j=0; $j < $productCount; $j++) { 
					echo $productNameArray[$j] . " (" . $productPriceArray[$j] . ") " . "x ¥" . $productNumbersArray[$j] . "<br>";
				}
				echo "</td>";

				echo "<td>";
				date_default_timezone_set("Asia/Shanghai");
				echo $model->tableNum . "号" . $model->seatNum . "座" . "<br>创建时间：" . date("H:i",$model->createData) . "<br>总价¥：" . $model->totalPrice;
				echo "</td>";

				echo "<td>";
				if ($currentState == 1) {
					echo "<button class=\"elementButton\" onclick=\"javascript:location.replace('managerOrderList.php?changeState=2" . "&state=" . $currentState. "&orderId=" . $model->orderId . "')\">接受此订单</button>";
				} elseif ($currentState == 2) {
					echo "<button class=\"elementButton\" onclick=\"javascript:location.replace('managerOrderList.php?changeState=3" . "&state=" . $currentState. "&orderId=" . $model->orderId . "')\">上菜完毕</button><br><br>";

					echo "<button class=\"elementGrayButton\" onclick=\"javascript:location.replace('managerOrderList.php?changeState=4" . "&state=" . $currentState. "&orderId=" . $model->orderId . "')\">上菜完毕并已收款</button>";
				} elseif ($currentState == 3) {
					echo "<button class=\"elementButton\" onclick=\"javascript:location.replace('managerOrderList.php?changeState=4" . "&state=" . $currentState. "&orderId=" . $model->orderId . "')\">完成收款</button>";
				}
				echo "</td>";

				echo "</tr>";
			}
			echo "</table>";
		  ?>
</body>
</html>