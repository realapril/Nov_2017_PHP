<?php
session_start();
if (empty($_SESSION['u_name'])) {

echo' <script type="text/javascript">
alert("마이페이지를 보려면 로그인 해야합니다.");
location="category_login.php";
</script>';
}
elseif (!empty($_POST['login_password'])){
$conn=mysqli_connect('localhost','root','1234');
$conn->set_charset('utf8');
mysqli_select_db($conn,"shoppingmall");

    $pwd= mysqli_real_escape_string($conn,$_POST['login_password']);
    $sql="SELECT*FROM user WHERE id_num=".$_SESSION['u_id_num'];
    $result=mysqli_query($conn, $sql);
          if($row=mysqli_fetch_assoc($result)){
            //de-hashing the password
                $hashedPwdCheck=password_verify($pwd, $row['passwd']);
                if($hashedPwdCheck==false){
                $_SESSION['message']="이메일 또는 비밀번호가 일치하지 않습니다.";
              }elseif($hashedPwdCheck==true){
                unset($_SESSION['message']);
                $_SESSION['mypgedit']="ok";
                header("location:myinfoedit.php");
              }
            }
}elseif (empty($_POST['ckck'])) {
  echo' <script type="text/javascript">
  alert("잘못된 접근입니다.");
  location="main.php";
  </script>';
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
                  <?php include_once 'header.php' ?>

                  <form action="logincheck.php" method="post"  class="jumbotron"style="background-color: rgba(355, 355, 355, 0.9);
                  width:600px; margin-left: 250px; margin-top:50px;">
                  <!-- class="jumbotron" -->
                    <table>

                      <tr><td>  <p>개인정보 보호를 위해 비밀번호를 한번 더 입력해 주세요</p></td></tr>


                      <tr>  <td>비밀번호</td>  </tr>
                      <tr>
                          <td>   <input type="password" class="form-control" name="login_password" placeholder="8자 이상" required
                                 style="margin-top:10px;margin-bottom:10px;"></td>
                      </tr>
                        <tr><td><div class="text-danger"><?=$_SESSION['message']?></div></td> </tr>
                      <tr>
                          <td>   <input type="submit" value="확인" name="login_admit" class="btn btn-outline-secondary"style="margin-top:10px;">  </td>
                        <td>   <input type="hidden" name="validate" value="yes">  </td>
                      </tr>
                    </table>
                  </form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
