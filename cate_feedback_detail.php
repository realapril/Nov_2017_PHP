<?php
session_start();
?>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS -->

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
        <form action="bulletin_write.php" method="post" style="width:900px; margin-left: 50px;">
          <table>
            <tr>
              <td><h4><?php if(htmlspecialchars($_POST["coder"])=='category_CS_questions.php'){echo "1:1문의";}
              elseif(htmlspecialchars($_POST["coder"])=='category_CS_Feedback.php'){echo "상품제안";}
                ?></h4></td>
              </tr>
              <tr>
                <td>
                  <hr class="my-4"><h5>제목, date, 내용 </h5>
                <?php echo htmlspecialchars($_POST["works"]);?>
                  <!-- <?php echo htmlspecialchars($_POST["new_name"]);?> 안잡힘-->
              </tr>
              <tr>
            </tr>
            <!-- <tr>
              <td>
                <hr class="my-4"><h5>제목 </h5></td>
            </tr>
            <tr>
              <td>   <p>진짜 제목자리</p></td>
            </tr>

            <tr>
                <td><h5>내용 </h5></td>
            </tr>
            <tr><td>
            <p>진짜 내용자리</p>
            </td>
          </tr> -->
          <!-- <tr>
            <td><h4>카테고리 </h4></td>
          </tr> -->
          <tr>
            <td>

                <select name="coder" class="form-control" value="<?php echo htmlspecialchars($_POST["coder"]);?>" style="visibility:hidden">
                  <option value="<?php echo htmlspecialchars($_POST["coder"]);?>" ></option>
                </select>

              </select>
            </td>
          </tr>
            <tr>
              <td>   <input type="submit" value="수정" class="btn btn-outline-secondary" name="submit" style="margin-top:10px;"
                style="float:right;margin-left:800px;">

                <a href="<?php echo htmlspecialchars($_POST["coder"]);?>" class="btn btn-outline-secondary btn-lg active" role="button" aria-pressed="true">목록으로</a>
              </td>
                <td>   <input type="hidden" name="validate" value="yes">  </td>
            </tr>
          </table>

        </form>
  <hr class="my-4">
<p>덧글</p>
  <?php
  if( $_POST[id]!="" && $_POST[comment]!=""){echo "이름: $_POST[id]<br>";echo "덧글:$_POST[comment]";}
  ?>
  <form action="bulletin_detail.php" method="post" style="width:900px; ">

    <table>
      <tr>
        <td>
          <hr class="my-4"><h5>이름</h5></td>
      </tr>
      <tr>
        <td>   <input type="text" class="form-control" name="id" style="width:600px; margin-top:10px;margin-bottom:10px;"
          value="<?php echo htmlspecialchars($_POST["sub"]);?>"></td>
      </tr>

      <tr>
          <td><h5>덧글 </h5></td>
      </tr>
      <tr><td>
        <textarea rows="1" cols="50" type="text" class="form-control" name="comment"
          style="width:600px; margin-top:10px;margin-bottom:10px;"></textarea>

      </td>
    </tr>
    <!-- <tr>
      <td><h4>카테고리 </h4></td>
    </tr> -->
      <tr>
        <td>   <input type="submit" value="확인" class="btn btn-outline-secondary" name="submit" style="margin-top:10px;">  </td>
          <!-- <select name="coder" class="form-control"
          value="<?php if($_POST[coder]==category_CS_Feedback.php)"category_CS_Feedback.php";?>"
          style="visibility:hidden">
소용없음ㅠ왜 안먹히지
          </select> -->
          <td>   <input type="hidden" name="validate" value="yes">  </td>
      </tr>
    </table>

  </form>
  </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
