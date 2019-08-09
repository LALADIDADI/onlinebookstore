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
$orderamount = $_GET["orderamount"];
$orderdate = date("Y-m-d");

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
    $sql1 = "update orderbook set orderamount = '$orderamount'+orderamount,orderdate = '$orderdate' where cnumber = '$cnumber' and bnumber = '$bnumber'";
    $result1 = mysqli_query($conn,$sql1);
    if(!mysqli_affected_rows($conn)){
        $sql2 = "INSERT INTO orderbook (cnumber, bnumber, orderamount,orderdate) VALUES ('$cnumber','$bnumber','$orderamount','$orderdate')";
        $result2 = mysqli_query($conn,$sql2);
        if($result2){
            $sql3 = "update orderbooklist set oamount = oamount +'$orderamount' where bnumber = '$bnumber'";
            $result3 = mysqli_query($conn,$sql3);
            echo '<script>alert("预购成功！");history.go(-1);</script>';

        }else{
            echo '<script>alert("预购失败！");history.go(-1);</script>';
        }
    }else{
        $sql4 = "update orderbooklist set oamount = oamount +'$orderamount' where bnumber = '$bnumber'";
        $result4 = mysqli_query($conn,$sql4);
        echo '<script>alert("预购成功啦！");history.go(-1);</script>';
    }
    $conn->close();
}
?>



