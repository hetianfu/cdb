<?php /*a:3:{s:55:"/www/wwwroot/wetbc.cc/app/dingadmin/view/auth/edit.html";i:1608539484;s:59:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/header.html";i:1607351074;s:57:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <title>添加角色</title>
  <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body>

  <div class="layui-form" style="padding: 20px 0 0 0;">
    <form method="post" action="" id="groupForm">
      <input type="hidden" name="id" value="<?php echo htmlentities($group_info['id']); ?>" />
      <div class="layui-form-item">
        <label class="layui-form-label">角色名称</label>
        <div class="layui-input-inline">
          <input type="text" name="title" value="<?php echo htmlentities($group_info['title']); ?>" placeholder="请输入角色名称" autocomplete="off" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">是否验证</label>
        <div class="layui-input-inline">
          <input type="checkbox" checked="" name="is_manager" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF">
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
layui.use(['layer','form'],function(){
  var form = layui.form,$ = layui.jquery,layer = layui.layer;
  //监听提交
  form.on('submit(user)',function(data){
    $.ajax({
      url:"<?php echo url('Auth/edit'); ?>",
      type:'post',
      data:$('#groupForm').serialize(),
      success:function(res){
        if (res.status) {
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
  });


})



//页面导航标题内容
$(function(){
  $(window.parent.document).find('#right_title').text($('title').text());
})

</script>
</body>
</html>