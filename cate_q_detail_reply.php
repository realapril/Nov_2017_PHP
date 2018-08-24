<?php
session_start();

$conn=mysqli_connect('localhost','root','1234');
$conn->set_charset('utf8');
$reading= $conn->real_escape_string($_SESSION['reading']);
mysqli_select_db($conn,"shoppingmall");
// $sql="SELECT reply.replyno, reply.ask_num, reply.reply_id,reply.reply_date, reply.reply_detail,
//         board_ask.ask_no,
//  FROM reply
//    JOIN board_ask ON board_ask.ask_no=reply.ask_num WHERE reply.ask_num='$reading'
//    "
$sql="SELECT reply.replyno, reply.ask_num, reply.reply_id, reply.reply_date, reply.reply_detail,  user.id_num,user.name
FROM reply LEFT JOIN user ON user.id_num=reply.reply_id WHERE reply.ask_num='$reading'
   "
  ;
$result=mysqli_query($conn,$sql);
//board_ask.ask_no, board_ask.ask_id, board_ask.ask_date,board_ask.ask_title,board_ask.ask_detail,reply.no, reply.ask_num, reply.reply_id, reply.reply_date, reply.reply_detail
?>

<table>
<?php
while ($row=mysqli_fetch_array($result)) {
    ?>
    <form action="delete_reply.php" method="post" >
    <tr style="margin-left:20px;">
      <td>
        <hr class="my-4" style="width:100px; margin-left:20px;"><h5><?php echo $row['name'] ;?></h5></td>
      <td>
        <hr class="my-4"style="width:700px;"><p><?php echo $row['reply_detail']; ?></p></td>
        <input type="hidden" name="Rnumber" value="<?php echo $row['replyno']?>">
        <td> <input type="submit" value="삭제" class="btn btn-outline-secondary" name="Rdelete"
           style="margin-top:10px;"onclick="return confirm('삭제한 덧글은 복구할 수 없습니다.')">  </td>
    </tr>
  </form>
      <?php }  ?>
<form action="save_reply.php" method="post" style="width:900px; margin-left:50px; ">
</table>
<table style="margin-left:70px; margin-top:50px;">
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
      <td>   <input type="submit" value="확인" class="btn btn-outline-secondary" name="reply" style="margin-top:10px;">  </td>
        <td>   <input type="hidden" name="validate" value="yes">  </td>
    </tr>
  </table>

</form>
</div>
