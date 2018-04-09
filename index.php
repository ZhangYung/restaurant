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

checkAndCreateTable($meimeiShopOrderTable);
checkAndCreateTable($meimeiShopProductTable);

addOrEditProduct(1, "炒饭", 10.50, "http://baidu.com/dad.png", "很好吃的黄金炒饭", 999, 0, 0);

?>

<frameset cols="20%, *" frameBorder="1">
	<frame name="selectContent" src="category/homePageLeft.php" noresize="noresize"></frame>
	<frame name="mainContent" src="category/fastFood.php"></frame>
</frameset>
</body>
</html>



