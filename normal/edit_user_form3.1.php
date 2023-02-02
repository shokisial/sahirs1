   <div class="row-fluid">
 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Record Verfication File Issuence</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php  $prt=0; $prtur=0; $prtimage='';
								
								 mysqli_query($conn,"UPDATE `verification` SET ver_urgpic='0' where ver_stu='Pending Verification' and ver_urgpic='' ")or die(mysqli_error());

								$query = mysqli_query($conn,"SELECT * FROM `file` JOIN verification on verification.tin_number=file.tin_number where verification.ver_id= '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$edit_name = $row['file_name'];
								$prt=$row['ver_per']; $prtur=$row['ver_urgrpt']; $prtimage=$row['ver_urgpic'];
								
								?>
								<? if($edit_emplnumber!=''){ $image='0'; $rp=0; ?> 
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
										 <?php  echo 'Verification Number  ' . '  = ' . '     ' . $row['ren_no']; ?>
                                         </div>
                                    
                                        <div class="control-group">
										 <?php  echo 'Priority  ' . '  = ' . '     ' . $row['ver_per'] . ' ' . $row['ver_urgrpt']; $image=$row['ver_urgpic']; $rp=$row['ver_urgrpt'];?>
							            </div>
                                        
                                        <div class="control-group" align="center">
                                          <? echo "<img src='uploads_ver/$image' class='thumbnail' width='10' height='10'  >"; ?>	
                                        </div>  
                                        
                                        <div class="control-group">
											<label>File Issue Reason:</label>
											
                                          <div class="controls">
                                            <select name="cmnt"  class="" required>
                                         	<option value ="Verification">Verification </option>
                                         	<option value ="File Missing">File Missing </option>
										 </select>
                                          </div>
                                        </div>
                                        
                                        <?	if($prt==='Urgent' and $rp==='0') {  ?>
								        <div class="control-group">
								            Urgent Reciept # Missing
								            <input type="number" name="rp" id="rp" required>
										</div>
										<? } ?>  
										
										
									<?	if($prt==='Urgent' and $prtimage==='0') {  ?>
								        <div class="control-group">
								            Upload Reciept Picture incase Urgent Verification Picture Missing
								            <input type="file" name="uploadfile" id="uploadfile" required>
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
$rp = $_POST['rp'];
/*$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$emplnumber = $_POST['emplnumber'];
$status = $_POST['status'];
$username =$firstname.'.'.$lastname;
$password=12345;;*/


$dat=0; $vrpic=''; $pr1=0;
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d');
$tim = date('H:i:s');

$user_query51 = mysqli_query($conn,"SELECT * FROM `verification` where tin_number = '$tin_number' and ver_stu='Pending Verification' and ver_urgrpt='0'")or die(mysqli_error());
			 while($row51 = mysqli_fetch_array($user_query51)){
			 $pr1= $row51['ver_urgrpt'];}

if($pr1==='0') {
      
 mysqli_query($conn,"UPDATE `verification` SET ver_urgrpt='$rp' where tin_number = '$tin_number' and ver_stu='Pending Verification' and ver_per='Urgent' and ver_urgrpt='0' ")or die(mysqli_error());

}
 
 

$user_query5 = mysqli_query($conn,"SELECT * FROM `verification` where tin_number = '$tin_number' and ver_stu='Pending Verification' and ver_per='Urgent' and ver_urgpic='0' and ver_urgrpt>'0'")or die(mysqli_error());
			 while($row5 = mysqli_fetch_array($user_query5)){
			 $vrpic= $row5['ver_urgpic'];}

if($vrpic==='0' or $vrpic===''){
    $filename = $_FILES["uploadfile"]["name"];     
  //  $filename=$tin_number . '-' . $dat. '.jpg';
    $tempname = $_FILES["uploadfile"]["tmp_name"]; 
  //  $tempname=$tin_number . '-' . $dat. '.jpg';   
       
        $folder = "uploads_ver/".$filename;
   
if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
      
 mysqli_query($conn,"UPDATE `verification` SET ver_urgpic='$filename' where tin_number = '$tin_number' and ver_stu='Pending Verification' and ver_per='Urgent' and ver_urgpic='0' ")or die(mysqli_error());

}
 
 
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','File Issu to Bisma')")or die(mysqli_error());

if($cmnt!='File Missing') {
mysqli_query($conn,"UPDATE `verification` SET `ver_stu`='File Issued',ver_res='$cmnt',dat='$dat',user='$session_id',ver_stj='10' where tin_number = '$tin_number' and ver_stu='Pending Verification'")or die(mysqli_error());

mysqli_query($conn,"INSERT INTO `borrow` (`employee_number`, `tin_number`, `date_borrow`, `ti_barrow`, `file_status`, `date_return`, `ti_return`, `emp_request`, `cmnt`, reason,stj) VALUES ('12', '$tin_number', '$dat', '$tim', 'borrowed', '0', '0', 'record', '$cmnt','$cmnt','1')")or die(mysqli_error());
mysqli_query($conn,"update file set trade_name = '12',status='borrowed' ,stj='1' where tin_number = '$tin_number' ")or die(mysqli_error());

echo 'File Record Verified Sucessfully';
}
    else{
mysqli_query($conn,"UPDATE `verification` SET ver_res='$cmnt',dat='$dat',user='$session_id' where tin_number = '$tin_number' and ver_stu='Pending Verification'")or die(mysqli_error());
        
    
    
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
    //ini_set( 'display_errors', 1 );
   // error_reporting( E_ALL );
    $from1 = "$from1";
    $to = "$from2";
    $subject = "File Record Check";
    $message = "Status send";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
		echo "The email message was sent.";
    } else {
    	echo "The email message was not sent.";
    }
    ?>
<script>
  window.location = "edit_user3.1.php"; 
</script>
<?php
}  
//Mail

?>






