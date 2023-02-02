<html>
<head>
    <script type="text/javascript">
  function showfield(name){
    if(name=='Urgent')document.getElementById('div1').style.display="block";
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
                                <div class="muted pull-left">N.D.C Form</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php $edit_emplnumber=0;
								$query = mysqli_query($conn,"select * from file where file_id = '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$flnm=$row['file_name'];
								?>
								
								<form method="post">
									
										<div class="control-group">
										File Number :  
                                        <?php  echo '  ' . $edit_emplnumber ?>
                                          </div>
                                        
										<div class="control-group">
										Plot Number  :
                                         <?php  echo '  ' . $edit_firstname . ' - ' . $flnm ?>
                                          </div>
                                        
										<div class="control-group">
										Block  : 
                                            <?php echo '   ' .  $edit_lastname ?>
                                          </div>
                                        
										
										<div class="control-group">
											
                                          <input type="text" name="buyername"  placeholder="Buyer Name" required> 
                                          </div>
                                          
                                        <div class="control-group">
                                          <input type="text" name="fathername"  placeholder="Fatherm / Husband Name" required> 
                                          </div>
                                          
                                        <div class="control-group">
											
                                          <input type="text" name="cnic"  placeholder="CNIC No." required> 
                                          </div>
                                          
                                         <div class="control-group">
											
                                          <input type="multitext" name="address"  placeholder="address" required> 
                                          </div>

								        <div class="control-group">
                                          <input type="text" name="cntno"  placeholder="Contact No" required> 
                                        </div>
                                        
                                            <div class="control-group">
											<label>Dealer Name:</label>
											
                                          <div class="controls">
                                            <select name="sndat"  class="" required>
                                                <?php  
													$user_query1 = mysqli_query($conn,"select * from dealertbl")or die(mysqli_error());
													while($row1 = mysqli_fetch_array($user_query1)){
												 ?>
                                             	<option value ="<? echo $row1['d_code']; ?> "> <? echo $row1['d_name']; ?></option>
												
											<?  } ?>
                                            </select>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
											<label>Periority:</label>
											
                                          <div class="controls">
                                            <select name="per"  class="" onchange="showfield(this.options[this.selectedIndex].value)" required>
                                                
                                        <option value ="Normal">Normal</option>
                                        <option value ="Urgent">Urgent</option>
												
										
                                            </select>
                                          </div>
                                        </div>
                                        <div id="div1">Urgent Reciept No. <input type="Number" name="whatever" autofocus required/></div>
										
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
					
			<?php $tin_number=0;		
if (isset($_POST['update'])){

$tin_number = $row['tin_number'];
$plot_no = $row['plot_no'];
$block = $row['block'];
$buyername = $_POST['buyername'];
$fathername = $_POST['fathername'];
$cnic = $_POST['cnic'];
$address = $_POST['address'];
$cntno = $_POST['cntno'];
$sndat = $_POST['sndat'];
$per = $_POST['per'];
$urgrpt =$_POST['whatever'];

if($get_id===''){echo 'Select File Number'; exit(); }

/*$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$emplnumber = $_POST['emplnumber'];
$status = $_POST['status'];
$username =$firstname.'.'.$lastname;
$password=12345;;*/

$user_query11 = mysqli_query($conn,"SELECT ndc_id FROM `ndc`")or die(mysqli_error());
						while($row11 = mysqli_fetch_array($user_query11)){
											
                                             $rnlno = $row11['ndc_id']; }
                                             $rnlno=$rnlno+1;
								echo 'Reference No' . $rnlno; 
$dat=0; 
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d');
$empno = date('Y/m/d');
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Edit User $username from $region Region')")or die(mysqli_error()); echo 'Done' . $rnlno . $tin_number;

//, `ndc_dat`, `buyername`, `fathername`, `address`, `cnic`, `cntno`, `dealer`, `per`, `ndc_no`, `user`, `dat`, `ndc_stu`, `ndc_res`, `ndc_stj`, ndc_rpt
// vlaue ,'$empno','$buyername','$fathername','$address','$cnic','$cntno','$sndat','$per','$rnlno','$session_id','$empno','Pending','0','1','$urgrpt'

// mysqli_query($conn,"INSERT INTO `ndc`(`tin_number`) VALUES ('$tin_number')
 //                                )")or die(mysqli_error());
                                 
//,'$buyername','$fathername,'$address',$cnic','$cntno','$sndat','$per','$rnlno','$session_id','$empno','Pending','0','1'
mysqli_query($conn,"update file set st_ndc = 'Pending' where tin_number = '$tin_number' ")or die(mysqli_error());

echo 'NDC Applied Sucessfully';
//} 
?>
 <script>
  window.location = "edit_ndc1.php"; 
</script>
<? } ?> 
<? /*

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

<?php
}  
//Mail

?>






