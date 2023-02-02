
   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Borrow File</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="borrow2.php" method="post" >
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

										<thead>
										  <tr>
												
												<th>File NUMBER</th>
												<th>FILE NAME</th>
												<th>TRADE NAME</th>
												<th></th>
											
										   </tr>
										</thead>
										<tbody>
										<?php //and region ='$staff_region'
									$user_query = mysqli_query($conn,"select * from file where status = 'returned' ")or die(mysqli_error());
									while($row = mysqli_fetch_array($user_query)){
													$myid=$row['file_id'];
													$mytin=$row['tin_number'];
													$myfile=$row['file_name'];
													
													$mytrade=$row['trade_name'];
													
											if ($mytrade==""){
												$trade_name ="-";
												
											}else{
												$trade_name =$mytrade;
											}
									?>
												<tr>
											
												<td><?php echo $mytin; ?></td>
												<td><?php echo $myfile; ?></td>
												<td><?php echo $trade_name; ?></td>
												 <td> <a href="edit_user.php " name="return" class="btn btn-success" class="icon-large" >Issue</a></td>
		
												</tr>
									<?php } // <td> <a href="home.php <?php echo '?id='.$mytin  name="return" class="btn btn-success" class="icon-large" >Borrow</a></td>  <?php echo '?id='.$mytin 
		                                      ?>
										</tbody>
									</table>
									</form>
								</div>
                            </div>
                        </div>
                 
                    </div>	