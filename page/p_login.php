<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/7/19
 * Time: 10:57
 */
header("Content-type:text/html;charset=utf-8");
$phonenumber = $_POST["phonenumber"];
$cpassword = $_POST["password"];

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
    $sql = "select cnumber,cpassword from customer where cnumber = '$phonenumber' and cpassword = '$cpassword'";
    $result = $conn->query($sql);
    $number = mysqli_num_rows($result);
    if ($number) {
        echo '<script>var loca = '.$phonenumber.';window.location="index.php?cnumber="+loca;</script>';
    } else {
        echo '<script>alert("用户名或密码错误！");history.go(-1);</script>';
    }
    $conn->close();
}
?>



