<?php session_start();
$conn=mysqli_connect('localhost','root','1234');
$conn->set_charset('utf8');
mysqli_select_db($conn,"shoppingmall");
$numm= mysqli_real_escape_string($conn,$_SESSION['u_id_num']);
?>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
  <body>
                <?php include_once 'header.php' ?>
                <div class="row" style="margin-top:30px;">


<div class="container">
  <p>구매목록</p>
<?php
$check=$_SESSION['buy'];
for($i = 0; $i<count($check); $i++){

if (!empty($_SESSION['u_id_num'])) {
$result=mysqli_query($conn,"SELECT cart.goods_no, cart.numb, cart.custum_num, goods.goods_num,goods.goods_name, goods.price,goods.img_thmb
FROM cart INNER JOIN goods ON cart.goods_no=goods.goods_num WHERE cart.goods_no='$check[$i]' AND cart.custum_num=".$_SESSION['u_id_num']);
$row=mysqli_fetch_assoc($result);
 ?>

       <form action="" method="post" style="">
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
       											<div class="media" style="width:800px;">
       												<a href="item_view.php?num=<?php echo $row['goods_no']?>" class="pull-left">
       													<img src="<?php echo $row['img_thmb'] ?>" class="media-photo"style="width:90px; height:120px">
       												</a>
       												<div  style="width:600px;">
       													<h4 class="title"style="margin-left:30px;">
       														<?php echo $row['goods_name']."      "?>

       													</h4>
                               <h6 style="float:right;"> <?php echo $row['price']." 원" ?>	</h6>
                                 <p class="summary" style="float:right; margin-right:300px;"><?php echo $row['numb']." 개" ?></p>
       												</div>
       											</div>
       <?php $total=$total+($row['price']*$row['numb']); ?>
       										</td>
       									</tr>
       								</tbody>
       							</table>
       						</div>
       					</div>
       				</div>
       			</div>
       		</section>

       	</div>
       </div>
       <?php
    //  }else{
    //    if (!empty($_COOKIE["what"])) {
    //    $conn=mysqli_connect('localhost','root','1234');
    //    $conn->set_charset('utf8');
    //    mysqli_select_db($conn,"shoppingmall");
    //    $result=mysqli_query($conn,"SELECT*FROM goods WHERE goods_num=".$_COOKIE["what"]);
    //    $row=mysqli_fetch_assoc($result)

       ?>
       <!-- <form action="" method="post" style="">
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
       											<div class="media" style="width:800px;">
       												<a href="item_view.php?num=<?php echo $row['goods_no']?>" class="pull-left">
       													<img src="<?php echo $row['img_thmb'] ?>" class="media-photo"style="width:90px; height:120px">
       												</a>
       												<div  style="width:600px;">
       													<h4 class="title"style="margin-left:30px;">
       														<?php echo $row['goods_name']."      "?>

       													</h4>
                               <h6 style="float:right;"> <?php echo $row['price']." 원" ?>	</h6>
                                 <p class="summary" style="float:right; margin-right:300px;"><?php echo $_COOKIE["howmany"]." 개" ?></p>
       												</div>
       											</div>
       <?php $total=$total+($row['price']*$_COOKIE["howmany"]); ?>
       										</td>
       									</tr>
       								</tbody>
       							</table>
       						</div>
       					</div>
       				</div>
       			</div>
       		</section>

       	</div>
       </div> -->
     <?php //}}

}}//임시

   ?>

     <p>내 주소</p>
     <table>
       <tr>
           <td>이름  </td>
       </tr>
       <tr>
           <td><input type="text" class="form-control" name="name"
             value="<?php echo $_SESSION['u_name']; ?>" style="margin-top:10px;margin-bottom:10px;"
              ></td>
       </tr>
         <tr>
             <td>전화번호  </td>
         </tr>
         <tr>
             <td> <input type="tel" class="form-control" name="telephone"
               value="<?php echo $_SESSION['u_phone']; ?>" style="margin-top:10px;margin-bottom:10px;"   ></td>
         </tr>
         <tr>
             <td>주소  </td>
         </tr>
         <tr>
             <td> <input type="text" class="form-control" name="address"
               value="<?php echo $_SESSION['u_address']; ?>" style="margin-top:10px;margin-bottom:10px;"  ></td>
         </tr>
       </table>

 <div>
 <p class="summary" style="float:right; margin-right:300px;"><?php echo "합계:  ".$total." 원" ?></p>
 </div>
 <input type="submit" value="결제하기" class="btn btn-outline-secondary" name="submit" style="margin-top:10px;"
   style="float:right;margin-left:800px;">
 </form>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     <script src="js/bootstrap.min.js"></script>
   </body>
 </html>
