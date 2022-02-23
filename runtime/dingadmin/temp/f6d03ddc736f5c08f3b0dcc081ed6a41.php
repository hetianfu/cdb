<?php /*a:3:{s:66:"/opt/homebrew/var/www/cdb/app/dingadmin/view/top_active/index.html";i:1645085944;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1607351074;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>充值活动列表</title>
  <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 10px 10px;">
<form class="layui-form" action="<?php echo url('TopActive/delall'); ?>" method="post">
  <div class="layui-container">
    <div>
      <a href="javascript:;" class="layui-btn layui-btn-small" onclick="admin_add('添加','<?php echo url('TopActive/add'); ?>',850,600)">添加</a>


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
        <th>活动时间</th>
        <th>是否有效</th>
        <th>操作</th>
      </tr>
      </thead>
      <tbody>
      <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <tr>
        <td style="text-align: center;"><input type="checkbox" name="id[]" class="qx" value="<?php echo htmlentities($vo['id']); ?>" lay-skin="primary"></td>
        <td style="text-align: center;"><?php echo htmlentities($vo['id']); ?></td>
        <td><?php echo htmlentities($vo['title']); ?></td>
        <td><?php echo htmlentities(date( "Y-m-d H:i:s",!is_numeric($vo['start_time'])? strtotime($vo['start_time']) : $vo['start_time'])); ?>----<?php echo htmlentities(date( "Y-m-d H:i:s",!is_numeric($vo['end_time'])? strtotime($vo['end_time']) : $vo['end_time'])); ?></td>

        <td>
          <div class="layui-input-inline">
            <input type="checkbox" value="<?php echo htmlentities($vo['id']); ?>" name="status" <?php echo !empty($vo['status']) ? "checked" : ""; ?> lay-skin="switch" lay-text="有效|无效" lay-filter="status">
          </div>
        </td>

        <td>
          <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="admin_edit('编辑','<?php echo url('TopActive/edit',['id'=>$vo['id']]); ?>',850,600)">编辑</a>
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
      location.href = "<?php echo url('TopActive/index'); ?>?cid="+cid;
    });
    //置顶切换操作
    form.on('switch(status)', function(data){
      var status = data.elem.checked;//开关是否开启，true或者false
      var id = data.value;
      $.ajax({
        'type':'post',
        'url':"<?php echo url('TopActive/status'); ?>",
        'data':{'id':id,"status":status},
        'datatype':'json',
        success:function(msg){
          layer.msg(msg.msg,{time:1000},function(){
            location.href = "<?php echo url('TopActive/index'); ?>";
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
        url:"<?php echo url('TopActive/del'); ?>",
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
