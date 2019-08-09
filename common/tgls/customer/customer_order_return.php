<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/7/19
 * Time: 10:57
 */
header("Content-type:text/html;charset=utf-8");
$cnumber = $_GET["cnumber"];
$bnumber = $_GET["bnumber"];
$ramount = $_GET["ramount"];
$rdate = date("Y-m-d");

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
    $sql1 = "update orderbooklist set oamount = oamount - '$ramount' where bnumber = '$bnumber'";
    $result1 = mysqli_query($conn,$sql1);
    $sql2 = "update orderbook set orderamount = orderamount -'$ramount' where cnumber = '$cnumber' and bnumber = '$bnumber'";
    $result2 = mysqli_query($conn,$sql2);
    if($result1 && $result2){
        echo "<script>alert('取消预购成功！');history.go(-1);</script>";
    }else{
        echo "<script>alert('取消预购失败！');history.go(-1);</script>";
    }
}
?>



