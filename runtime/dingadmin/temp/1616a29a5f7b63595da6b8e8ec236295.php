<?php /*a:3:{s:58:"/opt/homebrew/var/www/cdb/app/dingadmin/view/menu/add.html";i:1607393176;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1607351074;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <title>添加菜单</title>
  <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body>

  <div class="layui-form" style="padding: 20px 0 0 0;">
    <form method="post" action="" id="menuForm">
      <input type="hidden" name="pid" value='<?php if(app('request')->param('pid') != ''): ?><?php echo htmlentities(htmlspecialchars(app('request')->param('pid'))); else: ?>0<?php endif; ?>'>
      <div class="layui-form-item">
        <label class="layui-form-label">菜单图标</label>
        <div class="layui-input-inline">
          <input type="text" name="m[menuicon]" placeholder="请输入菜单图标" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">具体参考layui官网</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">菜单名称</label>
        <div class="layui-input-inline">
          <input type="text" name="m[menuname]" lay-verify="required" placeholder="请输入菜单名称" autocomplete="off" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">控制器名称</label>
        <div class="layui-input-inline">
          <input type="text" name="m[controller]" lay-verify="required" placeholder="请输入控制器名称" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">驼峰法命名</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">方法名称</label>
        <div class="layui-input-inline">
          <input type="text" name="m[action]" lay-verify="required" placeholder="请输入方法名称" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">驼峰法命名</div>
      </div>
      <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="addmenu">立即提交</button>
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
  form.on('submit(addmenu)',function(data){
    $.ajax({
      url:"<?php echo url('Menu/add'); ?>",
      type:'post',
      data:$('#menuForm').serialize(),
      success:function(res){
        if (res.status) {
          layer.alert("添加成功", {icon: 6},function () {
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