<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>网上书店主页</title>

	<!-- 先引入重置的CSS样式文件 -->
	<link rel="stylesheet" href="../common/css/reset.css">

	<!-- 引入字体图标的css文件 -->
	<link rel="stylesheet" href="../common/css/iconfont2.css">

	<!-- 引入当前页面的CSS文件 -->
	<link rel="stylesheet" href="../common/css/index.css">
</head>
<body>

	<div class="container">
		<!-- 顶部导航 start -->
		<div class="header_bar">
			<div class="header con_width">
				<!-- 左侧菜单 -->
				<div class="header_nav">
					<ul>
						<li><a href="#">Fanの书店</a></li>
						<li><a href="#">关于</a></li>
						<li><a href="#">帮助</a></li>
					</ul>
				</div>
				<!--右侧登录、注册-->
				<div class="user-auction">
					<ul>
                      <!--这个@符号好好用 -->
                        <li><a href="#">欢迎，<?php echo @$_GET["cnumber"]; ?></a></li>
						<li><a href="login.html">登录</a></li>
						<li><a href="register.html">注册</a></li>
                        <li><a href="customer_admin.php?cnumber=<?php echo @$_GET["cnumber"];?>">我的</a></li>
						<li><a href="#">消息通知</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- 顶部导航 end -->
		<!-- 主体导航 start -->
		<div class="main_nav con_width">
			<div class="logo">
				<img src="../common/image/loginlogo2.png" alt="MIlogo" title="Fanの书店">
			</div>
			<div class="nav">
				<ul>
					<li><a href="#">教育</a></li>
					<li><a href="#">小说</a></li>
					<li><a href="#">文艺</a></li>
					<li><a href="#">青春文学</a></li>
					<li><a href="#">电子书</a></li>
					<li><a href="#">人文社科</a></li>
					<li><a href="#">经管</a></li>
					<li><a href="#">生活</a></li>
					<li><a href="#">科技</a></li>
					<li><a href="#">成功/励志</a></li>
				</ul>
			</div>
			<!-- 搜索部分 start -->
			<div class="search_box">
				<form action="bookcheck.php?cnumber=<?php echo @$_GET["cnumber"]; ?>" method="post">
					<input type="search" name="search" class="search" />
					<button type="submit">
						<i class="iconfont icon-sousuo"></i>
					</button>
					<!-- 下拉列表内容 -->
					<div class="datalist">
						<ul>
							<li><a href="#">数据库系统概念<span>约有6件</span></a></li>
							<li><a href="#">数据库系统概念<span>约有6件</span></a></li>
							<li><a href="#">数据库系统概念<span>约有6件</span></a></li>
							<li><a href="#">数据库系统概念<span>约有6件</span></a></li>
							<li><a href="#">数据库系统概念<span>约有6件</span></a></li>
							<li><a href="#">数据库系统概念<span>约有6件</span></a></li>
						</ul>
					</div>
				</form>
			</div>
			<!-- 搜索部分 end -->
		</div>

		<!-- 主体导航 end -->

		<!-- 产品列表 start -->
		<div class="goods">
			<!-- 手机 start -->
			<div class="flashover con_width clearfix">
				<h1 class="list_title">热销书籍<a href="">查看更多<i class="iconfont icon-xiangyoujiantou"></i></a></h1>
				<div class="goods_item_right">
					<?php
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
                        $sql = "select * from book";
                        //调用数据库的方法改变
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_row($result)){
                            $row[4]*=10;
                            if($row[4] == 10){
                                $row[4] = "热销";
                            }else{
                                $row[4] = $row[4]."折";
                            }
                            echo "<div class='goods_item_list'>";
                            echo "<div class='goodlist_content'>";
                            echo "<label>".$row[4]."</label>";
                            echo "<a href='#'><img src='../common/image/db.jpg' alt=''></a>";
                            echo "<p class='good_title'><a href='#'>".$row[1]."</a></p>";
                            echo "<p class='good_desc'>"."￥".$row[2]."  库存：".$row[3]."</p>";
                            echo "<a class='good_price' href='../common/tgls/customer/customer_buy.php?cnumber=".$_GET["cnumber"]."&bnumber=".$row[0]."&buyamount=1"."'>立即购买</a>";
                            echo "</div>";
                            echo "</div>";
                        }
                        $conn->close();
                    }
					?>
				</div>
			</div>
			<!-- 手机 end -->
		</div>

        <!-- 产品列表 start -->
        <div class="goods">
            <!-- 手机 start -->
            <div class="flashover con_width clearfix">
                <h1 class="list_title">预购图书<a href="">查看更多<i class="iconfont icon-xiangyoujiantou"></i></a></h1>
                <div class="goods_item_right">
                    <?php
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
                        $sql = "select * from orderbooklist";
                        //调用数据库的方法改变
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_row($result)){
                            echo "<div class='goods_item_list'>";
                            echo "<div class='goodlist_content'>";
                            echo "<label>"."上新"."</label>";
                            echo "<a href='#'><img src='../common/image/os.jpg' alt=''></a>";
                            echo "<p class='good_title'><a href='#'>".$row[1]."</a></p>";
                            echo "<p class='good_desc'>"."￥".$row[2]."</p>";
                            echo "<a class='good_price' href='../common/tgls/customer/customer_order.php?cnumber=".$_GET["cnumber"]."&bnumber=".$row[0]."&orderamount=1"."'>立即预约</a>";
                            echo "</div>";
                            echo "</div>";
                        }
                        $conn->close();
                    }
                    ?>
                </div>
            </div>
            <!-- 手机 end -->
        </div>
		<!-- 底部 end -->
	</div>



	<script type="text/javascript" charset="utf-8" src="../common/js/index.js"></script>
</body>
</html>