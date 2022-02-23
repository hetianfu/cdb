<?php /*a:3:{s:66:"/opt/homebrew/var/www/cdb/app/dingadmin/view/user/achievement.html";i:1633093234;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1607351074;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>业绩</title>
  <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


  <style>
    .layui-col-md4 {
      height: 100px;
    }
    
    .d-flex {
      display: flex;
    }
    
    .flex-column {
      flex-direction: column;
    }
    
    .a-center {
      align-items: center;
    }
    
    .j-center {
      justify-content: center;
    }
    
    .mt-5 {
      margin-top: 5px
    }
    
    .ml-20 {
      margin-left: 20px
    }
    
    .font-16 {
      font-size: 16px;
    }
  </style>
</head>
<body style="padding: 10px 10px 80px 10px;">

<form class="layui-form" action="" method="get" autocomplete="off" id="from">
  <div class="layui-form-item">
    <div class="layui-inline">
      <div class="layui-input-inline">
        <input type="text" name="username" autocomplete="off" placeholder="会员账号" class="layui-input" value="<?php echo htmlentities($username); ?>">
        <input type="hidden" name="id" autocomplete="off"  class="layui-input" value="<?php echo htmlentities($id); ?>">
      </div>
      
      
      <div class="layui-input-inline">
        <button ype="submit" class="layui-btn">搜索</button>
      </div>
    </div>
  </div>
</form>
<div class="">
  <div class="layui-tab">
    <ul class="layui-tab-title">
      <li class="layui-this">入金 : <?php echo htmlentities($rechargeSum); ?></li>
      <li>出金 : <?php echo htmlentities($withdrawalSum); ?></li>
    </ul>
    <div class="layui-tab-content">
      <div class="layui-tab-item layui-show">
        <table class="layui-table" lay-size="sm">
          <thead>
          <tr pid="0">
            <th style="text-align: center;">序号</th>
            <th>订单号</th>
            <th>会员账号</th>
            <th>入金</th>
            <th>日期</th>
          </tr>
          </thead>
          <tbody>
          <?php if(is_array($rechargeList) || $rechargeList instanceof \think\Collection || $rechargeList instanceof \think\Paginator): $k = 0; $__LIST__ = $rechargeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
          <tr>
            <td style="text-align: center;"><?php echo htmlentities($k); ?></td>
            <td><?php echo htmlentities($vo['order_num']); ?></td>
            <td><?php echo htmlentities($vo['username']); ?></td>
            <td><?php echo htmlentities($vo['money']); ?></td>
            <td><?php echo htmlentities(date('Y-m-d',!is_numeric($vo['addtime'])? strtotime($vo['addtime']) : $vo['addtime'])); ?></td>
          </tr>
          <?php endforeach; endif; else: echo "" ;endif; ?>
          
          </tbody>
        </table>
      </div>
      <div class="layui-tab-item">
        <table class="layui-table" lay-size="sm">
          <thead>
          <tr pid="0">
            <th style="text-align: center;">序号</th>
            <th>订单号</th>
            <th>会员账号</th>
            <th>出金</th>
            <th>日期</th>
          </tr>
          </thead>
          <tbody>
          <?php if(is_array($withdrawalList) || $withdrawalList instanceof \think\Collection || $withdrawalList instanceof \think\Paginator): $k = 0; $__LIST__ = $withdrawalList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
          <tr>
            <td style="text-align: center;"><?php echo htmlentities($k); ?></td>
            <td><?php echo htmlentities($vo['order_num']); ?></td>
            <td><?php echo htmlentities($vo['username']); ?></td>
            <td><?php echo htmlentities($vo['money']); ?></td>
            <td><?php echo htmlentities(date('Y-m-d',!is_numeric($vo['addtime'])? strtotime($vo['addtime']) : $vo['addtime'])); ?></td>
          </tr>
          <?php endforeach; endif; else: echo "" ;endif; ?>
      
          </tbody>
        </table>
      </div>
    
    </div>
  </div>


</div>


<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/admin.js"></script>


<script>
  //删除提示
  layui.use(['layer', 'form', 'element'], function () {
    var layer = layui.layer;
    var form = layui.form;
    var element = layui.element;
  });
  
  /*添加*/
  function admin_add(title, url, w, h) {
    x_admin_show(title, url, w, h);
  }
  
  /*编辑*/
  function admin_edit(title, url, w, h) {
    x_admin_show(title, url, w, h);
  }
  
  //页面导航标题内容
  $(function () {
    $(window.parent.document).find('#right_title').text($('title').text());
  })

</script>
</body>
</html>