   <div class="row-fluid">
 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Issue File</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
								
								
								$query = mysqli_query($conn,"select * from file where file_id = '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$newuser=$row['trade_name'];
								$nm=$row['file_name'];
								$ct=$row['file_category']; 
								?>
								
							    <?php if($edit_emplnumber!=''){ ?>
								<form method="post">
									
										<div class="control-group">
										 <?php  echo 'File Number  ' . '  = ' . '     ' . $edit_emplnumber ?>
                                         </div>
                                         
                                         <div class="control-group">
										 <?php  echo 'Name  ' . '  = ' . '     ' . $nm ?>
                                         </div>
                                         
										<div class="control-group">
										 <?php  echo  'Plot Number' . '  =  ' . $edit_firstname . ' -  ' . $edit_lastname . ' - ' . $ct ?>
                                          </div>
										
										
                                    
                                        
                                        <div class="control-group" tabindex="1">
										
                                            <input type="text" name="cmnt" placeholder="File Issue Reason" required autofocus>
                                          
                                        </div>
                                        
										<div class="control-group" tabindex="2">
											<label>Employee Name:</label>
											
                                          <div class="controls">
                                            <select name="region"  class="" required>
                                                <?php  
													$user_query1 = mysqli_query($conn,"select * from staff where auth='1' ")or die(mysqli_error());
													while($row1 = mysqli_fetch_array($user_query1)){
												 ?>
                                             	<option value ="<?php echo $row1['staff_id']; ?> "> <?php echo $row1['username']; ?></option>
												
											<?php  } ?>
                                            </select>
                                          </div>
                                        </div>
										
								
										
											<div class="control-group">
                                          <div class="controls" tabindex="3">
												<button name="update" class="btn btn-success" ><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								<?php } ?>
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


$dat=0;
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d');
$tim = date('H:i:s');


mysqli_query($conn,"insert into activity_log (date,tim,username,action) values('$dat','$tim','$user_name','Issue File to $empno from $user_name')")or die(mysqli_error());

//mysqli_query($conn,"update borrow set date_return = '$dat',file_status//='return' where tin_number = '$tin_number' and date_return='0000-00-00 00//:00:00'")or die(mysqli_error());

//,date_borrow,file_status,emp_request,cmnt

mysqli_query($conn,"UPDATE `borrow` SET `file_status`='returned',`date_return`='$dat',`ti_return`='$tim',`stj`='0' where tin_number = '$tin_number' and date_return='0' and ti_return='0'")or die(mysqli_error());

mysqli_query($conn,"INSERT INTO `borrow` (`employee_number`, `tin_number`, `date_borrow`, `ti_barrow`, `file_status`, `date_return`, `ti_return`, `emp_request`, `cmnt`, reason, stj) VALUES ('$empno', '$tin_number', '$dat', '$tim', 'borrowed', '0', '0', '$user_name', '$cmnt','$cmnt','1')")or die(mysqli_error());

mysqli_query($conn,"update file set trade_name = '$empno',status='borrowed' ,stj='1' where tin_number = '$tin_number' ")or die(mysqli_error());

if($empno<1){ mysqli_query($conn,"update file set status='returned',stj='0' where tin_number = '$tin_number' ")or die(mysqli_error());

 mysqli_query($conn,"UPDATE `borrow` SET `file_status`='returned',`date_return`='$dat',`ti_return`='$tim',`stj`='0' where tin_number = '$tin_number' and date_return='0' and ti_return='0'")or die(mysqli_error());
}

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
		echo "The email message was sent. $empno";
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






