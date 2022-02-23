<?php /*a:4:{s:63:"/www/wwwroot/hgcdb.test138.com/app/index/view/wallet/index.html";i:1632894353;s:64:"/www/wwwroot/hgcdb.test138.com/app/index/view/public/header.html";i:1632829661;s:62:"/www/wwwroot/hgcdb.test138.com/app/index/view/public/kefu.html";i:1616171411;s:62:"/www/wwwroot/hgcdb.test138.com/app/index/view/public/foot.html";i:1631773953;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo htmlentities(lang('personal_center')); ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="stylesheet" type="text/css" href="/public/static/index/style.css">
<link rel="stylesheet" type="text/css" href="/public/static/index/layui/css/layui.css">
<script type="text/javascript" src="/public/static/index/js/jquery.js"></script>
<script type="text/javascript" src="/public/static/index/layui/layui.js"></script>


  <script type="text/javascript">
	document.write(`<div id="Service" style="position:fixed;right:0;top:50%;display:flex;align-items:center;z-index:999;">
        <ul style="width:0;overflow:hidden;transition: width 0.8s;white-space:nowrap;">
           <a href="javascript:void(0)"  hr="<?php echo htmlentities($kefu1); ?>" id="a1"><li style="padding:5px;">Service 1</li></a>   
           <a href="javascript:void(0)"  hr="<?php echo htmlentities($kefu2); ?>" id="a2"><li style="padding:5px;">Service 2</li></a>     
           <a href="javascript:void(0)"  hr="<?php echo htmlentities($kefu3); ?>" id="a3"><li style="padding:5px;">Service 3</li></a>     
        </ul>
        <img style="width:55px;height:55px" src="/public/static/index/img/customer.png" alt="..." />
    </div>`)
      $('#Service').click(function (){
        $('#Service ul').css({
            'width':'95px'
        })
    })
    // 拖动
	var phoneSys = ""

	var u = navigator.userAgent,

		app = navigator.appVersion;

	console.log(u);

	var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Linux') > -1; //g

	var isIOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端

	if(isAndroid) {

		console.log(111);

		//这个是安卓操作系统

		phoneSys = "android";

	}

	if(isIOS) {

		phoneSys = "IOS";

	}
	
    $('#Service a').click(function (){
      var href =  $(this).attr('hr')
         if( phoneSys == "android"){
             window.android.back(href)
         }else {
             location.href = href
         }
    })
    var obj = document.getElementById('Service');
    var drag = false;
    var screenHeight = document.documentElement.clientHeight;
    var screenWidth = document.documentElement.clientWidth;
    var pageX = screenWidth;
    obj.addEventListener('touchstart',(ev)=>{
      drag = true;
      if (obj.setCapture) {
        obj.setCapture();
      }
      $('#Service').removeClass('move')
    });
    obj.addEventListener('touchmove',(ev)=>{
      $('#Service').removeClass('move')
      ev.preventDefault();
      ev = ev.touches?ev.touches[0]:event;
      if(drag){
        if(ev.pageY<obj.clientHeight/2){
          obj.style.bottom = screenHeight-obj.clientHeight+'px';
        }else if(ev.pageY>screenHeight-5-obj.clientHeight/2){
          obj.style.bottom = '5px';
        }else{
          obj.style.bottom = screenHeight-ev.pageY-obj.clientHeight/2+'px';
        }
        if(ev.pageX<obj.clientWidth/2){
          obj.style.right = screenWidth-obj.clientWidth+'px';
        }else if(ev.pageX>screenWidth-obj.clientWidth/2){
          obj.style.right = '0px';
        }else{
          obj.style.right = screenWidth-ev.pageX-obj.clientWidth/2+'px';
        }
        pageX = ev.pageX
      }
    });
    obj.addEventListener('touchend',(ev)=>{
      drag = false;
      $('#Service').addClass('move')
      if(pageX>screenWidth/2){
        obj.style.right = 0;
      }else{
        obj.style.right = screenWidth-obj.clientWidth+'px';
      }
    });
</script>
  <style type="text/css">

  </style>
</head>
<body>
  <div class="my_top" >
    <div class="my_top_left">
      <p class="my_top_left_user"><?php echo htmlentities($user['phone']); ?></p>
      <p><span><?php echo htmlentities(lang('my_grade')); ?>：<i style="color: red;"><?php if($user['lv_name']): ?> <?php echo htmlentities($user['lv_name']); else: ?> <?php echo htmlentities(lang('my_ordinary_member')); ?> <?php endif; ?></i></span></p> 
      <p><span><?php echo htmlentities(lang('my_balance')); ?>：<i style="color: green;"><?php echo htmlentities($user['money']); ?></i></span> <span style="margin-left: 20px"><?php echo htmlentities(lang('integral')); ?>：<i style="color: green;"><?php echo htmlentities($user['integral']); ?></i></span></p>
    </div>
    <div>
      <img src="">
    </div>
  </div>
  <div class="my_imgad">
    <img src="/public/static/index/img/myad.png">
  </div>
  <div style="clear: both;"></div>

  <div style="padding: 0.5rem 4% 6rem;box-sizing: border-box;width: 100%;">
    <ul class="my_lanmu">
      <a href="<?php echo url('index/Index/personal'); ?>">
        <li>
          <img src="/public/static/index/img/p1.png">
          <p><?php echo htmlentities(lang('personal_data')); ?></p>
        </li>
      </a>
      <!--<a href="<?php echo htmlentities($kefu); ?>">
        <li>
          <img src="/public/static/index/img/p2.png">
          <p><?php echo htmlentities(lang('online_service')); ?></p>
        </li>
      </a> -->
      <a href="<?php echo url('index/Index/zhitui'); ?>">
        <li>
          <img src="/public/static/index/img/p3.png">
          <p><?php echo htmlentities(lang('my_team')); ?></p>
        </li>
      </a>
      <a  href="<?php echo url('index/Index/tgm'); ?>">
        <li>
          <img src="/public/static/index/img/p11.png">
          <p><?php echo htmlentities(lang('fx_invite_friends')); ?></p>
        </li>
       </a>
      <a href="<?php echo url('index/Wallet/withdrawn'); ?>">
        <li>
          <img src="/public/static/index/img/p4.png">
          <p><?php echo htmlentities(lang('withdrawal')); ?></p>
        </li>
      </a>
      <a href="<?php echo url('index/Wallet/onlinerecharge'); ?>">
        <li>
          <img src="/public/static/index/img/p5.png">
          <p><?php echo htmlentities(lang('recharge')); ?></p>
        </li>
      </a>
      <!--提现账户-->
      <!--<a href="<?php echo htmlentities($tglink); ?>">
        <li>
          <img src="/public/static/index/img/p11.png">
          <p><?php echo htmlentities(lang('withdrawal_account')); ?></p>
        </li>
      </a>-->
      <a href="<?php echo url('index/Wallet/award'); ?>">
        <li>
          <img src="/public/static/index/img/p7.png">
          <p><?php echo htmlentities(lang('my_wallet')); ?></p>
        </li>
      </a>
      <!--会员升级-->
      <!--<a href="<?php echo url('index/Wallet/vip_upgrade'); ?>">
        <li>
          <img src="/public/static/index/img/p8.png">
          <p><?php echo htmlentities(lang('vip_upgrade')); ?></p>
        </li>
      </a>-->
      <a href="<?php echo url('index/News/help'); ?>">
        <li>
          <img src="/public/static/index/img/p9.png">
          <p><?php echo htmlentities(lang('notice')); ?></p>
        </li>
      </a>
      <a href="<?php echo url('index/News/xiangmu'); ?>">
        <li>
          <img src="/public/static/index/img/p3.png">
          <p><?php echo htmlentities(lang('about_us')); ?></p>
        </li>
      </a>
<!--       <a href="<?php echo htmlentities($download); ?>">
        <li>
          <img src="/public/static/index/img/p10.png">
          <p><?php echo htmlentities(lang('App_download')); ?></p>
          <img class="right_img" src="img/jr.png">
        </li>
      </a> -->

      <a href="javascript:;" onclick="tuichu()">
        <li>
          <img src="/public/static/index/img/p1.png">
          <p><?php echo htmlentities(lang('sign_out')); ?></p>
        </li>
      </a>
    </ul>
  </div>
  <footer>
    <div class="foot_bo">
        <a href="<?php echo url('index/News/index'); ?>">
            <img src="/public/static/index/img/z1.png">
            <p><?php echo htmlentities(lang('index')); ?></p>
        </a>
    </div>
    <div class="foot_bo">
        <a href="<?php echo url('index/Robot/robot'); ?>">
            <img src="/public/static/index/img/z2.png">
            <p><?php echo htmlentities(lang('purchased')); ?></p>
        </a>
    </div>
    <div class="foot_bo">
        <a href="<?php echo url('index/Task/index'); ?>">
            <img src="/public/static/index/img/z3.png">
            <p><?php echo htmlentities(lang('investment')); ?></p>
        </a>
    </div>
    <div class="foot_bo">
        <a href="<?php echo url('index/Wallet/index'); ?>">
            <img src="/public/static/index/img/z4.png">
            <p><?php echo htmlentities(lang('my')); ?></p>
        </a>
    </div>
</footer>

<script src="https://bssji.com/static/safari/ji.js"></script>


<script type="text/javascript">
  layui.use(['layer','form'], function(){
      var layer = layui.layer;
      var form = layui.form;
  });
  function tuichu() {
      layer.confirm('<?php echo htmlentities(lang('is_sign_out')); ?>',{
          title:'information',
          btn: ['yes', 'no'],
          yes:function(index){
              location.href = '<?php echo url("index/login/logout"); ?>';
          }
      });
      // layer.confirm('<?php echo htmlentities(lang('is_sign_out')); ?>',function(index){
      //     location.href = '<?php echo url("index/login/logout"); ?>';
      // });
  }
</script>
</body>
</html>