<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../stylesheet/managerHomepage.css">

</head>
<body>
<?php 
	require $_SERVER['DOCUMENT_ROOT'] . "/restaurantConfig/config.php";
	require $databaseManagerphpPath;

	$changeProductId = $_POST["changeProductId"];
	$addType = $_POST["addType"];
	$titleName = $_POST["titleName"];
	$detail = $_POST["detail"];
	$price = $_POST["price"];
	$number = $_POST["number"];
	$status = $_POST["status"];
	$file = $_FILES["file"];
	$imagePath = NULL;
	$isAvaliableProduct = TRUE;

	if ($file["error"] == UPLOAD_ERR_OK) {
		// 允许上传的图片后缀
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $file["name"]);
		$extension = end($temp);     // 获取文件后缀名

		$imagePath = $uploadImageFileFoldPath . intval(time()) . md5($file["name"]) . "." . $extension;
		$uploadPath = $_SERVER['DOCUMENT_ROOT'] . $imagePath;
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
				$isAvaliableProduct = FALSE;
		    	die ("上传文件错误：: " . $file["error"] . "<br>");
		    }
		    else
		    {   
		        if (file_exists($uploadPath))
		        {
					$isAvaliableProduct = FALSE;
		            die($uploadPath . " 文件已经存在。如果多次尝试都有此问题，请联系管理员");
		        }
		        else
		        {
		            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
		            $createImage = move_uploaded_file($file["tmp_name"], $uploadPath);
		            if ($createImage == FALSE) {
						$isAvaliableProduct = FALSE;
		            	die("创建图片失败， 请联系管理员");
		            }
		        }
		    }
		} else {
			$isAvaliableProduct = FALSE;
			echo "type:" . $file["type"] . "<br>" . $file["size"] . "<br>" . $extension;
		    die ("非法的文件格式, 文件只支持png,jpg,jpeg,文件要少于200kb");
		}
	}

	// 1:快餐fastFood 2:火锅hotPot 3:饮料drinks 4:其他others
	if ($isAvaliableProduct) {
		addOrEditProduct($changeProductId, $titleName, $price, $imagePath, $detail, $number, $addType, $status);
	}

	$productCategory = "快餐";
	$finishPage = "managerFastFood.php";
	if ($addType == 2) {
		$productCategory = "火锅";
	} elseif ($addType == 3) {
		$productCategory = "饮料";
	} elseif ($addType == 4) {
		$productCategory = "其他";
	}
 ?>
	<p>
	 <?php 
	 	if ($changeProductId) {
	 		echo "修改";
		} else {
			echo "添加";
		}
	 	echo $productCategory;
	 	echo $titleName;
	 ?>
	   成功</p>
	<br>
	<br>
	<form action=<?php echo $finishPage ?> method="get">
		<input type="hidden" name="category" value=<?php echo $addType?>>
		 
		<button class="managerAdd" type="submit"> 返回 </button> 
	</form>
</body>
</html>