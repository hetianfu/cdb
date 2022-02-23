<?php /*a:3:{s:64:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/user/edit.html";i:1615022484;s:68:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/header.html";i:1607351074;s:66:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>用户编辑</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 0px 10px;padding-bottom: 45px;" enctype="multipart/form-data">

    <form class="layui-form" action="" method="post" id="groupForm">
        <input type="hidden" name="id" value="<?php echo htmlentities($one['id']); ?>">
        <div class="layui-tab-content">
            <div class="layui-form-item">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-inline">
                    <input type="text" value="<?php echo htmlentities($one['username']); ?>" readonly placeholder="请输入用户名" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">密码</label>
                <div class="layui-input-inline">
                    <input type="text" name="password" value=""  placeholder="" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">上级ID</label>
                <div class="layui-input-inline">
                    <input type="text" name="parent_id" value="<?php echo htmlentities($one['parent_id']); ?>" placeholder="" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">用户等级</label>
                <div class="layui-input-inline">
                    <select name="lv_id" lay-verify="required">
                        <?php if(is_array($lvArr) || $lvArr instanceof \think\Collection || $lvArr instanceof \think\Paginator): $i = 0; $__LIST__ = $lvArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option <?php if($one['lv_id'] == $vo['id']): ?> selected <?php endif; ?> value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['lv_name']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">是否代理</label>
                <div class="layui-input-inline">
                    <select name="is_agent" lay-verify="required">
                        <option <?php if($one['is_agent'] == 0): ?> selected <?php endif; ?> value="0">否</option>
                        <option <?php if($one['is_agent'] == 1): ?> selected <?php endif; ?> value="1">是</option>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">用户状态</label>
                <div class="layui-input-inline">
                    <select name="lock" lay-verify="required">
                        <option <?php if($one['lock'] == 1): ?> selected <?php endif; ?> value="1">正常</option>
                        <option <?php if($one['lock'] == 2): ?> selected <?php endif; ?> value="2">封号</option>
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
            url:"<?php echo url('User/edit'); ?>",
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