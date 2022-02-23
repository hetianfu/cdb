<?php /*a:2:{s:67:"/opt/homebrew/var/www/cdb/app/index/view/wallet/onlinerecharge.html";i:1645408860;s:59:"/opt/homebrew/var/www/cdb/app/index/view/public/header.html";i:1632829660;}*/ ?>
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
         <?php if(is_array($chongzhi) || $chongzhi instanceof \think\Collection || $chongzhi instanceof \think\Paginator): $i = 0; $__LIST__ = $chongzhi;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
         <li>
           <span data-zsamount="<?php echo htmlentities($vo['js_amount']); ?>" data-money="<?php echo htmlentities($vo['amount']); ?>">
             <?php echo config('app.currency'); ?> <?php echo htmlentities($vo['amount']); ?></span>
           <p> <?php echo htmlentities(lang('giving')); ?><?php echo htmlentities($vo['js_amount']); ?></p>
         </li>
         <?php endforeach; endif; else: echo "" ;endif; ?>

       </ul>
    </div>

    <div class="shanghu">
      <?php echo htmlentities($content); ?>
    </div>

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
    var zsamount =  $('.active').data('zsamount');
    $('#money_check li span').click(function (){
         $('#money_check li span').removeClass('active')
         $(this).addClass('active')
        money = $(this).data('money')
        zsamount = $(this).data('zsamount')
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

         // var money = $("input[name='money']").val(money);
             location.href="rusPay?amount="+money+"&zsamount="+zsamount
            // layer.open({
            //     title:'',
            //     type: 1,
            //     skin: 'layui-layer-demo', //样式类名
            //     closeBtn: 0, //不显示关闭按钮
            //     anim: 2,
            //     area: ['300px', '370px'],
            //     shadeClose: true, //开启遮罩关闭
            //     content: $('#payForm'),
            // });
            // $("input[name='money']").val(money);
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
