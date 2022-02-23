<?php /*a:3:{s:59:"/opt/homebrew/var/www/cdb/app/dingadmin/view/admin/add.html";i:1645080933;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1607351074;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>添加管理员</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 0px 10px;padding-bottom: 45px;" enctype="multipart/form-data">
    <div class="">
        <form class="layui-form" action="" method="post" id="groupForm">
            <input type="hidden" name="__token__" value="<?php echo token(); ?>" />
            <div class="layui-tab-content">
                <!-- 基本设置 -->
                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">角色</label>
                        <div class="layui-input-inline">
                            <select name="groupid" required lay-verify="required" lay-filter="lanmu">
                                <option value="">请选择</option>
                                <?php if(is_array($groups) || $groups instanceof \think\Collection || $groups instanceof \think\Paginator): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['title']); ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">账号</label>
                        <div class="layui-input-inline">
                            <input type="text" name="account" required lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">密码</label>
                        <div class="layui-input-inline">
                            <input type="text" name="password" placeholder="请输入密码" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">重复密码</label>
                        <div class="layui-input-inline">
                            <input type="text" name="reppassword" placeholder="" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                  <div class="layui-form-item agent">
                    <label class="layui-form-label">分成比例(%)</label>
                    <div class="layui-input-inline">
                      <input type="text" name="proportion" placeholder="请输入分成比例" autocomplete="off" value="" class="layui-input">
                    </div>
                  </div>

                  <div class="layui-form-item agent">
                    <label class="layui-form-label">客服号码</label>
                    <div class="layui-input-inline">
                      <input type="text" name="server_code" placeholder="请输入客服号码" autocomplete="off" class="layui-input">
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

  $('.agent').hide();
  form.on("select", function(data){
    if(data.value == 6){
      $('.agent').show();
    }else{
      $('.agent').hide();
    }
  });



    //监听提交
    form.on('submit(user)', function(data){
        $.ajax({
            url:"<?php echo url('Admin/add'); ?>",
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
    
});

//导航标题
$(function(){
    $(window.parent.document).find('#right_title').text($('title').text());


});
</script>




</html>
