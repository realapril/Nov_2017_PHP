<?php
session_start();
if (empty($_SESSION['u_name'])) {

echo' <script type="text/javascript">
alert("글을 쓰려면 로그인 해야합니다.");
location="category_login.php";
</script>';
}?>
<?php

// echo $_SESSION['reading'];
if(empty($_POST['writenew'])){
  if(!empty($_SESSION['reading'])){
  $conn=mysqli_connect('localhost','root','1234');
  $conn->set_charset('utf8');
  $bringedit= $conn->real_escape_string($_POST['edit']);
  mysqli_select_db($conn,"shoppingmall");
  $sql="SELECT*FROM board_ask WHERE ask_no=".$_SESSION['reading'];
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  }
}else{
}

if (!empty($_POST['writenew'])) {
  unset($_SESSION['reading']);

}
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

 <?php
$option=$_POST['coder'];
// echo $option;
echo htmlspecialchars($_POST["code"]);
?>
<div class="row" style="margin-top:30px;">
  <div class="col" >
<div class="nav flex-column" style="width:130px">
    <nav class="nav flex-column">
      <a class="dropdown-item" href="category_CS_official.php">공지사항</a>
      <a class="dropdown-item" href="category_CS_QnA.php">자주 하는 질문</a>
      <a class="dropdown-item" href="category_CS_questions.php">1:1문의</a>
      <!-- <a class="dropdown-item" href="category_CS_Feedback.php">상품제안</a> -->
    </nav>
  </div>
</div>
<div class="col-10">
    <form action="category_CS_questions.php" method="post" style="width:900px; margin-left: 50px;">
      <table>
        <tr>
          <td><h4> 1:1문의</h4></td>

        </tr>
        <tr>  <td>  <hr class="my-4"><h5>제목 </h5></td></tr>
        <tr>  <td>   <input type="text" class="form-control" name="new_name" style="width:600px; margin-top:10px;margin-bottom:10px;"
          value="<?php
          echo $row['ask_title']
          ?>"
            required></td>

        </tr>
        <tr> <td><h5>내용 </h5></td></tr>
        <tr><td>
          <textarea rows="5" cols="100" type="text" class="form-control" name="new_detail"
            required
            style="width:600px; margin-top:10px;margin-bottom:10px;"><?php echo $row['ask_detail']; ?></textarea>
    <input type="hidden" name="time" value="<?php date_default_timezone_set("Asia/Tokyo"); echo date("Y-m-d")?>">
        </td>
        <SCRIPT LANGUAGE="JavaScript">
        </SCRIPT>
      </tr>
      <tr>
        <!-- <td><input type="checkbox" name="check" value="secret"/>비밀글</td> -->
      </tr>
      <tr>
        <td>
          <select name="coder" class="form-control" var option style="visibility:hidden">
            <!-- <option value="category_CS_questions.php">1:1 문의</option>
            <option value="category_CS_Feedback.php">상품제안</option> -->
          </select>
        </td>
      </tr>
        <tr>
          <td>   <input type="submit" value="확인" class="btn btn-outline-secondary" name="submit" style="margin-top:10px;">  </td>

              <input type="hidden" name="vali" value="<?php
                if(empty($_POST['writenew'])){echo "update";}else{echo "new";}
              ?>">

            <input type="hidden" name="go" value="<?php $option ?>">  </td>
        </tr>
      </table>

    </form>

  </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
