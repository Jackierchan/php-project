<!DOCTYPE html>
<html>
<body>
<!--注释-->
<?php
echo "我的第一段 PHP 脚本！";
//注释
$color='red';
echo 'my coat is '  .$color;
echo '<h1>my pants is ' .$color.'</h1>';
$x=5;
$y=8;
$z=$x+$y;
echo $z;

function text(){
    $a=2;
    global $x;
    echo $a;
    echo $x;
}
text();
function text1(){
    static $x=0;
    $x++;
    echo $x;
}
text1();
text1();
text1();

$s='asgasg';
$v='afFFawf';
echo $s,$v;
//输出多个
print $s;
//只能输出一个

$x=121;
$y=121.111;
$q='fafafa';
$s=array('ef','asfas','safas');
var_dump($x);
print '<br/>';
var_dump($y);
print '<br/>';
var_dump($q);
print '<br/>';
var_dump($s);
print '<br/>';

class car
{
    var $color;
    function car($color='green'){
         $this->color=$color;
    }
    function what_color(){
        return $this->color;
    }
}
$car1=new car('red');
echo '车的颜色是'.$car1->what_color();


?>

</body>
</html>
