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

checkAndCreateDatabase($meimeiShopDatabaseName);
checkAndCreateTable($meimeiShopOrderTable);
checkAndCreateTable($meimeiShopProductTable);

?>

<frameset cols="20%, *" frameBorder="1">
	<frame name="selectContent" src="category/homePageLeft.php" noresize="noresize"></frame>
	<frame name="mainContent" src="category/fastFood.php"></frame>
</frameset>
</body>
</html>



