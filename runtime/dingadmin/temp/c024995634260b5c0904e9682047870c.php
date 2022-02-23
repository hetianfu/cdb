<?php /*a:3:{s:58:"/www/wwwroot/wetbc.cc/app/dingadmin/view/article/pics.html";i:1607586056;s:59:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/header.html";i:1607351074;s:57:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>图片</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 0px 10px;padding-bottom: 45px;" enctype="multipart/form-data">
<table class="layui-table">
    <colgroup>
        <col width="60">
        <col>
        <col width="100">
        <col width="60">
    </colgroup>
    <thead>
        <tr>
            <th>ID</th>
            <th>缩略图</th>
            <th>排序</th>
            <th>操作</th>
        </tr> 
    </thead>
    <tbody>
        <?php if(is_array($pics) || $pics instanceof \think\Collection || $pics instanceof \think\Paginator): $i = 0; $__LIST__ = $pics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo htmlentities($vo['id']); ?></td>
            <td><img src="<?php echo htmlentities($vo['pic']); ?>" style="height: 60px;width: 100px;"></td>
            <td><input type="text" onchange="changesort(this)" id="<?php echo htmlentities($vo['id']); ?>" name="sort" value="<?php echo htmlentities($vo['sort']); ?>" class="layui-input"></td>
            <td><a href="<?php echo url('article/delpic',['id'=>$vo['id']]); ?>" class="layui-btn layui-btn-xs layui-btn-danger del">删除</a></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
    


<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/admin.js"></script>


<script>
//排序操作
function changesort(obj){
    var id = $(obj).attr('id');
    var sortval = $(obj).val();
    layui.use(['layer'], function(){
        var layer = layui.layer;
        $.ajax({
            'type':'post',
            'url':"<?php echo url('article/picsort'); ?>",
            'data':{'id':id,'sort':sortval},
            success:function(msg){
                layer.msg(msg.msg,{time:1000},function(){
                    if(msg.code==1){
                        window.location.reload();
                    }
                })
            }
        });
    })
    
}
</script>
</body>
</html>