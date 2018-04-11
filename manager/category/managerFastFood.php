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
	<table class="table">
		<?php
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
				echo "<br>";
				echo "<p> " . $model->name . "</p> <br>";
				echo "<p> " . $model->detail . "</p> <br>";
				echo "<p> 剩余：" . $model->number . "</p> <br>";
				echo "<p> 状态：" . ($model->state == 1) ? "正常售卖中" : "已停售" . "</p> <br>";
				echo "</td>";

				echo "<td>";
				echo "<form action=\"managerAddProduct.php\" method=\"get\">";
				echo "<button class=\"elementButton\" type=\"submit\" name=\"addType\" value=\"1\"> 编辑 </button> ";
				echo "</form>";
				echo "</td>";

				echo " </tr>";
			}
		  ?>
	</table>
</body>
</html>