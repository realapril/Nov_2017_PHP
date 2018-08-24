<?php
session_start();

?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</style>
</head>
  <body>
  <?php include_once 'header.php' ?>
<div class="row" style="margin-top:30px;">
  <div class="col" >

</div>
<div class="col-10">
    <form action="lost_found.php" method="post" style="width:900px; margin-left: 50px;">
      <table>
        <tr>
          <td><h4> 비밀번호 찾기</h4></td>
        </tr>
        <?php if (empty($_POST['sub'])) {
        unset(  $_SESSION["warning"]);
        ?>
        <tr>  <td>  <hr class="my-4"><h5>이름을 입력해주세요 </h5></td></tr>
        <tr>  <td>   <input type="text" class="form-control" name="name" style="width:600px; margin-top:10px;margin-bottom:10px;"

            required></td>


        <tr>   <td> <hr class="my-4"><h5>이메일을 입력해주세요 </h5> </td></tr>
        <tr> <td><input type="email" class="form-control" name="email"style="width:600px; margin-top:10px;margin-bottom:10px;"
           required  data-type='email'> </td></tr>

        <tr>
          <td>   <input type="submit" value="확인" class="btn btn-outline-secondary" name="sub" style="margin-top:10px;">  </td>

            <input type="hidden" name="go" >  </td>
        </tr>
      </table>

    </form>
        <?php }else{
                  $conn=mysqli_connect('localhost','root','1234');
                  $conn->set_charset('utf8');
                  mysqli_select_db($conn,"shoppingmall");
                  $uid= mysqli_real_escape_string($conn,$_POST['email']);
                  $sql="SELECT*FROM user WHERE id='$uid'";
                  $result=mysqli_query($conn,$sql);
                  $check=mysqli_num_rows($result);
                  if ($check<1) {
                    $_SESSION["warning"] = "일치하는 회원이 없습니다. 다시 확인해 주세요";
                    $valid="no";
                  ?>

                <?php }else{
                    $name= mysqli_real_escape_string($conn,$_POST['name']);
                    $sq="SELECT*FROM user WHERE name='$name'";
                    $resul=mysqli_query($conn,$sq);
                    $chec=mysqli_num_rows($resul);
                    if ($chec<1) {
                      $_SESSION["warning"] = "일치하는 회원이 없습니다. 다시 확인해 주세요";
                        $valid="no";
                    }else {
                      $_SESSION["warning"] = $_POST['email']."로 새로운 비밀번호를 전송했습니다";
                    }

                  }} ?>
<tr>   <td> <hr class="my-4"><h5><?php echo   $_SESSION["warning"] ; ?></h5> </td></tr>
<?php if(!empty($valid)){ ?>
<tr>   <td>
 <a href="lost_found.php"  class="btn btn-outline-secondary" name="sub" style="margin-top:10px;">돌아가기</a>
  <a href="category_join.php" class="btn btn-outline-secondary" name="sub" style="margin-top:10px;">가입하기</a>
  </td></tr>
  <?php } ?>
  </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
