<?php
session_start();

if (!empty($_GET["search_detail"])) {
  $conn=mysqli_connect('localhost','root','1234');
  $conn->set_charset('utf8');
  mysqli_select_db($conn,"shoppingmall");


  $keywords= $conn->real_escape_string($_GET["search_detail"]);
  $sql="SELECT* FROM goods WHERE goods_name LIKE '%{$keywords}%'";
  $result=mysqli_query($conn, $sql);

  $count = mysqli_num_rows($result);

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



<p style="float:center; margin-top:30px; margin-left:50px;"><?php echo htmlspecialchars($_GET["search_detail"]);?> 검색 결과 :<?php echo $count;?> 건<p>

<?php   while ($row=mysqli_fetch_array($result)) {
      ?>
      <form action="cate_questions_detail.php"method="post">

        <div class="col">
          <div class="card" style="width: 20rem; ">
              <a href="item_view.php?num=<?php  echo $row['goods_num']; ?>">
            <img class="card-img-top" src="<?php  echo $row['img_thmb']; ?>" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><?php  echo $row['goods_name']; ?></h4>
              <p class="card-text"><?php  echo $row['price']."원"; ?></p>
            </div>
          </a>
          </div>
        </div>  </form>
      <?php }  ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
