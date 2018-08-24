<?php
session_start();
$_SESSION['message']='';
$conn=mysqli_connect('localhost','root','1234');
$conn->set_charset('utf8');
mysqli_select_db($conn,"shoppingmall");

if($_POST['vvalidate']==yes){
// echo $_POST['email']."=email,";
// echo $_POST['name']."=name";
// echo $_POST['password1']."=pswd";

// if(preg_match("/(\w)\\1\\1\\1/", $_POST['password1'])) // 같은 영문자&숫자 연속 4번 정규식
// if(preg_match("/([\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"])\\1\\1\\1/", $_POST['password1'])) // 같은 특수문자 연속 4번 정규식
// if(preg_match("/([\xA1-\xFE][\xA1-\xFE])\\1\\1\\1/",$_POST['password1'])) // 같은 한글 연속 4번 정규식
if ( $_POST['password1']!= $_POST['password2']) {
  echo' <script type="text/javascript">
  alert("두 비밀번호가 일치하지 않습니다!");
  </script>';
}
elseif(preg_match("/(0123)|(1234)|(2345)|(3456)|(4567)|(5678)|(6789)|(7890)/", $_POST['password1'])) // 연속된 숫자 정규식
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
else {
  $uid= mysqli_real_escape_string($conn,$_POST['email']);
  $sq="SELECT*FROM user WHERE id='$uid'";
 $resul=mysqli_query($conn, $sq);
 $check=mysqli_num_rows($resul);

 if($check>0){
    echo' <script type="text/javascript">
    alert("이미 사용중인 이메일입니다.");
    </script>';
 }else {
   $uname= mysqli_real_escape_string($conn,$_POST['name']);
   $upassword= mysqli_real_escape_string($conn,$_POST['password1']);
   $hashedPwd=password_hash($upassword, PASSWORD_DEFAULT);
   $sql="INSERT INTO user VALUES(NULL, '$uid','$uname',NULL,NULL,'$hashedPwd')";
   //$sql="SELECT*FROM user WHERE id='$uid'";
   $result=mysqli_query($conn, $sql);
     header("location:category_login.php");
 }

//  $check=mysqli_num_rows($result);
  //
  // if($check>0){
  //    $_SESSION['messageid']="이미 사용중인 이메일입니다.";
  // }else{

  // }
}

}
 ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
</head>
  <body style="background:url('https://i.imgur.com/3ix9Bif.png ')">
<form action="category_join.php" method="post"  class="jumbotron"style="background-color: rgba(355, 355, 355, 0.9);
width:600px; margin-left: 250px; margin-top:50px;" name="registeruser">
<table>
    <tr>
      <td><h2>회원가입  </h2></td>
    </tr>
    <tr>
      <td>  <p>푸디마켓에 처음이세요? 금방 회원이 될 수 있어요!</p></td>
    </tr>
    <tr>
        <td>아이디  </td>
    </tr>
    <tr>
        <td> <input type="email" class="form-control" name="email" placeholder="Email을 입력하세요"
          value="<?php echo htmlspecialchars($_POST["email"]);?>" id="email"
          style="margin-top:10px;margin-bottom:10px;" required  data-type='email'></td>
          <span class="check-exists-feedback" data-type='email'></span>
    </tr>
    <tr>
    <td><div id="idch"></div></td>
    </tr>
      <SCRIPT src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">  </SCRIPT>
        <SCRIPT>
                  $('#email').blur(function(){
                          $.ajax({
                              type: "POST",
                              url : "checkid.php",
                              data : {
                                  id : $('#email').val()
                              },
                              success : function s(a){ $('#idch').html(a); },
                              error : function error(){ alert('시스템 문제발생');}
                          });
                        });
      </SCRIPT>
    <tr>
        <td>이름  </td>
    </tr>
    <tr>
        <td> <input type="name" class="form-control" name="name" pattern=".{0,5}"
          value="<?php echo htmlspecialchars($_POST["name"]);?>"
          placeholder="이름을 입력하세요"style="margin-top:10px;margin-bottom:10px;" required  ></td>
    </tr>
    <tr>
        <td>비밀번호</td>
    </tr>
    <tr>
        <td>   <input type="password" class="form-control" name="password1" placeholder="8자 이상"
          pattern=".{8,20}" onkeyup="verify.check()"
          style="margin-top:10px;margin-bottom:10px;" required>
           </td>
           <?php //echo "8자이상기, 영어, 숫자, 특수문자 조합"; ?>
    </tr>
    <tr>
        <td>비밀번호 재확인 </td>
    </tr>
    <tr>
        <td>   <input type="password" class="form-control" name="password2" placeholder="비밀번호를 한번 더 입력해주세요"
          pattern=".{8,20}"  onkeyup="verify.check()"
          style="margin-top:10px;margin-bottom:10px;" required></td>
    </tr>

  <tr>
  <td><div id="password_result"></div></td>
  </tr>
  <SCRIPT LANGUAGE="JavaScript">
  function verifynotify(field1, field2, result_id, match_html, nomatch_html,yet_html,more_html,invalid_html) {
  this.field1 = field1;
  this.field2 = field2;
  this.result_id = result_id;
  this.match_html = match_html;
  this.nomatch_html = nomatch_html;
  this.yet_html = yet_html;
  this.more_html = more_html;
  this.invalid_html=invalid_html;

  var patt_k = /([가-힣ㄱ-ㅎㅏ-ㅣ\x20])/i; // 한글 정규식
  var patt_e = /[A-z]/i; // 영문자 정규식
  var patt_w = /[\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"]/gi; // 특수문자 정규식
  var patt_n = /[\d]/i; // 숫자 정규식
  var patt_4num1 = /(\w)\1\1\1/; // 같은 영문자&숫자 연속 4번 정규식
  var patt_4num2 = /([\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"])\1\1\1/; // 같은 특수문자 연속 4번 정규식
  var patt_4num3 = /([가-힣ㄱ-ㅎㅏ-ㅣ\x20])\1\1\1/; // 같은 한글 연속 4번 정규식
  var patt_cont = /(0123)|(1234)|(2345)|(3456)|(4567)|(5678)|(6789)|(7890)/; // 연속된 숫자 정규식


  this.check = function() {
    if (!this.result_id) { return false; }
    if (!document.getElementById){ return false; }
    r = document.getElementById(this.result_id);
    if (!r){ return false; }
        if (this.field1.value.length ==0) {
          r.innerHTML = this.yet_html;
        }else if(this.field1.value.length<8){r.innerHTML = this.more_html;
        }else if (7<this.field1.value.length<21) {

           r.innerHTML = "";

                  if (this.field2.value.length >0 && this.field1.value != this.field2.value) {
                    r.innerHTML = this.nomatch_html;
                  } else if(this.field2.value.length >7 && this.field1.value == this.field2.value) {
                      //안먹음ㅠㅠ 영.숫.특다쓰게하기
                        // if (this.field2.value.match(/([a-zA-Z0-9].*[!,@,#,$,%,^,&,*,?,_,~])|([!,@,#,$,%,^,&,*,?,_,~].*[a-zA-Z0-9])/)) {
                        //   r.innerHTML = this.invalid_html;
                        // }else{
                          r.innerHTML = this.match_html;
                        //}
                  }
        }
  }
  }

  function verifyInput() {
  verify = new verifynotify();
  verify.field1 = document.registeruser.password1;
  verify.field2 = document.registeruser.password2;
  verify.result_id = "password_result";
  verify.match_html = "<span style=\"color:green\">비밀번호가 일치합니다. <\/span>";
  verify.nomatch_html = "<span style=\"color:red\">비밀번호가 일치하지 않습니다. <\/span>";
  verify.yet_html = "<span style=\"color:black\">비밀번호를 작성하세요. <\/span>";
  verify.more_html = "<span style=\"color:black\">비밀번호를 8~20자 사이로 작성하세요. <\/span>";
  verify.invalid_html="<span style=\"color:red\">비밀번호에 영문,숫자,특수문자를 모두 사용하세요. <\/span>";
  // Update the result message
  verify.check();
  }

  // Multiple onload function created by: Simon Willison
  // http://simonwillison.net/2004/May/26/addLoadEvent/
  function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      if (oldonload) {
        oldonload();
      }
      func();
    }
  }
  }

  addLoadEvent(function() {
  verifyInput();
  });

  </SCRIPT>
    <tr>
      <td>
        <div class="alert alert-error" style ='color:#ff0000'><?=$_SESSION['message']?></div>
           <input type="submit" value="확인" name="register" class="btn btn-outline-secondary"style="margin-top:10px;">  </td>

        <td>   <input type="hidden" name="vvalidate" value="yes">  </td>

    </tr>
  </table>

</form>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <script src="js/existscheck.js"></script>
<script>
$('.check-exists').existsChecker();
</script> -->
</html>
