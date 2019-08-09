<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/7/19
 * Time: 17:19
 */
header("Content-type:text/html; charset=utf-8");
$phonenumber = $_POST["phonenumber"];
$name = $_POST["name"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];

$severname = "localhost";
$username = "root";
$password = "";
$dbname = "bookshop";

$conn  = new mysqli($severname,$username,$password,$dbname);

//检测连接
if($conn->connect_error){
    die("连接失败".mysqli_connect_error());
}else{
    if($password1 != $password2){
        echo "<script>alert('两次密码应输入一致');history.go(-1);</script>";
    }
    if($password1 == $password2){
        $sql = "select cnumber from customer where cnumber = '$phonenumber'";
        $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        if($number){
            echo "<script>alert('用户名已经存在');history.go(-1);</script>";
        }else{
            $sql_insert = "insert into customer (cnumber,cpassword,cname) values ('$phonenumber','$password1','$name')";
            $res_insert = $conn->query($sql_insert);
            if ($res_insert) {
                echo '<script>window.location="login.html";</script>';
            } else {
                echo "<script>alert('系统繁忙，请稍候！');</script>";
            }
        }
    }
    $conn->close();
}
?>