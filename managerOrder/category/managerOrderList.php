<!DOCTYPE html>
<html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="../stylesheet/managerHomepage.css"> -->
	
	<link rel="stylesheet" type="text/css" href="../../stylesheet/homepage.css"/>
	<title></title>
</head>
<body>
		<?php
			require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
			require $databaseManagerphpPath;

			echo "<table width=\"100%\" height=\"100%\">";
			$currentState = $_GET["state"];
			$changeState = $_GET["changeState"];
			$changeOrderid = $_GET["orderId"];

			$_SESSION['stateShow'] = $currentState;

			if ($changeOrderid != NULL) {
				addOrEditOrder($changeOrderid, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $changeState);
			}

			$ordersJson;
			if ($currentState == 1 || $currentState == 2 $currentState == 3) {
				$ordersJson = getOrdersASC(NULL, NULL, $currentState);
			} else {
				$ordersJson = getOrders(NULL, NULL, $currentState);
			}
			$orders = json_decode($ordersJson, TRUE);
			$count = count($orders);
			for ($i=0; $i < $count; $i++) { 
				echo "<tr>";
				echo "<td style=\"width:20%;min-height:140px\">";
				echo "<br>";
				if ($currentState == 1) {
					echo "<button class=\"elementGrayBigButton\" onclick=\"javascript:location.replace('managerOrderList.php?changeState=5" . "&state=" . $currentState. "&orderId=" . $model->orderId . "')\">拒绝此订单</button>";
				} elseif ($currentState == 2) {
					echo "<button class=\"elementGrayBigButton\" onclick=\"javascript:location.replace('managerOrderList.php?changeState=4" . "&state=" . $currentState. "&orderId=" . $model->orderId . "')\">上菜完已收款</button>";
				} elseif ($currentState == 3) {
				}

				echo "</br>";
				echo "</td>";

				echo "<td style=\"width:25%;min-height:140px\">";
				echo "<br>";
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
				echo "<br>";
				echo "</td>";

				echo "<td style=\"width:25%;min-height:140px\">";
				echo "<br>";
				date_default_timezone_set("Asia/Shanghai");
				echo $model->tableNum . "号" . $model->seatNum . "座" . "<br>创建时间：" . date("Y/m/d H:i",$model->createData) . "<br>总价¥：" . $model->totalPrice;
				echo "<br>";
				echo "</td>";

				echo "<td style=\"width:30%;min-height:140px\">";
				echo "<br>";
				if ($currentState == 1) {
					echo "<button class=\"elementOperaButton\" onclick=\"javascript:location.replace('managerOrderList.php?changeState=2" . "&state=" . $currentState. "&orderId=" . $model->orderId . "')\">接受此订单</button>";
				} elseif ($currentState == 2) {
					echo "<button class=\"elementOperaButton\" onclick=\"javascript:location.replace('managerOrderList.php?changeState=3" . "&state=" . $currentState. "&orderId=" . $model->orderId . "')\">上菜完毕</button><br><br>";
				} elseif ($currentState == 3) {
					echo "<button class=\"elementOperaButton\" onclick=\"javascript:location.replace('managerOrderList.php?changeState=4" . "&state=" . $currentState. "&orderId=" . $model->orderId . "')\">已收款</button>";
				} elseif ($currentState == 4) {
					echo "<button class=\"elementOperaButton\" onclick=\"javascript:location.replace('managerOrderList.php?changeState=10" . "&state=" . $currentState. "&orderId=" . $model->orderId . "')\">删除</button>";
				} elseif ($currentState == 5) {
					echo "<button class=\"elementOperaButton\" onclick=\"javascript:location.replace('managerOrderList.php?changeState=2" . "&state=" . $currentState. "&orderId=" . $model->orderId . "')\">恢复此订单</button>";
				}
				echo "<br>";
				echo "</td>";

				echo "</tr>";
			}
			echo "</table>";
		  ?>
</body>
</html>