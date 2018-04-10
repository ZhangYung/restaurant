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
			echo $count;
			for ($i=0; $i < $count; $i++) { 
				echo "<tr>";
				$model = new shopProduct();
				$subProduct = $products[$i];
				$model->initWithDic($subProduct);
				var_dump($model->imagePath);
				// echo "<td>"
				// echo "<img src=" . $model->imagePath . "width=30%"  . "/>";
				// echo "</td>"

				// echo "<td>"
				// echo "<tr>";
				// echo "<p width=80%> " . $model->name . "</p> <br>"
				// echo "</tr>";
				// echo "<tr>";
				// echo "<p width=80%> " . $model->detail . "</p> <br>"
				// echo "</tr>";
				// echo "</td>"

				echo " </tr> <br>";
			}
			
		  ?>
	</table>
</body>
</html>