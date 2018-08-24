<?php
session_start();
$conn=mysqli_connect('localhost','root','1234');
$conn->set_charset('utf8');

    $custum_num=$_SESSION['u_id_num'];
    $goods_num= $conn->real_escape_string($_POST['goodsnum']);
$numm= mysqli_real_escape_string($conn,$_SESSION['u_id_num']);
$goods_count= $conn->real_escape_string($_POST['goodscount']);
    mysqli_select_db($conn,"shoppingmall");
    $sql="UPDATE cart SET numb=numb+$goods_count WHERE custum_num='$numm' AND goods_no=".$_POST['goodsnum'];
    $result=mysqli_query($conn,$sql);
        header("location:mycart.php");
?>
