 <?php include('header2.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
       <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('borrow_sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('edit_ndc1_form1.php'); ?>		   			
				</div>
                <div class="span7" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
							<?php 
							$query = mysqli_query($conn,"select * from file where trade_name='$session_id' ")or die(mysqli_error());
						if($session_id==='7' or $session_id==='1'){ $query = mysqli_query($conn,"select * from verification where verification.ver_stj='3' ")or die(mysqli_error()); }
					//	if($session_id!=16){ $query = mysqli_query($conn,"select * from file")or die(mysqli_error()); }
					//	if($session_id!=18){ $query = mysqli_query($conn,"select * from file")or die(mysqli_error()); }
						
							$count = mysqli_num_rows($query);
						//	echo 'user'. $session_id;
							?>
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i>  N.D.C file List</div>
                                <div class="muted pull-right">
									Number of files: <span class="badge badge-info"><?php echo $count; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span20">
								<form action="" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									
										<thead>
										  <tr>
											
												<th>File Code</th>
												<th>Plot</th>
												<th>Block</th>
												<th>size</th>
												<th>Category</th>
												<th>Owner</th>
												<th>Status</th>
												
												<th>Exp Date</th>
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php  $tnm=0;
								if($session_id==='7' or $session_id==='9' or $session_id==='20' or $session_id==='1' ){ $user_query = mysqli_query($conn,"select * from verification inner join file on verification.tin_number=file.tin_number where verification.ver_stj='3'")or die(mysqli_error());}
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
			
									    <td><?php echo $row['ver_stu'];?></td>
									    
									    <td><?php echo $row['ver_exp'];?></td>
												<td width="40">
												<a href="edit_ndc1.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
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
            <?php if($session_id==='7' or $session_id==='1' or $session_id==='2'or $session_id==='5' or $session_id==='9' or $session_id==='20'){include('edit_ndc_form2.php'); } ?>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>