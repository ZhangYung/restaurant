<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../stylesheet/managerHomePage.css">

</head>
<?php 
	require $_SERVER['DOCUMENT_ROOT'] . "restaurantConfig/config.php";
	echo $_SERVER['DOCUMENT_ROOT'] . "restaurantConfig/config.php";
	echo "<br>";
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