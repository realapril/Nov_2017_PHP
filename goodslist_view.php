<?php
session_start();
if (!empty($_GET['num'])) {
  $conn=mysqli_connect('localhost','root','1234');
  $conn->set_charset('utf8');
  mysqli_select_db($conn,"shoppingmall");
  $numm= mysqli_real_escape_string($conn,$_SESSION['u_id_num']);
  $goodsnum=mysqli_real_escape_string($conn,$_GET['num']);
  $sql="SELECT * FROM goods WHERE category='$goodsnum' ORDER BY 'goods_num' DESC";
  $result=mysqli_query($conn,$sql);
  // $row=mysqli_fetch_assoc($result);
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


    <div class="container">
    <div class="row">

    <br />

    </div>
    </div>

      <div class="row" style="margin-left:50px;">


    <?php
    $sql="SELECT * FROM goods WHERE category='$goodsnum' ORDER BY 'goods_num' DESC";
    $result=mysqli_query($conn,$sql);
            $resultperpage=9;
            $numberofresult=mysqli_num_rows($result);

         $numberofpages=ceil($numberofresult/$resultperpage);
         if(!isset($_GET['page'])){$page=1;}else {
           $page=$_GET['page'];
         }
        $this_page_first_result=($page-1)*$resultperpage;

        while ($row=mysqli_fetch_array($result)) {
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



      </div>

          <nav aria-label="Page navigation example" style="margin-top:30px;margin-left:400px;">
            <ul class="pagination">
              <!-- <a class="page-link" href="category_CS_questions.php?page=<?php echo $page-1 ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>   </a> -->
              <?php   for($page=1;$page<=$numberofpages;$page++){
                  // echo '<a href="category_CS_questions.php?page='.$page.'">'.$page.'</a>';
                ?>


              <li class="page-item"><a class="page-link" href="category_CS_questions.php?page=<?php echo $page ?>"><?php echo $page; ?></a></li>
              <li class="page-item">

                <?php } ?>
                <!-- <a class="page-link" href="category_CS_questions.php?page=<?php echo $page+1 ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a> -->
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
