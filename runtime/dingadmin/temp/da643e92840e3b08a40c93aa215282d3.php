<?php /*a:3:{s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/level/index.html";i:1631965318;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1607351074;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>用户等级</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 10px 10px 80px 10px;">
    <div class="layui-container">
        <div class="ibox-title">
                <div class="row">
                    <div>
                        <a href="javascript:;" class="layui-btn layui-btn-small" onclick="admin_add('添加等级','<?php echo url('Level/add'); ?>',540,440)">添加等级</a>
                    </div>
                </div>
            </div>
        <table class="layui-table">
            <thead>
                <tr>
                    <th>等级</th>
                    <th>等级名称</th>
                    <th>金额</th>
                    <th>积分</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo htmlentities($vo['level']); ?></td>
                    <td><?php echo htmlentities($vo['lv_name']); ?></td>
                    <td><?php echo htmlentities($vo['price']); ?></td>
                    <td><?php echo htmlentities($vo['integral']); ?></td>
                    <td>
                        <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="admin_edit('编辑等级','<?php echo url('Level/edit',['id'=>$vo['id']]); ?>',540,440)">编辑</a>
                        <!-- <a href="javascript:;" class="layui-btn layui-btn-sm layui-btn-danger" onclick="admin_del(this,'<?php echo htmlentities($vo['id']); ?>')">删除</a> -->
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div style="text-align: right;"></div>
    </div>
    

<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/admin.js"></script>


<script>
layui.use(['layer','form'], function(){
    var layer = layui.layer;
    var form = layui.form;
});
/*管理员-添加*/
function admin_add(title,url,w,h) {
    x_admin_show(title,url,w,h);
}
/*管理员-编辑*/
function admin_edit(title,url,w,h) {
    x_admin_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(obj,id) {
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            url:"<?php echo url('Level/del'); ?>",
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
//页面导航标题内容
$(function(){
    $(window.parent.document).find('#right_title').text($('title').text());
})

</script>
</body>
</html>