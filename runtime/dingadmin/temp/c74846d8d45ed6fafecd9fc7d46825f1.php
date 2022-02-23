<?php /*a:3:{s:68:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/category/edit.html";i:1607478276;s:68:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/header.html";i:1607351074;s:66:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>编辑栏目</title>
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
                <div class="layui-form-item">
                    <label class="layui-form-label">上级栏目</label>
                    <div class="layui-input-inline">
                        <select name="pid" lay-verify="required">
                            <option value="0">顶级栏目</option>
                            <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option <?php if($one['pid'] == $vo['id']): ?> selected <?php endif; ?> value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['name']); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">栏目名称</label>
                    <div class="layui-input-inline">
                        <input type="text" name="name" value="<?php echo htmlentities($one['name']); ?>" required lay-verify="required" placeholder="请输入栏目名称" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">是否显示</label>
                    <div class="layui-input-block">
                        <input type="radio" name="isshow" value="1" title="是" <?php if($one['isshow'] == 1): ?> checked <?php endif; ?>>
                        <input type="radio" name="isshow" value="2" title="否" <?php if($one['isshow'] == 2): ?> checked <?php endif; ?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">排序</label>
                    <div class="layui-input-inline">
                        <input type="text"  value="<?php echo htmlentities($one['sort']); ?>" name="sort" value="100" placeholder="" autocomplete="off" class="layui-input" style="width: 60px;">
                    </div>
                </div>
            </div>
           
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">提交</button>
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
    //监听提交
    form.on('submit(formDemo)', function(data){
        $.ajax({
            url:"<?php echo url('Category/edit'); ?>",
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


</script>
</body>
</html>