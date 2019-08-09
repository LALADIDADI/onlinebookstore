<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../common/css/amazeui.min.css" />
		<link rel="stylesheet" href="../common/css/admin.css" />
	</head>

	<body>
		<div class="admin-content-body">
			<div class="am-cf am-padding am-padding-bottom-0">
				<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">订单管理</strong><small></small></div>
			</div>

			<hr>

			<div class="am-g">
				<div class="am-u-sm-12 am-u-md-6">
					<div class="am-btn-toolbar">
						<div class="am-btn-group am-btn-group-xs">
							<button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
						</div>
					</div>
				</div>
				<div class="am-u-sm-12 am-u-md-3">

				</div>
				<div class="am-u-sm-12 am-u-md-3">
					<div class="am-input-group am-input-group-sm">
						<input type="text" class="am-form-field">
						<span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
					</div>
				</div>
			</div>
			<div class="am-g">
				<div class="am-u-sm-12">
					<form class="am-form">
						<table class="am-table am-table-striped am-table-hover table-main">
							<thead>
								<tr>
									<th class="table-check"><input type="checkbox"></th>
									<th class="table-id">序号</th>
									<th class="table-title">书籍名</th>
									<th class="table-type">购买数量</th>
									<th class="table-author am-hide-sm-only">价格</th>
									<th class="table-date am-hide-sm-only">折扣</th>
									<th class="table-set">实付款</th>
                                    <th class="table-set">购买时间</th>
                                    <th class="table-set">操作</th>
								</tr>
							</thead>
							<tbody>
                            <?php
                            $cnumber = @$_GET['cnumber'];

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
                                $sql = "select * from buyhistory natural join book where cnumber = '$cnumber' ";
                                //调用数据库的方法改变
                                $result = mysqli_query($conn,$sql);
                                $count = 0;
                                while($row = mysqli_fetch_row($result)){
                                    $count++;
                                    $real = $row[5]*$row[7];
                                    echo "<tr>";
                                    echo "<td><input type='checkbox'></td>";
                                    echo "<td>".$count."</td>";
                                    echo "<td><a>".$row[4]."</a></td>";
                                    echo "<td>".$row[2]."</td>";
                                    echo "<td>".$row[5]."</td>";
                                    echo "<td>".$row[7]."</td>";
                                    echo "<td class='am-hide-sm-only'>".$real."</td>";
                                    echo "<td class='am-hide-sm-only'>".$row[3]."</td>";
                                    echo "<td>";
                                    echo "<div class='am-btn-toolbar'>";
                                    echo "<a class='am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only' href='customer_return.php?cnumber=".$row[1]."&bnumber=".$row[0]."&ramount=1"."'><span class='am-icon-trash-o'></span> 退货</a>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                $conn->close();
                            }
                            ?>
							</tbody>
						</table>
						<hr>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>