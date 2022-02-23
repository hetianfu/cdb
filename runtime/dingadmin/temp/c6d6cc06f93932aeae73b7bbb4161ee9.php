<?php /*a:1:{s:57:"/www/wwwroot/wetbc.cc/app/dingadmin/view/login/index.html";i:1607564104;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
    <link rel="stylesheet" href="/public/static/admin/custom/css/login.css">
</head>
<body>
<div class="layui-anim layui-anim-up login-main" id="form-main">
    <form class="layui-form" action="" method="post">
        <h3><span>后台管理</span></h3>
        <div class="ly-input">
            <input type="text" id="account" required value="admin" lay-verify="required" placeholder="请输入登录账号" autocomplete="off" class="layui-input">
        </div>
        <div class="ly-input">
            <input type="password" id="password" required value="123456" lay-verify="required" placeholder="请输入登录密码" autocomplete="off" class="layui-input">
        </div>
        <div class="ly-input" style="position: relative;">
            <input type="text" id="captcha" required  lay-verify="required" placeholder="请输入验证码" autocomplete="off" class="layui-input" style="width: 100px;">
            <img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();" style="position: absolute;left: 110px;top: 0px;height: 37px;cursor: pointer;"/>
        </div>
        <div class="ly-input">
            <a href="javascript:;" class="layui-btn layui-btn-danger ly-submit"  id="loginBtn">登入</a>
        </div>
    </form>
    <p></p>
</div>

<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/login.js"></script>
<script>
    layui.use(['layer','form'], function(){
        var layer = layui.layer;
        var form = layui.form;
    });
    //登录操作
    $("#loginBtn").click(function(){
        var account = $("#account").val();
        var password = $("#password").val();
        var captcha = $("#captcha").val();
        //ajax传递
        $.ajax({
            type:'post',
            url:'<?php echo url("dingadmin/login/checkLogin"); ?>',
            data:{account:account,password:password,captcha:captcha},
            dataType:'json',
            success:function(res){
                if (!res.status) {
                    setTimeout(function(){
                        location.href = res.url;
                    },1000);
                    layer.msg(res.msg);
                }else{
                    layer.msg(res.msg, {icon: 5});
                    return false;
                }
            }
        });
    });
    

</script>
</body>
</html>