<?php

//login
//$name=$_POST['username'];
//$pwd=$_POST['pwd'];
//$sex=$_POST['sex'];
//$hobby=$_POST['hobby'];
//$school=$_POST['school'];
//echo '输入的用户名是：'.$name,'<br/>'.'密码是：'.$pwd,'性别：'.$sex.'<br>';
//var_dump($hobby);
//var_dump($school);

//logup
$name=$_GET['username'];
$pwd1=$_GET['p1'];
$pwd2=$_GET['p2'];
if ($name==''){
    echo 'nameerr';
}elseif ($pwd1==''){
    echo 'p1err';

}elseif ($pwd2==''){
    echo 'p2err';

}elseif ($pwd1!=$pwd2){
    echo 'error';
}else{
    echo 'succeed';
}
?>