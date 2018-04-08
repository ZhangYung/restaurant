<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php 
	$addType = $_GET["addType"];
	echo $addType;
 ?>
<body>
	<form action="managerAddProductFinish.php" method="POST" enctype="multipart/form-data">
	<input type="image" name="imageName" id="imageId"><br>
	名称： <input type="text" name="titleName"><br>
	价格： <input type="text" name="price"><br>
	<input type="submit" name="submit" value="提交">
	</form>

<h1>addProduct</h1>
</body>
</html>