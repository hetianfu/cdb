<?php /*a:4:{s:55:"/opt/homebrew/var/www/cdb/app/index/view/index/tgm.html";i:1645414696;s:59:"/opt/homebrew/var/www/cdb/app/index/view/public/header.html";i:1632829660;s:57:"/opt/homebrew/var/www/cdb/app/index/view/public/kefu.html";i:1645409425;s:57:"/opt/homebrew/var/www/cdb/app/index/view/public/foot.html";i:1631773952;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo htmlentities(lang('fx_invite_code')); ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="stylesheet" type="text/css" href="/public/static/index/style.css">
<link rel="stylesheet" type="text/css" href="/public/static/index/layui/css/layui.css">
<script type="text/javascript" src="/public/static/index/js/jquery.js"></script>
<script type="text/javascript" src="/public/static/index/layui/layui.js"></script>


	<script type="text/javascript">
	document.write(`<div id="Service" style="position:fixed;right:0;top:50%;display:flex;align-items:center;z-index:999;">

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
		.fuzhi {
			text-align: center;
		}
		
		.fuzhi button {
			width: 10rem;
		}
	</style>
</head>
<body>

<div class="header">
	<span><?php echo htmlentities(lang('fx_invite_code')); ?></span>
</div>
<div class="back">
	<a href="javascript:history.go(-1);"><i class="layui-icon">&#xe603;</i></a>
</div>

<div style="clear: both;"></div>
<div style="padding: 0.5rem 4% 6rem;box-sizing: border-box;width: 100%;text-align: center;">
	<img id="sharedImg" src="<?php echo htmlentities($erwei); ?>" style="width:auto; max-width: 100%; height: auto; max-height: 100%;">
	<p><?php echo htmlentities(lang('fx_invite_code')); ?>：<?php echo htmlentities($code); ?></p>
</div>
<div class="fuzhi">
	<button class="layui-btn" id="copy" data-keyCode="111"><?php echo htmlentities(lang('fx_copy_key_code')); ?></button>
</div>
<div class="fuzhi" style="margin-top: 20px">
	<button class="layui-btn" id="fuzhi"><?php echo htmlentities(lang('fx_copy')); ?></button>
</div>
<div class="fuzhi">
	<a style="width: 160px;margin-top: 20px" class="layui-btn" href="<?php echo htmlentities($erwei); ?>" download=""><?php echo htmlentities(lang('save_qrcode')); ?></a>
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
	layui.use(['layer', 'form'], function () {
		var layer = layui.layer;
		var form = layui.form;
	});
	
	$('#fuzhi').on('click', function () {
		copyUrl($(this));
	});
	
	function copyUrl(obj) {
		var url = '<?php echo htmlentities($url); ?>';
		if ($('#urlText').length == 0) {
			// 创建input
			obj.after('<input id="urlText" style="position:fixed;top:-200%;left:-200%;" type="text" value=' + url + '>');
		}
		$('#urlText').select(); //选择对象
		document.execCommand("Copy"); //执行浏览器复制命令
		layer.msg("<?php echo htmlentities(lang('fx_copy_ok')); ?>");
	}
	
	$('#copy').on('click', function () {
		var keycode = "<?php echo htmlentities($code); ?>"
		if ($('#keycode').length == 0) {
			// 创建input
			$(this).after('<input id="keycode" style="position:fixed;top:-200%;left:-200%;" type="text" value=' + keycode + '>');
		}
		$('#keycode').select(); //选择对象
		document.execCommand("Copy"); //执行浏览器复制命令
		layer.msg("<?php echo htmlentities(lang('fx_copy_ok')); ?>");
	});

</script>
</body>
</html>
