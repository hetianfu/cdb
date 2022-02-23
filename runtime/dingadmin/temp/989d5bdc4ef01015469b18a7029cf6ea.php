<?php /*a:3:{s:58:"/www/wwwroot/wetbc.cc/app/dingadmin/view/product/edit.html";i:1633157020;s:59:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/header.html";i:1607351074;s:57:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>编辑产品</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 0px 10px;padding-bottom: 45px;" enctype="multipart/form-data">

    <form class="layui-form" action="" method="post" id="groupForm">
        <input type="hidden" name="id" value="<?php echo htmlentities($one['id']); ?>">
        <div class="layui-tab-content">
            <div class="layui-form-item">
                <label class="layui-form-label">产品名称</label>
                <div class="layui-input-block">
                    <input type="text" name="title" value="<?php echo htmlentities($one['title']); ?>" required lay-verify="required" placeholder="请输入产品名称" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">期数</label>
                <div class="layui-input-inline">
                    <input type="text" name="zhouqi" value="<?php echo htmlentities($one['zhouqi']); ?>" value="第一期" placeholder="" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">所属分类</label>
                <div class="layui-input-inline">
                    <select name="type_id"  lay-verify="required">
                        <option value="1" <?php if($one['type_id'] == 1): ?> selected <?php endif; ?>>会员</option>
                        <option value="2" <?php if($one['type_id'] == 2): ?> selected <?php endif; ?>>投资</option>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">允许等级</label>
                <div class="layui-input-inline">
                    <select name="allow_lv" lay-verify="required">
                        <?php if(is_array($lvarr) || $lvarr instanceof \think\Collection || $lvarr instanceof \think\Paginator): $i = 0; $__LIST__ = $lvarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option <?php if($one['allow_lv'] == $vo['level']): ?> selected <?php endif; ?> value="<?php echo htmlentities($vo['level']); ?>"><?php echo htmlentities($vo['lv_name']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">对应会员等级是否允许购买此产品</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">单价</label>
                <div class="layui-input-inline">
                    <input type="text" name="price" value="<?php echo htmlentities($one['price']); ?>" placeholder="" autocomplete="off" class="layui-input">
                </div>
               
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">会员积分</label>
                <div class="layui-input-inline">
                    <input type="text" name="integral" value="<?php echo htmlentities($one['integral']); ?>"  placeholder="" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">对应会员积分是否允许购买此产品</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">库存</label>
                <div class="layui-input-inline">
                    <input type="text" name="stock" value="<?php echo htmlentities($one['stock']); ?>" placeholder="" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">运行周期</label>
                <div class="layui-input-inline">
                    <input type="text" name="yxzq" value="<?php echo htmlentities($one['yxzq']); ?>" placeholder="" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">天</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">收益</label>
                <div class="layui-input-inline">
                    <input type="text" name="day_shouyi" value="<?php echo htmlentities($one['day_shouyi']); ?>" placeholder="" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">每日</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">限购</label>
                <div class="layui-input-inline">
                    <input type="text" name="xiangou" value="<?php echo htmlentities($one['xiangou']); ?>" placeholder="" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">排序</label>
                <div class="layui-input-inline">
                    <input type="text" name="sort" value="<?php echo htmlentities($one['sort']); ?>" placeholder="" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">上下架</label>
                <div class="layui-input-inline">
                    <input type="checkbox" value="1" name="is_on" <?php echo !empty($one['is_on']) ? "checked" : ""; ?> lay-skin="switch" lay-text="上架|下架">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">缩略图</label>
                <div class="layui-input-inline">
                    <input type="hidden" name="thumb" placeholder="请上传缩略图" autocomplete="off" class="layui-input" value="<?php echo htmlentities($one['thumb']); ?>">
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
                            <img src="<?php echo htmlentities($one['thumb']); ?>" id="picbox">
                        </span>
                    </div>
                </div>
                <div class="layui-form-mid layui-word-aux">缩略图大小：300*250</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">产品详情</label>
                <div class="layui-input-block">
                    <!-- 加载编辑器的容器 -->
                    <script id="content" name="content" type="text/plain" style="height: 300px;"><?php echo $one['content']; ?></script>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">提交</button>
                </div>
            </div>
        </div>
        
    </form>



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
    var form = layui.form;
    var upload = layui.upload;
    var laydate = layui.laydate;
    //监听提交
    form.on('submit(formDemo)', function(data){
        $.ajax({
            url:"<?php echo url('Product/edit'); ?>",
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
        url: '<?php echo url("Product/upload"); ?>',
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
                    var pic = $('input[name=thumb]').val(res.img);
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