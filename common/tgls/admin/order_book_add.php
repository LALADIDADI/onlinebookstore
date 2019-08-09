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
    $sql1 = "select bnumber from orderbooklist where bnumber = '$bnumber'";
    $result1 = mysqli_query($conn,$sql1);
    $number = mysqli_num_rows($result1);
    if($number){
        echo "<script>alert('该书籍已经录入！');history.go(-1);</script>";
    }else{
        $sql2 = "insert into orderbooklist (bnumber,bname,price,oamount) values ('$bnumber','$bname','$price','$amount')";
        $result2 = mysqli_query($conn,$sql2);
        if ($result2) {
            echo '<script>alert("添加书籍成功！");history.go(-1);</script>';
        } else {
            echo "<script>alert('系统繁忙，请稍候！');history.go(-1);</script>";
        }
    }
    $conn->close();
}
?>



