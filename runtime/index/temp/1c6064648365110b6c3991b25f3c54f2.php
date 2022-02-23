<?php /*a:4:{s:67:"/www/wwwroot/hgcdb.test138.com/app/index/view/wallet/withdrawn.html";i:1632822506;s:64:"/www/wwwroot/hgcdb.test138.com/app/index/view/public/header.html";i:1632829661;s:62:"/www/wwwroot/hgcdb.test138.com/app/index/view/public/kefu.html";i:1616171411;s:62:"/www/wwwroot/hgcdb.test138.com/app/index/view/public/foot.html";i:1631773953;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlentities(lang('wit_withdraw')); ?></title>
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
    <div class="header">
        <span><?php echo htmlentities(lang('wit_withdraw')); ?></span>
    </div>
    <div class="back">
        <a href="javascript:history.go(-1);"><i class="layui-icon">&#xe603;</i></a>
    </div>

    <div style="clear: both;"></div>

    <div class="my_withdrawn_top">
        <span class="lf"><?php echo htmlentities(lang('wit_apply')); ?></span>
        <span class="lr"><a href="<?php echo url('index/Wallet/withdrawnlog'); ?>" style="color: #ddb4a5;"><?php echo htmlentities(lang('wit_record')); ?></a></span>
    </div>
    <div style="clear: both;"></div>

    <div class="layui-container">
        <form class="layui-form" id="groupForm">
            <input type="hidden" name="type" value="1">
            <input type="hidden" name="__token__" value="<?php echo token(); ?>" />
            <div class="layui-form-item">
                <input type="text" name="money" placeholder="<?php echo htmlentities(lang('wit_money')); ?>" autocomplete="off" class="layui-input">
            </div>
<!--            <input type="hidden" name="qudao" value="Ydpay" />-->
<!--            <div class="layui-form-item" style="display:block;">-->
<!--                <select name="qudao" lay-verify="required">-->
<!--                    <option value="">Por favor, seleccione</option>-->
<!--                    <?php if(is_array($tong) || $tong instanceof \think\Collection || $tong instanceof \think\Paginator): $k = 0; $__LIST__ = $tong;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>-->
<!--                    <option value="<?php echo htmlentities($vo['mark']); ?>" <?php if($k == 1): ?> selected="selected" <?php endif; ?>><?php echo htmlentities($vo['channel_name']); ?></option>-->
<!--                    <?php endforeach; endif; else: echo "" ;endif; ?>-->
<!--                </select>-->
<!--            </div>-->

            <div class="layui-form-item">
                <p style="margin-left: 10px;color: #8f8f94;"><?php echo htmlentities(lang('wit_tips')); ?>：<?php echo htmlentities(lang('wit_fee')); ?><?php echo htmlentities($charge); ?>%</p>
            </div>

            <div class="layui-form-item" style="text-align: center;">
                <button class="layui-btn" lay-submit lay-filter="formDemo" id="sendbtn"><?php echo htmlentities(lang('wit_submit')); ?></button>
            </div>
            <div style="color: #8f8f94;">
                <?php echo $content; ?>
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
    layui.use(['layer','form'], function(){
        var layer = layui.layer;
        var form = layui.form;
        
        //监听提交
        form.on('submit(formDemo)', function(data){
            
           var money = $("input[name='money']").val();
           
           if(money < 1){
               return
           }
            
            layer.confirm('<?php echo htmlentities(lang('cash_withdrawal'). lang('zc_unit')); ?> '+ money,{
                title:false,
                btn: ['<?php echo htmlentities(lang('confirm')); ?>', '<?php echo htmlentities(lang('cancel')); ?>'],
                yes:function(index){
                    $.ajax({
                        url:'<?php echo url("index/Wallet/withpost_api"); ?>',
                        type:"post",
                        data:$('#groupForm').serialize(),
                        success:function(res){
                            if(res.status){
                                // window.location.href = 'http://www.fgwhthjtnjg.top/index/Wallet/withpostfrom?order='+res.order;
                                layer.msg(res.msg, {icon: 6},function () {
                                    location.reload();
                                    var index = layer.getFrameIndex(window.name);
                                    layer.close(index);
                                });
                            }else{
                                layer.msg(res.msg, {icon: 5},function () {
                                    var index = layer.getFrameIndex(window.name);
                                    layer.close(index);
                                });
                                return false;
                            }
                        }
                    });
                }
            });
            
            
           
            return false;
        })
    });

</script>
</body>
</html>