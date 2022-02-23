<?php /*a:3:{s:68:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/product/index.html";i:1632467130;s:68:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/header.html";i:1607351074;s:66:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>产品列表</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


    <style type="text/css">
        .layui-form-switch{width: 30px;height: 15px;line-height: 15px;}
        .layui-form-onswitch i{width: 12px;height: 12px;top: 2px;margin-left: -15px;}
        .layui-form-switch i{width: 12px;height: 12px;top: 1px;}
        .layui-form-switch em{margin-left: 12px;top: 1px;}
        .layui-form-onswitch em{margin-left: 0px;top: 1px;}
        .tdright .layui-btn{text-align: right;background-color: red;}
    </style>
</head>
<body style="padding: 10px 10px 80px 10px;">
    <div class="">
        <div class="ibox-title">
            <div class="layui-input-inline">
                <a href="javascript:;" class="layui-btn layui-btn-small" onclick="admin_add('添加产品','<?php echo url('Product/add'); ?>',900,600)">添加产品</a>
            </div>
        </div>
        <table class="layui-table" lay-size="sm">
            <thead>
                <tr>
                    <th style="text-align: center;">序号</th>
                    <th>产品名称</th>
                    <th>产品缩略图</th>
                    <th>单价</th>
                    <th>日收益</th>
                    <th>每人限购</th>
                    <th>库存</th>
                    <th>限购等级</th>
                    <th>是否上架</th>
                    <th>排序</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td style="text-align: center;"><?php echo htmlentities($vo['id']); ?></td>
                    <td><?php echo htmlentities($vo['title']); ?></td>
                    <td><a href="<?php echo htmlentities($vo['thumb']); ?>" target="_blank"><img src="<?php echo htmlentities($vo['thumb']); ?>" width="50px"></a></td>
                    <td><?php echo htmlentities($vo['price']); ?></td>
                    <td><?php echo htmlentities($vo['day_shouyi']); ?></td>
                    <td><?php echo htmlentities($vo['xiangou']); ?></td>
                    <td><?php echo htmlentities($vo['stock']); ?></td>
                    <td><?php echo htmlentities($vo['lv_name']); ?></td>
                    <td><?php if($vo['is_on']): ?>上架<?php else: ?>下架<?php endif; ?></td>
                    <td><?php echo htmlentities($vo['sort']); ?></td>
                    <td>
                        <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="admin_edit('编辑产品','<?php echo url('Product/edit',['id'=>$vo['id']]); ?>',850,600)">编辑</a>
                        <a href="javascript:;" class="layui-btn layui-btn-sm layui-btn-danger" onclick="admin_del(this,'<?php echo htmlentities($vo['id']); ?>')">删除</a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>

    </div>
    

<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/admin.js"></script>


<script>

layui.use(['layer','form','element','table'], function(){
    var layer = layui.layer;
    var form = layui.form;
    var table = layui.table;
});
/*项目-添加*/
function admin_add(title,url,w,h) {
    x_admin_show(title,url,w,h);
}
/*项目-编辑*/
function admin_edit(title,url,w,h) {
    x_admin_show(title,url,w,h);
}
/*项目-查看*/
function admin_see(title,url,w,h) {
    x_admin_show(title,url,w,h);
}
/*项目-删除*/
function admin_del(obj,id) {
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            url:"<?php echo url('Product/del'); ?>",
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