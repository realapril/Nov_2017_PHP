<?php
session_start();
$_SESSION['reading']=$_POST['ask_no'];
//echo "session".$_SESSION['reading']."post".$_POST['ask_no'];
header("location:cate_questions_detail.php");
 ?>
