<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2019/7/19
 * Time: 10:57
 */
header("Content-type:text/html;charset=utf-8");

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
    $sql = "select * from book natural join buyhistory";
    $result = $conn->query($sql);
    $sum = 0;
    while($row = mysqli_fetch_row($result)){
        $sum+= $row[2]*$row[6];
    }
    echo $sum;
    $conn->close();
}
?>



