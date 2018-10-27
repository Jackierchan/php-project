<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equi3fklv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="sever.php" method="post">
        用户名：<input type="text" name="username"><br/>
        密码：<input type="password" name="pwd"><br/>
        性别：<input type="radio" name="sex" value="man">男<input type="radio" name="sex" value="girl">女
        <br/>

        爱好：<input type="checkbox" name="hobby[]" value="篮球">篮球<input type="checkbox" name="hobby[]" value="足球">足球<input type="checkbox" name="hobby[]" value="网球">网球<input type="checkbox" name="hobby[]" value="排球">排球
        <br/>
        学校：<select name="school[]" multiple="multiple">
            <option value="黑大">黑大</option>
            <option value="林大">林大</option>
            <option value="农大">农大</option>
            <option value="理工">理工</option>

        </select>
        <br/>

        <input type="submit" value="登陆">
<!--    <button type="submit">login</button>-->
    </form>
</body>
</html>