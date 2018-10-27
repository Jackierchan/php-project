<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="<?php echo site_url();?>">
    <style>
        html{
            background: seagreen;
        }
        span{
            color: red;
        }
    </style>
</head>
<body>
    <form method="post" action="welcome/save">
        用户名：<input type="text" name="username">
        <span><?php echo isset($name_error)? $name_error:'' ?></span>
        <br>
        密码：<input type="password" name="pwd1">
        <span><?php echo isset($pwd1)? $pwd1:'' ?></span>
        <br>
        确认密码：<input type="password" name="pwd2">
        <span><?php echo isset($pwd2)? $pwd2:'' ?></span>
        <span><?php echo isset($error)? $error:'' ?></span>
        <br>
        <input type="submit" value="注册">
    <form/>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/20
 * Time: 10:05
 */