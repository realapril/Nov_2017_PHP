<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
.main-container {
     float: left;
     position: relative;
     left: 50%;
   }
   .fixer-container {
     float: left;
     position: relative;
     left: -50%;
   }
</style>
</head>
  <body>
            <?php include_once 'header.php' ?>

<!-- <?php echo $_SESSION['u_name']."님";
echo $_SESSION['u_id'];
echo $_SESSION['u_id_num'];

echo $_SESSION['u_address'];
echo $_SESSION['u_phone'];?> -->


    <div class="container">
    <div class="row">

    <br />
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <a href="goodslist_view.php?num=3">
    <img src="https://i.imgur.com/ZLiDMvO.png " alt="First Slide" class="d-block img-fluid">
    </div>
    <div class="carousel-item">
      <a href="">
    <img src="https://i.imgur.com/hD98yyN.png " alt="Second Slide" class="d-block img-fluid"/>

    </div>
    <div class="carousel-item">
      <a href="goodslist_view.php?num=2">
    <img src="https://i.imgur.com/dJDMC7O.png " alt="Third Slide" class="d-block img-fluid"/>
    </div>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="icon-prev" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="icon-next" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>

    </div>
    </div>
    </div>
    <div class="main-container" style="margin-top:10px;">

           <div class="fixer-container">
             <h4 style="margin-top:15px;">신상품</h4>
      <div class="row">
        <div class="card" style="width: 20rem; margin-top:15px;">
              <a href="item_view.php?num=1705">
            <img class="card-img-top" src="https://i.imgur.com/Zzsmlcm.png" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">마들렌</h4>
              <p class="card-text">1,500원</p>
            </div>
          </a>
          </div>
          <div class="card" style="width: 20rem;margin-top:15px; margin-left:15px; margin-right:15px; ">
              <a href="item_view.php?num=1704">
            <img class="card-img-top" src="https://i.imgur.com/uWuqdcP.png " alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">눈다랑어 횟감용</h4>
              <p class="card-text">13,000원</p>
            </div>
          </a>
          </div>
          <div class="card" style="width: 20rem;margin-top:15px;  ">
              <a href="item_view.php?num=1703">
            <img class="card-img-top" src="https://i.imgur.com/WZ5gWY5.png" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">무항생제 삼겹살(150g)</h4>
              <p class="card-text">15,900원</p>
            </div>
          </a>
          </div>
            </div>
            <h4 style="margin-top:15px;">추천상품</h4>
          <div class="row">

          <div class="card" style="width: 20rem;margin-top:15px; ">
              <a href="item_view.php?num=1701">
            <img class="card-img-top" src="https://i.imgur.com/iLlpOil.png " alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">오로라 생연어</h4>
              <p class="card-text">23,000원</p>
            </div>
          </a>
          </div>

          <div class="card" style="width: 20rem;margin-top:15px; margin-left:15px; margin-right:15px; ">
              <a href="item_view.php?num=1702">
            <img class="card-img-top" src="https://i.imgur.com/cLucBbr.png " alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">고메버터</h4>
              <p class="card-text">49,000원</p>
            </div>
          </a>
          </div>
          <div class="card" style="width: 20rem;margin-top:15px;  margin-right:15px; ">
              <a href="item_view.php?num=1706">
            <img class="card-img-top" src="https://i.imgur.com/kZDpre0.png" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">데니쉬 식빵</h4>
              <p class="card-text">7,000원</p>
            </div>
          </a>
          </div>


    </div>
    <!-- <div class="row">
      <div class="card" style="width: 20rem; margin-top:15px;">
            <a href="item_view.php?num=1707">
          <img class="card-img-top" src="https://i.imgur.com/5tmLAeI.png" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">슈바인학센</h4>
            <p class="card-text">18,000원</p>
          </div>
        </a>
        </div>

          </div> -->


  </div>
  </div>

</div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
