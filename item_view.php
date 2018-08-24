<?php
session_start();
$conn=mysqli_connect('localhost','root','1234');
$conn->set_charset('utf8');
mysqli_select_db($conn,"shoppingmall");
$numm= mysqli_real_escape_string($conn,$_SESSION['u_id_num']);
$goodsnum=mysqli_real_escape_string($conn,$_GET['num']);
$sql="SELECT goods.goods_num, goods.goods_name, goods.price, goods.img_thmb, goods.img_big,cart.cno, cart.custum_num, cart.goods_no, cart.numb
FROM goods LEFT JOIN cart ON goods.goods_num=cart.goods_no WHERE goods.goods_num='$goodsnum' AND (custum_num='$numm' OR custum_num='1') ORDER BY custum_num DESC";

// "SELECT cart.cno, cart.custum_num, cart.goods_no, cart.numb,goods.goods_num, goods.goods_name, goods.price, goods.img_thmb, goods.img_big
// FROM cart INNER JOIN goods WHERE cart.goods_no=goods.goods_num AND goods_num='$goodsnum' AND (custum_num='$numm' OR custum_num='6') ORDER BY custum_num ASC";


$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
 //echo $row['numb'];
  ?>

<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
  <body>
                <?php include_once 'header.php' ?>

<?php
  // $conn=mysqli_connect('localhost','root','1234');
  // $conn->set_charset('utf8');
  //
  // mysqli_select_db($conn,"shoppingmall");
  // $sql='SELECT*FROM goods WHERE goods_num='.$_GET['num'];
  // $result=mysqli_query($conn,$sql);
  // $row=mysqli_fetch_assoc($result);
  $img=$row['img_thmb'];
  $row['price'];
 ?>
 <div class="container">
   <div class="row">
     <div class="col">
       <img class="card-img-top" src="<?php echo $row['img_thmb'] ?>" alt="Card image cap"
       style="width:300px; height :400px">
     </div>
     <div class="col">

        <form action= "<?php
        if(!empty($_SESSION['u_id_num'])){
          if($row['numb']<1){echo "beforecart.php";}
          elseif($row['numb']>=1){echo "beforecart2.php";}
        }else{
        echo"beforecart.php";
        }
        ?>" method="post" style="">
       <h3><?php echo "<br>".$row['goods_name'] ?></h3>
       <p><?php echo "</br>판매가   ".$row['price']." 원" ?></p>
       <p>판매 단위<input name="goodscount" value="1"> 개</p>

         <input type="hidden" name="goodsnum" value="<?php echo $row['goods_num'] ?>">
          <input type="hidden" name="goodsprice" value="<?php echo $row['price'] ?>">
           <input type="hidden" name="goodsname" value="<?php echo $row['goods_name'] ?>">

         <input type="submit" value="주문하기" class="btn btn-outline-secondary" name="submit" style="margin-top:10px;"
           style="float:right;margin-left:800px;">
       </form>
     </div>
   </div>
 </div>
 <img src="<?php echo $row['img_big'] ?>" alt="Card image cap"
style="margin-left:100px;">
  <?php
  // include_once 'review.php'
  ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
