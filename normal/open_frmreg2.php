<!DOCTYPE html>
<html>
  <head>
    <title>Sahir's File Manager</title>
    <style>
      .tableFixHead {
        overflow-y: auto;
        height: 200px;
      }
      .tableFixHead thead th {
        position: sticky;
        top: 0;
      }
      table {
        border-collapse: collapse;
        width: 99%;
      }
      th,
      td {
        padding: 8px 16px;
      }
      th {
        background: #eee;
      }
      .tableFixHead,
      .tableFixHead td {
        box-shadow: inset 1px -1px #000;
      }
      .tableFixHead th {
        box-shadow: inset 1px 1px #000, 0 1px #000;
      }
    </style>
    
    <style>
.thumbnail:hover {
    position:relative;
    top:-25px;
    left:-35px;
    width:500px;
    height:auto;
    display:block;
    z-index:999;
}
</style>

  </head>
  <body>
      <div class="row-fluid">
 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><h2> Open Form Registratin Detail </h2></div>
                            </div>
    <div class="tableFixHead">
      <table>
        <thead>
          <tr>
                                                <th>S.No</th>
                                                <th>File</th>
												<th>Form #</th>
												<th>Plot</th>
												<th>Category</th>
												<th>Reference</th>
												
												<th>Buyer</th>
												<th>Joint Name</th>
												
												<th>Dealer</th>
												<th>Priority</th>
												<th>User</th>
												
												<th>Frm Recieve Date</th>
												<th>Location</th>
												<th>Reason</th>
												
												
												
          </tr>
        </thead>
       
       <form method="post">
									
										
							
                        <?php $sno=1;
								$query = mysqli_query($conn,"SELECT * FROM `file` inner join open_filedet on open_filedet.tin_number=file.tin_number where file.opn_reg='1' and file.stj<'105' or file.stj>'105'")or die(mysqli_error());
								while($row = mysqli_fetch_array($query)){
								 ?>
								 <tr>
								     <tbody>
								
								<td><?php  echo $sno; ?> </td> 
                                <td><?php  echo $row['tin_number']; ?> 
                                
                                </td>
                                <td><?php  echo $row['form_no']; ?>
                                <td><?php  echo $row['plot_no'] . ' / ' . $row['block']; ?> </td>
                                
                                <td><?php  echo $row['file_category']; ?> </td>
                                <td><?php  echo $row['booking_ref']; ?> </td>
                                
                                <td><?php  echo $row['file_name']; ?> </td>
                                <td><?php  echo $row['jfile_name']; ?> </td>
                                
                                <td><?php  echo $row['dealer']; ?> </td>
                                <td><?php  echo $row['per']; $usr3=0;  
                                $usr3=$row['trade_name']; ?> </td>
                                
                                <? $usr=0; $usr1=0;  $usr=$row['user']; 
                                $query1 = mysqli_query($conn,"SELECT * FROM `staff` WHERE `staff_id`=$usr")or die(mysqli_error());
								while($row1 = mysqli_fetch_array($query1)){
								$usr1=$row1['username'];}  ?>
								
								<? $usr4=0; $query3 = mysqli_query($conn,"SELECT * FROM `staff` WHERE `staff_id`=$usr3")or die(mysqli_error());
								while($row3 = mysqli_fetch_array($query3)){
								$usr4=$row3['username'];}  ?>
								
								
                                <td><?php  echo $usr1; ?> </td>
                                <td><?php  echo $row['rec_dat']; ?> </td>
                                <td><?php  echo $usr4; ?> </td>
                                <td><?php  echo $row['reason'];  ?> 
                                
                                
    	</td>
    
                               
    <?  $sno=$sno+1;}?>	
    
                                 
      </table>
    </div>
  </body>
</html>
   
                            
                           
                            
								
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			<?php /*
			
			<div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                          
if (isset($_POST['update'])){

$tin_number = $row['tin_number'];
$plot_no = $row['plot_no'];
$block = $row['block'];
$empno = $_POST['region'];								

/*$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$emplnumber = $_POST['emplnumber'];
$status = $_POST['status'];
$username =$firstname.'.'.$lastname;
$password=12345;;*/

/*
$dat=0;
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d H:i:s');

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Edit User $username from $region Region')")or die(mysqli_error());
mysqli_query($conn,"update borrow set date_return = '$dat',file_status='return' where tin_number = '$tin_number' and date_return='0000-00-00 00:00:00
'")or die(mysqli_error());
mysqli_query($conn,"insert into borrow (employee_number,tin_number,date_borrow,file_status,emp_request) 
                                 values('$empno','$tin_number', '$dat','borrowed','$user_name')")or die(mysqli_error());
mysqli_query($conn,"update file set trade_name = '$empno' where tin_number = '$tin_number' ")or die(mysqli_error());
echo 'File Issued Sucessfully';
?>

 <?php  $from1=0;  
			$user_query2 = mysqli_query($conn,"select * from staff where username='$user_name'")or die(mysqli_error());
			 while($row2 = mysqli_fetch_array($user_query2)){
			 $from1= $row2['email'];} ?>
<?php  $from2=0;  
			$user_query3 = mysqli_query($conn,"select * from staff where staff_id='$empno'")or die(mysqli_error());
			 while($row3 = mysqli_fetch_array($user_query3)){
			 $from2= $row3['email'];} ?>											
<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "$from1";
    $to = "$from2";
    $subject = "File sended";
    $message = "File No - $tin_number - Plot # $plot_no - $block send by $user_name - $from1 - by - $from2";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
		echo "The email message was sent.";
    } else {
    	echo "The email message was not sent.";
    }
    ?>
<script>
  window.location = "edit_user.php"; 
</script>
<?php
}  
//Mail

?>






