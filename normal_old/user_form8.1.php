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
                                <div class="muted pull-left">Allocation Transfer File Issuence</div>
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
								$edit_bname = $row['buyername'];
								$tradename=$row['trade_name'];
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
										 <?php  echo 'Transfer Number  ' . '  = ' . '     ' . $row['trns_rqno'] . ' - ' . $row['trns_rpt'] . '     ' . $row['trns_per'] . '  - ' . $row['trns_rptno']; $image=$row['trns_pic']; $image1=$row['trns_conspic'];  ?>
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
                                         
                                        <div class="control-group" align="left">
                                          <? echo "<img src='uploads_transfer/$image' class='thumbnail' width='10' height='10'  >"; ?>	
                                       
                                          <? echo "<img src='uploads_conspic/$image1' class='thumbnail' width='10' height='10' align='right' >"; ?>	
                                        </div>  
                                        
                                        
                                        <div class="control-group">
								          <b>  Comments </b>
								            <input type="text" name="trns_res" id="trns_res" required>
								            <input type="file" name="uploadfile" id="uploadfile" required>
										</div>
										
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                      
                                </form>
									<? }	?>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			<?php		
if (isset($_POST['update'])){

$tin_number = $row['tin_number'];
$plot_no = $row['plot_no'];
$block = $row['block'];
$empno = $_POST['region'];								
$cmnt = $_POST['cmnt'];
$trns_res = $_POST['trns_res'];
$rptmis = $_POST['rptmis'];
$cmnt1=$_POST['cmnt1'];

$filename=0;
$filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "uploads_coverpic/".$filename;
        
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
      

$dat=0; $vrpic='';
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d');
$tim = date('H:i:s');

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Ready File issue to FAIZA')")or die(mysqli_error());
mysqli_query($conn,"UPDATE `transtbl` SET `trns_stu`='File Issued A/C',dat='$dat',user='$session_id',trns_stj='3',trns_allocation='$trns_res',trns_coverpic='$filename' where tin_number = '$tin_number' and trns_stj='2'")or die(mysqli_error());

mysqli_query($conn,"UPDATE `borrow` SET `date_return`='$dat',`ti_return`='$tim',file_status='returned'  where tin_number = '$tin_number' and file_status='borrowed'")or die(mysqli_error());

mysqli_query($conn,"INSERT INTO `borrow` (`employee_number`, `tin_number`, `date_borrow`, `ti_barrow`, `file_status`, `date_return`, `ti_return`, `emp_request`, `cmnt`,stj) VALUES ('3', '$tin_number', '$dat', '$tim', 'borrowed', '0', '0', 'Account', '$trns_res','1')")or die(mysqli_error());
mysqli_query($conn,"update file set trade_name = '3',status='borrowed' ,stj='3' where tin_number = '$tin_number' ")or die(mysqli_error());

echo 'File Record Transfer Sucessfully';

?>



 <?php  $from1=0;  
			$user_query2 = mysqli_query($conn,"SELECT * FROM `staff` WHERE `staff_id`='0'")or die(mysqli_error());
			 while($row2 = mysqli_fetch_array($user_query2)){
			 $from1= $row2['email'];} ?>
<?php  $from2=0;  
			$user_query3 = mysqli_query($conn,"select * from staff where staff_id='12'")or die(mysqli_error());
			 while($row3 = mysqli_fetch_array($user_query3)){
			 $from2= $row3['email'];} ?>											
<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "$from1";
    $to = "$from2";
    $subject = "Ready File Issue Printing";
    $message = "Status send";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
		echo "The email message was sent.";
    } else {
    	echo "The email message was not sent.";
    }
    
     ?>
<script>
  window.location = "edit_user8.1.php"; 
</script>
<?php
}  
//Mail

?>






