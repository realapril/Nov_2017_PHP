<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
<?php if (isset($_SESSION['u_name'])){?>
<li class ="nav-item">
  <a href="mypage.php" class="nav-link"><?php echo $_SESSION['u_name']."님"; ?></a>
</li>
<li class ="nav-item">
  <form action="logout.php" method="POST">
  <button type="submit" name="logout" class="btn btn-light">로그아웃</button>
  </form
</li>
<?php }else{?>
  <li class ="nav-item">
    <a href="category_login.php" class="nav-link">로그인</a>
  </li>
  <li class ="nav-item">
    <a href="category_join.php" class="nav-link">회원가입</a>
  </li>
<?php } ?>
<li class ="nav-item">
  <a href="mycart.php" class="nav-link">장바구니</a>
</li>
<li class ="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-expanded="false">고객센터</a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="category_CS_official.php">공지사항</a>
          <a class="dropdown-item" href="category_CS_QnA.php">자주 하는 질문</a>
        <a class="dropdown-item" href="category_CS_questions.php">1:1 문의</a>
        <!-- <a class="dropdown-item" href="category_CS_Feedback.php">상품제안</a> -->
    </div>
</li>
</ul>
<form action="product_list.php" method="get" class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="search"
  name="search_detail" placeholder="생연어" aria-label="Search">

   <input type="submit" value="검색" class="btn btn-outline-success my-2 my-sm-0">
</form>
</div>
</nav>
<div class="thumbnail">
  <a href="main.php" class="img-thumbnail">
<div class="caption">
<img src="https://i.imgur.com/P9S35uW.png " class="img-circle mx-auto d-block" alt="Main Logo">
</div>
  </a>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="margin-left: 10px;">
          수산
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="goodslist_view.php?num=1">생선</a>

        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 15px;">
          정육
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="goodslist_view.php">소고기</a>
          <a class="dropdown-item" href="goodslist_view.php?num=3">돼지고기</a>
          <a class="dropdown-item" href="goodslist_view.php">양고기</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false"  style="margin-left: 15px;">
          반찬/간편식
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="goodslist_view.php">반찬</a>
          <a class="dropdown-item" href="goodslist_view.php">간편식/간편조리</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="goodslist_view.php">푸디 메이드</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false" style="margin-left: 15px;">
         델리/음료
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="goodslist_view.php">물/음료/두유</a>
          <a class="dropdown-item" href="goodslist_view.php?num=4">빵</a>
              <a class="dropdown-item" href="goodslist_view.php?num=2">치즈/버터</a>
        </div>
      </li>


    </ul>
  </div>
</nav>
