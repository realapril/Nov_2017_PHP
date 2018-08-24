<?php
session_start();
if (isset($_POST['reply'])) {
  $conn=mysqli_connect('localhost','root','1234');
  $conn->set_charset('utf8');
  mysqli_select_db($conn,"shoppingmall");
  date_default_timezone_set("Asia/Tokyo");

  $asknum=$conn->real_escape_string($_SESSION['reading']);
  $id=$conn->real_escape_string($_SESSION['u_id_num']);
  $time= date("Y-m-d");
  $newdetail= $conn->real_escape_string($_POST['comment']);

  mysqli_select_db($conn,"shoppingmall");
  $sql="INSERT INTO reply VALUES(NULL, '$asknum','$id','$time','$newdetail')";
  $result=mysqli_query($conn,$sql);
  header("location:cate_questions_detail.php");
}

?>
