<?php session_start();

$conn=mysqli_connect('localhost','root','1234');
$conn->set_charset('utf8');
mysqli_select_db($conn,"shoppingmall");
$goodsnum=mysqli_real_escape_string($conn,$_GET['num']);
$_SESSION['watching']=$_GET['num'];

$sql="SELECT review.reviewno,review.review_goods,review.review_id, review.review_date, review.review_detail, review.img
FROM review WHERE review_goods='$goodsnum' ORDER BY reviewno DESC";

//,user.id_num, user.name
//LEFT JOIN user WHERE review.review_id=user.id_num

$result=mysqli_query($conn,$sql);

?>
<p>후기<p>
  <div class="list-group"style="margin-top:30px;width:900px;">
    <table class="table">
      <thead>
        <tr>

          <th scope="col">작성자</th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col">날짜</th>
        </tr>
      </thead>  <tbody>


<?php while ($row=mysqli_fetch_assoc($result)) {
?>
<tr>

<td><?php echo $row['review_id'] ?></td>
<td><?php echo $row['review_detail'] ?><input type="hidden" name="ask_no" value=""></td>
<td><?php echo "<img src='htdocs/".$row['image']."' >"; ?></td>
<td><?php echo $row['review_date'] ?></td>


</tr>

  <?php
} ?>
</tbody>
</table>
</div>
<?php if(!empty($_SESSION['u_id_num'])){ ?>
<form action="review_upload.php" method="post" enctype="multipart/form-data">
  <textarea rows="5" cols="100" type="text" class="form-control" name="reviewdetail"
    required
    style="width:600px; margin-top:10px;margin-bottom:10px;"></textarea>
<tr>
<input type="hidden" name="time" value="<?php date_default_timezone_set("Asia/Tokyo"); echo date("Y-m-d")?>">
<input type="hidden" name="size" value="100000">
<td><input type="file" name="image"></td>
<td><input type="submit"class="btn btn-outline-secondary" name="upload" value="Upload Img"></td>
<td></td>

</tr>
<?php } ?>
 </form>
