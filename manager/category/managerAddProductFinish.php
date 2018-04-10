<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../stylesheet/managerHomepage.css">

</head>
<body>
<?php 
$addType = $_POST("addType");
$titleName = $_POST("titleName");
$price = $_POST("price");
echo "addType:";
echo $addType;

// 	require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
// 	require $databaseManagerphpPath;

// 	// $uploadImageFileFoldPath;
//  // 1:快餐fastFood 2:火锅hotPot 3:饮料drinks 4:其他others
// // addOrEditProduct($productId, $name, $price, $imagePath, $detail, $number, $category, $state);

// $finishPage = "managerFastFood.php";
// if ($addType == 2) {
// 	$finishPage = "managerHotPot.php";
// } elseif ($addType == 3) {
// 	$finishPage = "managerDrinks.php";
// } elseif ($addType == 4) {
// 	$finishPage = "managerOthers.php";
// }

 ?>
	<p>添加成功</p>
	<br>
	<br>
	<form action="<?php echo "\"" . $finishPage . "\"" ?>" method="get">
		<button class="managerAdd" type="submit" name="addType" value="drinks"> 返回 </button> 
	</form>
</body>
</html>