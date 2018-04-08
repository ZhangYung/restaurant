<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>restaurant</title>
</head>
<body>
<?php
 echo "file";
?>  

<div class="mui-content shortcut"> 
	<a class="mui-control-item mui-active" ng-class="{'mui-active':lastTab===0}" data-tab="0">日用品</a>>
	<a class="mui-control-item" ng-class="{'mui-active':lastTab===1" data-tab="1">生活用品</a>
	<a class="mui-control-item" ng-class="{'mui-active':lastTab===2" data-tab="2">数码产品</a>
</div>

<form action="index.php" method="post" enctype="multipart/form-data">
    <label for="file">文件名：</label>
    <input type="file" name="file" id="file"><br>
    <input type="submit" name="submit" value="提交">
</form>

</body>
</html>