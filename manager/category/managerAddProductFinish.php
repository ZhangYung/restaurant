<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../stylesheet/managerHomepage.css">

</head>
<body>
<?php 
	require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
	require $databaseManagerphpPath;

	$addType = $_POST["addType"];
	$titleName = $_POST["titleName"];
	$price = $_POST["price"];

	// $uploadImageFileFoldPath;
 // 1:快餐fastFood 2:火锅hotPot 3:饮料drinks 4:其他others
// addOrEditProduct($productId, $name, $price, $imagePath, $detail, $number, $category, $state);

$productCategory = "快餐";
$finishPage = "managerFastFood.php";
if ($addType == 2) {
	$finishPage = "managerHotPot.php";
	$productCategory = "火锅";
} elseif ($addType == 3) {
	$finishPage = "managerDrinks.php";
	$productCategory = "饮料";
} elseif ($addType == 4) {
	$finishPage = "managerOthers.php";
	$productCategory = "其他";
}

 ?>
	<p>添加成功 <?php echo $productCategory; ?> </p>
	<br>
	<br>
	<form action=<?php echo $finishPage ?> method="get">
		<button class="managerAdd" type="submit" name="addType" value="drinks"> 返回 </button> 
	</form>
</body>
</html>