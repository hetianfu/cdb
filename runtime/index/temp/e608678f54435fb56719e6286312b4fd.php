<?php /*a:2:{s:63:"/www/wwwroot/wetbc.cc/app/index/view/wallet/onlinerecharge.html";i:1632896504;s:55:"/www/wwwroot/wetbc.cc/app/index/view/public/header.html";i:1632829660;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlentities(lang('cz_recharge')); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="stylesheet" type="text/css" href="/public/static/index/style.css">
<link rel="stylesheet" type="text/css" href="/public/static/index/layui/css/layui.css">
<script type="text/javascript" src="/public/static/index/js/jquery.js"></script>
<script type="text/javascript" src="/public/static/index/layui/layui.js"></script>


    
    <style type="text/css">
        .layui-form-item .ys{border: 1px #61be49 solid;border-radius: 0.5rem;height: 50px;line-height: 50px;}
        .money_check{
            margin-top: 0.2rem;
            padding: 0 4%;
            
        }
        .money_check li {
            width: 33%;
            
            /*margin-left: 3%;*/
            text-align: center;
          
            box-sizing: border-box;
            padding: 2% 2%;
            
        }
         .money_check li  span {
             width: 100%;
             height: 40px;
             display: block;
             border:1px solid #ccc;
             line-height: 40px;
               border-radius: 6px;
         }
        /*.money_check li:nth-child(3n){*/
        /*      margin-left: 0;*/
        /*}*/
        .active{
            border:1px solid #61be49;
            background-color: #61be49;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="header">
      <span><?php echo htmlentities(lang('cz_recharge')); ?></span>
    </div>
    <div class="back">
      <a href="javascript:history.go(-1);"><i class="layui-icon">&#xe603;</i></a>
    </div>

    <div style="clear: both;"></div>

    <div class="chongzhi">
        <p class="p1"><?php echo htmlentities(lang('cz_balance')); ?>(<?php echo htmlentities(lang('cz_cny')); ?>)</p>
        <p class="p2"><?php echo htmlentities(lang('cz_unit')); ?><?php echo htmlentities($money); ?></p>
    </div>

    <div class="money_check" id="money_check">
       <ul style="display:flex;flex-wrap:wrap;">
           <li> <span data-money="50000"><?php echo config('app.currency'); ?> 50000</span></li>
           <li> <span data-money="100000"><?php echo config('app.currency'); ?> 100000</span> </li>
           <li> <span data-money="200000"><?php echo config('app.currency'); ?> 200000</span></li>
           <li> <span data-money="500000" ><?php echo config('app.currency'); ?> 500000</span></li>
           <li> <span data-money="1000000" class="active"><?php echo config('app.currency'); ?> 1000000</span></li>
           <li> <span data-money="2000000"><?php echo config('app.currency'); ?> 2000000</span></li>
           <li> <span data-money="5000000"><?php echo config('app.currency'); ?> 5000000</span></li>
           <li> <span data-money="10000000"><?php echo config('app.currency'); ?> 10000000</span></li>
           <li> <span data-money="50000000"><?php echo config('app.currency'); ?> 50000000</span></li>
        </ul>
    </div>
    <?php if($one['type'] == 1): ?>
    <div class="shanghu">
        <p class="p1"><?php echo htmlentities(lang('cz_merchant_info')); ?></p>
        <p class="p2"><?php echo htmlentities(lang('cz_bankname')); ?>：<?php echo htmlentities($one['bank_info']); ?></p>
        <p class="p2"><?php echo htmlentities(lang('cz_bankname_en')); ?>：<?php echo htmlentities($one['bank_info_en']); ?></p>
        <p class="p2"><?php echo htmlentities(lang('cz_bankcart')); ?>：<?php echo htmlentities($one['bank_num']); ?></p>
        <p class="p2"><?php echo htmlentities(lang('cz_fullname')); ?>：<?php echo htmlentities($one['bank_username']); ?></p>
    </div>
    <?php endif; ?>
    <hr class="layui-border-cyan">

    <div class="layui-form-item" style="text-align: center;margin-top: 0.2rem">
        <a class="layui-btn layui-btn-lg" id="showForm" style="background-color: #61be49;"><?php echo htmlentities(lang('cz_submit')); ?></a>
<!--        <a class="layui-btn layui-btn-lg" lay-submit lay-filter="formDemo" id="sendbtn" style="background-color: #61be49;"><?php echo htmlentities(lang('cz_submit')); ?></a>-->
    </div>



    <div id="payForm" class="layui-container " style="margin-top: 2rem;">
        <form class="layui-form" id="groupForm">
            <input type="hidden" name="pay_voucher">
            <div class="layui-form-item">
                <label><?php echo lang('cz_money'); ?></label>
                <input type="text" name="money"  autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label><?php echo lang('yh_realname'); ?></label>
                <input type="text" name="bank_username"  autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label><?php echo lang('yh_bankname'); ?></label>
                <input type="text" name="bank_info"  autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-item">
                <button id="upload" type="button" class="layui-btn layui-btn-danger layui-btn-fluid" >
                    <i class="layui-icon">&#xe67c;</i><?php echo lang('upload_pay_voucher'); ?>
                </button>
            </div>
            <div class="layui-form-item" style="text-align: center;">
                <a class="layui-btn" lay-submit lay-filter="formDemo" id="sendbtn" style="background-color: #61be49;"><?php echo htmlentities(lang('cz_submit')); ?></a>
            </div>
        </form>
    </div>



<script type="text/javascript">
    var money =  $('.active').data('money');
    $('#money_check li span').click(function (){
         $('#money_check li span').removeClass('active')
         $(this).addClass('active')
        money = $(this).data('money')
    })

    $('#pay_type li span').click(function (){
        $('#pay_type li span').removeClass('active')
        $(this).addClass('active')
    })

    // $('#sendbtn').click(function (){
    //    let money =  $('.active').data('money');
    //    alert(money);
    // })
    
    layui.use(['layer','form','jquery','upload'], function(){
        var layer = layui.layer;
        var form = layui.form;
        var $ = layui.jquery;
        var upload = layui.upload;
        
        $('#payForm').hide();
        $('#showForm').click(function (){
            layer.open({
                title:'',
                type: 1,
                skin: 'layui-layer-demo', //样式类名
                closeBtn: 0, //不显示关闭按钮
                anim: 2,
                area: ['300px', '370px'],
                shadeClose: true, //开启遮罩关闭
                content: $('#payForm'),
            });
            $("input[name='money']").val(money);
        })
        var uploadInst = upload.render({
            elem: '#upload' //绑定元素
            ,url: '/index/Task/uploads' //上传接口
            ,done: function(res){
                layer.msg(res.msg);
                $("input[name='pay_voucher']").val(res.img);
                //上传完毕回调
            }
        });
        
        //监听提交
        form.on('submit(formDemo)', function(data){
            
            
            console.log(data.field)
            
            if(!data.field.money || !data.field.bank_info || !data.field.bank_username || !data.field.pay_voucher){
                layer.msg("<?php echo lang('missing parameter'); ?>");
                return;
            }
            
            if(!$("input[name='pay_voucher']").val()){
                layer.msg("<?php echo lang('missing payment voucher'); ?>");
                return;
            }
            
            $.ajax({
                url:'<?php echo url("index/Wallet/pay"); ?>',
                type:"post",
                data:data.field,
                beforeSend:function (){
                    layer.load(2)
                },
                success:function(res){
                    window.location.href = res;
                }
            });
        })
    });
    

</script>
</body>
</html>