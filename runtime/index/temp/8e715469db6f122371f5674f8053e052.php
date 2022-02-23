<?php /*a:4:{s:61:"/www/wwwroot/wetbc.cc/app/index/view/wallet/withdrawnlog.html";i:1615959642;s:55:"/www/wwwroot/wetbc.cc/app/index/view/public/header.html";i:1632829660;s:53:"/www/wwwroot/wetbc.cc/app/index/view/public/kefu.html";i:1633281194;s:53:"/www/wwwroot/wetbc.cc/app/index/view/public/foot.html";i:1631773952;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlentities(lang('tx_record')); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="stylesheet" type="text/css" href="/public/static/index/style.css">
<link rel="stylesheet" type="text/css" href="/public/static/index/layui/css/layui.css">
<script type="text/javascript" src="/public/static/index/js/jquery.js"></script>
<script type="text/javascript" src="/public/static/index/layui/layui.js"></script>


    <script type="text/javascript">
	document.write(`<div id="Service" style="position:fixed;right:0;top:50%;display:flex;align-items:center;z-index:999;">
        <ul style="width:0;overflow:hidden;transition: width 0.8s;">
           <a href="javascript:void(0)"  hr="<?php echo htmlentities($kefu1); ?>" id="a1"><li style="padding:5px;">고객센터 카카오톡 아이디 : WET001</li></a>   
           <a href="javascript:void(0)"  hr="<?php echo htmlentities($kefu2); ?>" id="a2"><li style="padding:5px;">고객센터 회선아이디 : wet-service2</li></a>     
           
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

    <div class="header">
        <span><?php echo htmlentities(lang('tx_record')); ?></span>
    </div>
    <div class="back">
        <a href="javascript:history.go(-1);"><i class="layui-icon">&#xe603;</i></a>
    </div>

    <div style="clear: both;"></div>

    <div class="tixianlog">
        <p class="p1"><?php echo htmlentities(lang('tx_success')); ?>(<?php echo htmlentities(lang('tx_cny')); ?>)</p>
        <p class="p2"><?php echo htmlentities(lang('tx_unit')); ?><?php echo htmlentities($tixian_sum); ?></p>
        <p class="p3"><?php echo htmlentities(lang('tx_wait')); ?>:<?php echo htmlentities($no_tixian_sum); ?></p>
    </div>

    <div class="tixianlogbox">
        <ul>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <li>
                <p class="p1"><?php echo htmlentities(lang('tx_balance')); ?><span><?php echo htmlentities(lang('tx_unit')); ?><?php echo htmlentities($v['payment']); ?></span></p>
                <p class="p2"><?php if($v['status'] == 0): ?> <?php echo htmlentities(lang('tx_not_examine')); elseif($v['status'] == 1): ?> <?php echo htmlentities(lang('tx_ok_examine')); else: ?> <?php echo htmlentities(lang('tx_refuse')); ?> <?php endif; ?><span><?php echo htmlentities(lang('tx_charge')); ?><?php echo htmlentities(lang('tx_unit')); ?><?php echo htmlentities($v['charge']); ?></span></p>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
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
    //登录操作
    $("#sendbtn").click(function(){
        var account = $("#username").val();
        var password = $("#password").val();
        $.ajax({
            type:'post',
            url:'<?php echo url("index/Login/index"); ?>',
            data:{account:account,password:password},
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