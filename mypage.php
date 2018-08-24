<?php
session_start();
if (empty($_SESSION['u_name'])) {

echo' <script type="text/javascript">
alert("마이페이지를 보려면 로그인 해야합니다."); //You need to login
location="category_login.php";
</script>';
}else{

$conn=mysqli_connect('localhost','root','1234');
$conn->set_charset('utf8');
mysqli_select_db($conn,"shoppingmall");
$sql="SELECT*FROM user WHERE id_num=".$_SESSION['u_id_num'];

    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $_SESSION['u_address']=$row['address'];
    $_SESSION['u_phone']=$row['telephone'];

}
// $hash='$2y$10$C.xSQDAhuBqevNGGSM6B8.Nx/Dc0GTI5rpg0ZtsxqY.H/DefkKgQq';
// if(password_verify('flsrjs11',$hash)) {
//   echo "'Password is valid!'";
// }else{
//   echo "no";
// }
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

                <div class="nav flex-column" style="width:130px">
                    <nav class="nav flex-column">
                      <a class="dropdown-item" href="mypage.php">마이페이지</a>
                      <!-- <a class="dropdown-item" href="category_CS_official.php">나의 주문내역</a> -->
                      <a class="dropdown-item" href="mycart.php">나의 장바구니</a>
                      <a class="dropdown-item" href="category_myq.php">나의 1:1문의</a>

                    </nav>
                  </div>


                <div class="container">
                  <h5>마이페이지</h5>

                  <form action="logincheck.php"method="post">
                    <div class="container">
                    	<div class="row">
                    		<section class="content">
                    			<div class="col">
                    				<div class="panel panel-default">
                    					<div class="panel-body">
                    						<div class="table-container" style="width:1100px;">
                    							<table class="table table-filter">
                    								<tbody>
                                      <tr data-status="pagado">
                    										<td>

                    											<div class="container">
                    											<p class="summary" style=" margin-right:300px;"><?php echo $_SESSION['u_name']."님</br>"; ?></p>
                    											</div>
                                          <div  class="container" >
                                          <p class="summary" style="margin-right:300px;"><?php
                                          if (!empty($_SESSION['u_address'])) {
                                            echo "주소: ".$_SESSION['u_address'];
                                          }else {
                                            echo"주소가 아직 입력되지 않았어요!";
                                          }
                                          ?>
                                        </p>
                                          </div>

                                          <div  class="container">
                                            <p class="summary" style=" margin-right:300px;"><?php
                                            if (!empty($_SESSION['u_phone'])) {
                                              echo "전화번호: ".$_SESSION['u_phone'];
                                            }else {
                                              echo"전화번호가 아직 입력되지 않았어요!";
                                            }
                                            ?>
                                            </p>
                                            </div>
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
                    <input type="submit" value="수정하기" class="btn btn-outline-secondary" name="submit" style="margin-top:10px;"
                      style="float:right;margin-left:800px;">
                      <input type="hidden" value="ok" class="btn btn-outline-secondary" name="ckck" style="margin-top:10px;"
                        style="float:right;margin-left:800px;">

                    </form>
                  </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
