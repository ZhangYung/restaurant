<?php
	session_start();
	if ($_SESSION['categoryShow'] == NULL) {
		$_SESSION['categoryShow'] = "1";
	}
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../stylesheet/homepage.css" />
<title>后台管理</title>
</head>

<frameset cols="20%, *" frameBorder="1">
	<frame name="selectContent" <?php echo "src=\"category/managerHomePageLeft.php?selectedCategory=" . $_SESSION['categoryShow'] . "\"" ?> ></frame>
	<frame name="mainContent" <?php echo "src=\"category/managerFastFood.php?category=" . $_SESSION['categoryShow'] . "\"" ?> ></frame>
</frameset>

</html>



