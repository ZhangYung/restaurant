<!DOCTYPE html>
<html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="../stylesheet/managerHomepage.css"> -->
	<link rel="stylesheet" type="text/css" href="../../stylesheet/homepage.css"/>
	<title></title>
</head>
<body>
		<?php
			$currentCategory = $_GET["category"];
			$_SESSION['categoryShow'] = $currentCategory;
		?>
	<br>
	<form action="managerAddProduct.php" method="get">
	<button class="managerAdd" type="submit" name="addType" value="<?php echo $currentCategory; ?>"> 添加 </button> 
	</form>
	<br>

		<?php
			echo "<table width=\"100%\" height=\"100%\">";

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
				echo "<td style=\"width:30%;min-height:140px\" >";
				if ($model->imagePath != NULL) {
					echo "<img style=\"width:140px; height:140px; vertical-align:middle;\" src=" . $webHttpAddress . $model->imagePath . " "  . "/>";
				}
				echo "</td>";

				echo "<td style=\"width:50%;min-height:140px\">";
				echo "<br>";
				echo "" . $model->name . "<br>";
				echo "" . $model->detail . "<br>";
				echo "剩余：" . $model->number . "<br>";
				echo "状态：" . (($model->state == 1) ? "正常售卖" : "已停售") . "<br>";
				echo "</td>";

				echo "<td style=\"width:20%;min-height:140px\">";
				echo "<form action=\"managerAddProduct.php\" method=\"get\" id=\"form" . $i . "\">";
				echo "<input type=\"hidden\" name=\"addType\" value=\"" . $currentCategory . "\">";
				echo "<input type=\"hidden\" name=\"changeProductId\" value=\"" . $model->productId . "\">";
				echo "<input class=\"elementGrayButton\" type=\"submit\" name=\"submit\" value=\"编辑\">";
				echo "</form>";
				echo "</td>";

				echo " </tr>";
			}
			echo "</table>";
		  ?>
</body>
</html>