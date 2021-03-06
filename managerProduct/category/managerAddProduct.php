<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../stylesheet/homepage.css"/>
	<title></title>
</head>
<body>
	<?php 
		$category = $_GET["addType"];
		if ($category == 1) {
			echo "<p>添加快餐</p>";
		} elseif ($category == 2) {
			echo "<p>添加火锅</p>";
		} elseif ($category == 3) {
			echo "<p>添加饮料</p>";
		} elseif ($category == 4) {
			echo "<p>添加其他</p>";
		}
	?>
	<br>
	<form action="managerAddProductFinish.php" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="addType" value=<?php echo $category; ?> >

	<?php 
	require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
	require $databaseManagerphpPath;

	$changeProductId = $_GET["changeProductId"];
	$titleName = NULL;
	$detail = NULL;
	$price = NULL;
	$number = NULL;
	if ($changeProductId != NULL) {
		$productsJson = getProducts($changeProductId, NULL, NULL);
		$products = json_decode($productsJson, TRUE);
		$count = count($products);
		if ($count == 0) {
			die("无法找到该商品");
		}

		$model = new shopProduct();
		$subProduct = $products[0];
		$model->initWithDic($subProduct);

		$titleName = $model->name;
		$detail = $model->detail;
		$price = $model->price;
		$number = $model->number;
	}
	 ?>
	<input type="hidden" name="changeProductId" value=<?php echo $changeProductId; ?> >

	商品图片:(文件要少于200kb) <input type="file" name="file"><br>
	商品名称：<input type="text" name="titleName" <?php echo (isset($titleName) ? ("value=\"" . $titleName . "\"") : ""); ?> /><br><br>
	商品描述：<input type="text" name="detail" <?php echo (isset($detail) ? ("value=\"" . $detail . "\"") : ""); ?> /><br><br>
	商品价格：<input type="number" name="price" step="0.01" min="0.01" max="999999" <?php echo (isset($price) ? ("value=\"" . $price . "\"") : ""); ?> /><br><br>
	商品数量：<input type="number" name="number" step="1" min="1" max="9999999" <?php echo (isset($number) ? ("value=\"" . $number . "\"") : ""); ?>  /><br><br>
	<select name="status">
	<option value="1" <?php echo $model->state == 1 ? "selected" : ""; ?>>正常售卖</option>
	<option value="2" <?php echo $model->state == 2 ? "selected" : ""; ?>>停售</option>
	<option value="3" <?php echo $model->state == 3 ? "selected" : ""; ?>>删除</option>
	</select><br><br>

	<input class=\"elementGrayButton\" type="submit" name="submit" value="提交">
	</form>
</body>
</html>