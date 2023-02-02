   <div class="row-fluid">
 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">For Transfer File Issuence to Site Office</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php  $prt=0; $prtur=0; $prtimage='0';$nwop=0;
								
								$query = mysqli_query($conn,"SELECT * FROM `file` JOIN ndc on ndc.tin_number=file.tin_number where ndc_id= '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$edit_name = $row['file_name'];
								$deal=$row['dealer'];
								
								$cat= $row['file_category'];
								$size= $row['cat'];
                                          
								$prt=$row['per']; $prtur=$row['trns_rpt']; $prtimage=$row['trns_pic'];
								
								?>
								<?php if($edit_emplnumber!=''){ $image='0';?> 
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
										 <?php  echo  'Plot Size' . '  =  ' . $size .  ' - '  . $cat?>
                                          </div>
                                          
										<div class="control-group">
										 <?php  echo 'N.D.C Number  ' . '  = ' . '     ' . $row['ndc_no'] ; ?>
                                         </div>
                                    
                                        <div class="control-group">
										 <?php  echo  'Dealer Name' . '  =  ' . $deal    ?>
                                          </div>
                                          
                                        <div class="control-group">
										 <?php  echo 'Priority  ' . '  = ' . '     ' . $row['per'] . ' ' . $row['ndc_rpt']; $image=$row['ndc_urgpic']; ?>
							            </div>
                                        
                                        
                                        <div class="control-group" align="center">
                                          <?php echo "<img src='uploads_ndc/$image' class='thumbnail' width='10' height='10'  >"; ?>	
                                        </div>  
                                        
                                        
                                        <div class="control-group">
										  Wave OFF Status : 
                                            <?php echo '   ' . $row['ndc_waveoff'] ; $nwo= $row['ndc_waveoff'] ;  $nwop= $row['ndc_waveoffpic'] ;?>
                                          </div>
                                          
                                        <?php if($nwo==='Wave OFF'){     ?>
                                        <div class="control-group" align="center">
                                          <?php echo "<img src='uploads_waveoff/$nwop' class='thumbnail' width='10' height='10'  >"; ?>	
                                        </div>  
                                        <?php } ?>
                                        
                                        <div class="control-group">
											<label>File Issue Reason:</label>
											
                                          <div class="controls">
                                            <select name="cmnt"  class="" required>
                                         	<option value ="Transfer">Transfer Site Office</option>
										 </select>
                                          </div>
                                        </div>
										
									<?php /*	if($prt==='Urgent' and $prtimage==='0' ) {  ?>
								        <div class="control-group">
								            Upload Reciept Picture incase Urgent Transfer Picture Missing
								            <input type="file" name="uploadfile" id="uploadfile" required>
										</div>
										<?php }  */?>  
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                      
                                </form>
									<?php }	?>
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


        
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','File issue to Site Office for Transfer')")or die(mysqli_error());
mysqli_query($conn,"UPDATE `ndc` SET `ndc_stu`='NDC Clear File Issued for Transfer',dat='$dat',user='$session_id',ndc_stj='3' where tin_number = '$tin_number' and ndc_stj='2'")or die(mysqli_error());
mysqli_query($conn,"UPDATE `borrow` SET `date_return`='$dat',`ti_return`='$tim',file_status='returned'  where tin_number = '$tin_number' and file_status='borrowed'")or die(mysqli_error());

mysqli_query($conn,"INSERT INTO `borrow` (`employee_number`, `tin_number`, `date_borrow`, `ti_barrow`, `file_status`, `date_return`, `ti_return`, `emp_request`, `cmnt`, reason, stj) VALUES ('7', '$tin_number', '$dat', '$tim', 'borrowed', '0', '0', 'record', '$cmnt', '$cmnt','1')")or die(mysqli_error());
mysqli_query($conn,"update file set trade_name = '7',status='borrowed' ,stj='3' where tin_number = '$tin_number' ")or die(mysqli_error());

echo 'File Issue To Site Office for Transfer Sucessfully';
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
  //  ini_set( 'display_errors', 1 );
  //  error_reporting( E_ALL );
    $from = "$from1";
    $to =   "$from2";
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
  window.location = "edit_user6.1.php"; 
</script>
<?php
}  
//Mail

?>






