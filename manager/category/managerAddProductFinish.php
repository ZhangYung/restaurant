<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../stylesheet/managerHomePage.css">

</head>
<?php 
//config.php  数据库登录配置，就不共享出来了。
	require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
	$fileFoldPath = $_SERVER['DOCUMENT_ROOT'] . "/restaurant/uploadProductImage/"

//连接mysql  请自行配置数据库$mysqlServer, $mysqlUsername, $mysqlPassword
	$conn = mysql_connect($mysqlServer, $mysqlUsername, $mysqlPassword);
	if (!$conn) {
		die("数据库连接失败，请联系管理员。");
	}

	$databaseName = "meimeishop";
	$result = $conn->query("show tables like '" . $databaseName . "'");
	$row = $result->fetchAll();
	if (count($row) < '1') {
	//创建数据库
		if ($conn->query("create database " . $databaseName) === TRUE) {
			echo "创建数据库"
		 } else {
		 	echo "创建数据库失败"
		 }
	}


	echo $mysqlServer;
	echo $mysqlUsername;
	echo $mysqlPassword;
	echo $_POST["titleName"];
	echo $_POST["price"];
	echo $_POST["addType"];



 ?>
<body>
	<p>添加成功</p>
	<br>
	<br>
	<form action="managerFastFood.php" method="get">
		<button class="managerAdd" type="submit" name="addType" value="drinks"> 返回 </button> 
	</form>
</body>
</html>