<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../stylesheet/managerHomepage.css">
	<title></title>
</head>
<body>
	<br>
	<form action="managerAddProduct.php" method="get">
	<button class="managerAdd" type="submit" name="addType" value="1"> 添加 </button> 
	</form>
	<br>
	<table class="tablea">
		<?php
			function productChangeState($model) {
				($model->state == 1) ? $model = 2 : $model = 1;
			}

			require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
			require $databaseManagerphpPath;
			$productsJson = getProducts(NULL, 1, NULL);
			$products = json_decode($productsJson, TRUE);
			$count = count($products);
			for ($i=0; $i < $count; $i++) { 
				echo "<tr>";

				$model = new shopProduct();
				$subProduct = $products[$i];
				$model->initWithDic($subProduct);
				echo "<td >";
				echo "<img width=\"80px\" height=\"80px\" src=" . $webHttpAddress . $model->imagePath . " "  . "/>";
				echo "</td>";

				echo "<td>";
				echo "" . $model->name . "<br>";
				echo "" . $model->detail . "<br>";
				echo "剩余：" . $model->number . "<br>";
				echo "状态：" . ($model->state == 1) ? "正常售卖中" : "已停售" . "";
				echo "</td>";

				echo "<td>";
				echo "<form action=\"managerAddProduct.php\" method=\"get\">";
				echo "<input type=\"hidden\" name=\"addType\" value=\"1\">";
				echo "<input type=\"hidden\" name=\"changeProductId\" value=\"" . $model->productId . "\">";
				echo "<input class=\"elementButton\" type=\"submit\" name=\"submit\" value=\"编辑\">";
				echo "</td>";

				echo " </tr>";
			}
		  ?>
	</table>
</body>
</html>