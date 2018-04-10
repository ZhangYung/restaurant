<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<br>
	<form action="managerAddProductFinish.php" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="addType" value=<?php echo $_GET["addType"];?> >
	商品图片 <input type="file" name="image"><br>
	商品名称： <input type="text" name="titleName"><br>
	商品价格： <input type="number" name="price" step="0.01" min="0.01" max="999999" />

	<input type="submit" name="submit" value="提交">
	</form>

<h1>addProduct</h1>
</body>
</html>