<?php
session_start();
?>
<?php
  // echo $_POST['vali'];
$conn=mysqli_connect('localhost','root','1234');
$conn->set_charset('utf8');
if(empty($_SESSION['reading'])){
    if (strlen($_POST['new_name']) > 0 && strlen(trim($_POST['new_name'])) == 0){
      echo' <script type="text/javascript">
      alert("제목을 작성해주세요.");
      location="bulletin_write.php";
      </script>';
    }else if(strlen(trim($_POST['new_name']))>0){
      $newname= $conn->real_escape_string($_POST['new_name']);
      $newdetail= $conn->real_escape_string($_POST['new_detail']);
      $time= $conn->real_escape_string($_POST['time']);
      $id=$conn->real_escape_string($_SESSION['u_id_num']);
      mysqli_select_db($conn,"shoppingmall");
      $sql="INSERT INTO board_ask VALUES(NULL, '$id','$time','$newname','$newdetail')";
      $result=mysqli_query($conn,$sql);
    }
//글 거의 6천개 들어간듯 ㄷ ㄷ 
// for ($i=0; $i <2000 ; $i++) {
//   mysqli_select_db($conn,"shoppingmall");
//   $sql="INSERT INTO board_ask VALUES(NULL, '4','2017-12-11','배송질문요','빨리용')";
//   $result=mysqli_query($conn,$sql);
// }


}elseif(!empty($_SESSION['reading'])){
    if (strlen($_POST['new_name']) > 0 && strlen(trim($_POST['new_name'])) == 0){
      echo' <script type="text/javascript">
      alert("제목을 작성해주세요.");
      location="bulletin_write.php";
      </script>';
    }elseif(!empty($_POST['new_name'])){
    $name= $conn->real_escape_string($_POST['new_name']);
    $detail= $conn->real_escape_string($_POST['new_detail']);
    mysqli_select_db($conn,"shoppingmall");
    $sql="UPDATE board_ask SET ask_title='$name', ask_detail='$detail' WHERE ask_no=".$_SESSION['reading'];
    $result=mysqli_query($conn,$sql);
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
      <head>1:1문의</head>
      <form action="bulletin_write.php"method="post">

        <input type="submit" value="글쓰기" class="btn btn-outline-secondary" name="writenew" style="float:right; margin-right:160px;">

        <select name="coder" class="form-control" value="category_CS_questions.php" style="visibility:hidden" >
          <option value="category_CS_questions.php">1:1 문의</option>
        </select>
      </form>

      <div class="list-group"style="width:900px;">
        <table class="table">
          <thead>
            <tr>

              <th scope="col">작성자</th>
              <th scope="col">제목</th>
              <th scope="col">날짜</th>
            </tr>
          </thead>  <tbody>
<?php

        $conn=mysqli_connect('localhost','root','1234');
        $conn->set_charset('utf8');
        mysqli_select_db($conn,"shoppingmall");
        $result=mysqli_query($conn,"SELECT board_ask.ask_no, board_ask.ask_id, board_ask.ask_date,board_ask.ask_title, user.id_num, user.name
           FROM board_ask INNER JOIN user ON board_ask.ask_id=user.id_num ORDER BY ask_no DESC;");
        $list=10;
        $numberofresult=mysqli_num_rows($result);

        $b_pageNum_list =5;

      $numberofpages=ceil($numberofresult/$list);
      if(!isset($_GET['page'])){$page=1;}else {
        $page=$_GET['page'];
       }
      //대체
      $pageNum = ($_GET['page']) ? $_GET['page'] : 1;

//한페이지 보일 게시글수
       $block = ceil($pageNum/$b_pageNum_list);
       $b_start_page = ( ($block - 1) * $b_pageNum_list ) + 1;
       //현재 블럭 시작페이지 번호
       $b_end_page = $b_start_page + $b_pageNum_list - 1;
       //현재 블럭 마지막 페이지 번호
       $total_block = ceil($numberofpages/$b_pageNum_list);



     $this_page_first_result=($page-1)*$list;
     $sql='SELECT board_ask.ask_no, board_ask.ask_id, board_ask.ask_date,board_ask.ask_title, user.id_num, user.name
        FROM board_ask
         JOIN user ON board_ask.ask_id=user.id_num ORDER BY ask_no DESC LIMIT ' .$this_page_first_result. ','. $list;
    $result=mysqli_query($conn, $sql);
//,reply.ask_num, reply.reply_id
//    LEFT OUTER JOIN reply ON board_ask.ask_no=reply.ask_num

    while ($row=mysqli_fetch_array($result)) {
        ?>
    <form action="before_cate_questions_detail.php"method="post">

    <tr>

    <td><?php echo $row['name'] ?><input type="hidden" name="ask_id" value="<?php echo $row['ask_id']?>"></td>
    <td><input type="submit"class="btn btn-link" style="color:#000" name="works" value="<?php echo $row['ask_title']; ?>"></td>
    <td><?php echo $row['ask_date'] ?><input type="hidden" name="ask_no" value="<?php echo $row['ask_no']?>"></td>

    </tr>  </form>
    <?php }  ?>



      </tbody>
    </table>

</div>
<nav aria-label="Page navigation example" style="margin-top:30px;margin-left:400px;">
   <ul class="pagination">
     <?php
     if($block > 1){ ?>
     <a class="page-link" href="category_CS_questions.php?page=<?=$b_start_page-1?>&list=<?=$list?>" aria-label="Previous">
       <span aria-hidden="true">&laquo;</span>
       <span class="sr-only">Previous</span>   </a><?php } ?>

     <?php  for($j = $b_start_page; $j <=$b_end_page; $j++){

         // echo '<a href="category_CS_questions.php?page='.$page.'">'.$page.'</a>';
       ?>
     <li class="page-item">
     <a class="page-link" href="category_CS_questions.php?page=<?=$j?>&list=<?=$list?>"><?=$j?></a></li>
     <li class="page-item">

       <?php }
       if($block < $total_block){?>

       <a class="page-link" href="category_CS_questions.php?page=<?=$b_end_page+1?>&list=<?=$list?>" aria-label="Next">
         <span aria-hidden="true">&raquo;</span>
         <span class="sr-only">Next</span>


         <?php } ?>
       </a>
     </li>
   </ul>
 </nav>
</div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
