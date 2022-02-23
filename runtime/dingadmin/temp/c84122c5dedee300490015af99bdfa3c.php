<?php /*a:3:{s:58:"/www/wwwroot/wetbc.cc/app/dingadmin/view/config/index.html";i:1625226122;s:59:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/header.html";i:1607351074;s:57:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>站点配置</title>
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
                <label class="layui-form-label">网站名称</label>
                <div class="layui-input-block">
                    <input type="text" name="web_name" value="<?php echo !empty($config['web_name']) ? htmlentities($config['web_name']) : ''; ?>" placeholder="请输入管理员账号" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">网站网址</label>
                <div class="layui-input-block">
                    <input type="text" name="web_link" value="<?php echo !empty($config['web_link']) ? htmlentities($config['web_link']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">LOGO上传</label>
                <div class="layui-input-block">
                    <input type="hidden" name="web_logo" placeholder="请上传缩略图" autocomplete="off" class="layui-input" value="<?php echo htmlentities($config['web_logo']); ?>">
                    <button type="button" class="layui-btn" id="uploadimg">
                        <i class="layui-icon">&#xe67c;</i>上传缩略图
                    </button>
<style>
#thumb_list{padding-top: 8px;}
#thumb_list img{border: 1px solid #DDD;padding: 3px;border-radius: 5px;height: 120px;width: 160px;}
#thumb_list span{position: relative;display: inline-block;margin-right: 5px;}
</style>
                    <div id="thumb_list">
                        <!-- 存放上传的图片 -->
                        <?php if($config['web_logo']): ?>
                        <span>
                            <img id="logo" src="<?php echo htmlentities($config['web_logo']); ?>">
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">关键字</label>
                <div class="layui-input-block">
                    <input type="text" name="web_keyword" value="<?php echo !empty($config['web_keyword']) ? htmlentities($config['web_keyword']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">描述</label>
                <div class="layui-input-block">
                    <input type="text" name="web_desc" value="<?php echo !empty($config['web_desc']) ? htmlentities($config['web_desc']) : ''; ?>" placeholder="" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">电话</label>
                <div class="layui-input-inline">
                    <input type="text" name="web_phone" value="<?php echo !empty($config['web_phone']) ? htmlentities($config['web_phone']) : ''; ?>" placeholder="" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">在线客服</label>
                <div class="layui-input-inline">
                    <input type="text" name="web_online" value="<?php echo !empty($config['web_online']) ? htmlentities($config['web_online']) : ''; ?>"  placeholder="请输入在线客服QQ" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">公司地址</label>
                <div class="layui-input-block">
                    <input type="text" name="web_address" value="<?php echo !empty($config['web_address']) ? htmlentities($config['web_address']) : ''; ?>"  placeholder="" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">网站状态</label>
                <div class="layui-input-block">
                    <input type="checkbox" name="web_state" value="1" lay-skin="switch" <?php echo !empty($config['web_state']) ? "checked" : ""; ?> lay-text="开启|关闭">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">关站提示</label>
                <div class="layui-input-block">
                    <input type="text" name="closeinfo" value="<?php echo !empty($config['closeinfo']) ? htmlentities($config['closeinfo']) : ''; ?>" placeholder="请输入管理员密码" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">禁止恶意ip注册</label>
                <div class="layui-input-block">
                    <input type="text" name="ips" value="<?php echo !empty($config['ips']) ? htmlentities($config['ips']) : ''; ?>"  placeholder="" autocomplete="off" class="layui-input">
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
            url:"<?php echo url('Config/index'); ?>",
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