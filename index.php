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

<h1>我的第一个标题</h1>
<p>我的第一个段落。</p>
<form action="index.php" method="post" enctype="multipart/form-data">
    <label for="file">文件名：</label>
    <input type="file" name="file" id="file"><br>
    <input type="submit" name="submit" value="提交">
</form>

</body>
</html>