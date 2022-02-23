<?php /*a:4:{s:56:"/opt/homebrew/var/www/cdb/app/index/view/news/index.html";i:1645585028;s:59:"/opt/homebrew/var/www/cdb/app/index/view/public/header.html";i:1645579026;s:57:"/opt/homebrew/var/www/cdb/app/index/view/public/kefu.html";i:1645579026;s:57:"/opt/homebrew/var/www/cdb/app/index/view/public/foot.html";i:1645579026;}*/ ?>
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

        <img id="kefu" data-link="<?php echo htmlentities($customer); ?>" style="width:55px;height:55px" src="/public/static/index/img/customer.png" alt="..." />
    </div>`)
      $('#Service').click(function (){
        $('#Service ul').css({
            'width':'95px'
        })
    })

  $('#kefu').click(function(){
    var kefu = $(this).attr('data-link')
    location.href='https://wa.me/'+kefu;
  });
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
                <div class="lr zhouqi">
                  <?php if($v['type'] == 1): ?><?php echo htmlentities(lang('current')); else: ?>  <?php echo htmlentities(lang('on_regular_basis')); ?>
                  <?php endif; ?>

                </div>
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
    <?php echo lang('profit'); ?>
    
    <!-- 走马灯 -->
    
    
    <div class="zmd">
        <div class="container">
            <ul class="content">
                <li>90****5361 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>5253</li>
                <li>90****7493 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>4100</li>
                <li>90****5084 <?php echo lang('cash_withdrawal'); ?>  <?php echo config('app.currency'); ?>29000</li>
                <li>90****4715 <?php echo lang('cash_withdrawal'); ?>  <?php echo config('app.currency'); ?>238800</li>
                <li>90****6756 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>51800</li>
                <li>90****5387 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>21800</li>
                <li>90****2699  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>50000</li>
                <li>90****9575 <?php echo lang('cash_withdrawal'); ?> <?php echo config('app.currency'); ?>660000</li>
                <li>90****1012  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>1000000</li>
                <li>90****3174 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>1460</li>
                <li>90****5863 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>3570</li>
                <li>90****5092 <?php echo lang('cash_withdrawal'); ?>   <?php echo config('app.currency'); ?>34000</li>
                <li>90****5385  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>500000</li>
                <li>90****6753 <?php echo lang('cash_withdrawal'); ?>  <?php echo config('app.currency'); ?>24800</li>
                <li>90****2712 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>55300</li>
                <li>90****6683 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>15700</li>
                <li>90****1065  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>1000000</li>
                <li>90****7877 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>2220</li>
                <li>90****7198 <?php echo lang('cash_withdrawal'); ?>   <?php echo config('app.currency'); ?>59000</li>
                <li>90****2672 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>49800</li>
                <li>90****3141  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>1000000</li>
                <li>90****6585 <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>1000000</li>
                <li>90****1365  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>2000000</li>
                <li>90****0962  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>1000000</li>
                <li>90****7808  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>1000000</li>
                <li>90****6935 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>8200</li>
                <li>90****2002 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>8200</li>
                <li>90****2721  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>500000400</li>
                <li>90****3154 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>39000</li>
                <li>90****2837 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>59000</li>
                <li>90****5771 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>3320</li>
                <li>90****7505 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>33790</li>
                <li>90****2968 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>46000</li>
                <li>90****6862  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>100000</li>
                <li>90****2172  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>200000</li>
                <li>90****1020 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>12880</li>
                <li>90****6555 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>25470</li>
                <li>90****2572  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>2000000</li>
                <li>90****4290  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>5000000</li>
                <li>90****5535  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>1000000</li>
                <li>90****9912  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>1000000</li>
                <li>90****1514 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>35600</li>
                <li>90****5266 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>33250</li>
                <li>90****2223 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>6500</li>
                <li>90****5526 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>3000</li>
                <li>90****4757 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>38900</li>
                <li>90****8246 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>331000</li>
                <li>90****2915 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>5570</li>
                <li>90****6722  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>500000</li>
                <li>90****8842 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>23500</li>
                <li>90****6925 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>47100</li>
                <li>90****1157  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>200000</li>
                <li>90****2569  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>1000000</li>
                <li>90****5238  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>100000</li>
                <li>90****4820 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>28600</li>
                <li>90****2556 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>2000</li>
                <li>90****6179 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>3660</li>
                <li>90****4536  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>200000</li>
                <li>90****5237 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>4490</li>
                <li>90****5356 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>5050</li>
                <li>90****2969 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>1610</li>
                <li>90****3816  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>5000000</li>
                <li>90****8358 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>3040</li>
                <li>90****1540 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>14100</li>
                <li>90****8923 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>6600</li>
                <li>90****2568  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>1340</li>
                <li>90****6150 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>1000000</li>
                <li>90****4230  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>5000000</li>
                <li>90****2620  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>2000000</li>
                <li>90****6674 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?> 17600</li>
                <li>90****7987 <?php echo lang('cash_withdrawal'); ?>    <?php echo config('app.currency'); ?>15300</li>
                <li>90****2356 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>35400</li>
                <li>90****2274  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>1000000</li>
                <li>90****4831 <?php echo lang('profit'); ?> <?php echo config('app.currency'); ?>24500</li>
                <li>90****1026 <?php echo lang('cash_withdrawal'); ?> <?php echo config('app.currency'); ?>36000</li>
                <li>90****6809  <?php echo lang('cz_recharge'); ?> <?php echo config('app.currency'); ?>1000000</li>
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
