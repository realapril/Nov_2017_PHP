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
      <head>공지사항</head>
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
                개인정보처리방침 개정
              </a>
            </h5>
          </div>

          <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              개정사유:
              1.수집하는 개인정보 항목의 추가:보안서비스 제공
              2.개인정보 수탁자 추가:결제서비스 업체, 데이터 보안서비스 업체 등 추가
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" role="tab" id="headingTwo">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              2017 추석연휴배송 안내
              </a>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              마지막배송 10월 3일(화) 배송재개 10월 9일 (월)
              휴무일 주문 가능
              휴무기간에도 정상주문 가능합니다

              고객행복센터 운영안내
              10월 4일 -10월 8일 휴무
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" role="tab" id="headingThree">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                다람팜 유정란 가격인상 안내드립니다
              </a>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
              작년부터 몇 차례 있었떤 먀파동에 의해 병아리 입식이 어려워
              산란계가 전체적으로 나이가 들어, 계란 공급량이 부족해지고 품질 유지 어려움이 있어왔습니다.

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
  <p style="height:50px;"> </p>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
