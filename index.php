<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="stylesheet/homepage.css" />
<title>水云居</title>
</head>
<body>

<?php 
require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
require $databaseManagerphpPath;
echo $databaseManagerphpPath;

getProducts(NULL, NULL, NULL);
getOrders(NULL, NULL, NULL);

// checkAndCreateTable($meimeiShopOrderTable);
// checkAndCreateTable($meimeiShopProductTable);

// addOrEditProduct(NULL, "炒饭", 10.50, "http://www.baidu.com/dsa.png", "美味的黄金炒饭", 9999, 1, 1);
// addOrEditOrder(NULL, 3, intval(time()), 100, "1,2,3", "炒饭,可乐,鸡汤", "10.50,3,15", "2,1,3", 1);

?>

<frameset cols="20%, *" frameBorder="1">
	<frame name="selectContent" src="category/homePageLeft.php" noresize="noresize"></frame>
	<frame name="mainContent" src="category/fastFood.php"></frame>
</frameset>
</body>
</html>



