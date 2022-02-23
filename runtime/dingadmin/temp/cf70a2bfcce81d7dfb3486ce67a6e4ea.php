<?php /*a:3:{s:65:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/user/lowlv.html";i:1614601088;s:68:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/header.html";i:1607351074;s:66:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>查看下级</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 10px 10px 80px 10px;">
    <form class="layui-form" action="" method="post">
    
    <div class="">
        <table class="layui-table" lay-size="sm">
            <thead>
                <tr pid="0">
                    <th style="text-align: center;">序号</th>
                    <th>会员账号</th>
                    <th>会员等级</th>
                    <th>手机号码</th>
                    <th>推荐人</th>
                    <th>直推人数</th>
                    <th>注册时间</th>
                    <th>最后登陆时间</th>
                    <th>状态</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                <tr>
                    <td style="text-align: center;"><?php echo htmlentities($k); ?></td>
                    <td><?php echo htmlentities($vo['username']); ?></td>
                    <td><?php echo htmlentities($vo['lv_name']); ?></td>
                    <td><?php echo htmlentities($vo['phone']); ?></td>
                    <td><?php echo htmlentities($vo['parent']); ?></td>
                    <td><?php echo htmlentities($vo['parentcount']); ?></td>
                    <td><?php echo htmlentities(date('Y-m-d',!is_numeric($vo['reg_time'])? strtotime($vo['reg_time']) : $vo['reg_time'])); ?></td>
                    <td><?php echo htmlentities(date('Y-m-d',!is_numeric($vo['online_time'])? strtotime($vo['online_time']) : $vo['online_time'])); ?></td>
                    <td><?php if($vo['lock'] == 1): ?>正常<?php else: ?>禁止<?php endif; ?></td>
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

//页面导航标题内容
$(function(){
    $(window.parent.document).find('#right_title').text($('title').text());
})

</script>
</body>
</html>