 <?php include('header2.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
       <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('borrow_sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('edit_openfile_form5.php'); ?>		   			
				</div>
                <div class="span7" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
							<?php 
							$query = mysqli_query($conn,"select * from file where stj='1' and opn_reg='1' ")or die(mysqli_error());
					//	if($session_id==='7'){ $query = mysqli_query($conn,"select * from file where stj='5' ")or die(mysqli_error()); }
					//	if($session_id!=16){ $query = mysqli_query($conn,"select * from file")or die(mysqli_error()); }
					//	if($session_id!=18){ $query = mysqli_query($conn,"select * from file")or die(mysqli_error()); }
						
							$count = mysqli_num_rows($query);
						//	echo 'user'. $session_id;
							?>
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i>  Open file List</div>
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
											
												<th>File #</th>
												<th>Form #</th>
												<th>Plot #</th>
												<th>Block</th>
												<th>Size</th>
												<th>Fector</th>
												<th>Booking Ref</th>
												<th>Category</th>
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php  $tnm=0;
								if($session_id==='1'){ $user_query = mysqli_query($conn,"select * from file where stj='105' and opn_reg='1'")or die(mysqli_error());}
													while($row = mysqli_fetch_array($user_query)){
													$id = $row['file_id'];
													?>
													<tr>
												
												<td><?php echo $row['tin_number']; ?></td>
												<td><?php echo $row['form_no']; ?></td>
												<td><?php echo $row['plot_no'] . ' '; ?></td>	
												<td><?php echo $row['block'] . ' '; ?></td>
										
										<td><?php echo $row['cat'] . ' '; ?></td>
										
										<td><?php echo $row['fector'] . ' '; ?></td>
										
										<td><?php echo $row['booking_ref'] . ' '; ?></td>
										
											<td><?php echo $row['file_category'] . ' '; ?></td>
												
												<td width="40">
												<a href="edit_openfile5.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
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
                  
                  <?php  $tin=0;
								if($session_id==='1'){ $user_query1 = mysqli_query($conn,"select max(tin_number) as tin from file ")or die(mysqli_error());}
													while($row1 = mysqli_fetch_array($user_query1)){
													$tin = $row1['tin']+1;} 
													?>
<div >
                    <div class="card-header">
                    <h4>Upload CSV File Format for Add/Reg New Open Form, New File Number = <? echo $tin; ?> </h4>
                    </div>
                    <div class="card-body">

                        <form action="addtocsv2.php" method="POST" enctype="multipart/form-data" name="form1" id="form1">

                            <input type="file" name="csv" class="form-control" required/>
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

                        </form>

                    </div>
                </div>
                
       

                </div>
            </div>
            <?php //if($session_id==='7' or $session_id==='1' or $session_id==='2'or $session_id==='5'){include('edit_ndc_form2.php'); } ?>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>