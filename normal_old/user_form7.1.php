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
                                <div class="muted pull-left">Record Transfer File Issuence</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php  $prt=0; $prtur=0; $prtimage='0';
								
								 mysqli_query($conn,"UPDATE `transtbl` SET trns_pic='0' where trns_stu='Transfer Pending File' and trns_pic='' ")or die(mysqli_error());

								$query = mysqli_query($conn,"SELECT * FROM `file` JOIN transtbl on transtbl.tin_number=file.tin_number where trns_id= '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$edit_name = $row['file_name'];
								$edit_bname = $row['buyername'];
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
										 <?php  echo 'Contact No. ' . '  = ' . '     ' . $row1['cntno'] ;  ?>
                                         </div>
                                        <div class="control-group" align="center">
                                          <? echo "<img src='uploads_transfer/$image' class='thumbnail' width='10' height='10'  >"; ?>	
                                        </div>  
                                        
                                        <div class="control-group">
											<label>File Issue Reason:</label>
											
                                          <div class="controls">
                                            <select name="cmnt"  class="" onchange="showfield(this.options[this.selectedIndex].value)"  required>
                                         	  <option value ="Transfer Data Not Verified">Transfer Data Not Verified</option>
										      <option value ="Transfer Data Verified">Transfer Data Verified</option>
										 </select>
                                          </div>
                                        </div>
                                        
                                        <div id="div1" class="control-group">
											<label>File Issue To:</label>
											
                                          <div class="controls">
                                            <select name="cmnt1"   required>
                                         	<option value ="12">Bisma Anwar</option>
                                         	<option value ="15">Irum Shehzadi</option>
										 </select>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
								          <b>  Reason </b>
								            <input type="text" name="trns_res" id="trns_res" required>
										</div>
										
										
									<?	if($prt==='Urgent' and $prtimage==='0' ) {  ?>
								        <div class="control-group">
								          <b>  Upload Reciept Urgent Transfer Picture Missing </b>
								            <input type="file" name="uploadfile" id="uploadfile" required>
										</div>
										<? } ?>  
										
									<?	if($prt==='Urgent' and $prtur==='0' ) {  ?>
								        <div class="control-group">
								          <b>  Reciept # Urgent Transfer  Missing </b>
								            <input type="number" name="rptmis" id="rptmis" required>
										</div>
										<? } ?>
										
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

$user_query5 = mysqli_query($conn,"SELECT * FROM `transtbl` where tin_number = '$tin_number' and trns_stj='1' and trns_per='Urgent' and trns_pic='0' ")or die(mysqli_error());
			 while($row5 = mysqli_fetch_array($user_query5)){
			 $vrpic= $row5['trns_pic'];}

if($vrpic==='0' ){
    $filename = $_FILES["uploadfile"]["name"];     
    $tempname = $_FILES["uploadfile"]["tmp_name"]; 
    $folder = "uploads_transfer/".$filename;
   
if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
      
 mysqli_query($conn,"UPDATE `transtbl` SET trns_pic='$filename' where tin_number = '$tin_number' and trns_stj='1' and trns_per='Urgent' and trns_pic='0'")or die(mysqli_error());

}
$trns_newrpt=0;
$user_query5 = mysqli_query($conn,"SELECT * FROM `transtbl` where tin_number = '$tin_number' and trns_stj='1' and trns_per='Urgent' and trns_rptno='0' ")or die(mysqli_error());
			 while($row5 = mysqli_fetch_array($user_query5)){
			 $trns_newrpt= $row5['trns_rptno'];}

if($trns_newrpt==='0' ){
mysqli_query($conn,"UPDATE `transtbl` SET trns_rptno='$rptmis' where tin_number = '$tin_number' and trns_stj='1' and trns_per='Urgent' and trns_rptno='0'")or die(mysqli_error());
}

 $stj=2; 
if($cmnt==='Transfer Data Not Verified'){ $stj='1'; 
 mysqli_query($conn,"UPDATE `transtbl` SET trns_res='$cmnt',trns_alccmnt='$trns_res',act_dat='$dat',user='$session_id' where tin_number = '$tin_number' and trns_stj='1'")or die(mysqli_error());
}  
else{
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Ready File issue to $cmnt1')")or die(mysqli_error());
mysqli_query($conn,"UPDATE `transtbl` SET `trns_stu`='File Issued',trns_res='$cmnt',dat='$dat',user='$session_id',trns_stj='2',alc_to='$cmnt1',trns_alccmnt='$trns_res' where tin_number = '$tin_number' and trns_stj='1'")or die(mysqli_error());

mysqli_query($conn,"INSERT INTO `borrow` (`employee_number`, `tin_number`, `date_borrow`, `ti_barrow`, `file_status`, `date_return`, `ti_return`, `emp_request`, `cmnt`,stj) VALUES ('$cmnt1', '$tin_number', '$dat', '$tim', 'borrowed', '0', '0', 'record', '$cmnt','1')")or die(mysqli_error());
mysqli_query($conn,"update file set trade_name = '$cmnt1',status='borrowed' ,stj='1' where tin_number = '$tin_number' ")or die(mysqli_error());

echo 'File Record Transfer Sucessfully';
}
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
  window.location = "edit_user7.1.php"; 
</script>
<?php
}  
//Mail

?>






