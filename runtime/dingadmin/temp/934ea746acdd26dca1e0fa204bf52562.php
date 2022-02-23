<?php /*a:3:{s:62:"/www/wwwroot/wetbc.cc/app/dingadmin/view/withdrawal/index.html";i:1632892594;s:59:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/header.html";i:1607351074;s:57:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>提现审核</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 10px 10px 80px 10px;">
    <form class="layui-form" action="" method="post">
    
    <div class="">
        <form class="layui-form" action="" method="get" autocomplete="off">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <input type="text" name="username" autocomplete="off" placeholder="用户查询" class="layui-input" value="<?php echo htmlentities($username); ?>">
                    </div>
                    <div class="layui-input-inline">
                        <button ype="submit" class="layui-btn">搜索</button>
                    </div>
                </div>
            </div>
        </form>

        <table class="layui-table" lay-size="sm">
            <thead>
                <tr >
                    <th style="text-align: center;">提现订单号</th>
                    <th>用户名</th>
                    <th>姓名</th>
                    <th>银行</th>
                    <th>银行账号</th>
                    <th>提现金额</th>
                    <th>实到金额</th>
                    <th>手续费</th>
                    <th>变更前金额</th>
                    <th>变更后金额</th>
                    <th>提现时间</th>
                    <th>提现说明</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td style="text-align: center;"><?php echo htmlentities($vo['order_num']); ?></td>
                    <td><?php echo htmlentities($vo['username']); ?></td>
                    <td><?php echo htmlentities($vo['truename']); ?></td>
                    <td><?php echo htmlentities($vo['bank']); ?></td>
                    <td><?php echo htmlentities($vo['card']); ?></td>
                    <td><?php echo htmlentities($vo['money']); ?></td>
                    <td><?php echo htmlentities($vo['payment']); ?></td>
                    <td><?php echo htmlentities($vo['charge']); ?></td>
                    <td><?php echo htmlentities($vo['money_front']); ?></td>
                    <td><?php echo htmlentities($vo['money_after']); ?></td>
                    <td><?php echo htmlentities(date('Y-m-d h:i:s',!is_numeric($vo['addtime'])? strtotime($vo['addtime']) : $vo['addtime'])); ?></td>
                    <td><?php echo htmlentities($vo['remark']); ?></td>
                    <td>
                        <?php switch($vo['status']): case "0": ?> <span style="color: #FFB800">待审核</span> <?php break; case "1": ?> <span style="color: #009688">已通过</span> <?php break; case "2": ?> <span style="color: #FF5722">已驳回</span> <?php break; case "3": ?> <span style="color: #FFB800">代付中</span> <?php break; ?>
                        <?php endswitch; ?>
                    </td>
                    <td>
                        <?php if($vo['status'] == '0'): ?>
                        <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="admin_review(this,'<?php echo htmlentities($vo['id']); ?>')">审核</a>
                        <?php endif; if($vo['status'] == '3'): ?>
                        <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="chick_review(this,'<?php echo htmlentities($vo['id']); ?>')">查询</a>
                        <?php endif; ?>
                        <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="admin_reject(this,'<?php echo htmlentities($vo['id']); ?>')">驳回</a>
                        <a href="javascript:;" class="layui-btn layui-btn-sm layui-btn-danger" onclick="admin_del(this,'<?php echo htmlentities($vo['id']); ?>')">删除</a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </tbody>
        </table>
        <div style="text-align: right;"><?php echo $page; ?></div>
    </div>
    </form>
    

<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/admin.js"></script>


<script>
//删除提示
layui.use(['layer','form'], function(){
    var layer = layui.layer;
    var form = layui.form;
});

/*添加*/
function admin_add(title,url,w,h) {
    x_admin_show(title,url,w,h);
}
/*编辑*/
function admin_edit(title,url,w,h) {
    x_admin_show(title,url,w,h);
}
/*删除*/
function admin_del(obj,id) {
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            url:"<?php echo url('Withdrawal/del'); ?>",
            type:'post',
            data:'id='+id,
            success:function(res){
                if(res.status){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }
            }
        });
    });
}
//支付回调
function admin_review(obj,id) {
    layer.confirm('确认要申请支付回调吗？',{
        // btn: ['gmspay', '直改状态','取消'],
        btn: ['审核'],
        btn2:function (index){
            layer.confirm('确定已经手工打款了吗？',function (){
                $.ajax({
                    url:"<?php echo url('Withdrawal/reviewA'); ?>",
                    type:'post',
                    data:'id='+id,
                    success:function(res){
                        if(res.status){
                            layer.msg(res.msg,{icon:1,time:1000});
                            location.reload();
                        }else{
                            //   alert(res);
                            layer.msg(res,{icon:1,time:5000});
                            // location.reload();

                        }
                    }
                });
            })

        },
        yes:function(index,layero){
            $.ajax({
                url:"<?php echo url('Withdrawal/rgmspay'); ?>",
                type:'post',
                data:'id='+id,
                success:function(res){
                    if(res.status){
                        layer.msg(res.msg,{icon:1,time:1000});
                        location.reload();
                    }else{
                    //   alert(res);
                       layer.msg(res,{icon:1,time:5000});
                        // location.reload();

                    }
                }
            });
        },
        no:function (index){
            layer.close(layer.index);
        }
    });
}

function chick_review(obj,id){
    layer.confirm('要查询代付状态',function(index){
        $.ajax({
            url:"<?php echo url('Withdrawal/chick_withdrawal'); ?>",
            type:'post',
            data:'id='+id,
            success:function(res){
                layer.close(index);
                if(res.status){
                    layer.msg(res.msg,{icon:1,time:1000});
                }else {
                    layer.msg(res.msg,{icon:1,time:1000});
                }
            }
        });
        layer.close(index);
    });
}
//驳回操作
function admin_reject(obj,id) {
    layer.confirm('确认要驳回吗？',function(index){
        $.ajax({
            url:"<?php echo url('Withdrawal/reject'); ?>",
            type:'post',
            data:'id='+id,
            success:function(res){
                if(res.status){
                    layer.msg(res.msg,{icon:1,time:1000});
                    location.reload();
                }
            }
        });
    });
}
//页面导航标题内容
$(function(){
    $(window.parent.document).find('#right_title').text($('title').text());
})

</script>
</body>
</html>