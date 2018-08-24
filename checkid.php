<?php

$conn=mysqli_connect('localhost','root','1234');
$conn->set_charset('utf8');
mysqli_select_db($conn,"shoppingmall");

$idch=$conn->real_escape_string($_POST['id']);
$sql = "SELECT * FROM user WHERE id='$idch'";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);
if( !filter_var($_POST['id'], FILTER_VALIDATE_EMAIL) ){
  ?>
  <div style="color:red" class="use">
  정확한 이메일주소를 입력해주세요.
  </div>
  <?php
}else{
   if($count == 0){
    ?>
    <div style="color:green" class="use">
    사용가능한 이메일입니다.
    <input type="hidden" value="1" name="use"/>
    </div>
    <?php
    }else{
    ?>
    <div style="color:red" class="use">
    이미 존재하는 이메일입니다.
    <input type="hidden" value="0" name="use"/>
    </div>
    <?php
    }
}
    ?>
