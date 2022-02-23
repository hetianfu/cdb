<?php /*a:3:{s:58:"/www/wwwroot/wetbc.cc/app/dingadmin/view/user/details.html";i:1616210808;s:59:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/header.html";i:1607351074;s:57:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>资金详情</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 0px 10px;padding-bottom: 45px;" enctype="multipart/form-data">

    <table class="layui-table" lay-size="sm">
        <thead>
            <tr>
                <th>会员账号</th>
                <th>资金变动</th>
                <th>余额</th>
                <th>时间</th>
                <th>描述</th>
                <th>订单号</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
            <?php if(is_array($twoArr) || $twoArr instanceof \think\Collection || $twoArr instanceof \think\Paginator): $i = 0; $__LIST__ = $twoArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo htmlentities($vo['username']); ?></td>
                <td><?php if($vo['adds'] == 0): ?> -<?php echo htmlentities($vo['reduce']); else: ?> +<?php echo htmlentities($vo['adds']); ?> <?php endif; ?></td>
                <td><?php echo htmlentities($vo['balance']); ?></td>
                <td><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo['addtime'])? strtotime($vo['addtime']) : $vo['addtime'])); ?></td>
                <td><?php echo htmlentities($vo['desc']); ?></td>
                <td><?php echo htmlentities($vo['order_num']); ?></td>
                <td><a href="javascript:;" class="layui-btn layui-btn-sm layui-btn-danger" onclick="admin_del(this,'<?php echo htmlentities($vo['id']); ?>')">删除</a></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>


    

<!-- 百度编辑器配置文件 -->

<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/admin.js"></script>



<script>
/*删除*/
function admin_del(obj,id) {
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            url:"<?php echo url('User/zijindel'); ?>",
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

//监听提交
layui.use(['form','upload','laydate'], function(){
    var form = layui.form;
    var upload = layui.upload;
    var laydate = layui.laydate;
    //日期范围选择
    laydate.render({ 
        elem: '#end_time',
        type: 'date' 
    });
});
//导航标题
$(function(){
    $(window.parent.document).find('#right_title').text($('title').text());
});


</script>
</body>
</html>