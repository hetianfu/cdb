<?php /*a:3:{s:71:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/recharge/operate.html";i:1632396373;s:68:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/header.html";i:1607351074;s:66:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>充值审核</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 0px 10px;padding-bottom: 45px;" enctype="multipart/form-data">

    <form class="layui-form" action="" method="post" id="groupForm">
        <input type="hidden" name="id" value="<?php echo htmlentities($one['id']); ?>">
        <input type="hidden" name="uid" value="<?php echo htmlentities($one['uid']); ?>">
        <input type="hidden" name="money" value="<?php echo htmlentities($one['money']); ?>">
        <div class="layui-tab-content">
            <div class="layui-form-item">
                <label class="layui-form-label">审核状态</label>
                <div class="layui-input-inline">
                    <select name="status" lay-verify="required">
                        <option value="1">通过</option>
                        <option value="2">驳回</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">提交</button>
                </div>
            </div>
        </div>
    </form>


    

<!-- 百度编辑器配置文件 -->

<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/admin.js"></script>



<script>
//监听提交
layui.use(['form','upload','laydate'], function(){
    var form = layui.form;
    var upload = layui.upload;
    var laydate = layui.laydate;
    //监听提交
    form.on('submit(formDemo)', function(data){
        $.ajax({
            url:"<?php echo url('Recharge/operate'); ?>",
            type:"post",
            data:$('#groupForm').serialize(),
            success:function(res){
                if(res.status){
                    layer.alert("操作成功", {icon: 6},function () {
                        parent.location.reload();
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.layer.close(index);
                    });
                }else{
                    layer.msg(res.msg ? res.msg : "操作失败!", {icon: 5},function () {
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.layer.close(index);
                    });
                    return false;
                }
            }
        });
        return false;
    })

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