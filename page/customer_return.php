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
    $sql1 = "update returnbook set ramount = '$ramount'+ramount,rdate = '$rdate' where cnumber = '$cnumber' and bnumber = '$bnumber'";
    $result1 = mysqli_query($conn,$sql1);
    if(!mysqli_affected_rows($conn)){
        $sql2 = "INSERT INTO returnbook (cnumber, bnumber, ramount,rdate) VALUES ('$cnumber','$bnumber','$ramount','$rdate')";
        $result2 = mysqli_query($conn,$sql2);
        if($result2){
            $sql3 = "update book set amount = amount +'$ramount' where bnumber = '$bnumber'";
            $result3 = mysqli_query($conn,$sql3);
            $sql5 = "update buyhistory set buyamount = buyamount - '$ramount' where bnumber = '$bnumber' and cnumber = '$cnumber'";
            $result5 = mysqli_query($conn,$sql5);
            echo '<script>alert("退货成功！");history.go(-1);</script>';
        }else{
            echo '<script>alert("退货失败！");history.go(-1);</script>';
        }
    }else{
        $sql3 = "update book set amount = amount -'$ramount' where bnumber = '$bnumber'";
        $result3 = mysqli_query($conn,$sql3);
        $sql6 = "update buyhistory set buyamount = buyamount - '$ramount' where bnumber = '$bnumber' and cnumber = '$cnumber'";
        $result6 = mysqli_query($conn,$sql6);
        echo '<script>alert("退货成功啦！");history.go(-1);</script>';
    }
    $conn->close();
}
?>



