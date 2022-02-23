<?php /*a:3:{s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/article/index.html";i:1607586536;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1607351074;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>文章列表</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 10px 10px;">
    <form class="layui-form" action="<?php echo url('article/delall'); ?>" method="post">
    <div class="layui-container">
        <div>
            <a href="javascript:;" class="layui-btn layui-btn-small" onclick="admin_add('添加文章','<?php echo url('article/add'); ?>',850,600)">添加文章</a>
            <button type="submit" class="layui-btn layui-btn-normal layui-btn-danger">批量删除</button>
            <div class="layui-form-item" style="float: right;display: block;">
                <label class="layui-form-label">所属栏目</label>
                <div class="layui-input-inline">
                    <select name="cid" lay-filter="lanmu">
                        <option value="">全部显示</option>
                        <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo['id']); ?>" <?php if($vo['id'] == $cid): ?>selected<?php endif; ?>><?php echo htmlentities($vo['name']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
        </div>
        <table class="layui-table">
            <colgroup>
                <col width="60">
                <col width="80">
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
            </colgroup>
            <thead>
                <tr pid="0">
                    <th style="text-align: center;"><input type="checkbox" name="" lay-skin="primary" lay-filter="quanxuan"></th>
                    <th style="text-align: center;">ID</th>
                    <th>标题</th>
                    <th>所属分类</th>
                    <th>添加时间</th>
                    <th>浏览次数</th>
                    <th>缩略图</th>
                    <th>是否置顶</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td style="text-align: center;"><input type="checkbox" name="id[]" class="qx" value="<?php echo htmlentities($vo['id']); ?>" lay-skin="primary"></td>
                    <td style="text-align: center;"><?php echo htmlentities($vo['id']); ?></td>
                    <td><?php echo htmlentities($vo['title']); ?></td>
                    <td><?php echo htmlentities($vo['name']); ?></td>
                    <td><?php echo htmlentities(date( "Y/m/d H:i:s",!is_numeric($vo['addtime'])? strtotime($vo['addtime']) : $vo['addtime'])); ?></td>
                    <td><?php echo htmlentities($vo['views']); ?></td>
                    <td><span class="layui-badge"><?php echo htmlentities($vo['pic']); ?></span>张</td>
                    <td>
                        <div class="layui-input-inline">
                            <input type="checkbox" value="<?php echo htmlentities($vo['id']); ?>" name="istop" <?php echo !empty($vo['istop']) ? "checked" : ""; ?> lay-skin="switch" lay-text="置顶|取消" lay-filter="istop">
                        </div>
                    </td>
                    <td>
                        <button type="button" id="<?php echo htmlentities($vo['id']); ?>" class="layui-btn layui-btn-xs tupian <?php if($vo['pic'] == '0'): ?>layui-btn-disabled<?php endif; ?>"><i class="layui-icon">&#xe64a</i>图片</button>
                        <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="admin_edit('编辑文章','<?php echo url('article/edit',['id'=>$vo['id']]); ?>',850,600)">编辑</a>
                        <a href="javascript:;" class="layui-btn layui-btn-sm layui-btn-danger" onclick="admin_del(this,'<?php echo htmlentities($vo['id']); ?>')">删除</a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </tbody>
        </table>
        <div style="text-align: right;"><?php echo $page; ?></div>
        
    </div>
    </form>
    

<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/admin.js"></script>


<script>
layui.use(['layer','form'], function(){
    var layer = layui.layer;
    var form = layui.form;

    //监听栏目
    form.on('select(lanmu)', function(data){
        var cid = data.value;
        location.href = "<?php echo url('article/index'); ?>?cid="+cid;
    });   
    //置顶切换操作
    form.on('switch(istop)', function(data){
        var istop = data.elem.checked;//开关是否开启，true或者false
        var id = data.value;
        $.ajax({
            'type':'post',
            'url':"<?php echo url('article/istop'); ?>",
            'data':{'id':id,"istop":istop},
            'datatype':'json',
            success:function(msg){
                layer.msg(msg.msg,{time:1000},function(){
                    location.href = "<?php echo url('article/index'); ?>";
                });
            }
        });
    }); 
    //全选与取消
    form.on('checkbox(quanxuan)', function(data){
        if(data.elem.checked){
            //全选
            $('.qx').prop('checked','checked');//设置或返回被选元素的属性和值
            form.render();
        }else{
            //取消全选
            $('.qx').removeAttr('checked');//移除属性
            form.render();
        }
    });  
    //图片按钮点击事件
    $('.tupian').on('click',function(){
        var id = $(this).attr("id");
        if($(this).hasClass('layui-btn-disabled')){
            return false;
        }
        layer.open({
            type:2,
            title:'图片',
            area:['700px','450px'],
            fixed:false,
            maxmin:true,
            content:'<?php echo url("article/pics"); ?>?aid='+id,
        });
    });
});
/*添加*/
function admin_add(title,url,w,h) {
    x_admin_show(title,url,w,h);
}
/*编辑*/
function admin_edit(title,url,w,h) {
    x_admin_show(title,url,w,h);
}
/*删除*/
function admin_del(obj,id) {
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            url:"<?php echo url('Article/del'); ?>",
            type:'post',
            data:'id='+id,
            success:function(res){
                if(res.status){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }else{
                    layer.msg(res.msg ? res.msg : "操作失败!", {icon: 5},function () {
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.layer.close(index);
                    });
                    return false;
                }
            }
        });
    });
}
//页面导航标题内容
$(function(){
    $(window.parent.document).find('#right_title').text($('title').text());
})

</script>
</body>
</html>