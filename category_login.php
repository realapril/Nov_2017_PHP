<?php
session_start();
$_SESSION['message']='';
$conn=mysqli_connect('localhost','root','1234');
$conn->set_charset('utf8');
mysqli_select_db($conn,"shoppingmall");

if($_POST['validate']==yes){
  $uid= mysqli_real_escape_string($conn,$_POST['login_email']);
  $pwd= mysqli_real_escape_string($conn,$_POST['login_password']);
  $sql="SELECT*FROM user WHERE id='$uid'";
  $result=mysqli_query($conn, $sql);
  $check=mysqli_num_rows($result);
  if($check<1){
     $_SESSION['message']="이메일 또는 비밀번호가 일치하지 않습니다.";
  }else{
    if($row=mysqli_fetch_assoc($result)){
      //de-hashing the password
          $hashedPwdCheck=password_verify($pwd, $row['passwd']);
          if($hashedPwdCheck==false){
          $_SESSION['message']="이메일 또는 비밀번호가 일치하지 않습니다.";
          }elseif($hashedPwdCheck==true){
            //Log in the user here
            $_SESSION['u_id']=$row['id'];
            $_SESSION['u_id_num']=$row['id_num'];
            $_SESSION['u_name']=$row['name'];
            $_SESSION['u_address']=$row['address'];
            $_SESSION['u_phone']=$row['telephone'];

            if ($_POST['rememberid']==true) {
             setcookie('idremembered',$uid,time()+60*60*24*30);
             //cookie expires after 30days
          }else{setcookie('idremembered',$uid,time()-1);}

            if(ISSET($_COOKIE['name'])){ header("location:mycart.php");
            }else{ header("location:main.php");}

          }
        }
  }
}

 ?>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS -->

</style>
</head>
  <body style="background:url('https://i.imgur.com/Lva2jB7.png')">
    <form action="category_login.php" method="post"  class="jumbotron"style="background-color: rgba(355, 355, 355, 0.9);
    width:600px; margin-left: 250px; margin-top:50px;">
    <!-- class="jumbotron" -->
      <table>
        <tr><td><h2>  푸디마켓에 오신것을 환영합니다!  </h2></td></tr>
        <tr><td>  <p>로그인하고 더 많은 혜택을 누리세요</p></td></tr>
        <tr><td>아이디</td>  </tr>
        <tr>  <td>
          <input type="email" class="form-control" name="login_email" placeholder="Email을 입력하세요"
          style="margin-top:10px;margin-bottom:10px;" required
          value="<?php  if(!empty($_COOKIE["idremembered"])){echo $_COOKIE["idremembered"];} ?>">
         </td>
        </tr>
        <tr>  <td>비밀번호</td>  </tr>
        <tr>
            <td>   <input type="password" class="form-control" name="login_password" placeholder="8자 이상" required
                   style="margin-top:10px;margin-bottom:10px;"></td>
        </tr>
        <tr><td><input type="checkbox" name="rememberid" value="true"
          <?php  if(!empty($_COOKIE["idremembered"]))echo "checked='checked'";?>
          style="margin-top:10px;"> 아이디 저장</td>
        </tr>
        <tr><td><div class="alert alert-error"><?=$_SESSION['message']?></div></td> </tr>
        <tr>
            <td>   <a href="category_join.php" class="btn btn-outline-secondary"role="button" aria-pressed="true">회원가입</a> </td>
          <td>   <input type="submit" value="로그인" name="login_admit" class="btn btn-outline-secondary"style="margin-top:10px;">  </td>

          <td>   <input type="hidden" name="validate" value="yes">  </td>
        </tr>
         <tr>
           <td><a href="lost_found.php" >비밀번호 분실</a></td>
         </tr>
      </table>
    </form>

    </table>

    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>

    </html>
