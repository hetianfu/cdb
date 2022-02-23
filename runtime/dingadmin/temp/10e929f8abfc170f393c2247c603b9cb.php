<?php /*a:3:{s:69:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/category/index.html";i:1607481012;s:68:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/header.html";i:1607351074;s:66:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>栏目列表</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 10px 10px;">
    <div class="layui-container">
        <form action="" method="post" id="groupForm">
        <div>
            <a href="javascript:;" class="layui-btn layui-btn-small" onclick="admin_add('添加栏目','<?php echo url('category/add'); ?>',540,440)">添加栏目</a>
            <button class="layui-btn layui-btn-normal layui-btn-danger" lay-submit lay-filter="formDemo">更新排序</button>
        </div>
        <table class="layui-table">
            <colgroup>
                <col width="60">
                <col width="50">
                <col>
                <col width="100">
                <col width="100">
                <col width="150">
            </colgroup>
            <thead>
                <tr pid="0">
                    <th>伸缩</th>
                    <th>ID</th>
                    <th>栏目名称</th>
                    <th>是否展示</th>
                    <th>排序</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr pid="<?php echo htmlentities($vo['pid']); ?>" id="<?php echo htmlentities($vo['id']); ?>">
                    <td>
                        <button type="button" class="layui-btn layui-btn-xs shensuo" style="height: 30px;width: 30px;">
                            <i class="layui-icon">+</i>
                        </button>
                    </td>
                    <td><?php echo htmlentities($vo['id']); ?></td>
                    <td><?php echo htmlentities($vo['name']); ?></td>
                    <td><?php echo htmlentities($vo['isshow']); ?></td>
                    <td><input type="text" name="<?php echo htmlentities($vo['id']); ?>" value="<?php echo htmlentities($vo['sort']); ?>" style="width: 50px;"></td>
                    <td>
                        <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="admin_edit('编辑栏目','<?php echo url('Category/edit',['id'=>$vo['id']]); ?>',540,440)">编辑</a>
                        <a href="javascript:;" class="layui-btn layui-btn-sm layui-btn-danger" onclick="admin_del(this,'<?php echo htmlentities($vo['id']); ?>')">删除</a>
                    </td>

                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        
        </form>
    </div>
    

<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/admin.js"></script>


<script>
layui.use(['layer','form'], function(){
    var layer = layui.layer;
    var form = layui.form;
    //监听提交
    form.on('submit(formDemo)', function(data){
        $.ajax({
            url:"<?php echo url('Category/sort'); ?>",
            type:"post",
            data:$('#groupForm').serialize(),
            success:function(res){
                if(res.status){
                    layer.alert("操作成功", {icon: 6},function () {
                        location.reload();
                        var index = layer.getFrameIndex(window.name);
                        layer.close(index);
                    });
                }else{
                    layer.msg(res.msg ? res.msg : "操作失败!", {icon: 5},function () {
                        var index = layer.getFrameIndex(window.name);
                        layer.close(index);
                    });
                    return false;
                }
            }
        });
        return false;
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
            url:"<?php echo url('Category/del'); ?>",
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
    //栏目伸缩
    //1.隐藏非顶级栏目
    $('tr[pid!=0]').hide();
    //2.子栏目展开
    $('.shensuo').on('click',function(){
        //获取按钮状态
        var flag = $(this).find('i').text();
        var index = $(this).parents('tr').attr('id');
        if(flag=="+"){
            $(this).find('i').text("-");
            //展开子栏目
            $('tr[pid='+index+']').fadeIn('slow');
        }else{
            $(this).find('i').text("+");
            //收起子栏目
            hidecate(index);
        }
    })
})
//隐藏子栏目 pid 父级分类id 递归隐藏子栏目
function hidecate(pid){
    $('tr[pid='+pid+']').each(function(){
        hidecate($(this).attr('id'));
    })
    $('tr[pid='+pid+']').find('.shensuo').find('i').text('+');
    $('tr[pid='+pid+']').fadeOut('slow');
}
</script>
</body>
</html>