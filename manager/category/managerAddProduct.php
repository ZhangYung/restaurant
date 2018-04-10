<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<br>
	<form action="managerAddProductFinish.php" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="addType" value=<?php echo $_GET["addType"];?> >
	商品图片:(文件要少于200kb) <input type="file" name="file"><br>
	商品名称：<input type="text" name="titleName"><br>
	商品描述：<input type="text" name="detail"><br>
	商品价格：<input type="number" name="price" step="0.01" min="0.01" max="999999" /><br>
	商品数量：<input type="number" name="number" step="1" min="1" max="9999999" value="9999"><br>

	<input type="submit" name="submit" value="提交">
	</form>
</body>
</html>