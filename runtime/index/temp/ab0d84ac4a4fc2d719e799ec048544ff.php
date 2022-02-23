<?php /*a:4:{s:61:"/www/wwwroot/hgcdb.test138.com/app/index/view/news/index.html";i:1633008028;s:64:"/www/wwwroot/hgcdb.test138.com/app/index/view/public/header.html";i:1632829661;s:62:"/www/wwwroot/hgcdb.test138.com/app/index/view/public/kefu.html";i:1616171411;s:62:"/www/wwwroot/hgcdb.test138.com/app/index/view/public/foot.html";i:1631773953;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlentities(lang('index')); ?></title>
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
    <script type="text/javascript" src="/public/static/index/js/TouchSlide.1.1.js"></script>
    <style type="text/css">
        .zmd{position:fixed;bottom: 60px;width: 100%;z-index: 98;}
        .container{width:100%;height:2rem;background: rgba(0,140,214,0.5);position:relative;overflow:hidden;}
        .content{width: 100%;font-size: 0.82rem;line-height: 2rem;color: #fff;position:absolute;text-align:center}
        .content>span{color: #f00;font-weight: bold;}
        @keyframes move{
            from{transform:translateX(0%);}to{transform:translateX(-120%);}
        }
        .gonggao{width: 60%;height: 20rem;background-color: #fff;position: absolute;left: 50%;padding: 1rem;
            top: 50%;transform: translate(-50%,-50%);overflow: auto;}
        .gonggao h3{padding-bottom: 0.2rem;}
    </style>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<!-- 尺寸的设置以及页面是否允许缩放 -->
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
<!-- 删除苹果默认的工具栏和菜单栏 -->
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
</head>
<body>
    <div style="padding-top: 1rem;"></div>
    <!-- 轮播图 -->
    <div class="page-content" style="background: #fff;padding: 20px 0 10px;">
        <div class="slideBox" id="slideBox">
            <div class="bd" style="margin-top: 0px;">
                <ul>
                    <?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li><a class="pic" href="<?php echo htmlentities($vo['url']); ?>"><img src="<?php echo htmlentities($vo['pic']); ?>" style="height:160px;"></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="hd">
                <ul></ul>
            </div>
        </div>
    </div>

    <div style="clear: both;"></div>

    <!-- 产品内容 -->
    <div class="layui-container" style="padding-bottom: 10rem;">
        <?php if(is_array($robot) || $robot instanceof \think\Collection || $robot instanceof \think\Paginator): $i = 0; $__LIST__ = $robot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <div class="probox" style="padding-top: 1rem;">
            <div class="index_tr1">
                <div class="lf pic"><img src="<?php echo htmlentities($v['thumb']); ?>"></div>
                <div class="lf txt"><?php echo htmlentities($v['title']); ?></div>
                <div class="lr zhouqi"><?php echo htmlentities($v['yxzq']); ?> <?php echo htmlentities(lang('sy_day')); ?></div>
            </div>
            <div style="clear: both;"></div>
            <div class="index_tr2">
                <div class="lf">
                    <p class="p1" style="font-size: 12px"><?php echo config('app.currency'); ?><?php echo htmlentities($v['day_shouyi']); ?></p>
                    <p class="p2"><?php echo htmlentities(lang('sy_day_revenue')); ?></p>
                </div>
                <div class="lf">
                    <p class="p1" style="font-size: 12px"><?php echo config('app.currency'); ?><?php echo htmlentities($v['Month_income']); ?></p>
                    <p class="p2"><?php echo htmlentities(lang('sy_yue_revenue')); ?></p>
                </div>
                <div class="lf">
                    <p class="p1" style="font-size: 12px"><?php echo config('app.currency'); ?><?php echo htmlentities($v['price']); ?></p>
                    <p class="p2"><?php echo htmlentities(lang('sy_buy_fee')); ?></p>
                </div>
                <div class="lf">
                    <a class="gmbtn" onclick="fenhong(this,'<?php echo htmlentities($v['id']); ?>')" href="javascript:;"><?php echo htmlentities(lang('sy_buy')); ?></a>
                </div>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

    <!-- 走马灯 -->
    <div class="zmd">
        <div class="container">
            <ul class="content">
                <li>010****7492 {:lang('profit')} <?php echo config('app.currency'); ?>4100</li>
                <li>897****536 {:lang('profit')} 5253<?php echo config('app.currency'); ?></li>
                <li>730****508 <?php echo lang('cash_withdrawal'); ?>  <?php echo config('app.currency'); ?>29000</li>
                <li>833****471 <?php echo lang('cash_withdrawal'); ?>  <?php echo config('app.currency'); ?>238800</li>
                <li>843****675 {:lang('profit')} 51800<?php echo config('app.currency'); ?></li>
                <li>897****538 {:lang('profit')} 21800<?php echo config('app.currency'); ?></li>
                <li>899****269  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>50000</li>
                <li>635****957 <?php echo lang('cash_withdrawal'); ?> <?php echo config('app.currency'); ?>660000</li>
                <li>957****101  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>1000000</li>
                <li>765****317 {:lang('profit')} 146<?php echo config('app.currency'); ?></li>
                <li>820****586 {:lang('profit')} 357<?php echo config('app.currency'); ?></li>
                <li>808****509 <?php echo lang('cash_withdrawal'); ?>   <?php echo config('app.currency'); ?>3400</li>
                <li>897****538  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>500000</li>
                <li>910****675 <?php echo lang('cash_withdrawal'); ?>  <?php echo config('app.currency'); ?>24800</li>
                <li>899****271 {:lang('profit')} 55300<?php echo config('app.currency'); ?></li>
                <li>996****668 {:lang('profit')} 15700<?php echo config('app.currency'); ?></li>
                <li>902****106  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>1000000</li>
                <li>620****787 {:lang('profit')} 222<?php echo config('app.currency'); ?></li>
                <li>933****719 <?php echo lang('cash_withdrawal'); ?>   <?php echo config('app.currency'); ?>59000</li>
                <li>899****267 {:lang('profit')} 498<?php echo config('app.currency'); ?></li>
                <li>765****314  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>1000000</li>
                <li>996****658  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>1000000</li>
                <li>987****136  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>2000000</li>
                <li>902****096  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>1000000</li>
                <li>620****780  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>1000000</li>
                <li>733****693 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>8200</li>
                <li>821****200 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>8200</li>
                <li>899****272  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>500000400</li>
                <li>765****315 {:lang('profit')} 390<?php echo config('app.currency'); ?></li>
                <li>984****283 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>59000</li>
                <li>787****577 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>3320</li>
                <li>911****750 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>33790</li>
                <li>901****298 {:lang('profit')} 4600<?php echo config('app.currency'); ?></li>
                <li>843****686  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>100000</li>
                <li>899****272  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>200000</li>
                <li>957****100 {:lang('profit')} 1288<?php echo config('app.currency'); ?></li>
                <li>955****655 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>25470</li>
                <li>899****272  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>2000000</li>
                <li>720****490  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>5000000</li>
                <li>897****535  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>1000000</li>
                <li>712****992  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>1000000</li>
                <li>902****114 {:lang('profit')} 356<?php echo config('app.currency'); ?></li>
                <li>742****566 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>33250</li>
                <li>852****223 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>6500</li>
                <li>639****556 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>3000</li>
                <li>720****477 {:lang('profit')} 3890<?php echo config('app.currency'); ?></li>
                <li>786****846 {:lang('profit')} 3310<?php echo config('app.currency'); ?></li>
                <li>901****295 {:lang('profit')} 5570<?php echo config('app.currency'); ?></li>
                <li>843****672  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>500000</li>
                <li>701****882 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>23500</li>
                <li>704****695 {:lang('profit')} 4710<?php echo config('app.currency'); ?></li>
                <li>902****117  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>200000</li>
                <li>899****269  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>1000000</li>
                <li>897****538  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>100000</li>
                <li>720****480 {:lang('profit')} 2860<?php echo config('app.currency'); ?></li>
                <li>834****256 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>2000</li>
                <li>843****679 {:lang('profit')} 3660<?php echo config('app.currency'); ?></li>
                <li>720****456  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>200000</li>
                <li>897****537 {:lang('profit')} 4490<?php echo config('app.currency'); ?></li>
                <li>897****536 {:lang('profit')} 5050<?php echo config('app.currency'); ?></li>
                <li>899****269 {:lang('profit')} 1610<?php echo config('app.currency'); ?></li>
                <li>765****316  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>5000000</li>
                <li>786****838 {:lang('profit')} 3040<?php echo config('app.currency'); ?></li>
                <li>987****140 {:lang('profit')} 1410<?php echo config('app.currency'); ?></li>
                <li>834****893 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>6600</li>
                <li>899****268  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>1340</li>
                <li>778****610 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>1000000</li>
                <li>600****430  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>5000000</li>
                <li>811****260  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>2000000</li>
                <li>843****664 {:lang('profit')} 176<?php echo config('app.currency'); ?></li>
                <li>998****797 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>15300</li>
                <li>811****236 {:lang('profit')} 35400<?php echo config('app.currency'); ?></li>
                <li>899****274  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>1000000</li>
                <li>720****481 {:lang('profit')} 2450<?php echo config('app.currency'); ?></li>
                <li>876****106 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>3600</li>
                <li>704****689  {:lang('cz_recharge')} <?php echo config('app.currency'); ?>1000000</li>
            </ul>
        </div>
    </div>
    <?php if($gonggao): ?>
    <!-- 弹窗公告 -->
    <div id="fixedid" style="position: fixed;width: 100%;height: 100%;background-color: rgba(0,0,0,.9);left: 0;top: 0;z-index: 999">

        <div class="gonggao">
            <div style="font-size: 18px;position: absolute;right: 10px;top: 6px;">x</div>
            <p style="padding-top: 1rem;"><?php echo $gonggao; ?></p>
            
        </div>
    </div>
    <?php endif; ?>

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
  var AutoScroll = function(a) {
     $(a).find("ul:first").animate( {
            marginTop : "-20px"
       }, 500, function() {
         $(this).css( {
            marginTop : "0px"
         }).find("li:first").appendTo(this)
            })
       }
        if ($(".container ul li").length > 0) {
            setInterval('AutoScroll(".container")', 2000)
          } 
        //   asd
     $('#fixedid').click(function (){
        $(this).hide()
     })
    // 轮播图
    TouchSlide({
        slideCell:"#slideBox",
        titCell:"#slideBox .hd ul",
        mainCell:"#slideBox .bd ul",
        effect:"leftLoop",
        autoPage:true,
        autoPlay:true,
        interTime:3000
    });

    layui.use(['layer','form'], function(){
        var layer = layui.layer;
        var form = layui.form;
    });

    function fenhong(obj,id) {
        layer.confirm('<?php echo htmlentities(lang('sy_is_buy')); ?>',{
            title:false,
            btn: ['<?php echo htmlentities(lang('confirm')); ?>', '<?php echo htmlentities(lang('cancel')); ?>'],
            yes:function(index){
                $.ajax({
                    url:"<?php echo url('Robot/buy'); ?>",
                    type:'post',
                    data:{id:id},
                    success:function(res){
                        if(res.status){
                            layer.msg(res.msg, {icon: 6},function () {
                                location.reload();
                            });
                        }else{
                            layer.msg(res.msg);
                        }
                    }
                });
            }
        });
    }

</script>
</body>
</html>