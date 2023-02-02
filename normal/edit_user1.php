 <?php include('header2.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
       <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('borrow_sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('edit_user_form1.php'); ?>		   			
				</div>
                <div class="span7" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
							<?php 
					$dat_xp=0; $tin_number=0;
                    date_default_timezone_set('Asia/Karachi'); 
                    $dat_xp = date('Y/m/d');	
                    
					$query30 = mysqli_query($conn,"SELECT * FROM `verification` WHERE `ver_expdat`<='$dat_xp' and ver_expdat_status='1'") or die(mysqli_error()); 
						    while($row30 = mysqli_fetch_array($query30)){
								    $ver_expdat = $row30['ver_expdat']; 
								    $tin_number=$row30['tin_number'];
						          //   echo $ver_expdat . '' . $dat_xp; 
						    
						    mysqli_query($conn,"UPDATE `file` SET `trade_name`='0',`stj`='0' where tin_number = '$tin_number' ")or die(mysqli_error());
						    mysqli_query($conn,"UPDATE `verification` SET `ver_expdat_status`='0' where tin_number = '$tin_number' ")or die(mysqli_error());
						    }
						    
							$query0 = mysqli_query($conn,"select * from file")or die(mysqli_error()); 
						    $count0 = mysqli_num_rows($query0);
							
							$query = mysqli_query($conn,"select * from file where trade_name='$session_id' and stj<'99'")or die(mysqli_error());
						if($session_id==='7' or $session_id==='8' or $session_id==='14' or $session_id==='1' ){ $query = mysqli_query($conn,"select * from file where stj='0'")or die(mysqli_error()); }
					//	if($session_id!=16){ $query = mysqli_query($conn,"select * from file")or die(mysqli_error()); }
					//	if($session_id!=18){ $query = mysqli_query($conn,"select * from file")or die(mysqli_error()); }
						
							$count = mysqli_num_rows($query);
						//	echo 'user'. $session_id;
							?>
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i> file List</div>
                                <div class="muted pull-right">
									Number of files: <span class="badge badge-info"><?php echo $count .' / ' . $count0; ?></span>
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
												<th>Size</th>
												<th>Category</th>
												<th>Owner</th>
												<th>Location</th>
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php  $tnm=0;
													$user_query = mysqli_query($conn,"select * from file where trade_name='$session_id' and stj<'99' ")or die(mysqli_error());
								if($session_id==='7' or $session_id==='8' or $session_id==='14' or $session_id==='1'){ $user_query = mysqli_query($conn,"select * from file where stj='0'")or die(mysqli_error());}
							//	if($session_id!=17){ $user_query = mysqli_query($conn,"select * from file")or die(mysqli_error());}
							//	if($session_id!=18){ $user_query = mysqli_query($conn,"select * from file")or die(mysqli_error());}
													
													while($row = mysqli_fetch_array($user_query)){
													$id = $row['file_id'];
													?>
													<tr>
												
												<td><?php echo $row['tin_number']; ?></td>
												<td><?php echo $row['plot_no'] . ' '; ?></td>
												
												<td><?php echo $row['block']; ?></td>
												<td><?php echo $row['cat']; ?></td>
												<td><?php echo $row['file_category']; ?></td>
											    <td><?php echo $row['file_name'];  $tnm=$row['trade_name'];?></td>
							<?php
													$user_query1 = mysqli_query($conn,"select * from staff where staff_id='$tnm'")or die(mysqli_error());
													while($row1 = mysqli_fetch_array($user_query1)){ $tnm=$row1['username']; }
													
													?>
													
											    <td><?php echo $tnm;?></td>
												<td width="40">
												<a href="edit_user1.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
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
            <?php if($session_id==='7' or $session_id==='1' or $session_id==='8' or $session_id==='14'){include('edit_user_form2.php'); } ?>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>