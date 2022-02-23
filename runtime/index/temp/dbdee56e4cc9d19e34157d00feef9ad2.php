<?php /*a:4:{s:52:"/www/wwwroot/wetbc.cc/app/index/view/task/index.html";i:1633152172;s:55:"/www/wwwroot/wetbc.cc/app/index/view/public/header.html";i:1632829660;s:53:"/www/wwwroot/wetbc.cc/app/index/view/public/kefu.html";i:1633281194;s:53:"/www/wwwroot/wetbc.cc/app/index/view/public/foot.html";i:1631773952;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo htmlentities(lang('investment')); ?></title>
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
  <link rel="stylesheet" type="text/css" href="/public/static/custom.css">
  <style>
    .header{height: 40px;}
    .product-item{
      width: 45%;
      height: 80px;
      border-radius: 6px;
      margin-top: 10px;
      margin-left: 10px;
      border: 1px solid #ccc;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 14px;
    }
  </style>
</head>
<body>

<!-- 产品内容 -->
<div class="sharebox" style="text-align: center;">
  <div class="header bg-success text-white font-md"><?php echo htmlentities(lang('investment')); ?></div>
  <div class="position-relative">
    <div class="bg-success " style="height: 120px;border-radius: 0 0 40%  40%"></div>
    <div class="position-absolute w-100 top-0 " >
      <div class="px-1 pt-1">
        <div class="bg-white rounded shadow py-2">
          <span class="font-md"><?php echo lang('total_investment_amount'); ?></span>
          <p class="font-big mt-1 " style="font-size: 36px"><?php echo lang('tx_cny'); ?> <?php echo htmlentities($investmentAmount); ?> </p>
         
          <div class="d-flex mt-2 font">
            <div class="d-flex flex-1 flex-column a-center j-center">
              <span><?php echo lang('yesterdays_earnings'); ?></span>
              <p><?php echo htmlentities($yesterdaysEarnings); ?></p>
            </div>
            <div class="d-flex flex-1 flex-column a-center j-center">
              <span><?php echo lang('cumulative_income'); ?></span>
              <p><?php echo htmlentities($profitAll); ?></p>
            </div>
            <div class="d-flex flex-1 flex-column a-center j-center">
              <span><?php echo lang('account_balance'); ?></span>
              <p><?php echo htmlentities($balance); ?></p>
            </div>
         
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="px-1 " style="margin-top: 78px">
    <div class="bg-white  shadow  rounded pb-1 ">
      <h2 class="title rounded font text-left pl-1 bg-success text-white py-1" style="border-radius:4px 4px 0 0 "><?php echo lang('select_investment_products'); ?></h2>
      <div class=" d-flex flex-wrap">
        <?php foreach($list as $key =>$val): ?>
        <a data-pid="<?php echo htmlentities($val['id']); ?>" class="d-flex flex-column product-item <?php echo $key==0 ? 'border-success' : ''; ?>" href="javascript:">
          <span><?php echo htmlentities($val['title']); ?></span>
          <span><?php echo htmlentities($val['yxzq']); ?><?php echo lang('day'); ?></span>
          <span><?php echo lang('daily_increase'); ?><?php echo intval($val['day_shouyi']); ?>%</span>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  
  <div class="px-1 " style="margin-top: 10px">
    <div class="bg-white  shadow  rounded  ">
      <div class="mt-1 d-flex  a-center p-1">
       <span class="font-lg"><?php echo lang('tx_cny'); ?></span> <input name="money"  class="ml-1 functions flex-1 border-0 font-lg" min="6" placeholder="<?php echo lang('balance_transfer_in'); ?>" style="height: 40px" type="number">
      </div>
    </div>
  </div>
  <div class="px-1 " style="margin-top: 20px;padding-bottom: 20px">
    <a href="javascript:" id="submit" class="bg-success d-flex j-center a-center rounded py-1 text-white font-md" style="height: 32px"><?php echo lang('to_change_into'); ?></a>
<!--    <a class=" d-flex  j-center a-center rounded border border-success py-1 text-white font-md mt-1" style="height: 32px;color:#61be49">投资记录</a>-->
  </div>
  
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
  layui.use(['layer','jquery'], function(){
    var layer = layui.layer;
    var $ = layui.jquery;
    var nowPid = 9
    var money = 0
  
    // 选择产品
    $('.product-item').each(function (key,val){
      if($(val).hasClass('border-success')){
        nowPid = $(val).data('pid');
      }
      $(val).click(function (){
        nowPid = $(this).data('pid');
        $(this).parent().find('.border-success').removeClass('border-success');
        $(this).addClass('border-success')
      })
    })
    
    // 投资金额验证
    $("input[name='money']").blur(function (){
      let val = $(this).val();
      if(val < 100000){
        layer.msg("<?php echo lang('min_investment'); ?> "+"<?php echo lang('zc_unit'); ?>"+100000);
        return;
      }
      money = val;
    })
    
    $("#submit").click(function (){
      if(money < 100000){
        layer.msg("<?php echo lang('min_investment'); ?> "+"<?php echo lang('zc_unit'); ?>"+100000);
        return;
      }
  
      layer.confirm('<?php echo htmlentities(lang('sy_is_buy')); ?>',{
        title:false,
        btn: ['<?php echo htmlentities(lang('confirm')); ?>', '<?php echo htmlentities(lang('cancel')); ?>'],
        yes:function(index){
          $.ajax({
            url:'/index/Robot/invest',
            type:'POST',
            data:{id:nowPid,money},
            success:function (res){
              if(!res.status){
                layer.msg(res.msg)
                return;
              }
              window.location = '/index/Robot/robot'
            }
          })
        }
      });
      
      
    })
    
  });
</script>
</body>
</html>