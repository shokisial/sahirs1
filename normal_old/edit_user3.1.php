 <?php include('header2.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
       <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('borrow_sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('edit_user_form3.1.php'); ?>		   			
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
							<?php 
							$query = mysqli_query($conn,"select * from verification where ver_stj='1' ")or die(mysqli_error());
						if($session_id==='7'){ $query = mysqli_query($conn,"select * from file")or die(mysqli_error()); }
					//	if($session_id!=16){ $query = mysqli_query($conn,"select * from file")or die(mysqli_error()); }
					//	if($session_id!=18){ $query = mysqli_query($conn,"select * from file")or die(mysqli_error()); }
						
							$count = mysqli_num_rows($query);
						//	echo 'user'. $session_id;
							?>
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i> Verfication file List</div>
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
												<th>Size</th>
												<th>Owner</th>
												<th>Ver.#</th>
												<th>Priority</th>
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php  $tnm=0;
													$user_query = mysqli_query($conn,"SELECT * FROM `verification` JOIN file on file.tin_number=verification.tin_number where verification.ver_stj='1' ORDER by ver_per DESC")or die(mysqli_error());
								if($session_id==='7'){ $user_query = mysqli_query($conn,"select * from file")or die(mysqli_error());}
							//	if($session_id!=17){ $user_query = mysqli_query($conn,"select * from file")or die(mysqli_error());}
							//	if($session_id!=18){ $user_query = mysqli_query($conn,"select * from file")or die(mysqli_error());}
													
													while($row = mysqli_fetch_array($user_query)){
													$id = $row['ver_id'];
													?>
													<tr>
												
												<td><?php echo $row['tin_number']; ?></td>
												<td><?php echo $row['plot_no'] . ' '; ?></td>
												<td><?php echo $row['block']; ?></td>
												<td><?php echo $row['file_category']; ?></td>
											    <td><?php echo $row['file_name'];  ?></td>
											    <td><?php echo $row['ren_no'];?></td>
											    <td><?php echo $row['ver_per'];?></td>
												<td width="40">
												<a href="edit_user3.1.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
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
            <?php if($session_id==='7' or $session_id==='12' or $session_id==='16'){include('edit_user_form2.php'); } ?>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>