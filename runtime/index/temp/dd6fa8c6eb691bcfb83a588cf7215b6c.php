<?php /*a:4:{s:61:"/www/wwwroot/hgcdb.test138.com/app/index/view/index/card.html";i:1632987785;s:64:"/www/wwwroot/hgcdb.test138.com/app/index/view/public/header.html";i:1632829661;s:62:"/www/wwwroot/hgcdb.test138.com/app/index/view/public/kefu.html";i:1616171411;s:62:"/www/wwwroot/hgcdb.test138.com/app/index/view/public/foot.html";i:1631773953;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo htmlentities(lang('yh_bankcard')); ?></title>
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
		ul {
			list-style-type: none;
			padding-left: 5px;
			margin-bottom: -2px
		}
		
		.tab {
			width: 500px;
			margin: 10px auto
		}
		
		a {
			text-decoration: none;
		}
		
		.title li {
			display: inline-block;
			border: 1px solid #999;
			border-bottom: 2px solid #a00;
			background: #fff;
			text-align: center;
			width: 300px;
			height: 30px;
			margin: 0 1px;
			line-height: 30px
		}
		
		.title .active {
			border-top: 2px solid #a00;
			border-bottom: 2px solid #fff;
		}
		
		#content {
			margin: 0;
			border: 1px solid #ccc;
			border-top: 2px solid #a00;
			width: 300px
		}
		
		#content div {
			display: none;
			padding: 10px 0
		}
		
		#content .mod {
			display: block;
		}
	</style>
</head>
<body>
<div class="header">
	<span><?php echo htmlentities(lang('yh_bankcard')); ?></span>
</div>
<div class="back">
	<a href="javascript:history.go(-1);"><i class="layui-icon">&#xe603;</i></a>
</div>
<div style="clear: both;"></div>
<div class="layui-container" style="min-height: 600px;">
	<form class="layui-form" id="groupForm">
		<div class="mod">
			<div class="layui-form-item">
				<input type="text" name="bank_name" placeholder="<?php echo lang('in_bankname'); ?>" value="<?php echo !empty($list['bank_name']) ? htmlentities($list['bank_name']) : ''; ?>" autocomplete="off"
				       class="layui-input">
			</div>
			
			<div class="layui-form-item">
				<input type="text" name="receiver_telephone" placeholder="<?php echo lang('in_phone'); ?>" value="<?php echo !empty($list['receiver_telephone']) ? htmlentities($list['receiver_telephone']) : ''; ?>" autocomplete="off"
				       class="layui-input">
			</div>
			
			<!--收款人姓名-->
			<div class="layui-form-item">
				<input type="text" name="account_name" placeholder="<?php echo lang('in_realname'); ?>" value="<?php echo !empty($list['account_name']) ? htmlentities($list['account_name']) : ''; ?>"
				       autocomplete="off" class="layui-input">
			</div>
	
			<!--收款卡号-->
			<div class="layui-form-item">
				<input type="text" name="account_no" placeholder="<?php echo lang('in_bankcard'); ?>" value="<?php echo !empty($list['account_no']) ? htmlentities($list['account_no']) : ''; ?>" autocomplete="off"
				       class="layui-input">
			</div>
	
		
		</div>
		<div class="layui-form-item " style="text-align: center;margin-top: 60px">
			<a href="javascript:;" class="layui-btn" lay-submit lay-filter="formDemo" id="sendbtn"><?php echo htmlentities(lang('yh_submit')); ?></a>
		</div>
	</form>
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
	layui.use(['layer', 'form', 'laydate'], function () {
		var layer = layui.layer;
		var form = layui.form;
		var laydate = layui.laydate;
		laydate.render({
			elem: '#date', //指定元素
			lang: 'en',
			value: "<?php echo !empty($list['birth_date']) ? htmlentities($list['birth_date']) : ''; ?>"
		});
		form.on('submit(formDemo)', function (data) {
			$.ajax({
				url: "<?php echo url('index/index/addcardpost'); ?>",
				type: "post",
				data: $('#groupForm').serialize(),
				success: function (res) {
					if (res.status) {
						layer.msg(res.msg, {icon: 6}, function () {
							location.reload();
							var index = layer.getFrameIndex(window.name);
							layer.close(index);
						});
					} else {
						layer.msg(res.msg, {icon: 5}, function () {
							var index = layer.getFrameIndex(window.name);
							layer.close(index);
						});
						return false;
					}
				}
			});
			return false;
		})
		
	});
	
	
	$(function () {
		$(".title li").click(function () {
			$(this).addClass("active").siblings().removeClass("active");
			$(".mod").eq($(".title li").index(this)).show().siblings(".mod").hide();
		});
	});
</script>
</body>
</html>