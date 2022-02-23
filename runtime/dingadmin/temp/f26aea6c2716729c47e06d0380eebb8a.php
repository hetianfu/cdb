<?php /*a:3:{s:65:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/user/index.html";i:1632992554;s:68:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/header.html";i:1607351074;s:66:"/www/wwwroot/hgcdb.test138.com/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>账号列表</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 10px 10px 80px 10px;">
    <form class="layui-form"  method="post">
    
    <div class="">
        <form class="layui-form" action="" method="get" autocomplete="off" id="from">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <input type="text" name="username" autocomplete="off" placeholder="会员账号" class="layui-input" value="<?php echo htmlentities($username); ?>">
                    </div>
                    <div class="layui-input-inline">
                        <input type="text" name="parent" autocomplete="off" placeholder="推荐人账号" class="layui-input" value="<?php echo htmlentities($parent); ?>">
                    </div>
                    <div class="layui-input-inline">
                        <select name="is_agent" lay-filter="lanmu">
                            <option <?php if($is_agent == 3): ?> selected <?php endif; ?> value="3">全部</option>
                            <option <?php if($is_agent == 1): ?> selected <?php endif; ?> value="1">代理</option>
                            <option <?php if($is_agent == 0): ?> selected <?php endif; ?> value="0">会员</option>
                        </select>
                    </div>

                    <div class="layui-input-inline">
                        <button ype="submit" class="layui-btn">搜索</button>
                    </div>
                </div>
            </div>
        </form>
        <div>
            <a href="javascript:;" class="layui-btn layui-btn-small" onclick="admin_add('添加用户','<?php echo url('User/add'); ?>',850,600)">添加用户</a>
            <button type="btn" class="layui-btn layui-btn-normal layui-btn-danger" onclick="delAll()" >批量删除</button>
        </div>
        <table class="layui-table" lay-size="sm">
            <thead>
                <tr>
                    <th>全选<input type="checkbox" name="" lay-skin="primary" lay-filter="quanxuan"> </th>
                    <th style="text-align: center;">序号</th>
                    <th>会员账号</th>
                    <th>会员等级</th>
                    <th>手机号码</th>
                    <th>推荐人</th>
                    <th>直推人数</th>
                    <th>注册时间</th>
                    <th>注册IP</th>
                    <th>最后登陆时间</th>
                    <th>钱包余额</th>
                    <th>积分</th>
                    <th>冻结钱包</th>
                    <th>入金</th>
                    <th>出金</th>
                    <th>状态</th>
                    <th>加盟</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td style="text-align: center;"><input type="checkbox" name="id[]" class="qx" value="<?php echo htmlentities($vo['id']); ?>" lay-skin="primary"></td>
                    <td style="text-align: center;"><?php echo htmlentities($vo['id']); ?></td>
                    <td><?php echo htmlentities($vo['username']); ?></td>
                    <td><?php echo htmlentities($vo['lv_name']); ?></td>
                    <td><?php echo htmlentities($vo['phone']); ?></td>
                    <td><?php echo htmlentities($vo['parent']); ?></td>
                    <td><?php echo htmlentities($vo['parentcount']); ?></td>
                    <td><?php echo htmlentities(date('Y-m-d',!is_numeric($vo['reg_time'])? strtotime($vo['reg_time']) : $vo['reg_time'])); ?></td>
                    <td><?php echo htmlentities($vo['regip']); ?></td>
                    <td><?php echo htmlentities(date('Y-m-d',!is_numeric($vo['online_time'])? strtotime($vo['online_time']) : $vo['online_time'])); ?></td>
                    <td><?php echo htmlentities($vo['money']); ?></td>
                    <td><?php echo htmlentities($vo['integral']); ?></td>
                    <td><?php echo htmlentities($vo['dongjie']); ?></td>
                    <td><?php echo htmlentities($vo['rujin']); ?></td>
                    <td><?php echo htmlentities($vo['chujin']); ?></td>
                    <td><?php if($vo['lock'] == 1): ?>正常<?php else: ?>禁止<?php endif; ?></td>
                    <td><?php if($vo['is_agent'] == 1): ?>代理<?php else: ?><?php endif; ?></td>
                    <td>
                        <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="admin_edit('充值金额/积分','<?php echo url('User/addjinbi',['id'=>$vo['id']]); ?>',500,500)">充值</a>
                        <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="admin_edit('编辑账号','<?php echo url('User/edit',['id'=>$vo['id']]); ?>',850,600)">编辑</a>
                        <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="admin_edit('资金详情','<?php echo url('User/details',['id'=>$vo['id']]); ?>',850,600)">资金详情</a>
                        <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="admin_edit('银行信息','<?php echo url('User/setbank',['id'=>$vo['id']]); ?>',850,600)">银行信息</a>
                        <a href="javascript:;" class="layui-btn layui-btn-sm" onclick="admin_edit('查看直推下级','<?php echo url('User/lowlv',['id'=>$vo['id']]); ?>',850,600)">查看下级</a>
                    
                        <!--<a href="javascript:;" class="layui-btn layui-btn-sm layui-btn-danger" onclick="admin_del(this,'<?php echo htmlentities($vo['id']); ?>')">删除</a>-->
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
layui.use(['layer','form','table'], function(){
    var layer = layui.layer;
    var form = layui.form;
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
            url:"<?php echo url('User/del'); ?>",
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

function delAll(){
    var checkbox = $(".qx:checked");
    var ids = [];
    for(k in checkbox){
        if(checkbox[k].checked){
            ids.push(checkbox[k].value);
        }
    }
    $.ajax({
        url:"<?php echo url('user/delAll'); ?>",
        type:'post',
        data:{
            id:ids
        },
        success:function(res){
            layer.msg(res.msg,{icon:1,time:1000});
        }
    })
}
//页面导航标题内容
$(function(){
    $(window.parent.document).find('#right_title').text($('title').text());
})

</script>
</body>
</html>