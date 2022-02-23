<?php /*a:2:{s:57:"/opt/homebrew/var/www/cdb/app/index/view/login/index.html";i:1644907476;s:59:"/opt/homebrew/var/www/cdb/app/index/view/public/header.html";i:1632829660;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <title>Entre agora</title>
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
    .langbox{position: absolute;right: 0;width: 7rem;}
    .layui-form-select .layui-input{font-size: 12px;height: 2rem;border-radius: 0;}
  </style>
</head>
<body style="background-color: #3FDADC;position: relative;">
  <div class="layui-container">
    <div class="login_logo" style="padding-bottom: 20px;">
      <div class="imgbox"><img src="<?php echo htmlentities($logo); ?>"></div>
    </div>

<!--     <div class="langbox">
      <form class="layui-form">
      <select name="langtype" class="langtype" lay-filter="showbtn">
        <option <?php if(app('request')->session('lang') == 1): ?> selected <?php endif; ?> value="1">中文</option>
        <option <?php if(app('request')->session('lang') == 2): ?> selected <?php endif; ?> value="2">英文</option>
        <option <?php if(app('request')->session('lang') == 3): ?> selected <?php endif; ?> value="3">印度语</option>
      </select>
      </form>
    </div> -->
    
    <div class="login_form">
      <form>
        <div>
          <div class="layui-form-item">
            <input type="text" class="layui-input" id="username" name="username" placeholder="<?php echo htmlentities(lang('dl_phone_number')); ?>">
          </div>
          <div class="layui-form-item">
            <input type="password" class="layui-input" id="password" name="password" placeholder="<?php echo htmlentities(lang('dl_password')); ?>">
          </div>
        </div>
        <div>
          <div>
            <input type="radio" name="sex" value="1"><span style="color: #666;"> <?php echo htmlentities(lang('dl_remember_password')); ?></span>
            <a class="fpass" href="<?php echo url('login/editpwd'); ?>"> <?php echo htmlentities(lang('dl_forget_password')); ?></a>
          </div>
        </div>
        <div style="padding-top: 40px;">
          <div class="layui-form-item"><a class="layui-btn login" id="loginBtn" href="javascript:;"><span> <?php echo htmlentities(lang('dl_login')); ?></span></a></div>
          <div class="layui-form-item"><a class="layui-btn reg" href="<?php echo url('sem/regsem'); ?>"> <?php echo htmlentities(lang('dl_register')); ?></a></div>
        </div>
      </form>
    </div>
  </div>
<script type="text/javascript">
  layui.use(['layer','form'], function(){
        var layer = layui.layer;
        var form = layui.form;
        form.on('select(showbtn)',function(data){
          if(data.value) {
              $.ajax({
                  url:"<?php echo url('Login/langtype'); ?>",
                  type:"post",
                  data:{id:data.value},
                  success:function(res){
                      if (res.status==1) {
                          location.reload();
                      }
                  }
              });
          }
      });
    });
    //登录操作
    $("#loginBtn").click(function(){
        var username = $("#username").val();
        var password = $("#password").val();
        // alert(account);return;
        $.ajax({
            type:'post',
            url:'<?php echo url("index/login/index"); ?>',
            data:{username:username,password:password},
            dataType:'json',
            success:function(res){
                if (res.status) {
                    setTimeout(function(){
                        location.href = '<?php echo url("index/News/index"); ?>';
                    },1000);
                    layer.msg(res.msg);
                }else{
                    layer.msg(res.msg);
                    return false;
                }
            }
        });
    });

</script>
</body>
</html>
