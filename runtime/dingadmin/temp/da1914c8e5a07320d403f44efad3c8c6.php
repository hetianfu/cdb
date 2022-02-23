<?php /*a:3:{s:60:"/opt/homebrew/var/www/cdb/app/dingadmin/view/agent/edit.html";i:1645063995;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1607351074;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>编辑管理员</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 0px 10px;padding-bottom: 45px;" enctype="multipart/form-data">
    <div class="">
        <form class="layui-form" action="" method="post" id="editForm">
            <input type="hidden" name="id" value="<?php echo htmlentities($admin_info['id']); ?>" />
            <div class="layui-tab-content">
                <!-- 基本设置 -->
                <div class="layui-tab-item layui-show">

                    <div class="layui-form-item">
                        <label class="layui-form-label">手机号(账号)</label>
                        <div class="layui-input-inline">
                            <input type="text" name="account" value="<?php echo htmlentities($admin_info['account']); ?>" required lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">密码</label>
                        <div class="layui-input-inline">
                            <input type="text" name="password" placeholder="不修改留空" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">客服号码</label>
                    <div class="layui-input-inline">
                      <input type="text" name="server_code" placeholder="请输入客服号码" autocomplete="off" value="<?php echo htmlentities($admin_info['server_code']); ?>" class="layui-input">
                    </div>
                  </div>



                  <div class="layui-form-item">
                    <label class="layui-form-label">邀请码</label>
                    <div class="layui-input-inline">
                      <input type="text" name="code" placeholder="请输入邀请码" autocomplete="off" value="<?php echo htmlentities($admin_info['code']); ?>" class="layui-input">
                    </div>
                  </div>



                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="user">立即提交</button>
                </div>
            </div>
        </form>

    </div>
    

<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/admin.js"></script>


<script>
//监听提交
layui.use(['form','layer'], function(){
    var form = layui.form,layer = layui.layer;
    //监听提交
    form.on('submit(user)', function(data){
        $.ajax({
            url:"<?php echo url('Agent/edit'); ?>",
            type:"post",
            data:$('#editForm').serialize(),
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
    
});
//导航标题
$(function(){
    $(window.parent.document).find('#right_title').text($('title').text());
});


</script>
</body>
</html>
