<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>restaurant</title>
</head>
<body>
<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "ZhangYaoYuan@529143";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	if (!$conn) {
		die("error:" . mysqli_error($conn));
 	}
 	echo 'successful';
 	$sql = 'create database RUNOOBTEST';
 	$retval = mysqli_query($conn, $sql);
 	if (!$retval) {
 		die('create error:' . mysqli_error($conn));
  	}

  	echo "create success  \n";
  	mysqli_close($conn);
 ?>
<h1>我的第一个标题</h1>
<p>我的第一个段落。</p>

</body>
</html>