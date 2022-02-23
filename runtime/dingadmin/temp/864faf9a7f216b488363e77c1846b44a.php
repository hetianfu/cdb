<?php /*a:3:{s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/banner/edit.html";i:1607608626;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1607351074;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>编辑轮播图</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 0px 10px;padding-bottom: 45px;" enctype="multipart/form-data">
    <div class="">
        <form class="layui-form" action="" method="post" id="groupForm">
            <input type="hidden" name="id" value="<?php echo htmlentities($one['id']); ?>">
            <div class="layui-tab-content">
                <!-- 基本设置 -->
                <div class="layui-tab-item layui-show">
                    
                    <div class="layui-form-item">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-block">
                            <input type="text" value="<?php echo htmlentities($one['title']); ?>" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">图片</label>
                        <div class="layui-input-block">
                            <input type="hidden" name="pic" placeholder="请上传缩略图" autocomplete="off" class="layui-input" value="<?php echo htmlentities($one['pic']); ?>">
                            <button type="button" class="layui-btn" id="uploadimg">
                                <i class="layui-icon">&#xe67c;</i>上传缩略图
                            </button>
<style>
#thumb_list{padding-top: 8px;}
#thumb_list img{border: 1px solid #DDD;padding: 3px;border-radius: 5px;height: 120px;width: 160px;}
#thumb_list span{position: relative;display: inline-block;margin-right: 5px;}
</style>
                            <div id="thumb_list">
                                <span>
                                    <img src="<?php echo htmlentities($one['pic']); ?>" id="picbox">
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">网址</label>
                        <div class="layui-input-block">
                            <input type="text" value="<?php echo htmlentities($one['url']); ?>" name="url" required lay-verify="required" placeholder="请输入网址" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">是否显示</label>
                        <div class="layui-input-inline">
                            <input type="checkbox" value="1" <?php echo !empty($one['isshow']) ? "checked" : ""; ?> name="isshow" lay-skin="switch" lay-text="显示|隐藏">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo htmlentities($one['sort']); ?>" name="sort" value="100" required lay-verify="required" placeholder="请输入排序" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">介绍</label>
                        <div class="layui-input-block">
                            <textarea name="remark" placeholder="请输入图片介绍" class="layui-textarea"><?php echo htmlentities($one['remark']); ?></textarea>
                        </div>
                    </div>
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
//监听提交
layui.use(['form','upload'], function(){
    var form = layui.form;
    var upload = layui.upload;
    //监听提交
    form.on('submit(formDemo)', function(data){
        $.ajax({
            url:"<?php echo url('Banner/edit'); ?>",
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

    //图片上传
    upload.render({
        elem: '#uploadimg',
        url: '<?php echo url("Banner/upload"); ?>',
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
                    var pic = $('input[name=pic]').val(res.img);
                    if(pic){
                        $('#picbox').attr('src',res.img);
                    }
                }
            },500);
        },
    })


});
//导航标题
$(function(){
    $(window.parent.document).find('#right_title').text($('title').text());
});


</script>
</body>
</html>