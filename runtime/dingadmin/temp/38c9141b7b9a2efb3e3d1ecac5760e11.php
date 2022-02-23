<?php /*a:3:{s:66:"/opt/homebrew/var/www/cdb/app/dingadmin/view/pay_config/index.html";i:1645425307;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1607351074;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>支付配置</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 10px 10px 50px 10px;">
    <div class="layui-container">
        <form class="layui-form" action="" method="post" enctype="multipart/form-data" id="groupForm">
          <div class="layui-form-item">
            <label class="layui-form-label">网站状态</label>
            <div class="layui-input-block">
              <input type="checkbox" name="type" value="1" lay-skin="switch" <?php echo !empty($config['type']) ? "checked" : ""; ?> lay-text="通道1|通道2">
            </div>
          </div>


            <div class="layui-form-item">
                <label class="layui-form-label">商户id</label>
                <div class="layui-input-block">
                    <input type="text" name="a_mch_id" value="<?php echo !empty($config['a_mch_id']) ? htmlentities($config['a_mch_id']) : ''; ?>" placeholder="商户id" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">通道</label>
                <div class="layui-input-block">
                    <input type="text" name="a_pay_type" value="<?php echo !empty($config['a_pay_type']) ? htmlentities($config['a_pay_type']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label">秘钥</label>
                <div class="layui-input-block">
                    <input type="text" name="a_token" value="<?php echo !empty($config['a_token']) ? htmlentities($config['a_token']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">支付回调地址</label>
                <div class="layui-input-block">
                    <input type="text" name="a_pay_notify_url" value="<?php echo !empty($config['a_pay_notify_url']) ? htmlentities($config['a_pay_notify_url']) : ''; ?>" placeholder="" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">代付回调地址</label>
                <div class="layui-input-block">
                    <input type="text" name="a_out_notify_url" value="<?php echo !empty($config['a_out_notify_url']) ? htmlentities($config['a_out_notify_url']) : ''; ?>" placeholder="" autocomplete="off" class="layui-input">
                </div>
            </div>


          <div class="layui-form-item">
            <label class="layui-form-label">————————————————————</label>
          </div>


          <div class="layui-form-item">
            <label class="layui-form-label">商户id</label>
            <div class="layui-input-block">
              <input type="text" name="b_mch_id" value="<?php echo !empty($config['b_mch_id']) ? htmlentities($config['b_mch_id']) : ''; ?>" placeholder="商户id" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">通道</label>
            <div class="layui-input-block">
              <input type="text" name="b_pay_type" value="<?php echo !empty($config['b_pay_type']) ? htmlentities($config['b_pay_type']) : ''; ?>" autocomplete="off" class="layui-input">
            </div>
          </div>


          <div class="layui-form-item">
            <label class="layui-form-label">秘钥</label>
            <div class="layui-input-block">
              <input type="text" name="b_token" value="<?php echo !empty($config['b_token']) ? htmlentities($config['b_token']) : ''; ?>" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">支付回调地址</label>
            <div class="layui-input-block">
              <input type="text" name="b_pay_notify_url" value="<?php echo !empty($config['b_pay_notify_url']) ? htmlentities($config['b_pay_notify_url']) : ''; ?>" placeholder="" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">代付回调地址</label>
            <div class="layui-input-block">
              <input type="text" name="b_out_notify_url" value="<?php echo !empty($config['b_out_notify_url']) ? htmlentities($config['b_out_notify_url']) : ''; ?>" placeholder="" autocomplete="off" class="layui-input">
            </div>
          </div>



          <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">确定</button>
                </div>
            </div>
        </form>
    </div>
    


<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/admin.js"></script>


<script>
layui.use(['form','upload'], function(){
    var form = layui.form;
    var upload = layui.upload;
    //监听提交
    form.on('submit(formDemo)', function(data){
        $.ajax({
            url:"<?php echo url('PayConfig/index'); ?>",
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

    //图片上传
    upload.render({
        elem: '#uploadimg',
        url: '<?php echo url("Config/uploadlogo"); ?>',
        accept:'images',//允许上传的文件类型
        field:'imgfile',//文件域的字段名
        size: 2048,     //最大允许上传的文件大小
        before:function(){ //文件提交前的回调
            var index = layer.load();
        },
        done: function(res, index, upload){ //上传后的回调
            layer.close(layer.index,{isOutAnim:true});
            setTimeout(function(){
                layer.msg(res.msg);
                if(res.code==1){
                    var pic = $('input[name=web_logo]').val(res.img);
                    if(pic){
                        $('#logo').attr('src',res.img);
                    }
                }
            },500);
        },
    })
});

$(function(){
    $(window.parent.document).find('#right_title').text($('title').text());
})
</script>
</body>
</html>
