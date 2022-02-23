<?php /*a:3:{s:65:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/auth/index.html";i:1607512210;s:68:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/header.html";i:1607351074;s:66:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>角色配置</title>
  <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body>

  <div class="layui-container">
    <div class="ibox-title">
        <div class="row">
            <div>
                <a href="javascript:;" class="layui-btn layui-btn-small" onclick="group_add('添加角色','<?php echo url('Auth/add'); ?>',540,240)">添加角色</a>
            </div>
        </div>
    </div>
    <table class="layui-table">
        <thead>
            <tr>
                <th>#</th>
                <th>角色名称</th>
                <th>权限列表</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo htmlentities($vo['id']); ?></td>
                <td><?php echo htmlentities($vo['title']); ?></td>
                <td><a href="<?php echo url('auth/rule',['roleid' => $vo['id']]); ?>" class="layui-btn layui-btn-sm">查看</a></td>
                <td>
                    <a href="<?php echo url('auth/rule',['roleid' => $vo['id']]); ?>" class="layui-btn layui-btn-sm">权限分配</a>
                    <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="group_edit('编辑角色','<?php echo url('Auth/edit',['id'=>$vo['id']]); ?>',540,240)">编辑</a>
                    <a href="javascript:;" class="layui-btn layui-btn-sm layui-btn-danger" onclick="group_del(this,'<?php echo htmlentities($vo['id']); ?>')">删除</a>
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
})
/*用户组-添加*/
function group_add(title,url,w,h) {
    x_admin_show(title,url,w,h);
}
/*用户组-编辑*/
function group_edit(title,url,w,h) {
    x_admin_show(title,url,w,h);
}
/*用户组-删除*/
function group_del(obj,id) {
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            url:"<?php echo url('Auth/del'); ?>",
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
