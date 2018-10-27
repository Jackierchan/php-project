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
    </style>
</head>
<body>
    <form method="post" action="welcome/login_check">
        用户名：<input type="text" name="username"><br>
        密码：<input type="password" name="pwd1"><br>
        <input type="submit" value="登陆">
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