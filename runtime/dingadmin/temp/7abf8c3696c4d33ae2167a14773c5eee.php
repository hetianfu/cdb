<?php /*a:3:{s:60:"/opt/homebrew/var/www/cdb/app/dingadmin/view/user/lowlv.html";i:1633088518;s:63:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/header.html";i:1607351074;s:61:"/opt/homebrew/var/www/cdb/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>团队</title>
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
        
        .flex-column{ flex-direction: column; }
        
        .a-center {
            align-items: center;
        }
        
        .j-center {
            justify-content: center;
        }
        .mt-5{margin-top: 5px}
        .ml-20{margin-left: 20px}
        .font-16{
            font-size: 16px;
        }
    </style>
</head>
<body style="padding: 10px 10px 80px 10px;">
    <form class="layui-form" action="" method="post">
    
    <div class="">
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li class="layui-this">一级</li>
                <li>二级</li>
                <li>三级</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <table class="layui-table" lay-size="sm">
                        <thead>
                        <tr pid="0">
                            <th style="text-align: center;">序号</th>
                            <th>会员账号</th>
                            <th>会员等级</th>
                            <th>手机号码</th>
                            <th>推荐人</th>
                            <th>直推人数</th>
                            <th>注册时间</th>
                            <th>最后登陆时间</th>
                            <th>状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list1) || $list1 instanceof \think\Collection || $list1 instanceof \think\Paginator): $k = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                        <tr>
                            <td style="text-align: center;"><?php echo htmlentities($k); ?></td>
                            <td><?php echo htmlentities($vo['username']); ?></td>
                            <td><?php echo htmlentities($vo['lv_name']); ?></td>
                            <td><?php echo htmlentities($vo['phone']); ?></td>
                            <td><?php echo htmlentities($vo['parent']); ?></td>
                            <td><?php echo htmlentities($vo['parentcount']); ?></td>
                            <td><?php echo htmlentities(date('Y-m-d',!is_numeric($vo['reg_time'])? strtotime($vo['reg_time']) : $vo['reg_time'])); ?></td>
                            <td><?php echo htmlentities(date('Y-m-d',!is_numeric($vo['online_time'])? strtotime($vo['online_time']) : $vo['online_time'])); ?></td>
                            <td><?php if($vo['lock'] == 1): ?>正常<?php else: ?>禁止<?php endif; ?></td>
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
                            <th>会员账号</th>
                            <th>会员等级</th>
                            <th>手机号码</th>
                            <th>推荐人</th>
                            <th>直推人数</th>
                            <th>注册时间</th>
                            <th>最后登陆时间</th>
                            <th>状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list2) || $list2 instanceof \think\Collection || $list2 instanceof \think\Paginator): $k = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                        <tr>
                            <td style="text-align: center;"><?php echo htmlentities($k); ?></td>
                            <td><?php echo htmlentities($vo['username']); ?></td>
                            <td><?php echo htmlentities($vo['lv_name']); ?></td>
                            <td><?php echo htmlentities($vo['phone']); ?></td>
                            <td><?php echo htmlentities($vo['parent']); ?></td>
                            <td><?php echo htmlentities($vo['parentcount']); ?></td>
                            <td><?php echo htmlentities(date('Y-m-d',!is_numeric($vo['reg_time'])? strtotime($vo['reg_time']) : $vo['reg_time'])); ?></td>
                            <td><?php echo htmlentities(date('Y-m-d',!is_numeric($vo['online_time'])? strtotime($vo['online_time']) : $vo['online_time'])); ?></td>
                            <td><?php if($vo['lock'] == 1): ?>正常<?php else: ?>禁止<?php endif; ?></td>
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
                            <th>会员账号</th>
                            <th>会员等级</th>
                            <th>手机号码</th>
                            <th>推荐人</th>
                            <th>直推人数</th>
                            <th>注册时间</th>
                            <th>最后登陆时间</th>
                            <th>状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list3) || $list3 instanceof \think\Collection || $list3 instanceof \think\Paginator): $k = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                        <tr>
                            <td style="text-align: center;"><?php echo htmlentities($k); ?></td>
                            <td><?php echo htmlentities($vo['username']); ?></td>
                            <td><?php echo htmlentities($vo['lv_name']); ?></td>
                            <td><?php echo htmlentities($vo['phone']); ?></td>
                            <td><?php echo htmlentities($vo['parent']); ?></td>
                            <td><?php echo htmlentities($vo['parentcount']); ?></td>
                            <td><?php echo htmlentities(date('Y-m-d',!is_numeric($vo['reg_time'])? strtotime($vo['reg_time']) : $vo['reg_time'])); ?></td>
                            <td><?php echo htmlentities(date('Y-m-d',!is_numeric($vo['online_time'])? strtotime($vo['online_time']) : $vo['online_time'])); ?></td>
                            <td><?php if($vo['lock'] == 1): ?>正常<?php else: ?>禁止<?php endif; ?></td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        
        
    </div>
    </form>
    

<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/admin.js"></script>


<script>
//删除提示
layui.use(['layer','form','element'], function(){
    var layer = layui.layer;
    var form = layui.form;
    var element = layui.element;
});

/*添加*/
function admin_add(title,url,w,h) {
    x_admin_show(title,url,w,h);
}
/*编辑*/
function admin_edit(title,url,w,h) {
    x_admin_show(title,url,w,h);
}

//页面导航标题内容
$(function(){
    $(window.parent.document).find('#right_title').text($('title').text());
})

</script>
</body>
</html>