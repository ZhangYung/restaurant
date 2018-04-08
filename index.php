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

<div class="mui-content shortcut" id="segmentedControl" ng-class="{tabFixed:showFixed}"> 
	<a class="mui-control-item mui-active" ng-class="{'mui-active':lastTab===0}" data-tab="0">日用品</a>
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


.shortcut a.mui-control-item {
    border: none;
    background-color: #fff
    font-size: .33rem;
    color: #000;
    height: .86rem;
    line-height: .86rem;
    border-bottom: .05em solid #DCDCDC
}

.mui-segmented-control .mui-control-item.mui-active {
    color: #fff;
    background-color: #007aff
}

.mui-segmented-control.mui-segmented-control-inverted.mui-segmented-control-vertical .mui-control-item,
.mui-segmented-control.mui-segmented-control-inverted.mui-segmented-control-vertical .mui-control-item.mui-active {
    border-bottom: 1px solid #c8c7cc
}


.mui-segmented-control.mui-segmented-control-inverted .mui-control-item.mui-active {
    color: #007aff;
    border-bottom: 2px solid #007aff;
    background: 0 0
}


.mui-segmented-control-positive .mui-control-item.mui-active {
    color: #fff;
    background-color: #4cd964
}

.mui-segmented-control-positive.mui-segmented-control-inverted .mui-control-item.mui-active {
    color: #4cd964;
    border-bottom: 2px solid #4cd964;
    background: 0 0
}

