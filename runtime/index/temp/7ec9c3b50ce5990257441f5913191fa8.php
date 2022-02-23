<?php /*a:2:{s:61:"/www/wwwroot/hgcdb.test138.com/app/index/view/sem/regsem.html";i:1616071632;s:64:"/www/wwwroot/hgcdb.test138.com/app/index/view/public/header.html";i:1632829661;}*/ ?>
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
        .layui-form-item{text-align: center;}
        .login_form{width: 100%;height: 10rem;margin-top: 4rem;float: left;}
        .login_form p{color: #3FDADC;margin-top: 5rem;font-size: 26px;font-weight: bold;text-align: center;}
        .linnqu{width: 70%;height: 3rem;background: #3FDADC;margin-top: 1rem;border-radius: 3rem;border:none;color: #fff;font-size: 0.9rem;font-weight: bold;}
    </style>
</head>
<body style="background-color: #131933;">
    <div class="layui-container">
        <div class="login_logo" style="padding-bottom: 20px;">
            <div class="imgbox"><img src="<?php echo htmlentities($logo); ?>"></div>
        </div>
        <div class="login_form">
            <form action="<?php echo url('/index/sem/regsems'); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo htmlentities($uid); ?>">
                <div>
                    <p><?php echo htmlentities(lang('zc_gift_amount')); ?>：<?php echo htmlentities($hongbao); ?><?php echo htmlentities(lang('zc_unit')); ?> 
                    <!-- (<?php echo htmlentities(lang('zc_withdrawable_cash')); ?>) -->
                    </p>
                </div>
                <div style="padding-top: 40px;">
                    <div class="layui-form-item">
                        <button class="linnqu"><?php echo htmlentities(lang('zc_register_receive')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script type="text/javascript">
    layui.use(['layer','form'], function(){
        var layer = layui.layer;
        var form = layui.form;
    });

</script>
</body>
</html>