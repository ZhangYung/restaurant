<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="managerAddProductFinish.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="image"><br>
	<input type="hidden" name="addType" value=<?php echo "\"" . $_GET["addType"] . "\"";?>>
	名称： <input type="text" name="titleName"><br>
	价格： <input type="text" name="price"><br>
	<input type="submit" name="submit" value="提交">
	</form>

<h1>addProduct</h1>
</body>
</html>