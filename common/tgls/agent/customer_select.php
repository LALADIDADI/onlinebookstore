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
    <title>客户信息查看/修改</title>

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

</head>

<body>
<div class="cBody">
    <div class="console">
        <form class="layui-form" action="customer_select.php" method="post">
            <div class="layui-form-item">
                <div class="layui-input-inline">
                    <input type="text" name="cname"  lay-verify="required" placeholder="客户账号/客户名" autocomplete="off" class="layui-input">
                </div>
                <button class="layui-btn" type="submit" lay-filter="formDemo">检索</button>
            </div>
        </form>

        <script>
            layui.use('form', function() {
                var form = layui.form;

                //监听提交
                form.on('submit(formDemo)', function(data) {
                    layer.msg(JSON.stringify(data.field));
                    return false;
                });
            });
        </script>
    </div>

    <table class="layui-table">
        <thead>
        <tr>
            <th>用户昵称</th>
            <th>用户账号</th>
            <th>密码</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $cname = $_POST["cname"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bookshop";
        //连接数据库
        $conn = new mysqli($servername,$username,$password,$dbname);
        //检测连接
        if($conn->connect_error){
            die("连接失败".mysqli_connect_error());
        }else{
            $sql = "select cname,cnumber,cpassword from customer where cname like '%$cname%'";
            //调用数据库的方法改变
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_row($result)){
                echo "<tr>";
                echo '<td>'.$row[0].'</td>';
                echo '<td>'.$row[1].'</td>';
                echo '<td>'.$row[2].'</td>';
                echo "<td><a class='layui-btn layui-btn-xs' href='get_customer_update.php?cname=".$row[0]."&cnumber=".$row[1]."&cpassword=".$row[2]."'>修改信息</a></td></tr>";
            }
            if(!mysqli_num_rows($result)){
                $sql2 = "select * from customer where cnumber = '$cname'";
                $result2 = mysqli_query($conn,$sql2);
                while($row = mysqli_fetch_row($result2)){
                    echo "<tr>";
                    echo '<td>'.$row[0].'</td>';
                    echo '<td>'.$row[1].'</td>';
                    echo '<td>'.$row[2].'</td>';
                    echo "<td><a class='layui-btn layui-btn-xs' href='get_customer_update.php?cname=".$row[0]."&cnumber=".$row[1]."&cpassword=".$row[2]."'>修改信息</a></td></tr>";
                }
            }

           $conn->close();
        }
        ?>
        <!--        <tr>-->
        <!--            <td>穷在闹市</td>-->
        <!--            <td>DLS201802281450280741</td>-->
        <!--            <td>无锡市</td>-->
        <!--            <td>-->
        <!--                <button class="layui-btn layui-btn-xs">修改信息</button>-->
        <!--            </td>-->
        <!--        </tr>-->
        </tbody>
    </table>

    <!-- layUI 分页模块 -->
    <div id="pages"></div>
    <script>
        layui.use(['laypage', 'layer'], function() {
            var laypage = layui.laypage,
                layer = layui.layer;

            //总页数大于页码总数
            laypage.render({
                elem: 'pages'
                ,count: 100
                ,layout: ['count', 'prev', 'page', 'next', 'limit', 'skip']
                ,jump: function(obj){
                    console.log(obj)
                }
            });
        });
    </script>
</div>
</body>

</html>