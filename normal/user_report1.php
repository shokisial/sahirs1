<?php include('header.php'); ?>
<?php include('../session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('borrow_sidebar.php'); ?>

                <div  id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Files Status</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									
										<thead>
										  <tr>	
												
												<th>TIN NUMBER</th>
												<th>Plot No</th>
												<th>Block</th>
												<th>Category</th>
												<th>Owner</th>
												<th>Reason</th>
												<th>Date</th>
												<th>location</th>
												<th></th>
												
											</tr>
										</thead>
										<tbody>

									
											

												
												
								<?php $tnm=0;
								    $query = mysqli_query($conn,"select * from file where status='borrowed'")or die(mysqli_error());
								while($row = mysqli_fetch_array($query)){
									?> 		<td><?php echo $row['tin_number']; 
										$tin_number=$row['tin_number'];?></td>
												<td><?php echo $row['plot_no'];?></td>
												<td><?php echo $row['block']; ?></td>
												<td><?php echo $row['file_category']; ?></td>
									<td width="1" height="5"><?php echo $row['file_name']; ?></td>
								    
							<?php
							$brdt=0;
							$user_query11 = mysqli_query($conn,"SELECT * FROM `borrow` WHERE `file_status`='borrowed' and tin_number='$tin_number'")or die(mysqli_error());
							while($row11 = mysqli_fetch_array($user_query11)){ 
							?>
							<td><?php echo $row11['reason'];  
							$brdt=$row11['date_borrow']; ?></td>
						
							<td><?php echo $brdt; ?></td>
							    
						<?	}
													
							                    $tnm=$row['trade_name'];
													$user_query1 = mysqli_query($conn,"select * from staff where staff_id='$tnm'")or die(mysqli_error());
													while($row1 = mysqli_fetch_array($user_query1)){ $tnm=$row1['username']; }
													
													?>				
												
                                                <td><?php echo $tnm; ?></td>

												</tr>
									<?php } ?>
										</tbody>
									</table>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>