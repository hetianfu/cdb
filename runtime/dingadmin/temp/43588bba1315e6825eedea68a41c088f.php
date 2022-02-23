<?php /*a:3:{s:56:"/www/wwwroot/wetbc.cc/app/dingadmin/view/index/main.html";i:1633438853;s:59:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/header.html";i:1607351074;s:57:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>网站配置</title>
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
<body style="padding:0 10px;">
<div class="layui-collapse" lay-accordion="" lay-filter="collapse">
	<div class="layui-row" style="text-align: center">
		<div class="layui-col-md4 d-flex j-center a-center layui-bg-red flex-column">
			<h2>会员总数 <?php echo htmlentities($register['count']); ?></h2>
			<div class="font-16 mt-5">
				<span>今日注册  <?php echo htmlentities($register['today']); ?></span> <span class="ml-20">昨日注册  <?php echo htmlentities($register['yesterday']); ?></span>
			</div>
		</div>
		
		<div class="layui-col-md4 d-flex j-center a-center layui-bg-green flex-column">
				<h2>入金总额  <?php echo htmlentities($rujin['sum']); ?></h2>
			<div class="font-16 mt-5">
				<span>今日入金  <?php echo htmlentities($rujin['today']); ?></span> <span class="ml-20">昨日入金  <?php echo htmlentities($rujin['yesterday']); ?></span>
			</div>
		</div>
		<div class="layui-col-md4 d-flex j-center a-center layui-bg-orange flex-column">
			<h2>出金总额  <?php echo htmlentities($chujin['sum']); ?></h2>
			<div class="font-16 mt-5">
				<span>今日出金  <?php echo htmlentities($chujin['today']); ?></span> <span class="ml-20">昨日出金  <?php echo htmlentities($chujin['yesterday']); ?></span>
			</div>
		</div>
	
	</div>
	<div class="layui-colla-item">
		<h2 class="layui-colla-title">软件信息</h2>
		<div class="layui-colla-content layui-show">
			<table class="layui-table">
				<tr>
					<td width="40%">软件名称</td>
					<td width="60%">充电宝系统</td>
				</tr>
				<tr>
					<td>系统版本</td>
					<td>v1.0.1</td>
				</tr>
			
			
			</table>
		</div>
	</div>
	<div class="layui-colla-item">
		<h2 class="layui-colla-title">服务器信息</h2>
		<div class="layui-colla-content">
			<table class="layui-table">
				<tr>
					<td width="40%">服务器IP</td>
					<td width="60%"><?php echo htmlentities($system['ip']); ?></td>
				</tr>
				<tr>
					<td>服务器域名</td>
					<td><?php echo htmlentities($system['host']); ?></td>
				</tr>
				<tr>
					<td>服务器操作系统</td>
					<td><?php echo htmlentities($system['os']); ?></td>
				</tr>
				<tr>
					<td>运行环境</td>
					<td><?php echo htmlentities($system['server']); ?></td>
				</tr>
				<tr>
					<td>服务器端口</td>
					<td><?php echo htmlentities($system['port']); ?></td>
				</tr>
				<tr>
					<td>PHP版本</td>
					<td><?php echo htmlentities($system['php_ver']); ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="layui-colla-item">
		<h2 class="layui-colla-title">数据库信息</h2>
		<div class="layui-colla-content">
			<table class="layui-table">
				<tr>
					<td width="40%">数据库版本</td>
					<td width="60%"><?php echo htmlentities($system['mysql_ver']); ?></td>
				</tr>
				<tr>
					<td>数据库名称</td>
					<td><?php echo htmlentities($system['database']); ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="layui-colla-item">
		<h2 class="layui-colla-title">管理员登录日志</h2>
		<div class="layui-colla-content">
			<table class="layui-table">
				<tr>
					<td>登录时间</td>
					<td>登录IP</td>
					<td>登录信息</td>
				</tr>
				<?php if(is_array($log) || $log instanceof \think\Collection || $log instanceof \think\Paginator): $i = 0; $__LIST__ = $log;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr>
					<td><?php echo htmlentities(date("Y/m/d H:i:s",!is_numeric($vo['logintime'])? strtotime($vo['logintime']) : $vo['logintime'])); ?></td>
					<td><?php echo htmlentities($vo['login_ip']); ?></td>
					<td><?php echo htmlentities($vo['login_address']); ?></td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
		</div>
	</div>
</div>
<script src="/public/static/admin/vendor/js/jquery.js"></script>
<script src="/public/static/admin/vendor/layui/layui.js"></script>
<script src="/public/static/admin/custom/js/admin.js"></script>


<script>
	//JavaScript代码区域
	layui.use(['layer', 'element'], function () {
		var layer = layui.layer;
		var element = layui.element;
		
		//监听折叠
		element.on('collapse(collapse)', function (data) {
			// layer.msg('展开状态：'+ data.show);
		});
		
		// you code ...
		
		
	});
</script>
</body>
</html>