<?php
session_start();
if (isset($_POST['Rdelete'])) {
  $conn=mysqli_connect('localhost','root','1234');
  $conn->set_charset('utf8');
  mysqli_select_db($conn,"shoppingmall");
  $Rnumber= $conn->real_escape_string($_POST['Rnumber']);

// if (isset($_POST['Rnumber'])) {
//   echo $_POST['Rnumber'];
// }

  $sql="DELETE FROM reply WHERE replyno='$Rnumber'";
  $result=mysqli_query($conn,$sql);
 header("location:cate_questions_detail.php");
}

?>
