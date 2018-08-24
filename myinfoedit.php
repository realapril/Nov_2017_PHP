<?php
session_start();
if (empty($_SESSION['u_name'])||empty($_SESSION['mypgedit'])) {
echo' <script type="text/javascript">
alert("정확한 경로가 아닙니다");
location="logincheck.php";
</script>';
}


$conn=mysqli_connect('localhost','root','1234');
$conn->set_charset('utf8');
  mysqli_select_db($conn,"shoppingmall");
if(!empty($_POST['change'])){
  if(preg_match("/(0123)|(1234)|(2345)|(3456)|(4567)|(5678)|(6789)|(7890)/", $_POST['password1'])) // 연속된 숫자 정규식
  {
    echo' <script type="text/javascript">
    alert("비밀번호가 충분히 안전하지 않습니다. 4회이상 연속된 숫자를 사용할 수 없습니다.");
    </script>';
  }elseif (preg_match("/([\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"])\\1\\1\\1/", $_POST['password1'])) {
    echo' <script type="text/javascript">
    alert("비밀번호가 충분히 안전하지 않습니다. 4회이상 같은 특수문자를 사용할 수 없습니다.");
    </script>';
  }
  elseif(preg_match("/(\w)\\1\\1\\1/", $_POST['password1'])){
    echo' <script type="text/javascript">
    alert("비밀번호가 충분히 안전하지 않습니다. 4회이상 같은 영문자나 숫자를 사용할 수 없습니다.");
    </script>';
  }elseif(preg_match("/([\xA1-\xFE][\xA1-\xFE])\\1\\1\\1/",$_POST['password1']))
  {echo' <script type="text/javascript">
  alert("비밀번호가 충분히 안전하지 않습니다. 4회이상 같은 한글을 사용할 수 없습니다.");
  </script>';}
elseif (empty($_POST['password1'])) {
    $telephone= $conn->real_escape_string($_POST['telephone']);
    $address= $conn->real_escape_string($_POST['address']);

      $sql="UPDATE user SET telephone='$telephone', address='$address' WHERE id_num=".$_SESSION['u_id_num'];
      $result=mysqli_query($conn,$sql);
      $_SESSION['u_address']=$row['address'];
      $_SESSION['u_phone']=$row['telephone'];
      header("location:mypage.php");
  }else{
    $telephone= mysqli_real_escape_string($conn,$_POST['telephone']);
    $address= mysqli_real_escape_string($conn,$_POST['address']);
    $upassword= mysqli_real_escape_string($conn,$_POST['password1']);

    $hashedPwd=password_hash($upassword, PASSWORD_DEFAULT);

      $sql="UPDATE user SET telephone='$telephone', address='$address', passwd='$hashedPwd' WHERE id_num=".$_SESSION['u_id_num'];
      $result=mysqli_query($conn,$sql);
      $_SESSION['u_address']=$row['address'];
      $_SESSION['u_phone']=$row['telephone'];
      header("location:mypage.php");
  }

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
                <div class="row" style="margin-top:30px;">

                <div class="nav flex-column" style="width:130px">
                    <nav class="nav flex-column">
                      <a class="dropdown-item" href="mypage.php">회원 정보</a>
                      <!-- <a class="dropdown-item" href="category_CS_official.php">나의 주문내역</a> -->
                      <a class="dropdown-item" href="mycart.php">나의 장바구니</a>
                      <a class="dropdown-item" href="category_CS_QnA.php">나의 1:1문의</a>

                    </nav>
                  </div>


                <div class="container">
                  <h5>내 정보 수정</h5>
                  <h6>하단 수정하기 버튼을 눌러야 저장됩니다.</h6>

                  <form action="myinfoedit.php" method="post"   name="registeruser">
                  <table>
                    <tr>
                        <td class="text-muted">이름</td>
                    </tr>
                    <tr>
                        <td> <p type="name" name="name"
                          value=""
                          style="margin-top:10px;margin-bottom:10px;margin-left: 10px;"  ><?php echo $_SESSION['u_name']; ?></p></td>
                    </tr>
                    <tr>
                        <td class="text-muted">주소  </td>
                    </tr>
                    <tr>
                        <td> <input type="text" class="form-control" name="address" placeholder="주소를 입력하세요"
                          value="<?php echo $_SESSION['u_address']; ?>" required style="margin-top:10px;margin-bottom:10px;margin-left: 10px;"  ></td>
                    </tr>
                      <tr>
                          <td class="text-muted">전화번호  </td>
                      </tr>

                        <!--
                        자동으로 비밀번호 3-3-3 아님 3-4-3 하이픈 들어가게 만들고싶었음
                        <SCRIPT LANGUAGE="JavaScript">
                        document.getElementById('telephone').value=str;
                        function autoHypenPhone(str){
                          str = str.replace(/[^0-9]/g, '');
                          var tmp = '';
                          if( str.length < 4){
                            return str;
                          }else if(str.length < 7){
                            tmp += str.substr(0, 3);
                            tmp += '-';
                            tmp += str.substr(3);
                            return tmp;
                          }else if(str.length < 11){
                            tmp += str.substr(0, 3);
                            tmp += '-';
                            tmp += str.substr(3, 3);
                            tmp += '-';
                            tmp += str.substr(6);
                            return tmp;
                          }else{
                            tmp += str.substr(0, 3);
                            tmp += '-';
                            tmp += str.substr(3, 4);
                            tmp += '-';
                            tmp += str.substr(7);
                            return tmp;
                          }
                          return str;
                        }
                        </SCRIPT> -->
                      <tr>
                          <td> <input type="tel" class="form-control"required name="telephone" placeholder="전화번호를 입력하세요"
                            value="<?php echo $_SESSION['u_phone']; ?> "
                             style="margin-top:10px;margin-bottom:10px;margin-left: 10px;"
                             onkeydown='return onlyNumber(event)' onkeyup='removeChar(event)'
                             ></td>
                      </tr>
                      <script>
                      		function onlyNumber(event){
                      			event = event || window.event;
                      			var keyID = (event.which) ? event.which : event.keyCode;
                      			if ( (keyID >= 48 && keyID <= 57) || (keyID >= 96 && keyID <= 105) || keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39 )
                      				return;
                      			else
                      				return false;
                      		}
                      		function removeChar(event) {
                      			event = event || window.event;
                      			var keyID = (event.which) ? event.which : event.keyCode;
                      			if ( keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39 )
                      				return;
                      			else
                      				event.target.value = event.target.value.replace(/[^0-9]/g, "");
                      		}
                      	</script>
                      <tr>
                          <td class="text-muted">비밀번호 변경</td>
                      </tr>
                      <tr>
                          <td>   <input type="password" class="form-control" name="password1" placeholder="8자 이상"
                            pattern=".{8,20}"
                            style="margin-top:10px;margin-bottom:10px;margin-left: 10px;" >
                             </td>
                      </tr>

                      <tr>
                        <td>

                             <input type="submit" value="수정하기" name="register" class="btn btn-outline-secondary"style="margin-top:10px;">  </td>

                          <td>   <input type="hidden" name="change" value="yes">  </td>

                      </tr>
                    </table>

                  </form>
                  </body>

                  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
                  <script src="js/bootstrap.min.js"></script>

                  </html>
