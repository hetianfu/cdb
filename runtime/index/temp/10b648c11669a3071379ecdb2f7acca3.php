<?php /*a:2:{s:59:"/opt/homebrew/var/www/cdb/app/index/view/login/editpwd.html";i:1615089346;s:59:"/opt/homebrew/var/www/cdb/app/index/view/public/header.html";i:1632829660;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo htmlentities(lang('register')); ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="stylesheet" type="text/css" href="/public/static/index/style.css">
<link rel="stylesheet" type="text/css" href="/public/static/index/layui/css/layui.css">
<script type="text/javascript" src="/public/static/index/js/jquery.js"></script>
<script type="text/javascript" src="/public/static/index/layui/layui.js"></script>


  <style type="text/css">
    .layui-input{border-radius: 10px;height: 42px;font-size: 16px;padding-left: 30px;}
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
      <!-- <form> -->
        <div>
          <div class="layui-form-item" style="position: relative">              
              <input type="text" class="layui-input" id="username" name="username" placeholder="<?php echo htmlentities(lang('dl_phone_number')); ?>">
              <button class="yzm" id="yzm"><?php echo htmlentities(lang('dl_get')); ?></button>
          </div>
          <div class="layui-form-item">
            <input type="text" class="layui-input" id="code" name="code" placeholder="<?php echo htmlentities(lang('dl_sms_code')); ?>">
          </div>
          <div class="layui-form-item">
            <input type="password" class="layui-input" id="new_password" name="new_password" placeholder="<?php echo htmlentities(lang('dl_new_password')); ?>">
          </div>
          <div class="layui-form-item">
            <input type="password" class="layui-input" id="confirm_password" name="confirm_password" placeholder="<?php echo htmlentities(lang('dl_confirm_password')); ?>">
          </div>
        </div>
        <div style="padding-top: 40px;">
          <div class="layui-form-item"><a class="layui-btn login" id="loginBtn" href="javascript:;"><span><?php echo htmlentities(lang('dl_modify')); ?></span></a></div>
          <div class="layui-form-item"><a class="layui-btn reg" href="<?php echo url('Login/index'); ?>"><?php echo htmlentities(lang('dl_back')); ?></a></div>
        </div>
      <!-- </form> -->
    </div>
  </div>
<script type="text/javascript">
  // 短信验证码
  $('#yzm').on('click',function(){
    var phone = $('input[name="username"]').val();
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
      btn.html('<?php echo htmlentities(lang('dl_get')); ?>');
      wait = 60;
    }else{
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
    });
    //登录操作
    $("#loginBtn").click(function(){
        var username = $("#username").val();
        var password = $("#new_password").val();
        var opassword = $("#confirm_password").val();
        var code = $("#code").val();
        $.ajax({
            type:'post',
            url:'<?php echo url("index/Login/editpwd"); ?>',
            data:{username:username,password:password,opassword:opassword,code:code},
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
</script>
</body>
</html>