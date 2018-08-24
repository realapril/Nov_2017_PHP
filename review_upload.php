<?php
session_start();
if (isset($_POST['upload'])) {
  $conn=mysqli_connect('localhost','root','1234');
  $conn->set_charset('utf8');
  mysqli_select_db($conn,"shoppingmall");
  $goodsnum=mysqli_real_escape_string($conn,$_SESSION['watching']);
  $id=mysqli_real_escape_string($conn,$_SESSION['u_id_num']);
  $time= $conn->real_escape_string($_POST['time']);
  $newreview=mysqli_real_escape_string($conn,$_POST['reviewdetail']);

  $target = "htdocs/".basename($_FILES['image']['name']);
	$image = $_FILES['image']['name'];

  $sql="INSERT INTO review VALUES(NULL, '$goodsnum','$id','$time','$newreview','$image')";
  $result=mysqli_query($conn,$sql);
  "location:item_view.php?num=".$_SESSION['watching'];
  $sess=$_SESSION['watching'];
  header("location:item_view.php?num=$sess");



		// if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		// 	$msg = "Image uploaded successfully";
		// }else{
		// 	$msg = "Failed to upload image";
		// }
}
 ?>
