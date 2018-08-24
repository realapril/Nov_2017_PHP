<?php
session_start();

if (empty($_SESSION['u_name'])) {

echo' <script type="text/javascript">
alert("글을 보려면 로그인 해야합니다.");
location="category_login.php";
</script>';
}else{

  $conn=mysqli_connect('localhost','root','1234');
  $conn->set_charset('utf8');
  mysqli_select_db($conn,"shoppingmall");

  if (isset($_POST['delete'])) {
  $what= $conn->real_escape_string($_SESSION['reading']);
  $sql="DELETE FROM board_ask WHERE ask_no='$what'";
  $result=mysqli_query($conn,$sql);
  header("location:category_CS_questions.php");

}else {
//  echo $_SESSION['reading'];
  $sql='SELECT board_ask.ask_no, board_ask.ask_id, board_ask.ask_date,board_ask.ask_title,board_ask.ask_detail, user.id_num, user.name
     FROM board_ask
     JOIN user ON board_ask.ask_id=user.id_num WHERE board_ask.ask_no='.$_SESSION['reading'];
  $result=mysqli_query($conn,$sql);

// LEFT OUTER JOIN reply ON board_ask.ask_no=reply.ask_num
//,reply.no, reply.ask_num, reply.reply_id, reply.reply_date, reply.reply_detail
  $row=mysqli_fetch_assoc($result);

        //READ ONLY MY ASK
            if (($_SESSION['u_id_num'])==$row['ask_id']) {
            }else {
              echo' <script type="text/javascript">
              alert("자기가 쓴 글만 볼 수 있습니다.");
              location="category_CS_questions.php";
              </script>';
            }
        //EDIT
            if(isset($_POST['edit'] )){
            header("location:bulletin_write.php");
            }
}
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
        <form action="cate_questions_detail.php" method="post" style="width:900px; margin-left: 50px;">
          <table>
            <tr>
              <td><h4>1:1문의
                </h4></td>
              </tr>
              <tr>
                <td>
                  <hr class="my-4" style="width:900px;"><h5><?php echo $row['ask_title'] ;?> </h5>
                <!-- <?php echo htmlspecialchars($_POST["works"]);?> -->
              </tr>
              <tr>
            </tr>
            <tr>
              <td>
                <hr class="my-4"><p>작성자: <?php echo $row['name']."    ".$row['ask_date'] ;?> </p></td>
            </tr>
            <tr>
                <td ><h5><?php echo "<br>".nl2br($row['ask_detail'])."<br>" ;?> </h5></td>
            </tr>
            <tr><td>
            <!-- <p><?php echo $row['ask_detail'] ;?></p> -->
            </td>
          </tr>
          <tr>
            <td>
                <!-- <select name="coder" class="form-control" value="<?php echo htmlspecialchars($_POST["coder"]);?>" style="visibility:hidden">
                  <option value="<?php echo htmlspecialchars($_POST["coder"]);?>" ></option>
                </select> -->
              <input type="hidden" name="works" value="works" >
            </td>
          </tr>
            <tr>
              <td >
                  <?php if (($_SESSION['u_id_num'])==$row['ask_id']){?>
                 <button type="submit" value="<?php $row['ask_no']?>" class="btn btn-outline-secondary"
                   name="edit" style="margin-top:50px;" >수정</button>
                <button type="submit" name="delete" class="btn btn-outline-secondary" style="margin-left: 10px;margin-top:50px;"
                value="<?php $_SESSION['reading']?>" onclick="return confirm('삭제한 글은 복구할 수 없습니다.')">삭제</button>
                <?php }?>
                <a href="category_CS_questions.php" class="btn btn-outline-secondary "
                  style="float:right;margin-top:50px;"role="button" aria-pressed="true">목록으로</a>
              </td><td>   <input type="hidden" name="editor" value="editor">
                  </td>  </tr>

          </table>
        </form>

<div>
<?php include_once 'cate_q_detail_reply.php' ?>

</div style="margin-left:30px;">


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
