<?php /*a:2:{s:62:"/www/wwwroot/hgcdb.test138.com/app/index/view/sem/regsems.html";i:1632979466;s:64:"/www/wwwroot/hgcdb.test138.com/app/index/view/public/header.html";i:1632829661;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="stylesheet" type="text/css" href="/public/static/index/style.css">
<link rel="stylesheet" type="text/css" href="/public/static/index/layui/css/layui.css">
<script type="text/javascript" src="/public/static/index/js/jquery.js"></script>
<script type="text/javascript" src="/public/static/index/layui/layui.js"></script>


    <style type="text/css">

        .layui-input{border-radius: 10px;height: 42px;font-size: 16px;padding-left: 40px;}
        .layui-form-item{text-align: center;}
        .layui-btn{width: 88%;border-radius: 3rem;line-height: 3.4rem;border: 2px #fff solid;height: 3.4rem;font-size: 16px;}
        .login{background-color: #fff;}
        .login span{color: #fc5d03;}
        .reg{background-color: #3FDADC;color: #fff;border: 1}
        .yzm{position: absolute;top:0;right: 0;height: 42px;width: 30%;border-radius: 10px;border:1px solid #fff;color: #fff;background: #3FDADC;}
    </style>
</head>
<body style="background-color: #3FDADC;">
<div class="layui-container">
    <div class="login_logo" style="padding-bottom: 20px;">
        <div class="imgbox"><img src="<?php echo htmlentities($logo); ?>"></div>
    </div>
    <div class="login_form">

        <input type="hidden"  name="parent"  id="parent"  value="<?php echo htmlentities($d_key); ?>">
        <div>
            <div class="layui-form-item" style="position: relative">
                <span style="position: absolute;left:8px;top:12px;font-size: 16px;color:#aaa" >+<?php echo config('app.country'); ?></span>
                <input type="text" class="layui-input" id="mobile" name="mobile" placeholder="<?php echo htmlentities(lang('yq_phone_number')); ?>">
                <button class="yzm" id="yzm"><?php echo htmlentities(lang('yq_get')); ?></button>
            </div>
            <div class="layui-form-item">
                <input type="text" class="layui-input" id="code" name="code" placeholder="<?php echo htmlentities(lang('yq_sms_code')); ?>">
            </div>
            <div class="layui-form-item">
                <input type="text" class="layui-input" id="password" name="password" placeholder="<?php echo htmlentities(lang('yq_password')); ?>">
            </div>
            <div class="layui-form-item">
                <input type="text" class="layui-input" id="id" value="<?php echo htmlentities($e_keyid); ?>" name="parent" placeholder="<?php echo htmlentities(lang('yq_referee_phone')); ?>">
            </div>
        </div>
        <div style="padding-top: 40px;">
            <div class="layui-form-item">
                <a class="layui-btn login" id="loginBtn" href="javascript:;"><span><?php echo htmlentities(lang('dl_register')); ?></span></a>
            </div>
            <div class="layui-form-item">
                <a class="layui-btn login" href="<?php echo htmlentities($url); ?>"><span><?php echo htmlentities(lang('App_download')); ?></span></a>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    // 短信验证码
    $('#yzm').on('click',function(){
        var phone = $('input[name="mobile"]').val();
        var reg =/^[0-9]+.?[0-9]*$/;
        if(!reg.test(phone)){
            layer.msg('Please input the correct mobile phone number');
            return false;
        }
        if(!phone){
            layer.msg('O número de telefone não Pode ESTAR vazio');
            return false;
        }
        $.ajax({
            'type':'post',
            'url':'<?php echo url("login/code"); ?>',
            'data':{'phone':phone},
            success:function(res){
                if (res.status==1) {
                    layer.msg(res.msg);
                    codetime();
                }else{
                    layer.msg(res.msg);
                }
            }
        });
    })
    //验证码倒计时
    var btn = $("#yzm");
    var wait = 60;
    function codetime(){
        if (wait == 0) {
            document.getElementById("yzm").disabled=false;
            btn.html('<?php echo htmlentities(lang('dl_get')); ?>');
            wait = 60;
        }else{
            document.getElementById("yzm").disabled=true;
            btn.html(wait+'s');
            wait--;
            setTimeout(function(){
                codetime();
            },1000);
        }
    }


    layui.use(['layer','form'], function(){
        var layer = layui.layer;
        var form = layui.form;
        //登录操作
        $("#loginBtn").click(function(){
            var mobile = $("#mobile").val();

            var reg =/^[0-9]+.?[0-9]*$/;
            if(!reg.test(mobile)){
                layer.msg('Please input the correct mobile phone number');
                return false;
            }

            var password = $("#password").val();
            var parent = $("#parent").val();
            
            
            
            $.ajax({
                type:'post',
                url:'<?php echo url("index/sem/regsempost"); ?>',
                data:{mobile:mobile,password:password,parent:parent},
                dataType:'json',
                success:function(res){
                    if (res.status) {
                        setTimeout(function(){
                            location.href = '<?php echo url("index/login/index"); ?>';
                        },1000);
                        layer.msg(res.msg);
                    }else{
                        layer.msg(res.msg, {icon: 5});
                        return false;
                    }
                }
            });
        });
    });

</script>
</body>
</html>