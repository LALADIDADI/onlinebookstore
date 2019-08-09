<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/7/19
 * Time: 10:57
 */
header("Content-type:text/html;charset=utf-8");
$bnumber = $_POST["bnumber"];
$bname = $_POST["bname"];
$price = $_POST["price"];
$amount = $_POST["amount"];
$discount = $_POST["discount"];

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
        $sql2 = "update book set bname = '$bname',price='$price',amount='$amount',discount = '$discount'where bnumber = '$bnumber'";
        $result2 = mysqli_query($conn,$sql2);
        if ($result2) {
            if(mysqli_affected_rows($conn)){
                echo '<script>alert("修改书籍信息成功！");window.location = "../customer/customer_order_list.php";</script>';
            }else{
                echo '<script>alert("您没有修改任何信息");history.go(-1);</script>';
            }
        } else {
            echo "<script>alert('系统繁忙，请稍候！');history.go(-1);</script>";
        }
    $conn->close();
}
?>



