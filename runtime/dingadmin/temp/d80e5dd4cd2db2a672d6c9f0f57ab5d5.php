<?php /*a:3:{s:69:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/recharge/index.html";i:1632396330;s:68:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/header.html";i:1607351074;s:66:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>充值审核</title>
	<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 10px 10px 80px 10px;">
<form class="layui-form" action="" method="post">
	
	<div class="">
		<form class="layui-form" action="" method="get" autocomplete="off">
			<div class="layui-form-item">
				<div class="layui-inline">
					<div class="layui-input-inline">
						<input type="text" name="username" autocomplete="off" placeholder="用户查询" class="layui-input"
						       value="<?php echo htmlentities($username); ?>">
					</div>
					<div class="layui-input-inline">
						<input type="text" name="order" autocomplete="off" placeholder="订单查询" class="layui-input" value="<?php echo htmlentities($order); ?>">
					</div>
					<div class="layui-input-inline">
						<button ype="submit" class="layui-btn">搜索</button>
					</div>
				</div>
			</div>
		</form>
		
		<table class="layui-table" lay-size="sm">
			<thead>
			<tr pid="0">
				<th style="text-align: center;">序号</th>
				<th>充值金额</th>
				<th>充值用户</th>
				<th>充值时间</th>
				<!--<th>通道类型</th>-->
				<th>转账银行</th>
				<th>转账人姓名</th>
				<th>转账凭证</th>
				<th>充值前金额</th>
				<th>充值后金额</th>
				<th>充值订单号</th>
				<th>充值状态</th>
				<th>操作</th>
			</tr>
			</thead>
			<tbody>
			<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr>
				<td style="text-align: center;"><?php echo htmlentities($vo['id']); ?></td>
				<td><?php echo htmlentities($vo['money']); ?></td>
				<td><?php echo htmlentities($vo['username']); ?></td>
				<td><?php echo htmlentities(date('Y-m-d h:i:s',!is_numeric($vo['addtime'])? strtotime($vo['addtime']) : $vo['addtime'])); ?></td>
				<td><?php echo htmlentities($vo['bank_info']); ?></td>
				<td><?php echo htmlentities($vo['bank_username']); ?></td>
				<td><img class="pay_voucher" style="width: 60px;height: 60px" src="<?php echo htmlentities($vo['pay_voucher']); ?>" alt=""></td>
				<!--<td>
						<?php switch($vo['type']): case "1": ?>银行卡<?php break; case "2": ?>支付宝<?php break; case "3": ?>微信<?php break; ?>
						<?php endswitch; ?>
				</td>-->
				<td><?php echo htmlentities($vo['money_front']); ?></td>
				<td><?php echo htmlentities($vo['money_after']); ?></td>
				<td><?php echo htmlentities($vo['order_num']); ?></td>
				<td>
					<?php switch($vo['status']): case "0": ?> <span style="color: #FFB800">待审核</span> <?php break; case "1": ?> <span style="color: #009688">已审核</span> <?php break; ?>
					<?php endswitch; ?>
				</td>
				<td>
					<a href="javascript:;" class="layui-btn layui-btn-sm"
					   onclick="admin_edit('充值审核','<?php echo url('Recharge/operate',['id'=>$vo['id']]); ?>',500,300)">审核</a>
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
	//删除提示
	layui.use(['layer', 'form'], function () {
		var layer = layui.layer;
		var form = layui.form;
		$('.pay_voucher').click(function () {
			layer.open({
				type: 1,
				shade: false,
				title: false, //不显示标题
				maxWidth: 500,
				content: `<img class="pay_voucher" style="max-width: 500px;max-height: 500px" src="${$(this).attr('src')}" alt="">`,
			});
		})
	});
	
	/*添加*/
	function admin_add(title, url, w, h) {
		x_admin_show(title, url, w, h);
	}
	
	/*编辑*/
	function admin_edit(title, url, w, h) {
		x_admin_show(title, url, w, h);
	}
	
	/*删除*/
	function admin_del(obj, id) {
		layer.confirm('确认要删除吗？', function (index) {
			$.ajax({
				url: "<?php echo url('User/del'); ?>",
				type: 'post',
				data: 'id=' + id,
				success: function (res) {
					if (res.status) {
						$(obj).parents("tr").remove();
						layer.msg('已删除!', {icon: 1, time: 1000});
					} else {
						layer.msg(res.msg ? res.msg : "操作失败!", {icon: 5}, function () {
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
	$(function () {
		$(window.parent.document).find('#right_title').text($('title').text());
	})

</script>
</body>
</html>