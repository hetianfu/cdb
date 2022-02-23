<?php /*a:3:{s:55:"/www/wwwroot/wetbc.cc/app/dingadmin/view/auth/rule.html";i:1607512948;s:59:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/header.html";i:1607351074;s:57:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <title>权限管理</title>
  <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 0 0 80px 0;">

  <div class="layui-form" style="padding: 20px 0 0 0;">

    <form method="post" action="" autocomplete="off" class="layui-form">
      <input type="hidden" name="roleid" value="<?php echo htmlentities(htmlspecialchars(app('request')->param('roleid'))); ?>">
      <div class="layui-form-item">
        <label class="layui-form-label">权限列表</label>
        <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="layui-input-block">
          <input type="checkbox" name="menu[<?php echo htmlentities($vo['id']); ?>]" title="<?php echo htmlentities($vo['title']); ?>" value="<?php echo htmlentities($vo['id']); ?>" lay-skin="primary" class="level_one" <?php if(in_array(($vo['id']), is_array($rulesArr)?$rulesArr:explode(',',$rulesArr))): ?>checked<?php endif; ?>> 
          <?php if(is_array($vo[$vo['id']]) || $vo[$vo['id']] instanceof \think\Collection || $vo[$vo['id']] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo[$vo['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <div class="layui-input-block">
              <input type="checkbox" name="menu[<?php echo htmlentities($v['id']); ?>]" title="<?php echo htmlentities($v['title']); ?>" value="<?php echo htmlentities($v['id']); ?>" lay-skin="primary" class="level_two" <?php if(in_array(($v['id']), is_array($rulesArr)?$rulesArr:explode(',',$rulesArr))): ?>checked<?php endif; ?>> 
              <?php if(is_array($v[$v['id']]) || $v[$v['id']] instanceof \think\Collection || $v[$v['id']] instanceof \think\Paginator): $i = 0; $__LIST__ = $v[$v['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?>
              <div class="layui-input-block">
                  <input type="checkbox" name="menu[<?php echo htmlentities($v1['id']); ?>]" lay-skin="primary" title="<?php echo htmlentities($v1['title']); ?>" value="<?php echo htmlentities($v1['id']); ?>" class="level_three" <?php if(in_array(($v1['id']), is_array($rulesArr)?$rulesArr:explode(',',$rulesArr))): ?>checked<?php endif; ?>>
              </div>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </div> 
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>

      </div>

      <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="auth">立即提交</button>
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
  //选中
  $('.layui-form-checkbox').on('click', function (e){
    var children = $(this).parent('.layui-input-block').find('.layui-form-checkbox');
    var input = $(this).parent('.layui-input-block').find('input');
    if($(this).prev('input').hasClass('level_three')){
      if($(this).hasClass('layui-form-checked') == true){
        $(this).addClass('layui-form-checked')
        $(this).prev('input').prop('checked',true);
      }else{
        $(this).removeClass('layui-form-checked');
        $(this).prev('input').prop('checked',false);
      }
    }else{
      if($(this).hasClass('layui-form-checked') == true){
        children.addClass('layui-form-checked')
        input.prop('checked',true);
      }else{
        children.removeClass('layui-form-checked');
        input.prop('checked',false);
      }
    }
  })
  //监听提交
  form.on('submit(auth)',function(data){
    var menu_ids = data.field;
    var url = "<?php echo url('Auth/rule'); ?>";
    $.post(url,menu_ids,function(data){
      if (data.status == 'error') {
        layer.msg(data.msg,{icon: 5});//失败的表情
        return;
      }else{
        layer.msg(data.msg,{icon: 6,time: 2000},function(){
          history.go(-1);
        });
      }
    });
    return false;//阻止表单跳转
  });

})



//页面导航标题内容
$(function(){
  $(window.parent.document).find('#right_title').text($('title').text());
})

</script>
</body>
</html>