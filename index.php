<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="stylesheet/homepage.css" />
<title>水云居</title>
</head>
<body>
<?php 
//config.php  数据库登录配置，就不共享出来了。
echo $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php" . "<br>"; 
	require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
	$fileFoldPath = $_SERVER['DOCUMENT_ROOT'] . "/restaurant/uploadProductImage/";
	echo $fileFoldPath . "<br>";
	echo $mysqlServer . "<br>";
	echo $mysqlUsername . "<br>";
	echo $mysqlPassword . "<br>";
//连接mysql  请自行配置数据库$mysqlServer, $mysqlUsername, $mysqlPassword
	$conn = mysql_connect($mysqlServer, $mysqlUsername, $mysqlPassword);
	if (!$conn) {
		echo "失败";
		die("数据库连接失败，请联系管理员。");
	}

	echo "判断数据库是否存在pre";
	// $databaseName = "meimeishop";
	// $result = $conn->query("show databases like '" . $databaseName . "'");
	// $row = $result->fetchAll();
	// echo "判断数据库是否存在";
	// echo $row;
	// if (count($row) < '1') {
	// //创建数据库
	// 	if ($conn->query("create database " . $databaseName) === TRUE) {
	// 		echo "创建数据库";
	// 	 } else {
	// 	 	echo "创建数据库失败";
	// 	 }
	// }

 ?>

<frameset cols="20%, *" frameBorder="1">
	<frame name="selectContent" src="category/homePageLeft.php" noresize="noresize"></frame>
	<frame name="mainContent" src="category/fastFood.php"></frame>
</frameset>
</body>
</html>



