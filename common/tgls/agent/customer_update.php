<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/7/19
 * Time: 10:57
 */
header("Content-type:text/html;charset=utf-8");
$cnumber = $_POST["cnumber"];
$cname = $_POST["cname"];
$cpassword = $_POST["cpassword"];

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
    $sql2 = "update customer set cname = '$cname',cpassword = '$cpassword' where cnumber = '$cnumber'";
    $result2 = mysqli_query($conn,$sql2);
    if ($result2) {
        if(mysqli_affected_rows($conn)){
            echo '<script>alert("修改用户信息成功！");window.location = "customer_list.php";</script>';
        }else{
            echo '<script>alert("您没有修改任何信息");history.go(-1);</script>';
        }
    } else {
        echo "<script>alert('系统繁忙，请稍候！');history.go(-1);</script>";
    }
    $conn->close();
}
?>



