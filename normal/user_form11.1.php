<html>
<head>
    <script type="text/javascript">
  function showfield(name){
    if(name=='Transfer Data Verified')document.getElementById('div1').style.display="block";
    else document.getElementById('div1').style.display="none";
  }
 
 function hidefield() {
 document.getElementById('div1').style.display='none';
 }
  </script>
</head>    
 <body onload="hidefield()"> 
 
   
   <div class="row-fluid">
 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">C.E Ready File Clearence</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php  
								
								$query = mysqli_query($conn,"SELECT * FROM `file` JOIN transtbl on transtbl.tin_number=file.tin_number where trns_id= '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$edit_name = $row['file_name'];
								$edit_jname = $row['jfile_name'];
								$edit_bname = $row['buyername'];
								$tradename=$row['trade_name'];
								$ctr=$row['file_category']; 
								$prt=$row['trns_per']; $prtur=$row['trns_rptno']; $prtimage=$row['trns_pic'];
								
								?>
								<? if($edit_emplnumber!=''){ $image='0';?> 
								<form method="post" enctype="multipart/form-data">
									
										<div class="control-group">
										 <?php  echo 'File' . '  = ' . '     ' . $edit_emplnumber . '  - ' .  $edit_firstname . ' -  ' . $edit_lastname ?>
                                         </div>
                                         
                                        <div class="control-group">
										 <?php  echo 'File Name  ' . '  = ' . '     ' . $edit_name ?>
                                         </div>
        								
        								<div class="control-group">
										 <?php  echo 'Joint Name  ' . '  = ' . '     ' . $edit_jname ?>
                                         </div>
										<div class="control-group">
										 <?php  echo 'Transfer Number  ' . '  = ' . '     ' . $row['trns_rqno'] . ' - ' . $row['trns_rpt'] . '     ' . $row['trns_per'] . '  - ' . $row['trns_rptno']; $image=$row['trns_pic'];  ?>
                                         </div>
                                    
                                       
                                
                                      
    <? $query1 = mysqli_query($conn,"SELECT * FROM `ndc` WHERE `tin_number`='$edit_emplnumber' and `ndc_stj`='4' ")or die(mysqli_error());
								$row1 = mysqli_fetch_array($query1); ?>
								
								        <div class="control-group">
										 <?php  echo 'Buyer ' . '  = ' . '     ' . $row1['buyername'] . '  ' . $row1['gdn'] . '   ' . $row1['fathername'];  ?>
                                         </div>
                                         
								        <div class="control-group">
										 <?php  echo 'Address ' . '  = ' . '     ' . $row1['address'] ;  ?>
                                         </div>
                                         
                                         <div class="control-group">
										 <?php  echo 'CNIC # ' . '  = ' . '     ' .  '  ' . $row1['cnic'] . '     ' .  '   Type  ' .  '   ' .$row1['type'];  ?>
                                         </div>
                                         
                                         <div class="control-group">
										 <?php  echo 'Joint Buyer ' . '  = ' . '     ' . $row1['jbuyername'] . '  ' . $row1['jgdn'] . '   ' . $row1['jfathername'];  ?>
                                         </div>
                                         
                                        <div class="control-group" align="center">
                                          <? echo "<img src='uploads_transfer/$image' class='thumbnail' width='10' height='10'  >"; ?>	
                                        </div>  
                                        
                                        
                                        
                                        <div class="control-group">
								          
								            <input type="text" name="trns_res" id="trns_res" >
										
												<button name="update" class="btn btn-success" title="File OK"><i class="icon-save icon-large"></i></button>

                                        </div>
                                      
                                </form>
                                
                                <form method="post" enctype="multipart/form-data">
                                  <input type="hidden" name="revtin" id="revtin"  value="<? echo $edit_emplnumber;?>">
                                  Un-Complete File Reverse Comments<input type="text" name="trns_revcmt" id="trns_revcmt" required>
                                  <button name="update123" class="btn btn-success" title="Uncomplete File"><i class="icon-save icon-large"></i></button>

                                  </form>  
                                    
									<? }	?>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			<?php	
if (isset($_POST['update123'])){
    $tin_number = $row['tin_number'];
  $dat=0; $vrpic='';
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d');
$tim = date('H:i:s');

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Ready File Reverse to Urooj')")or die(mysqli_error());
mysqli_query($conn,"UPDATE `transtbl` SET `trns_stu`='File Reverse to Urooj',dat='$dat',user='$session_id',trns_stj='4',trns_accounts='$trns_res' where tin_number = '$tin_number' and trns_stj='5'")or die(mysqli_error());

mysqli_query($conn,"UPDATE `borrow` SET `date_return`='$dat',`ti_return`='$tim',file_status='returned'  where tin_number = '$tin_number' and file_status='borrowed'")or die(mysqli_error());

mysqli_query($conn,"INSERT INTO `borrow` (`employee_number`, `tin_number`, `date_borrow`, `ti_barrow`, `file_status`, `date_return`, `ti_return`, `emp_request`, `cmnt`,stj) VALUES ('21', '$tin_number', '$dat', '$tim', 'borrowed', '0', '0', 'Reverse', '$trns_res','1')")or die(mysqli_error());
mysqli_query($conn,"update file set trade_name = '21',status='borrowed' ,stj='4' where tin_number = '$tin_number' ")or die(mysqli_error());

echo 'Ready File Reverse Sucessfully';  

  $from1=0;  
			$user_query2 = mysqli_query($conn,"SELECT * FROM `staff` WHERE `staff_id`='1'")or die(mysqli_error());
			 while($row2 = mysqli_fetch_array($user_query2)){
			 $from1= $row2['email'];} 
			 
			$user_query3 = mysqli_query($conn,"select * from staff where staff_id='21'")or die(mysqli_error());
			 while($row3 = mysqli_fetch_array($user_query3)){
			 $from2= $row3['email'];} 
			 
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "$from1";
    $to = "$from2";
    $subject = "Ready File Revrse to Urooj ";
    $message = "Status send";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
		echo "The email message was sent.";
    } else {
    	echo "The email message was not sent.";
    }
    
     ?>
<script>
  window.location = "edit_user11.1.php"; 
</script>
<?php
}  
//Mail



if (isset($_POST['update'])){

$tin_number = $row['tin_number'];
$plot_no = $row['plot_no'];
$block = $row['block'];
$empno = $_POST['region'];								
$cmnt = $_POST['cmnt'];
$trns_res = $_POST['trns_res'];
$rptmis = $_POST['rptmis'];
$cmnt1=$_POST['cmnt1'];

/*$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$emplnumber = $_POST['emplnumber'];
$status = $_POST['status'];
$username =$firstname.'.'.$lastname;
$password=12345;;*/


$dat=0; $vrpic='';
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d');
$tim = date('H:i:s');

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Ready File issue to Abid')")or die(mysqli_error());
mysqli_query($conn,"UPDATE `transtbl` SET `trns_stu`='File Issued to Abid',dat='$dat',user='$session_id',trns_stj='6',trns_accounts='$trns_res' where tin_number = '$tin_number' and trns_stj='5'")or die(mysqli_error());

mysqli_query($conn,"UPDATE `borrow` SET `date_return`='$dat',`ti_return`='$tim',file_status='returned'  where tin_number = '$tin_number' and file_status='borrowed'")or die(mysqli_error());

mysqli_query($conn,"INSERT INTO `borrow` (`employee_number`, `tin_number`, `date_borrow`, `ti_barrow`, `file_status`, `date_return`, `ti_return`, `emp_request`, `cmnt`, reason, stj) VALUES ('17', '$tin_number', '$dat', '$tim', 'borrowed', '0', '0', 'C.E', '$trns_res', 'Ready File','1')")or die(mysqli_error());
mysqli_query($conn,"update file set trade_name = '17',status='borrowed' ,stj='6' where tin_number = '$tin_number' ")or die(mysqli_error());

echo 'Ready File Transfer Sucessfully';

?>



 <?php  $from1=0;  
			$user_query2 = mysqli_query($conn,"SELECT * FROM `staff` WHERE `staff_id`='1'")or die(mysqli_error());
			 while($row2 = mysqli_fetch_array($user_query2)){
			 $from1= $row2['email'];} 
			 
			$user_query3 = mysqli_query($conn,"select * from staff where staff_id='17'")or die(mysqli_error());
			 while($row3 = mysqli_fetch_array($user_query3)){
			 $from2= $row3['email'];} 
			 
    //ini_set( 'display_errors', 1 );
   // error_reporting( E_ALL );
    $from = "$from1";
    $to = "$from2";
    $subject = "Ready File $plot_no / $block, $ctr";
    $message = "Issue To Abid";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
		echo "The email message was sent.";
    } else {
    	echo "The email message was not sent.";
    }
    
     ?>
<script>
  window.location = "edit_user11.1.php"; 
</script>
<?php
}  
//Mail

?>






