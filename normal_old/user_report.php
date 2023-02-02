<?php include('header.php'); ?>
<?php include('../session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('borrow_sidebar.php'); ?>

                
  

                <div class="span8" id="">
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
												<th>Size</th>
												<th>Owner</th>
												<th>location</th>
												
												<th>Priority</th>
												<th>Reason</th>
												<th>Issue Date</th>
											</tr>
										</thead>
										<tbody>

									
											

												
												
								<?php $tnm=0;
								    $query = mysqli_query($conn,"select * from file where status='borrowed' and stj>'0'")or die(mysqli_error());
									while($row = mysqli_fetch_array($query)){
											
										?> 		<td><?php echo $row['tin_number']; $tinno=$row['tin_number'];?></td>
												<td><?php echo $row['plot_no'];;?></td>
												<td><?php echo $row['block']; ?></td>
												<td><?php echo $row['file_category']; ?></td>
												<td><?php echo $row['file_name']; ?></td>
								
							<?php
							                    $tnm=$row['trade_name'];
													$user_query1 = mysqli_query($conn,"select * from staff where staff_id='$tnm'")or die(mysqli_error());
													while($row1 = mysqli_fetch_array($user_query1)){ $tnm=$row1['username']; }
													
													?>				
												
                                                <td><?php echo $tnm; ?></td>
                                    <?        $query2 = mysqli_query($conn,"SELECT * FROM `verification` WHERE `tin_number`='$tinno' ")or die(mysqli_error());
									while($row2 = mysqli_fetch_array($query2)){    ?>
                                                
                                                <td><?php echo $row2['ver_per'];  } ?></td>
                                          
                                          
                                    <?        $query1 = mysqli_query($conn,"SELECT * FROM `borrow` WHERE `tin_number`='$tinno' and `file_status`='borrowed'")or die(mysqli_error());
									while($row1 = mysqli_fetch_array($query1)){    ?>
                                                
                                                <td><?php echo $row1['cmnt'];  
                                                
                                                $dt=$row1['date_borrow']; } $date=date_create($dt);  ?></td>
                                                <td><?php echo date_format($date,"d/m/Y");  ?></td>
                                                
                                          
                                                
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