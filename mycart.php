<?php
session_start();
//삭제버튼 눌럿을
if (!empty($_POST['del'])) {
  $conn=mysqli_connect('localhost','root','1234');
  $conn->set_charset('utf8');
  mysqli_select_db($conn,"shoppingmall");
  $numm= mysqli_real_escape_string($conn,$_SESSION['u_id_num']);

    if(!empty($_POST['check'])) {
      $check=$_POST['check'];
    //      for($i = 0; $i<count($check); $i++){
              if (!empty($_SESSION['u_id_num'])) {
                 for($i = 0; $i<count($check); $i++){
                $sql="DELETE FROM cart WHERE custum_num='$numm' AND goods_no='$check[$i]'";
                $result=mysqli_query($conn,$sql); }
              }else{
                $json=json_decode($_COOKIE["unlogincart"],true);
               $myobj=$_COOKIE["unlogincart"];
                     for($i = 0; $i<count($check); $i++){
                      unset($json[$check[$i]]);
                //  delete myObj.test[keyToDelete];
                    }
              $myJSON=json_encode($json);
              setcookie('unlogincart',$myJSON,time()+60*60*24*30);
                // print_r($json);
                }
                header("location:mycart.php");
      }
}elseif (!empty($_POST['submit'])) {

      if(empty($_POST['check'])){
        echo' <script type="text/javascript">
        var r=confirm("구매할 품목을 선택해주세요");
    if (r==true)
      {
      location="mycart.php";
      }

        </script>';
      }else{
             if (!empty($_SESSION['u_id_num'])) {
               $_SESSION['buy']=$_POST['check'];
              header("location:buy.php");
            }else{
              echo' <script type="text/javascript">
              var r=confirm("구매를 위해 로그인 해주세요.\n로그인시에도 장바구니가 유지됩니다");
          if (r==true)
            {

                document.cookie="name=mycart;";
            location="category_login.php";
            }
           else
            {
            location="mycart.php";
            }
              </script>';
            }
          }
}elseif(!empty($_SESSION['u_id_num'])){
  if(ISSET($_COOKIE['name'])){
    if(!empty($_COOKIE['name'])){
      $conn=mysqli_connect('localhost','root','1234');
      $conn->set_charset('utf8');
      mysqli_select_db($conn,"shoppingmall");

      $numm= mysqli_real_escape_string($conn,$_SESSION['u_id_num']);
      if (!empty($_COOKIE["unlogincart"])) {
             $jso=json_decode($_COOKIE["unlogincart"],true);

             for($in = 0; $in < count($jso); $in++){
             $obj = (Array)$jso[$in];

             $num=mysqli_real_escape_string($conn,$obj["what"]);
             $howmany=mysqli_real_escape_string($conn,$obj["howmany"]);
             $numm= mysqli_real_escape_string($conn,$_SESSION['u_id_num']);
             $s="SELECT*FROM cart WHERE goods_no='$num' AND custum_num='$numm'";
             $resul=mysqli_query($conn,$s);
             $check=mysqli_num_rows($resul);

                     if ($check>0) {
                       $sql="UPDATE cart SET numb=numb+$howmany WHERE custum_num='$numm' AND goods_no='$num'";
                       $result=mysqli_query($conn,$sql);
                     }else{
                        $sql="INSERT INTO cart VALUES(NULL, '$numm','$num','$howmany')";
                        $result=mysqli_query($conn,$sql);
                     }
          }
              setcookie('unlogincart',null,time()-360);
              setcookie('name',null,time()-360);
              unset($_COOKIE['name']);
              unset($_COOKIE['unlogincart']);
          }

      }
    }  //header("location:mycart.php");

}

?>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="jquery-3.2.1.min.js"></script>
</head>
  <body>
                <?php include_once 'header.php' ?>
                <div class="row" style="margin-top:30px;">
                  <div class="col col-lg-2" >
                <div class="nav flex-column" style="width:130px">
                    <nav class="nav flex-column">
                      <a class="dropdown-item" href="mypage.php">마이페이지</a>
                      <!-- <a class="dropdown-item" href="category_CS_official.php">나의 주문내역</a> -->
                      <a class="dropdown-item" href="mycart.php">나의 장바구니</a>
                      <a class="dropdown-item" href="category_CS_questions.php">나의 1:1문의</a>
                    </nav>
                  </div>
                </div>


<div class="container">
  <h5>장바구니</h5>
   <input type='checkbox' id='select_all_invoices' onclick="selectAll()" checked="checked"> 모두선택</input>
     <?php
     echo'<script type="text/javascript">
     function selectAll() {
           var blnChecked = document.getElementById("select_all_invoices").checked;
           var check_invoices = document.getElementsByClassName("check_invoice");
           var intLength = check_invoices.length;
           for(var i = 0; i < intLength; i++) {
               var check_invoice = check_invoices[i];
               check_invoice.checked = blnChecked;
           }
       }
     </script>';
      ?>
    

  <?php
  if (empty($_POST['del'])) {
    if (!empty($_SESSION['u_id_num'])) {
      include_once 'mycartinside.php';
    }else{
      if (!empty($_COOKIE["unlogincart"])) {
      $conn=mysqli_connect('localhost','root','1234');
      $conn->set_charset('utf8');
      mysqli_select_db($conn,"shoppingmall");
      $json=json_decode($_COOKIE["unlogincart"],true);
//print_r($json);
            for($idx = 0; $idx < count($json); $idx++){

          $obj = (Array)$json[$idx];
          $num=mysqli_real_escape_string($conn,$obj["what"]);
          $result=mysqli_query($conn,"SELECT*FROM goods WHERE goods_num='$num'");
          $row=mysqli_fetch_array($result);

 ?>
 <form action="mycart.php" method="post" style="">
   <div class="container">
     <div class="row">
       <section class="content">
         <div class="col">
           <div class="panel panel-default">
             <div class="panel-body">

               <div class="table-container" style="width:1000px;">
                 <table class="table table-filter">
                   <tbody>
                     <tr data-status="pagado">
                       <td>
                           <input type="checkbox"  class="check_invoice" name="check[]" value="<?php echo $idx?>" checked="checked">
                       </td>
                       <td>
                         <div class="media" style="width:800px;">
                           <a href="item_view.php?num=<?php echo $row['goods_no']?>" class="pull-left">
                             <img src="<?php echo $row['img_thmb'] ?>" class="media-photo"style="width:90px; height:120px">
                           </a>
                           <div  style="width:600px;">
                             <h4 class="title"style="margin-left:30px;">
                               <?php echo $row['goods_name']."      "?>

                             </h4>
                           <h6 style="float:right;"> <?php echo $row['price']." 원" ?>	</h6>
                             <p class="summary" style="float:right; margin-right:300px;"><?php echo $obj["howmany"]." 개" ?></p>
                           </div>
                         </div>
   <?php $total=$total+($row['price']*$obj["howmany"]); ?>
                       </td>
                     </tr>
                   </tbody>
                 </table>
                 </div>
                 </div>
                 </div>
                 </div>
              </div>
              </div>
  <?php
      }
      ?>
    <?php }
        }
      }
  ?>
<div>
<p class="summary" style="float:right; margin-right:300px;"><?php echo "합계:  ".$total." 원" ?></p>
</div>
<div>
<input type="submit" value="삭제" class="btn btn-outline-secondary"  name="del" style="margin-top:10px;"
>
<input type="submit" value="결제하기" class="btn btn-outline-secondary" name="submit" style="margin-top:10px;"
  style="float:right;margin-left:800px;"></div>
</form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
