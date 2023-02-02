<?php include('header.php'); ?>
<?php include('../session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('borrow_sidebar.php'); ?>

                <div class="span11" id="">
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
												
												<th>File #</th>
												<th>Plot #</th>
												<th>Block</th>
												<th>Category</th>
												<th>Owner</th>
											    <th>Reason</th>
											    <th>Date</th>
												<th>location</th>
											</tr>
										</thead>
										<tbody>

									
											

												
												
								<?php $tnm=0;
									$query = mysqli_query($conn,"SELECT * FROM `file` WHERE `status`='borrowed'")or die(mysqli_error());
									while($row = mysqli_fetch_array($query)){
											
										?> 		<td><?php echo $row['tin_number']; $tin_number=$row['tin_number'];?></td>
												<td><?php echo $row['plot_no'];;?></td>
												<td><?php echo $row['block']; ?></td>
												<td><?php echo $row['file_category']; ?></td>
												<td><?php echo $row['file_name']; ?></td>
								
							<?php
							                    $tnm=$row['trade_name'];
													$user_query1 = mysqli_query($conn,"select * from staff where staff_id='$tnm'")or die(mysqli_error());
													while($row1 = mysqli_fetch_array($user_query1)){ $tnm=$row1['username']; }
													
									$user_query2 = mysqli_query($conn,"SELECT * FROM `borrow` WHERE `file_status`='borrowed' and `tin_number`='$tin_number'")or die(mysqli_error());
													while($row2 = mysqli_fetch_array($user_query2)){ 
										 $rsn=$row2['reason'];  $ish_dat=$row2['date_borrow']; 
										 ?>    
                                     <td><?php echo $row2['reason']; ?></td>
									 <td><?php echo $row2['date_borrow']; }?></td>	
									 
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