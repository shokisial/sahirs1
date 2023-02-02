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
								?>
								
								<form method="post">
									
										<div class="control-group">
										<label>File Number </label>
                                          <div class="controls">
                                            <?php  echo $edit_emplnumber ?>
                                          </div>
                                        </div>
										<div class="control-group">
										<label>Plot Number </label>
                                          <div class="controls">
                                            <?php  echo $edit_firstname ?>
                                          </div>
                                        </div>
										
										<div class="control-group">
										<label>Block </label>
                                          <div class="controls">
                                            <?php  echo $edit_lastname ?>
                                          </div>
                                        </div>
										<div class="control-group">
											<label>Employee Name:</label>
											
                                          <div class="controls">
                                            <select name="region"  class="" required>
                                                <?php  
													$user_query1 = mysqli_query($conn,"select * from staff")or die(mysqli_error());
													while($row1 = mysqli_fetch_array($user_query1)){
												 ?>
                                             	<option value ="<? echo $row1['staff_id']; ?> "> <? echo $row1['username']; ?></option>
												
											<?  } ?>
                                            </select>
                                          </div>
                                        </div>
										
								
										
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								
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

/*$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$emplnumber = $_POST['emplnumber'];
$status = $_POST['status'];
$username =$firstname.'.'.$lastname;
$password=12345;;*/


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






