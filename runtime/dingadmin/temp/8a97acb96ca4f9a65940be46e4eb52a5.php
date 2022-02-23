<?php /*a:3:{s:67:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/article/edit.html";i:1611385930;s:68:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/header.html";i:1607351074;s:66:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>编辑内容</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 0px 10px;padding-bottom: 45px;" enctype="multipart/form-data">
    <div class="">
        <form class="layui-form" action="" method="post" id="groupForm">
            <input type="hidden" name="id" value="<?php echo htmlentities($article['id']); ?>">
            <div class="layui-tab-content">
                <!-- 基本设置 -->
                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属栏目</label>
                        <div class="layui-input-inline">
                            <select name="cid" required lay-verify="required">
                                <option value="">请选择所属栏目</option>
                                <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo htmlentities($vo['id']); ?>" <?php if($vo['id'] == $article['cid']): ?>selected<?php endif; ?>><?php echo htmlentities($vo['name']); ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" value="<?php echo htmlentities($article['title']); ?>" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">关键字</label>
                        <div class="layui-input-block">
                            <input type="text" name="keyword" value="<?php echo htmlentities($article['keyword']); ?>" placeholder="请输入栏目关键字" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">描述</label>
                        <div class="layui-input-block">
                            <textarea name="desc" placeholder="请输入描述" class="layui-textarea"><?php echo htmlentities($article['desc']); ?></textarea>
                        </div>
                    </div>


                    <div class="layui-form-item">
                        <label class="layui-form-label">摘要</label>
                        <div class="layui-input-block">
                            <textarea name="remark" placeholder="请输入摘要" class="layui-textarea"><?php echo htmlentities($article['remark']); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">作者</label>
                        <div class="layui-input-inline">
                            <input type="text" name="author" value="<?php echo htmlentities($article['author']); ?>" placeholder="请输入作者" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">浏览次数</label>
                        <div class="layui-input-inline">
                            <input type="text" name="views" value="<?php echo htmlentities($article['views']); ?>" required lay-verify="required" placeholder="请输入浏览次数" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">添加时间</label>
                        <div class="layui-input-inline">
                            <input type="text" name="addtime" value="<?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($article['addtime'])? strtotime($article['addtime']) : $article['addtime'])); ?>" required lay-verify="required" placeholder="请输入添加时间" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">是否置顶</label>
                        <div class="layui-input-inline">
                            <input type="checkbox" value="1" name="istop" <?php echo !empty($article['istop']) ? "checked" : ""; ?> lay-skin="switch" lay-text="置顶|取消">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">缩略图</label>
                        <div class="layui-input-block">
                            <input type="hidden" name="pic" placeholder="请上传缩略图" autocomplete="off" class="layui-input" value="">
                            <button type="button" class="layui-btn" id="uploadimg">
                                <i class="layui-icon">&#xe67c;</i>上传缩略图
                            </button>
<style>
#thumb_list{padding-top: 8px;}
#thumb_list img{border: 1px solid #DDD;padding: 3px;border-radius: 5px;height: 120px;width: 160px;}
#thumb_list span{position: relative;display: inline-block;margin-right: 5px;}
#thumb_list span .delimg{position: absolute;right: 3px;top: 3px;}
</style>
                            <div id="thumb_list">
                                <?php if(is_array($article['pic']) || $article['pic'] instanceof \think\Collection || $article['pic'] instanceof \think\Paginator): $i = 0; $__LIST__ = $article['pic'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <span>
                                    <img src="<?php echo htmlentities($vo['pic']); ?>">
                                    <button type="button" class="layui-btn layui-btn-danger layui-btn-xs delimg" onclick="delimg(this)" data="<?php echo htmlentities($vo['pic']); ?>">
                                    <i class="layui-icon">&#xe640</i>
                                    </button>
                                </span>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">内容</label>
                        <div class="layui-input-block">
                            <!-- 加载编辑器的容器 -->
                            <script id="content" name="content" type="text/plain" style="height: 300px;"><?php echo $article['content']; ?></script>
                        </div>
                    </div>

                </div>

            </div>

            
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">修改</button>
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
var ue = UE.getEditor('content');

//监听提交
layui.use(['form','upload'], function(){
    var form = layui.form;
    var upload = layui.upload;
    //监听提交
    form.on('submit(formDemo)', function(data){
        $.ajax({
            url:"<?php echo url('Article/edit'); ?>",
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
        url: '<?php echo url("Base/uploadimg"); ?>',
        accept:'images',//允许上传的文件类型
        field:'imgfile',//文件域的字段名
        size: 2048, //最大允许上传的文件大小
        before:function(){ //文件提交前的回调
            var index = layer.load();
        },
        done: function(res, index, upload){ //上传后的回调
            layer.close(layer.index,{isOutAnim:true});
            setTimeout(function(){
                layer.msg(res.msg);
                if(res.code==1){
                    var pic = $('input[name=pic]').val();
                    if(pic==""){
                        $('input[name=pic]').val(res.img);
                    }else{
                        $('input[name=pic]').val(pic+","+res.img);
                    }
                    var str;
                    str = '<span>';
                    str = str+'<img src="'+res.img+'">';
                    str = str+'<button type="button" class="layui-btn layui-btn-danger layui-btn-xs delimg" onclick="delimg(this)" data="'+res.img+'">';
                    str = str+'<i class="layui-icon">&#xe640</i>';
                    str = str+'</button>';
                    str = str+'</span>';
                    $('#thumb_list').append(str);
                }
            },500);
        },
    })
});
//导航标题
$(function(){
    $(window.parent.document).find('#right_title').text($('title').text());
});
//异步图片删除
function delimg(obj){
    var picurl = $(obj).attr('data');
    $.ajax({
        type:"post",
        url:"<?php echo url('Base/delimg'); ?>",
        data:{'url':picurl},
        success:function(res){
            var picvalue = $('input[name=pic]').val();
            var str = '';
            if(res.code==1 || res.code==2){
                if(picvalue==picurl){
                    $('input[name=pic]').val('');
                }else{
                    str = picvalue.replace(picurl+",","");
                    str = str.replace(","+picurl,"");
                    $('input[name=pic]').val(str);
                }
                //移除被删除的缩略图
                $(obj).parent().remove();
                layer.msg(res.msg);
            }
            if(res.code==0){
                layer.msg(res.msg);
            }
        }
    });
}

</script>
</body>
</html>