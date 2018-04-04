<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>restaurant</title>
</head>
<body>
<?php
class Car
{
    var $color;
    function Car($color="green") {
      $this->color = $color;
    }
    function what_color() {
      return $this->color;
    }
}

function print_vars($obj) {
   foreach (get_object_vars($obj) as $prop => $val) {
     echo "\t$prop = $val\n";
   }
}

// 实例一个对象
$herbie = new Car("white");

// 显示 herbie 属性
echo "herbie: Properties\n";
print_vars($herbie);

echo "herbie: Properties yung)\n";

?>  

<h1>我的第一个标题</h1>
<p>我的第一个段落。</p>

</body>
</html>