<?php /*a:3:{s:57:"/www/wwwroot/wetbc.cc/app/dingadmin/view/index/index.html";i:1633261404;s:59:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/header.html";i:1607351074;s:57:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>理财系统</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo"><a href="" target="_blank"><span class="layui-hide-xs">企业</span>客户管理系统</a></div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-right">
           
            <li class="layui-nav-item">
                <a href="<?php echo url('index/login/index'); ?>" target="_blank">前端</a>
            </li>
            <li class="layui-nav-item layui-hide-xs">
                <a href="javascript:;">
                    <i class="layui-icon" style="font-size: 1.2rem;">&#xe612;</i>
                <?php echo htmlentities($user_info['account']); ?>
                </a>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <i class="layui-icon" style="font-size: 1.2rem;">&#xe620;</i>
                    设置
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('config/index'); ?>" target="_content">系统设置</a></dd>
                    <dd><a href="<?php echo url('manager/setpass'); ?>" target="_content">密码修改</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="<?php echo url('login/loginout'); ?>">退出</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree" lay-shrink="all"  lay-filter="nav" id="nav">
                <?php if(is_array($navmenus) || $navmenus instanceof \think\Collection || $navmenus instanceof \think\Paginator): $i = 0; $__LIST__ = $navmenus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nm): $mod = ($i % 2 );++$i;?>
                    <li class="layui-nav-item">
                        <a class="" href="<?php if($nm['id'] == 1): ?><?php echo url('index/main'); else: ?><?php echo url($nm['menu_name']); ?><?php endif; ?> " target="_content"><i class="layui-icon <?php echo htmlentities($nm['icon']); ?>"></i><?php echo htmlentities($nm['title']); ?></a>
                        <dl class="layui-nav-child">
                        <?php if(is_array($nm[$nm['id']]) || $nm[$nm['id']] instanceof \think\Collection || $nm[$nm['id']] instanceof \think\Paginator): $i = 0; $__LIST__ = $nm[$nm['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                            
                            <dd><a href="<?php echo url($sub['menu_name']); ?>" target="_content"><i class="layui-icon <?php echo htmlentities($sub['icon']); ?>"></i><?php echo htmlentities($sub['title']); ?></a></dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </dl>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    

    </div>

    <div class="layui-body" id="layui-body" style="overflow: hidden;">
        <!-- 内容主体区域 -->
        <div class="title ly-right-title"><span class="actived"><i class="layui-icon">&#xe68e;</i> <span id="right_title">基本信息</span></span></div>
        <iframe id="_content" name="_content" src="<?php echo url('user/index'); ?>" scrolling="yes" frameborder="no" width="100%" height="100%"></iframe>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © 科技兴邦
    </div>
</div>
<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/admin.js"></script>



<script>
    layui.use('element',function () {
        var element = layui.element;
    })
</script>

</body>
</html>