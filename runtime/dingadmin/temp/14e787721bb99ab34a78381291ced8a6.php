<?php /*a:3:{s:64:"/opt/homebrew/var/www/cdb/app/dingadmin/view/top_active/add.html";i:1645150953;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1607351074;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>添加文章</title>
  <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 0px 10px;padding-bottom: 45px;" enctype="multipart/form-data">
<div class="">
  <form class="layui-form" action="" method="post" id="groupForm">
    <div class="layui-tab-content">
      <!-- 基本设置 -->
      <div class="layui-tab-item layui-show">
        <div class="layui-form-item">
          <label class="layui-form-label">活动标题</label>
          <div class="layui-input-block">
            <input type="text" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
          </div>
        </div>

        <div class="layui-form-item">
          <label class="layui-form-label">开始时间</label>
          <div class="layui-input-block">
            <input type="text" name="start_time" id="start_time" value="<?php echo date('Y-m-d H:i:s',time())?>" required lay-verify="required" placeholder="请输入开始时间" autocomplete="off" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">结束时间</label>
          <div class="layui-input-block">
            <input type="text" name="end_time" id="end_time" value="<?php echo date('Y-m-d H:i:s',time())?>" required lay-verify="required" placeholder="请输入结束时间" autocomplete="off" class="layui-input">
          </div>
        </div>

        <div class="layui-form-item">
          <label class="layui-form-label">添加时间</label>
          <div class="layui-input-block">
            <input type="text" name="addtime" id="addtime" value="<?php echo date('Y/m/d H:i:s',time())?>" required lay-verify="required" placeholder="请输入活动时间" autocomplete="off" class="layui-input">
          </div>
        </div>


        <div class="layui-form-item" id="last">
          <label class="layui-form-label">配置内容</label>
          <div class="layui-input-inline">
            <input type="text" id="amount" name="amount[]" lay-verify="required" placeholder="请输入金额" autocomplete="off" class="layui-input input-double-width">

          </div>
          <div class="layui-input-inline">
            <input type="text" id="jl_amount" name="jl_amount[]" lay-verify="required" placeholder="请输入赠送金额" autocomplete="off" class="layui-input input-double-width">

          </div>
          <div class="layui-input-inline">
            <button id="add" type="button" class="layui-btn layui-btn-warm layui-btn-sm">
              <i class="layui-icon">&#xe654;</i>
            </button>
          </div>
        </div>



        <div class="layui-form-item">
          <label class="layui-form-label">是否有效</label>
          <div class="layui-input-inline">
            <input type="checkbox" value="1" name="status" lay-skin="switch" lay-text="有效|无效">
          </div>
        </div>

      </div>
    </div>
    <div class="layui-form-item">
      <div class="layui-input-block">
        <button class="layui-btn" lay-submit lay-filter="formDemo">添加</button>
      </div>
    </div>
  </form>

</div>

<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/admin.js"></script>


<!-- 百度编辑器配置文件 -->
<script src="/public/static/admin/vendor/ueditor/ueditor.config.js"></script>
<!-- 百度编辑器源码文件 -->
<script src="/public/static/admin/vendor/ueditor/ueditor.all.js"></script>
<script>
  //实例化编辑器
  var ue = UE.getEditor('content',{
    initialFrameWidth:null,
  });

  //监听提交
  layui.use(['form','upload','laydate'], function(){
    var laydate = layui.laydate;

    laydate.render({
      elem: '#start_time'
      ,type: 'datetime'
    });
    laydate.render({
      elem: '#end_time'
      ,type: 'datetime'
    });
    laydate.render({
      elem: '#addtime'
      ,type: 'datetime'
    });

    var form = layui.form;
    var upload = layui.upload;
    //监听提交
    form.on('submit(formDemo)', function(data){
      $.ajax({
        url:"<?php echo url('TopActive/add'); ?>",
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



    //动态添加input输入框
    var max = 15;
    var x = 1;
    $("#add").click(function(){
      var str =  '<div class="layui-form-item">'+
        '<label class="layui-form-label"></label>'+
        '<div class="layui-input-inline">'+
        '<input type="text" name="amount[]" placeholder="请输入金额" class="layui-input input-double-width">'+
        '</div>'+
        '<div class="layui-input-inline">'+
        '<input type="text" name="jl_amount[]" placeholder="请输入赠送金额" class="layui-input input-double-width">'+
        '</div>'+
        '<div class="layui-input-inline" >'+
        '<button type="button" class="layui-btn layui-btn-danger layui-btn-sm removeclass"><i class="layui-icon">&#xe67e;</i></button>'+
        '</div>'+
        '</div>';

      $("#last").append(str);
      x++;

    });

    //删除动态添加的input输入框
    $("body").on('click',".removeclass",function(){
      if(x>1){
        //元素移除前校验是否被引用
        var approvalName = $(this).parent().prev('div.layui-input-inline').children().val();
        var parentEle = $(this).parent().parent();
        parentEle.remove();
        x--;
      }
    });





  });
  //导航标题
  $(function(){
    $(window.parent.document).find('#right_title').text($('title').text());
  });


</script>
</body>
</html>
