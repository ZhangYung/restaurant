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
			$products = json_decode($productsJson);
			$count = count($products);
			echo $count;
			for ($i=0; $i < $count; $i++) { 
				echo "<tr> <br> model:";
				$model = new shopProduct();
				echo "create";
				var_dump($products[$i]);
				$model->initWithDic($products[$i]);
				var_dump($model);

				echo "end model </tr>";
			}
			
		  ?>
	</table>
</body>
</html>