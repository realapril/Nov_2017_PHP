
<?php
session_start();
$conn=mysqli_connect('localhost','root','1234');
$conn->set_charset('utf8');
mysqli_select_db($conn,"shoppingmall");
$numm= mysqli_real_escape_string($conn,$_SESSION['u_id_num']);
$result=mysqli_query($conn,"SELECT cart.goods_no, cart.numb, cart.custum_num, cart.cno, goods.goods_num,goods.goods_name, goods.price,goods.img_thmb
FROM cart INNER JOIN goods ON cart.goods_no=goods.goods_num WHERE cart.custum_num='$numm' ORDER BY cart.cno ASC");
while ($row=mysqli_fetch_assoc($result)) {?>
<form action="mycart.php" method="post" style="">
<div class="container">
	<div class="row">
		<section class="content">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">

						<div class="table-container" style="width:1000px;">
							<table class="table table-filter">
								<tbody>
									<tr data-status="pagado">

										<td>
												<input type="checkbox" class="check_invoice" name="check[]" id="checkid[]" value="<?php echo $row['goods_no']?>"checked="checked">
										</td>
										<td>
											<div class="media" style="width:800px;">
												<a href="item_view.php?num=<?php echo $row['goods_no']?>" class="pull-left">
													<img src="<?php echo $row['img_thmb'] ?>" class="media-photo"style="width:90px; height:120px">
												</a>
												<div  style="width:600px;">
													<h4 class="title"style="margin-left:30px;">
														<?php echo $row['goods_name']."      "?>

													</h4>
                        <h6 style="float:right;"> <?php echo $row['price']." 원" ?>	</h6>
                          <p class="summary" style="float:right; margin-right:300px;"><?php echo $row['numb']." 개" ?></p>
												</div>
											</div>
<?php $total=$total+($row['price']*$row['numb']); ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>
</div>
<?php }?>
