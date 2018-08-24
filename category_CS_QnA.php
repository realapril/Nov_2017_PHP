<?php
session_start();
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
      <head>자주 하는 질문</head>
      <div id="accordion" role="tablist" style="margin-top:20px;">
        <div class="card">
          <div class="card-header"id="headingNone">
              <h5 class="mb-0">
                <a aria-expanded="true" aria-controls="collapseOne">
                  제목
                </a>
              </h5>
            </div>
        <div class="card-header" role="tab" id="headingOne">
            <h5 class="mb-0">
              <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                신규 회원으로 가입하면 어떤 혜택이 있나요?
              </a>
            </h5>
          </div>

          <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              신규가입 혜택은 기간에 따라 혜택이 다르며, 다양한 이벤트/프로모션 참여를 통해 쿠폰,적립금,선물배송 등 혜택을 받으실 수 있습니다.
              타임세일,깜짝세일 등의 할인 혜택을 받을 수 있습니다.
              (비회원의 경우 할인적용이 불가합니다.)
              푸디에서 제공하는 여러 이벤트 및 할인 혜택을 수시로 받아보실 수 있습니다.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" role="tab" id="headingTwo">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              주문취소는 어떻게 하나요? 주문취소는 몇 시 까지 가능한가요?
              </a>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              주문취소는 1:1게시판 또는 고객센터에 연락을 주셔야 가능합니다.
(고객님께서 직접 하실 수 없는 점 양해부탁드립니다.)
주문취소는 배송일 전날 오후 6시전까지 1:1게시판에 주문번호와 함께 취소요청 남겨주셔야 하며, 오후 6시 이후에는 취소가 불가합니다.
일부 예약상품은 배송일3~4일전 까지만 취소가 가능하며, 자세한 취소 가능시간은 상품 상세페이지를 확인해주세요!
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" role="tab" id="headingThree">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                회원탈퇴 후 동일한 아이디로 재가입이 되나요?
              </a>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
              현재와 동일한 아이디는 재사용 불가합니다.
새로운 아이디로 등록해 주시기 바랍니다.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
