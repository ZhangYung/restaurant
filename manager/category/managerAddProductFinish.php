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
	$detail = $_POST["detail"];
	$price = $_POST["price"];
	$number = $_POST["number"];
	$file = $_FILES["file"];
	var_dump($file);

	// 允许上传的图片后缀
	$temp = explode(".", $file["name"]);
	$extension = end($temp);     // 获取文件后缀名

	$uploadPath = $uploadImageFileFoldPath . intval(time()) . $file["name"];
	if ((($file["type"] == "image/gif")
	|| ($file["type"] == "image/jpeg")
	|| ($file["type"] == "image/jpg")
	|| ($file["type"] == "image/pjpeg")
	|| ($file["type"] == "image/x-png")
	|| ($file["type"] == "image/png"))
	&& ($file["size"] < 307200)
	&& in_array($extension, $allowedExts))
	{
	    if ($file["error"] > 0)
	    {
	        echo "上传文件错误：: " . $file["error"] . "<br>";
	    }
	    else
	    {   
	        if (file_exists($uploadPath))
	        {
	            echo $uploadPath . " 文件已经存在。如果多次尝试都有此问题，请联系管理员";
	        }
	        else
	        {
	            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
	            move_uploaded_file($file["tmp_name"], $uploadPath);
	        }
	    }
	    echo "上传文件成功";
	} else {
	    die ("非法的文件格式, 文件只支持png,jpg,jpeg,文件要少于200kb");
	}

	// 1:快餐fastFood 2:火锅hotPot 3:饮料drinks 4:其他others
	addOrEditProduct(NULL, $titleName, $price, $uploadPath, $detail, $number, $addType, 1);

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