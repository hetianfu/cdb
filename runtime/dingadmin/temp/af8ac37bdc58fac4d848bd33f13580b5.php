<?php /*a:3:{s:60:"/opt/homebrew/var/www/cdb/app/dingadmin/view/menu/index.html";i:1607357234;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1607351074;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>菜单列表</title>
  <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 0 0 200px 0;">

  <div class="layui-container">
    <div class="ibox-title">
        <div class="row">
            <div>
                <a href="javascript:;" class="layui-btn layui-btn-small" onclick="menu_add('添加菜单','<?php echo url('Menu/add'); ?>',540,320)">添加菜单</a>
            </div>
        </div>
    </div>
    <table class="layui-table">
        <thead>
            <tr>
                <th>#</th>
                <th>菜单名称</th>
                <th>控制器名称</th>
                <th>方法名</th>
                <th>菜单级别</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo htmlentities($vo['id']); ?></td>
                <td><?php if($vo['level'] == 0): ?>├─<?php else: ?>└─<?php endif; ?><?php echo htmlentities($vo['title']); ?></td>
                <td><?php echo htmlentities($vo['controller']); ?></td>
                <td><?php echo htmlentities($vo['action']); ?></td>
                <td><?php if(!$vo['pid']): ?>一级菜单<?php else: ?>二级菜单<?php endif; ?></td>
                <td>
                  <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="menu_add('添加子菜单','<?php echo url('menu/add',['pid'=>$vo['id']]); ?>',540,320)">添加子菜单</a>
                  <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="menu_edit('编辑菜单','<?php echo url('menu/edit',['id'=>$vo['id']]); ?>',540,320)">编辑</a>
                  <a href="javascript:;" class="layui-btn layui-btn-sm layui-btn-danger" onclick="menu_del(this,'<?php echo htmlentities($vo['id']); ?>')">删除</a>
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
//添加菜单
function menu_add(title,url,w,h){
    x_admin_show(title,url,w,h);
}
//编辑菜单
function menu_edit(title,url,w,h){
    x_admin_show(title,url,w,h);
}
//删除菜单
function menu_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            url:"<?php echo url('Menu/del'); ?>",
            type:'post',
            data:'id='+id,
            success:function(res){
                if(res.status){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }else{
                    layer.msg(res.msg ? res.msg : "操作失败!", {icon: 5},function () {
                        var index = layer.getFrameIndex(window.name);
                        layer.close(index);
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
