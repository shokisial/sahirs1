   <div class="row-fluid">
 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Accounts Verfication Confirmation</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
								$query = mysqli_query($conn,"SELECT * FROM `file` JOIN verification on verification.tin_number=file.tin_number where verification.ver_id= '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$edit_name = $row['file_name'];
								?>
								
								<? if($edit_emplnumber!=''){ ?>
								<form method="post">
									
										<div class="control-group">
										 <?php  echo 'File Number  ' . '  = ' . '     ' . $edit_emplnumber ?>
                                         </div>
                                         
                                        <div class="control-group">
										 <?php  echo 'Name  ' . '  = ' . '     ' . $edit_name ?>
                                         </div>
                                         
										<div class="control-group">
										 <?php  echo  'Plot Number' . '  =  ' . $edit_firstname . ' -  ' . $edit_lastname?>
                                          </div>
										
										<div class="control-group">
										 <?php  echo 'Verification Number  ' . '  = ' . '     ' . $row['ver_id']; ?>
                                         </div>
                                    
                                        <div class="control-group">
										 <?php  echo 'Allocation Cmnt  ' . '  = ' . '     ' . $row['ver_stu']; ?>
                                         </div>
                                         
                                         <div class="control-group">
										 <?php  echo 'Reason  ' . '  = ' . '     ' . $row['ver_res']; ?>
                                         </div>
                                         
                                        
                                        <div class="control-group">
										 <?php  echo 'Periority  ' . '  = ' . '     ' . $row['ver_per'] . ' ' . $row['ver_urgrpt']; $image=$row['ver_urgpic']; ?>
							            </div>
							            
							            <div class="control-group" align="center">
                                          <? echo "<img src='uploads_ver/$image' class='thumbnail' width='10' height='10'  >"; ?>	
                                        </div>  
                                        
										<div class="control-group">
											<label>File Status:</label>
											
                                          <div class="controls">
                                            <select name="region"  class="" required>
                                                
                                             	<option value ="Verified"> Verified </option>
												<option value ="Non-Verified"> Non-Verified</option>
											    <option value ="Fake"> Fake</option>
											
                                            </select>
                                          </div>
                                        </div>
										
										<div class="control-group">
										
                                            <input type="text" name="cmnt" placeholder="File Verification Reason" required autofocus>
                                          
                                        </div>
								
										
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								<? } ?>
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


$dat=0; $next_due_date=0; $next_due_date1=0;
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d');
$tim = date('h:m:s');

$next_due_date = date('Y/m/d', strtotime("+30 days"));
echo $next_due_date;

$next_due_date1 = date('Y/m/d', strtotime("+90 days"));
echo $next_due_date1;


$vrstj=3;
$std=1;

if($empno==='Fake') { mysqli_query($conn,"update file set trade_name = '0',status='returned' and stj = '0' where tin_number = '$tin_number' ")or die(mysqli_error());  }


if($empno==='Fake' or $empno==='Non-Verified') { $vrstj=0; $std=0; }
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Verification . $cmnt')")or die(mysqli_error());

mysqli_query($conn,"UPDATE `verification` SET `ver_acstu`='$empno',ver_acres='$cmnt', ver_stj='$vrstj', user='$session_id', ver_exp='$next_due_date', ver_expdat='$next_due_date1',ver_expdat_status='1' where tin_number = '$tin_number' and ver_stj='2'")or die(mysqli_error());

mysqli_query($conn,"UPDATE `borrow` SET `date_return`='$dat',`ti_return`='$tim',file_status='returned'  where tin_number = '$tin_number' and file_status='borrowed'")or die(mysqli_error());

mysqli_query($conn,"INSERT INTO `borrow` (`employee_number`, `tin_number`, `date_borrow`, `ti_barrow`, `file_status`, `date_return`, `ti_return`, `emp_request`, `cmnt`, reason, stj) VALUES ('0', '$tin_number', '$dat', '$tim', 'borrowed', '0', '0', 'Record', '$cmnt', 'Verification Complete','1')")or die(mysqli_error());


mysqli_query($conn,"update file set trade_name = '0',status='borrowed' where tin_number = '$tin_number' ")or die(mysqli_error());

echo 'File Record Verified Sucessfully';
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
   // ini_set( 'display_errors', 1 );
   // error_reporting( E_ALL );
    $from = "$from1";
    $to = "$from2";
    $subject = "File Record Check";
    $message = "Status - $empno - File No - $tin_number - Plot # $plot_no - $block send by $user_name - $from1 - by - $from2";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
		echo "The email message was sent.";
    } else {
    	echo "The email message was not sent.";
    }
    ?>
<script>
  window.location = "edit_user4.php"; 
</script>
<?php
}  
//Mail

?>






