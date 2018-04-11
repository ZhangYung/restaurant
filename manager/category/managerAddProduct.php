<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<br>
	<form action="managerAddProductFinish.php" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="addType" value=<?php echo $_GET["addType"]; ?> >

	<?php 
	require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
	require $databaseManagerphpPath;

	$changeProductId = $_GET["changeProductId"];
	$titleName = NULL;
	$detail = NULL;
	$price = NULL;
	$number = NULL;
	if ($changeProductId != NULL) {
		echo $changeProductId;
		$productJson = getProducts($changeProductId, NULL, NULL);
		var_dump($productJson);
		$product = json_decode($productJson, TRUE);
		var_dump($product);
		$model = new shopProduct();
		$model->initWithDic($product);
		var_dump($model);
		$titleName = $model->name;
		$detail = $model->detail;
		$price = $model->price;
		$number = $model->number;
	}
	 ?>

	商品图片:(文件要少于200kb) <input type="file" name="file"><br>
	商品名称：<input type="text" name="titleName" value=<?php echo isset($titleName) ? $titleName : ""; ?> /><br>
	商品描述：<input type="text" name="detail" value=<?php echo isset($detail) ? $detail : ""; ?> /><br>
	商品价格：<input type="number" name="price" step="0.01" min="0.01" max="999999" value=<?php echo isset($price) ? $price : ""; ?> /><br>
	商品数量：<input type="number" name="number" step="1" min="1" max="9999999"  value=<?php echo isset($number) ? $number : "9999"; ?> /><br>

	<input type="submit" name="submit" value="提交">
	</form>
</body>
</html>