<?php /*a:3:{s:66:"/opt/homebrew/var/www/cdb/app/dingadmin/view/collection/index.html";i:1632375476;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1607351074;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
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
        <!-- <div>
            <a href="javascript:;" class="layui-btn layui-btn-small" onclick="admin_add('添加收款','<?php echo url('Collection/add'); ?>',850,600)">添加收款</a>
        </div> -->

        <table class="layui-table" lay-size="sm">
            <thead>
                <tr pid="0">
                    <th style="text-align: center;">序号</th>
                    <th>收款类型</th>
                    <th>银行卡号</th>
                    <th>银行卡收款人</th>
                    <th>银行名称(韩文)</th>
                    <th>银行名称(英文)</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td style="text-align: center;"><?php echo htmlentities($vo['id']); ?></td>
                    <td>
                        <?php switch($vo['type']): case "1": ?>银行卡<?php break; case "2": ?>支付宝<?php break; case "3": ?>微信<?php break; ?>
                        <?php endswitch; ?>
                    </td>
                    <td><?php echo htmlentities($vo['bank_num']); ?></td>
                    <td><?php echo htmlentities($vo['bank_username']); ?></td>
                    <td><?php echo htmlentities($vo['bank_info']); ?></td>
                    <td><?php echo htmlentities($vo['bank_info_en']); ?></td>
                    <td>
                        <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="admin_edit('编辑收款','<?php echo url('Collection/edit',['id'=>$vo['id']]); ?>',850,600)">编辑</a>
                        <!-- <a href="javascript:;" class="layui-btn layui-btn-sm layui-btn-danger" onclick="admin_del(this,'<?php echo htmlentities($vo['id']); ?>')">删除</a> -->
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </tbody>
        </table>

        
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
            url:"<?php echo url('User/del'); ?>",
            type:'post',
            data:'id='+id,
            success:function(res){
                if(res.status){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }else{
                    layer.msg(res.msg ? res.msg : "操作失败!", {icon: 5},function () {
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.layer.close(index);
                    });
                    return false;
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