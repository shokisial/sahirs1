 <?php include('header2.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
       <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('borrow_sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('edit_transfer_form1.1.php'); ?>			
										   			
				</div>
                <div class="span7" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
							<?php 
							$query = mysqli_query($conn,"select * from file where trade_name='$session_id' ")or die(mysqli_error());
						if($session_id==='7' or $session_id==='1'){ $query = mysqli_query($conn,"select * from ndc where ndc_stj='3'")or die(mysqli_error()); }
					//	if($session_id!=16){ $query = mysqli_query($conn,"select * from file")or die(mysqli_error()); }
					//	if($session_id!=18){ $query = mysqli_query($conn,"select * from file")or die(mysqli_error()); }
						
							$count = mysqli_num_rows($query);
						//	echo 'user'. $session_id;
							?>
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i>  Transfer file List</div>
                                <div class="muted pull-right">
									Number of files: <span class="badge badge-info"><?php echo $count; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									
										<thead>
										  <tr>
											
												<th>File Code</th>
												<th>Plot</th>
												<th>Block</th>
												<th>Category</th>
												<th>Owner</th>
												<th>Type</th>
												<th>Status</th>
	
												<th>Comments</th>
												
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php  $tnm=0;
								if($session_id==='9'){ $user_query = mysqli_query($conn,"SELECT * FROM `transtbl` inner join file on transtbl.tin_number=file.tin_number WHERE transtbl.`trns_stj`='1'")or die(mysqli_error());}
							//	if($session_id!=17){ $user_query = mysqli_query($conn,"select * from file")or die(mysqli_error());}
							//	if($session_id!=18){ $user_query = mysqli_query($conn,"select * from file")or die(mysqli_error());}
													
													while($row = mysqli_fetch_array($user_query)){
													$id = $row['file_id'];
													?>
													<tr>
												
												<td><?php echo $row['tin_number']; ?></td>
												<td><?php echo $row['plot_no'] . ' '; ?></td>
												<td><?php echo $row['block']; ?></td>
												
												<td><?php echo $row['file_category']; ?></td>
											    <td><?php echo $row['file_name'];  $tnm=$row['trade_name'];?></td>
			                            <td><?php echo $row['file_type']; ?></td>
									    <td><?php echo $row['ndc_stu'];?></td>
									    <td><?php echo $row['ndc_res'];?></td>
									    
												<td width="40">
												<a href="edit_transfer1.1.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
												</td>
		                                
									
												</tr>
												<?php }  ?>
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
            <?php if($session_id==='7'){include('edit_transfer2_form2.php'); } ?>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>