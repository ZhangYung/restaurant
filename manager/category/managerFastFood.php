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
	<table>
		<?php
			require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
			require $databaseManagerphpPath;
			$productsJson = getProducts(NULL, 1, NULL);
			$products = json_decode($productsJson, TRUE);
			$count = count($products);
			for ($i=0; $i < $count; $i++) { 
				echo "<tr height=\"80\">";
				$model = new shopProduct();
				$subProduct = $products[$i];
				$model->initWithDic($subProduct);
				echo "<td>";
				echo "<img src=" . $webHttpAddress . $model->imagePath . " "  . "/>";
				echo "<hr class=\"borderLine\" />";
				echo "</td>";

				echo "<td>";
				echo "<p > " . $model->name . "</p> <br>";
				echo "<p > " . $model->detail . "</p> <br>";
				echo "<hr class=\"borderLine\" />";
				echo "</td>";

				echo " </tr> <br>";
			}
			
		  ?>
	</table>
</body>
</html>