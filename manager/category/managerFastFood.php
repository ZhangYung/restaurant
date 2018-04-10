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
		<tr>
		<?php
			require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
			require $databaseManagerphpPath;
			getProducts(NULL, 1, NULL);
			// $products = json_decode($productsJson);
			// var_dump($productsJson);
		  ?>
		</tr>
	</table>
</body>
</html>