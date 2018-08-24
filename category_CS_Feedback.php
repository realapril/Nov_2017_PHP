<?php
session_start();
?>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS -->

</head>
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
      <head>상품제안</head>
      <form action="bulletin_write.php"method="post">
        <input type="submit" value="글쓰기" class="btn btn-outline-secondary" name="submit" style="float:right; margin-right:160px;">
        <select name="coder" class="form-control" value="category_CS_Feedback.php" style="visibility:hidden">
          <option value="category_CS_Feedback.php" >상품제안</option>
        </select>
      </form>

      <div class="list-group"style="margin-top:30px;width:900px;">

        <form action="bulletin_detail.php"method="post">
            <a class="list-group-item list-group-item-action list-group-item-secondary">제목</a>
          <input type="submit" name="works" class="list-group-item list-group-item-action flex-column align-items-start"
          value="<?php echo "$_POST[new_name]                                                                                                                        $_POST[time]\n";echo "$_POST[new_detail]";
          ?>">
          <small class="text-muted" name="time"> </small>
          <select name="coder" class="form-control" value="category_CS_Feedback.php" style="visibility:hidden">
            <option value="category_CS_Feedback.php" >상품제안</option>
          </select>

        </form>
        <!-- </form>
          <form action="bulletin_detail.php"method="post">
            <a class="list-group-item list-group-item-action list-group-item-secondary">제목</a>
            <a href="bulletin_detail.php" class="list-group-item list-group-item-action flex-column align-items-start">

              <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1" ><?php echo htmlspecialchars($_POST["new_name"]);?></h5>
                    <small class="text-muted" name="time"><?php echo htmlspecialchars($_POST["time"]);?> </small>
                </div><small class="text-muted" name="nameorig"> <?php echo htmlspecialchars($_POST["new_detail"]);?></small>
          </a>
            <select name="coder" class="form-control" value="category_CS_Feedback.php" style="visibility:hidden">
          </form>   원래이거썻고 이게 더이쁜데 name=coder 연동이안됨-->


</div>
      <nav aria-label="Page navigation example" style="margin-top:30px;margin-left:400px;">
        <ul class="pagination">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
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
