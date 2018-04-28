<?php
	session_start();
	if ($_SESSION['stateShow'] == NULL) {
		$_SESSION['stateShow'] = "1";
	}
 ?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../stylesheet/homepage.css" />
<title>后台管理</title>
</head>

<frameset cols="20%, 80%" frameBorder="1">
	<frame name="selectContent"  <?php echo "src=\"category/managerHomePageLeft.php?selectedCategory=" . $_SESSION['stateShow'] . "\"" ?> ></frame>
	<frame name="mainContent" <?php echo "src=\"category/managerOrderList.php?state=" . $_SESSION['stateShow'] . "\"" ?> > </frame>
</frameset>

</html>



