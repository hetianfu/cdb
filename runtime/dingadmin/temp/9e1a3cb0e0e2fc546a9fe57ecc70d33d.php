<?php /*a:3:{s:61:"/www/wwwroot/wetbc.cc/app/dingadmin/view/proconfig/index.html";i:1633068178;s:59:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/header.html";i:1607351074;s:57:"/www/wwwroot/wetbc.cc/app/dingadmin/view/public/foot.html";i:1607351220;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>项目配置</title>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/static/admin/vendor/layui/css/layui.css">
<link rel="stylesheet" href="/public/static/admin/custom/css/style.css">


</head>
<body style="padding: 10px 10px 50px 10px;">
    <div class="layui-container">
        <form class="layui-form" action="" method="post" enctype="multipart/form-data" id="groupForm">
            
            <div class="layui-form-item">
                <label class="layui-form-label">注册红包</label>
                <div class="layui-input-inline">
                    <input type="text" name="hongbao" value="<?php echo !empty($config['hongbao']) ? htmlentities($config['hongbao']) : ''; ?>" placeholder="" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">元</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">提现手续费</label>
                <div class="layui-input-inline">
                    <input type="text" name="charge_ratio" value="<?php echo !empty($config['charge_ratio']) ? htmlentities($config['charge_ratio']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">%</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">最低提现额</label>
                <div class="layui-input-inline">
                    <input type="text" name="charge_low" value="<?php echo !empty($config['charge_low']) ? htmlentities($config['charge_low']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">溢出倍数</label>
                <div class="layui-input-inline">
                    <input type="text" name="overflow" value="<?php echo !empty($config['overflow']) ? htmlentities($config['overflow']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">用户收益达到产品单价倍数后停止收益</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">一级比例</label>
                <div class="layui-input-inline">
                    <input type="text" name="one_profit" value="<?php echo !empty($config['one_profit']) ? htmlentities($config['one_profit']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">%(奖励直推用户收益比例)</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">二级比例</label>
                <div class="layui-input-inline">
                    <input type="text" name="two_profit" value="<?php echo !empty($config['two_profit']) ? htmlentities($config['two_profit']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">%(奖励二代用户收益比例)</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">三级比例</label>
                <div class="layui-input-inline">
                    <input type="text" name="three_profit" value="<?php echo !empty($config['three_profit']) ? htmlentities($config['three_profit']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">%(奖励三代用户收益比例)</div>
            </div>
            
            

            <!--<div class="layui-form-item">
                <label class="layui-form-label">代理收益</label>
                <div class="layui-input-inline">
                    <input type="text" name="agent_profit" value="<?php echo !empty($config['agent_profit']) ? htmlentities($config['agent_profit']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">%(奖励代理下的用户充值会员所付金额比例)</div>
            </div>-->
            <div class="layui-form-item">
                <label class="layui-form-label">一级首充</label>
                <div class="layui-input-inline">
                    <input type="text" name="one_recommend" value="<?php echo !empty($config['one_recommend']) ? htmlentities($config['one_recommend']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">%(奖励直推用户首充比例)</div>
            </div>
     
            <div class="layui-form-item">
                <label class="layui-form-label">二级首充</label>
                <div class="layui-input-inline">
                    <input type="text" name="two_recommend" value="<?php echo !empty($config['two_recommend']) ? htmlentities($config['two_recommend']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">%(奖励二代用户首充比例)</div>
            </div>
    
            <div class="layui-form-item">
                <label class="layui-form-label">三级首充</label>
                <div class="layui-input-inline">
                    <input type="text" name="three_recommend" value="<?php echo !empty($config['three_recommend']) ? htmlentities($config['three_recommend']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">%(奖励三代用户首充比例)</div>
            </div>
            <!-- <div class="layui-form-item">
                <label class="layui-form-label">语言设置</label>
                <div class="layui-input-inline">
                    <select name="langtype" lay-verify="required">
                        <option <?php if($config['langtype'] == 1): ?> selected <?php endif; ?> value="1">中文</option>
                        <option <?php if($config['langtype'] == 2): ?> selected <?php endif; ?> value="2">英文</option>
                        <option <?php if($config['langtype'] == 3): ?> selected <?php endif; ?> value="3">印度语</option>
                    </select>
                </div>
            </div> -->

            <div class="layui-form-item">
                <label class="layui-form-label">项目状态</label>
                <div class="layui-input-inline">
                    <input type="checkbox" name="is_lock" value="1" lay-skin="switch" <?php echo !empty($config['is_lock']) ? "checked" : ""; ?> lay-text="开启|关闭">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">苹果下载</label>
                <div class="layui-input-inline">
                    <input type="text" name="apple_download" value="<?php echo !empty($config['apple_download']) ? htmlentities($config['apple_download']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label">版本号</label>
                <div class="layui-input-inline">
                    <input type="text" name="apple_version" value="<?php echo !empty($config['apple_version']) ? htmlentities($config['apple_version']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">安卓下载</label>
                <div class="layui-input-inline">
                    <input type="text" name="android_download" value="<?php echo !empty($config['android_download']) ? htmlentities($config['android_download']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label">版本号</label>
                <div class="layui-input-inline">
                    <input type="text" name="android_version" value="<?php echo !empty($config['android_version']) ? htmlentities($config['android_version']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">在线客服1</label>
                <div class="layui-input-block">
                    <input type="text" name="kefu" value="<?php echo !empty($config['kefu']) ? htmlentities($config['kefu']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">在线客服2</label>
                <div class="layui-input-block">
                    <input type="text" name="kefu2" value="<?php echo !empty($config['kefu2']) ? htmlentities($config['kefu2']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">在线客服3</label>
                <div class="layui-input-block">
                    <input type="text" name="kefu3" value="<?php echo !empty($config['kefu3']) ? htmlentities($config['kefu3']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">TG链接</label>
                <div class="layui-input-block">
                    <input type="text" name="tg_link" value="<?php echo !empty($config['tg_link']) ? htmlentities($config['tg_link']) : ''; ?>" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">公告内容</label>
                <div class="layui-input-block">
                    <script id="content" name="gonggao" type="text/plain" style="height: 300px;"><?php echo !empty($config['gonggao']) ? $config['gonggao'] : ''; ?></script>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">跑马灯</label>
                <div class="layui-input-block">
                    <textarea name="madeng" placeholder="请输入跑马灯内容" class="layui-textarea"><?php echo !empty($config['madeng']) ? htmlentities($config['madeng']) : ''; ?></textarea>
                </div>
            </div>


            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">确定</button>
                </div>
            </div>
        </form>
    </div>
    


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
layui.use(['form','upload'], function(){
    var form = layui.form;
    var upload = layui.upload;
    //监听提交
    form.on('submit(formDemo)', function(data){
        $.ajax({
            url:"<?php echo url('Proconfig/index'); ?>",
            type:"post",
            data:$('#groupForm').serialize(),
            success:function(res){
                  if(res.status){
                      layer.alert("操作成功", {icon: 6},function () {
                          location.reload();
                          var index = layer.getFrameIndex(window.name);
                          layer.close(index);
                      });
                  }else{
                      layer.msg(res.msg ? res.msg : "操作失败!", {icon: 5},function () {
                          var index = layer.getFrameIndex(window.name);
                          layer.close(index);
                      });
                      return false;
                  }
              }
        });
        return false;
    })


});

$(function(){
    $(window.parent.document).find('#right_title').text($('title').text());
})
</script>
</body>
</html>