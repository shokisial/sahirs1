   <div class="row-fluid">
 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Record NDC File Issuence</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php  $prt=0; $prtur=0; $prtimage='';
								
								 mysqli_query($conn,"UPDATE `ndc` SET ndc_urgpic='0' where ndc_stu='Pending' and ndc_urgpic='' ")or die(mysqli_error());
                                 mysqli_query($conn,"UPDATE `ndc` SET ndc_waveoffpic='0' where ndc_stu='Pending' and ndc_waveoffpic='' ")or die(mysqli_error());


								$query = mysqli_query($conn,"SELECT * FROM `file` JOIN ndc on ndc.tin_number=file.tin_number where ndc_id= '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$edit_name = $row['file_name'];
								$prt=$row['per']; $prtur=$row['ndc_rpt']; $prtimage=$row['ndc_urgpic']; 
								
								$woff=$row['ndc_waveoff']; $waveimage=$row['ndc_waveoffpic'];
								?>
								<? if($edit_emplnumber!=''){ $image='0';?> 
								<form method="post" enctype="multipart/form-data">
									
										<div class="control-group">
										 <?php  echo 'File Number  ' . '  = ' . '     ' . $edit_emplnumber ?>
                                         </div>
                                         
                                        <div class="control-group">
										 <?php  echo 'File Name  ' . '  = ' . '     ' . $edit_name ?>
                                         </div>
                                         
										<div class="control-group">
										 <?php  echo  'Plot Number' . '  =  ' . $edit_firstname . ' -  ' . $edit_lastname?>
                                          </div>
										
										<div class="control-group">
										 <?php  echo 'NDC Number  ' . '  = ' . '     ' . $row['ndc_no'] . ' - ' . $row['ndc_rpt'] .  ' -  ' . 'Priority  ' . '  ' . $row['per']  . ':' . $row['ndc_urgrpt'] ; $image=$row['ndc_urgpic'];?>
                                         </div>
                                    
                                        <div class="control-group">
										 <?php  echo 'Wave OFF Status'  . '  = ' . '     ' . $woff       ?>
							            </div>
                                        
                                        <div class="control-group" align="center">
                                          <? echo "<img src='uploads_ndc/$image' class='thumbnail' width='10' height='10'  >"; ?>	
                                        </div>  
                                        
                                        <div class="control-group">
											<label>File Issue Reason:</label>
											
                                          <div class="controls">
                                            <select name="cmnt"  class="" required>
                                         	<option value ="NDC">NDC </option>
										 </select>
                                          </div>
                                        </div>
										
									<?	if($prt==='Urgent' and $prtur==='0' ) {  ?>
								        <div class="control-group">
								            N.D.C Urgent Reciept No. Missing
								            <input type="number" name="rpturgno" id="rpturgno" required>
										</div>
										<? } ?>  
										
									<?	if($prt==='Urgent' and $prtimage==='0' ) {  ?>
								        <div class="control-group">
								            Upload Reciept Picture incase Urgent Verification Picture Missing
								            <input type="file" name="uploadfile" id="uploadfile" required>
										</div>
										<? } ?>  
										
										
										
									<?	if($woff==='Wave OFF' and $waveimage==='0' ) {  ?>
								        <div class="control-group">
								            Upload Wave OFF Amount Picture Missing
								            <input type="file" name="uploadfile1" id="uploadfile1" required>
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
$rpturgno = $_POST['rpturgno'];
/*$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$emplnumber = $_POST['emplnumber'];
$status = $_POST['status'];
$username =$firstname.'.'.$lastname;
$password=12345;;*/


$dat=0; $vrpic=''; $ndcrp=''; $wos='';
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d');
$tim = date('H:i:s');

$user_query5 = mysqli_query($conn,"SELECT * FROM `ndc` where tin_number = '$tin_number' and ndc_stj='1' and per='Urgent'")or die(mysqli_error());
			 while($row5 = mysqli_fetch_array($user_query5)){
			 $vrpic= $row5['ndc_urgpic'];
			 $ndcrp= $row5['ndc_rpt'];
			 $wos=$row5['ndc_waveoffpic'];
			 }

if($vrpic==='0' ){
    $filename = $_FILES["uploadfile"]["name"];     
    $tempname = $_FILES["uploadfile"]["tmp_name"]; 
    $folder = "uploads_ndc/".$filename;
   
if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
}

if($wos==='0' ){
    $filename1 = $_FILES["uploadfile1"]["name"];     
    $tempname1 = $_FILES["uploadfile1"]["tmp_name"]; 
    $folder1 = "uploads_waveoff/".$filename1;
   
if (move_uploaded_file($tempname1, $folder1))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
}    
      
 mysqli_query($conn,"UPDATE `ndc` SET ndc_urgpic='$filename' where tin_number = '$tin_number' and ndc_stj='1' and per='Urgent' and ndc_urgpic='0' ")or die(mysqli_error());
 mysqli_query($conn,"UPDATE `ndc` SET ndc_waveoffpic='$filename1' where tin_number = '$tin_number' and ndc_stj='1'  and ndc_waveoffpic='0' and ndc_waveoff='Wave OFF' ")or die(mysqli_error());
 mysqli_query($conn,"UPDATE `ndc` SET ndc_rpt='$rpturgno' where tin_number = '$tin_number' and ndc_stj='1'  and per='Urgent' and ndc_rpt='0' ")or die(mysqli_error());


        
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','File issue to Faiza for NDC')")or die(mysqli_error());
mysqli_query($conn,"UPDATE `ndc` SET `ndc_stu`='File Issued',ndc_res='$cmnt',dat='$dat',user='$session_id',ndc_stj='10' where tin_number = '$tin_number' and ndc_stj='1'")or die(mysqli_error());

mysqli_query($conn,"INSERT INTO `borrow` (`employee_number`, `tin_number`, `date_borrow`, `ti_barrow`, `file_status`, `date_return`, `ti_return`, `emp_request`, `cmnt`,stj) VALUES ('3', '$tin_number', '$dat', '$tim', 'borrowed', '0', '0', 'record', '$cmnt','1')")or die(mysqli_error());
mysqli_query($conn,"update file set trade_name = '3',status='borrowed' ,stj='1' where tin_number = '$tin_number' ")or die(mysqli_error());

echo 'File Record Verified Sucessfully';
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
    $from = "shokisial@gmail.com";
    $to = "shokisial@gmail.com";
    $subject = "File Issue for NDC Record Check";
    $message = "Status send";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
		echo "The email message was sent.";
    } else {
    	echo "The email message was not sent.";
    }
    ?>
<script>
  window.location = "edit_user4.1.php"; 
</script>
<?php
}  
//Mail

?>






