<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../stylesheet/managerHomepage.css">
	<title></title>
</head>
<body>
		<?php
			$currentCategory = 1;
		?>
	<br>
	<form action="managerAddProduct.php" method="get">
	<button class="managerAdd" type="submit" name="addType" value="<?php echo $currentCategory; ?>"> 添加 </button> 
	</form>
	<br>

	<table class="tablea">
		<?php
			require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
			require $databaseManagerphpPath;
			$productsJson = getProducts(NULL, $currentCategory, NULL);
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
				echo "状态：" . (($model->state == 1) ? "正常售卖" : "已停售") . "<br>";
				echo "</td>";

				echo "<td>";
				echo "<form action=\"managerAddProduct.php\" method=\"get\">";
				echo "<input type=\"hidden\" name=\"addType\" value=\"" . $currentCategory . "\">";
				echo "<input type=\"hidden\" name=\"changeProductId\" value=\"" . $model->productId . "\">";
				echo "<input class=\"elementButton\" type=\"submit\" name=\"submit\" value=\"编辑\">";
				echo "</td>";

				echo " </tr>";
			}
		  ?>
	</table>
</body>
</html>