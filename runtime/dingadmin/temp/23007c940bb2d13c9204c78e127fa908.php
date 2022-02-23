<?php /*a:3:{s:62:"/opt/homebrew/var/www/cdb/app/dingadmin/view/banner/index.html";i:1611583312;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1607351074;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>轮播列表</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 10px 10px;">
    <form class="layui-form" action="" method="post">
    
    <div class="layui-container">
        <div>
            <a href="javascript:;" class="layui-btn layui-btn-small" onclick="admin_add('添加轮播','<?php echo url('Banner/add'); ?>',850,600)">添加轮播</a>
        </div>
        <table class="layui-table">
            <colgroup>
                <col width="60">
                <col width="200">
                <col>
                <col width="100">
                <col width="100">
                <col width="150">
            </colgroup>
            <thead>
                <tr pid="0">
                    <th style="text-align: center;">ID</th>
                    <th>图片</th>
                    <th>标题</th>
                    <th>是否显示</th>
                    <th>排序</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td style="text-align: center;"><?php echo htmlentities($vo['id']); ?></td>
                    <td><img src="<?php echo htmlentities($vo['pic']); ?>" style="width: 160px;height: 80px;"></td>
                    <td><?php echo htmlentities($vo['title']); ?></td>
                    <td><input type="checkbox" value="<?php echo htmlentities($vo['id']); ?>" name="isshow" <?php echo !empty($vo['isshow']) ? "checked" : ""; ?> lay-skin="switch" lay-text="显示|隐藏" lay-filter="isshow"></td>
                    <td><input type="text" name="sort" value="<?php echo htmlentities($vo['sort']); ?>" placeholder="" autocomplete="off" class="layui-input sort" data="<?php echo htmlentities($vo['id']); ?>"></td>
                    <td>
                        <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="admin_edit('编辑轮播','<?php echo url('Banner/edit',['id'=>$vo['id']]); ?>',850,600)">编辑</a>
                        <a href="javascript:;" class="layui-btn layui-btn-sm layui-btn-danger" onclick="admin_del(this,'<?php echo htmlentities($vo['id']); ?>')">删除</a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </tbody>
        </table>
        <div style="text-align: right;"></div>
        
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
 
    //显示与隐藏
    form.on('switch(isshow)', function(data){
        var value;
        value = data.elem.checked?1:0;//开关是否开启，true或者false
        $.ajax({
            type:'post',
            url:"<?php echo url('banner/setajax'); ?>",
            data:{'act':'show','v':value,"id":data.value},
            success:function(msg){
                if(msg==1){
                    layer.msg('操作成功',{time:1000},function(){
                        location.reload();
                    })
                }
            }
        });
    }); 
    //排序
    $('.sort').change(function(){
        var id = $(this).attr('data');
        var value = $(this).val();
        $.ajax({
            type:'post',
            url:"<?php echo url('banner/setajax'); ?>",
            data:{'act':'sort','v':value,"id":id},
            success:function(msg){
                if(msg==1){
                    layer.msg('操作成功',{time:1000},function(){
                        location.reload();
                    })
                }
            }
        });
    })

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
            url:"<?php echo url('Banner/del'); ?>",
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