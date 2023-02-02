<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  
  <script>
  $( function() {
    $( "#datepicker1" ).datepicker();
  } );
  </script>
  
</head>
<body>
    <?php include('connection/dbcon.php'); ?>
<form action="" method="post">
<p>Select Start Date: <input type="text" id="datepicker" name="start">  
   Select End Date: <input type="text" id="datepicker1" name="end">  
   <input type="submit" value="submit" name="update">
</p>
 </form>
 
 <?php		
if (isset($_POST['update'])){

$start = $_POST['start'];								
$end = $_POST['end'];
 
$timestamp = strtotime($start);
$new_date = date("Y-m-d", $timestamp);

$timestamp1 = strtotime($end);
$new_date1 = date("Y-m-d", $timestamp1);

} ?>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="2" > 
<thead>
                                    
												<th>TIN Number</th>
												<th>Employee No</th>
												<th>Borrowed By</th>
												<th>Date and Time</th>
												
											
										</thead>
										<tbody>
										    

                                

							<?php 
									$user_query = mysqli_query($conn,"select * from borrow ")or die(mysqli_error());
									while($row = mysqli_fetch_array($user_query)){
									                echo $row['borrow_id'];
									                
													$id = $row['borrow_id'];
													$user =$row['employee_number'];
	
													?>
											<?php		
									$staff_query = mysqli_query($conn,"select * from staff  ")or die(mysqli_error());
									while($staffrow = mysqli_fetch_array($staff_query)){
													$username =$staffrow['username'];?>
												<tr>

												<td><?php echo $row['tin_number']; ?></td>
												<td><?php echo $row['employee_number']; ?></td>
												<td><?php echo $username; ?></td>
												<td><?php echo $row['date_borrow']; ?></td>

												</tr>
									<?php }} ?>
									</tbody>
                            </table>
							
			
			</div>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>





</body>
</html>