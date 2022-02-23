<?php /*a:3:{s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/order/index.html";i:1645535281;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1645535282;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1645535282;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>订单列表</title>
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
                        <input type="text" name="user" autocomplete="off" placeholder="用户账户查询" class="layui-input" value="<?php echo htmlentities($user); ?>">
                    </div>

                    <div class="layui-input-inline">
                        <button ype="submit" class="layui-btn">搜索</button>
                    </div>
                </div>
            </div>
        </form>

        <table class="layui-table" lay-size="sm">
            <thead>
                <tr pid="0">
                    <th style="text-align: center;">订单编号</th>
                    <th>产品名称</th>
                    <th>产品图片</th>
                    <th>产品价格</th>
                    <th>下单时间</th>
                    <th>所属用户</th>
                    <th>小时收益</th>
                    <th>运行周期</th>
                    <th>累计收益</th>
                    <th>推荐人</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td style="text-align: center;"><?php echo htmlentities($vo['kjbh']); ?></td>
                    <td><?php echo htmlentities($vo['project']); ?></td>
                    <td><a href="<?php echo htmlentities($vo['imagepath']); ?>" target="_blank"><img src="<?php echo htmlentities($vo['imagepath']); ?>" width="50px;"></a></td>
                    <td><?php echo htmlentities($vo['sumprice']); ?></td>
                    <td><?php echo htmlentities(date('Y-m-d',!is_numeric($vo['addtime'])? strtotime($vo['addtime']) : $vo['addtime'])); ?></td>
                    <td><?php echo htmlentities($vo['user']); ?></td>
                    <td><?php echo htmlentities($vo['shouyi']); ?>元</td>
                    <td><?php echo htmlentities($vo['yxzq']); ?>天</td>
                    <td><?php echo htmlentities($vo['already_profit']); ?></td>
                    <td><?php echo htmlentities($vo['tuijian']); ?></td>
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