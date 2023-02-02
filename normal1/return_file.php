<?php include('refresh.php'); ?>
<?php include('header2.php'); ?>
<?php include('../session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('return_sidebar.php'); ?>

                <div class="span8" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">File List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form  method="get">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									
										<thead>
										  <tr>
												<th></th>
												<th>TIN NUMBER</th>
												<th>Plot No</th>
												<th>Block</th>
												<th>In Date</th>
												<th>Out Date</th>
												<th>To</th>
												
																						
										   </tr>
										</thead>
										<tbody>

							<?php
									$user_query = mysqli_query($conn,"SELECT * FROM `borrow` INNER JOIN file on file.tin_number=borrow.tin_number  WHERE borrow.`employee_number`='$session_id' and borrow.`file_status`='return' ")or die(mysqli_error());
									while($row = mysqli_fetch_array($user_query)){
													
													
									?> 
									
												<tr>
												<td></td>
												<td><?php echo $row['tin_number']; ?></td>
												<td><?php echo $row['plot_no'];; ?>   </td>
												<td><?php echo $row['block'];; ?></td>
												<td><?php echo $row['date_borrow'];; ?></td>
												<td><?php echo $row['date_return'];; ?></td>
												<td><?php echo $row['emp_request'];; ?></td>
												
															
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
		
<? //	<a href="complete_return.php <?php echo '?id='.$tinno "
// name="return" class="btn btn-success" class="icon-large" >Return</a> ?>
													
    </body>

</html>

