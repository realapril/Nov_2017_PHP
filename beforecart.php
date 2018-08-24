<?php
session_start();
$conn=mysqli_connect('localhost','root','1234');
$conn->set_charset('utf8');
if (!empty($_SESSION['u_id_num'])) {
  $custum_num=$_SESSION['u_id_num'];
  $goods_num= $conn->real_escape_string($_POST['goodsnum']);
  $goods_count= $conn->real_escape_string($_POST['goodscount']);
  mysqli_select_db($conn,"shoppingmall");
  $sql="INSERT INTO cart VALUES(NULL, '$custum_num','$goods_num','$goods_count')";
  $result=mysqli_query($conn,$sql);
      header("location:mycart.php");
}else {

  if (!empty($_COOKIE["unlogincart"])) {

    $cartlist = json_decode($_COOKIE["unlogincart"], true);
    $cartlist[]=array('what'=>$_POST['goodsnum'], 'howmany'=>$_POST['goodscount']);

//개별값 꺼내는법
    // $key="what";
    // $what=$cartlist[$key];
    // echo $what;
//여기까지
    // $cartlist['what']=$_POST['goodsnum'];
    // $cartlist['howmany']=$_POST['goodscount'];
     $myJSON=json_encode($cartlist);
     setcookie('unlogincart',$myJSON,time()+60*60*24*30);
  //   echo $_COOKIE["unlogincart"];

    // array_push($cartlist,$_POST['goodsnum']);
    // array_push($cartnum,$_POST['goodscount']);
  }
  else{
    //$cartlist=array(); $cartnum=array();
    // array_push($cartlist,$_POST['goodsnum']);
    // array_push($cartnum,$_POST['goodscount']);

    // $myobj->what=$_POST['goodsnum'];
    // $myobj->howmany=$_POST['goodscount'];
    $myobj[]=array('what'=>$_POST['goodsnum'], 'howmany'=>$_POST['goodscount']);
    $myJSON=json_encode($myobj);
    setcookie('unlogincart',$myJSON,time()+60*60*24*30);
    // setcookie('what',json_encode($cartlist),time()+60*60*24*30);
    // setcookie('howmany',json_encode($cartnum),time()+60*60*24*30);
    // echo $cartlist;
    // echo "empty so put in";echo $_COOKIE["what"];
  }

  header("location:mycart.php");
}



?>
