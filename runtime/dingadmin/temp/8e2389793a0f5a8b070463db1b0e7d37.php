<?php /*a:3:{s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/admin/index.html";i:1645535278;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1645535282;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1645535282;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>管理员管理</title>
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
                        <a href="javascript:;" class="layui-btn layui-btn-small" onclick="admin_add('添加管理员','<?php echo url('admin/add'); ?>',540,440)">添加管理员</a>
                    </div>
                </div>
            </div>
        <table class="layui-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>管理员账号</th>
                    <th>所属角色</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo htmlentities($vo['id']); ?></td>
                    <td><?php echo htmlentities($vo['account']); ?></td>
                    <td><?php echo htmlentities($vo['title']); ?></td>
                    <td><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo['login_time'])? strtotime($vo['login_time']) : $vo['login_time'])); ?></td>
                    <td>
                        <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="admin_edit('编辑管理员','<?php echo url('admin/edit',['id'=>$vo['id']]); ?>',540,440)">编辑</a>
                        <a href="javascript:;" class="layui-btn layui-btn-sm layui-btn-danger" onclick="admin_del(this,'<?php echo htmlentities($vo['id']); ?>')">删除</a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
      <div style="text-align: right;"><?php echo $page; ?></div>
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
            url:"<?php echo url('admin/del'); ?>",
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