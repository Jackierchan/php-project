<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
<div id="div1">
用户名：<input type="text" id="ipt1">
<span class="error nameerr"></span><br>
密码：<input type="text" id="ipt2">
<span class="error p1err"></span><br>
确认密码：<input type="text" id="ipt3">
<span class="error p2err"></span><br>
<button id="btn1">注册</button>
</div>
<script src="jquery-1.12.4.js"></script>
<script>
    $(function () {
        $('#btn1').on('click',function(){
            var oipt1=$('#ipt1').val();
            var oipt2=$('#ipt2').val();
            var oipt3=$('#ipt3').val();
            $.get('sever.php',{
                  username:oipt1,
                  p1:oipt2,
                  p2:oipt3
            },function(data){
                if (data=='nameerr'){
                    $('.nameerr').html('用户名为空');
                }else if(data=='p1err'){
                    $('.p1err').html('密码为空');
                }else if(data=='p2err'){
                    $('.p2err').html('确认密码为空');
                }else if(data=='error'){
                    $('.p2err').html('两者不一致');
                }else{
                    $('#div1').html('注册成功!')
                }
            } ,'text')
        })
    })



</script>
</body>
</html>