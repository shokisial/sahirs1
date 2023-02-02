<!DOCTYPE html>
<html>
  <head>
    <title>Title of the document</title>
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
                                <div class="muted pull-left"><h2> N.D.C File Detail </h2></div>
                            </div>
    <div class="tableFixHead">
      <table>
        <thead>
          <tr>
                                                <th>S.No</th>
                                                <th>File</th>
												<th>App. Date</th>
												<th>Plot</th>
												<th>Block</th>
												<th>Size</th>
												<th>Type</th>
												<th>Buyer</th>
												<th>Joint Name</th>
												<th>NDC Sr#</th>
												<th>Dealer</th>
												<th>Priority</th>
												<th>Status</th>
												<th>Reason</th>
												<th>Action Date</th>
												<th>Urgent RPT#</th>
												<th>Wave OFF Pic</th>
												
												
          </tr>
        </thead>
       
       <form method="post">
									
										
							
                        <?php $sno=1;
								$query = mysqli_query($conn,"SELECT * FROM `ndc` JOIN file on file.tin_number=ndc.tin_number order by per desc ")or die(mysqli_error());
								while($row = mysqli_fetch_array($query)){
								 ?>
								 <tr>
								     <tbody>
								<td><?php  echo $sno; ?> </td> 
                                <td><?php  echo $row['tin_number']; ?> </td>
                                <td><?php  echo $row['ndc_dat']; ?>
                                <td><?php  echo $row['plot_no']; ?> </td>
                                <td><?php  echo $row['block']; ?> </td>
                                <td><?php  echo $row['file_category']; ?> </td>
                                <td><?php  echo $row['type']; ?> </td>
                                <td><?php  echo $row['buyername']; ?> </td>
                                <td><?php  echo $row['jbuyername']; ?> </td>
                                <td><?php  echo $row['ndc_no']; ?> </td>
                                <td><?php  echo $row['dealer']; ?> </td>
                                <td><?php  echo $row['per']; ?> </td>
                                <td><?php  echo $row['ndc_stu']; ?> </td>
                                <td><?php  echo $row['ndc_res']; ?> </td>
                                <td><?php  echo $row['dat']; ?> </td>
                                <td><?php  echo $row['ndc_rpt'];  $image=$row['ndc_urgpic']; ?> 
                                
                                
    <? echo "<img src='uploads_ndc/$image' class='thumbnail' width='10' height='10'  >";  ?>	</td>
    
                               
    <td><?php  $image1=$row['ndc_waveoffpic'];?> 
                                
                                
    <? echo "<img src='uploads_waveoff/$image1' class='thumbnail' width='10' height='10'  >";  $sno=$sno+1;}?>	</td>
    
                                 
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






