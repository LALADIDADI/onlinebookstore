<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <!-- Google Chrome Frame也可以让IE用上Chrome的引擎: -->
    <meta name="renderer" content="webkit">
    <!--国产浏览器高速模式-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Mr. Yao" />
    <!-- 作者 -->
    <meta name="revised" content="Yao.v1, 2018/02/27" />
    <!-- 定义页面的最新版本 -->
    <meta name="description" content="网站简介" />
    <!-- 网站简介 -->
    <meta name="keywords" content="搜索关键字，以半角英文逗号隔开" />
    <title>书籍录入</title>

    <!-- 公共样式 开始 -->
    <link rel="stylesheet" type="text/css" href="../../css/base2.css">
    <link rel="stylesheet" type="text/css" href="../../css/iconfont.css">
    <script type="text/javascript" src="../../framework/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../layui/css/layui.css">
    <script type="text/javascript" src="../../layui/layui.js"></script>
    <!-- 滚动条插件 -->
    <link rel="stylesheet" type="text/css" href="../../css/jquery.mCustomScrollbar.css">
    <script src="../../framework/jquery-ui-1.10.4.min.js"></script>
    <script src="../../framework/jquery.mousewheel.min.js"></script>
    <script src="../../framework/jquery.mCustomScrollbar.min.js"></script>
    <script src="../../framework/cframe.js"></script><!-- 仅供所有子页面使用 -->
    <!-- 公共样式 结束 -->

    <style>
        .layui-form{
            margin-right: 30%;
        }
    </style>

</head>

<body>
<?php
$bnumber = $_GET['bnumber'];
$bname = $_GET['bname'];
$price = $_GET['price'];
$amount = $_GET['amount'];
$discount = $_GET['discount'];
?>
<div class="cBody">
    <form id="addForm" class="layui-form" action="book_update.php" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">书籍号</label>
            <div class="layui-input-inline shortInput">
                <input type="text" name="bnumber" required lay-verify="required|number" readonly value="<?php echo $bnumber; ?>" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">书籍名</label>
            <div class="layui-input-inline shortInput">
                <input type="text" name="bname" required lay-verify="required|ZHCheck" value="<?php echo $bname; ?>" autocomplete="off" class="layui-input">
            </div>
        </div>


        <div class="layui-form-item">
            <label class="layui-form-label">价格</label>
            <div class="layui-input-inline shortInput">
                <input type="text" name="price" required lay-verify="required|number" value="<?php echo $price; ?>" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">数量</label>
            <div class="layui-input-inline shortInput">
                <input type="text" name="amount" required lay-verify="required|number" value="<?php echo $amount; ?>" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">折扣</label>
            <div class="layui-input-inline shortInput">
                <input type="text" name="discount" required lay-verify="required|number" autocomplete="off" value="<?php echo $discount; ?>" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" type="submit" lay-filter="submitBut">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>

    <!-- 三级省市 插件 -->
    <script src="../../framework/area.js"></script>
    <script src="../../res/layui/province.js"></script>
    <script>
        layui.use('form', function() {
            var form = layui.form;
            //监听提交
            form.on('submit(submitBut)', function(data) {
                layer.msg(JSON.stringify(data.field));
                return false;
            });
            form.verify({
                //数组的两个值分别代表：[正则匹配、匹配不符时的提示文字]
                ZHCheck: [
                    /^[\u0391-\uFFE5]+$/
                    ,'只允许输入中文'
                ]
            });
        });
    </script>

</div>
</body>

</html>