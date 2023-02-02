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
                                <div class="muted pull-left">Transfer Account File</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php $edit_emplnumber=0;
								$query = mysqli_query($conn,"select * from file join transtbl on transtbl.tin_number=file.tin_number where file_id = '$get_id' and transtbl.trns_stj='10' ")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$flnm=$row['file_name'];
								$per=$row['trns_per'];
								$trs=$row['trns_rptno'];
							
								$image=0; $image=$row['trns_pic'];
								?>
								<?php if($edit_emplnumber!=''){ ?>
								<form method="post">
									
										<div class="control-group">
										File Number :  
                                        <?php  echo '  ' . $edit_emplnumber ?>
                                          </div>
                                        
										<div class="control-group">
										Plot Number  :
                                         <?php  echo '  ' . $edit_firstname . ' - ' .  $edit_lastname  ?>
                                          </div>
                                        
										<div class="control-group">
										Name  : 
                                            <?php echo '   ' . $flnm ?>
                                          </div>
                                         
                                         <div class="control-group">
										
                                            <?php echo   'Priority :' . ' - ' . $per . '  -  ' . $trs ?>
                                          </div>
                                          
                                          
                                        
										<?php if($per==='Urgent') { echo "<img src='uploads_transfer/$image' class='thumbnail' width='10' height='10'  >"; } ?>
                                            <div class="control-group">
											<label>Transfer Action:</label>
											
                                          <div class="controls">
                                            <select name="sndat"  class="" required>
                                                
                                 <option value ="NDC Clear"> Transfer Clear</option>
								 <option value ="NDC Not Clear"> Transfer Not Clear</option>				
										
                                            </select>
                                          </div>
                                        </div>
                                       
                                       <div class="control-group">
											
                                          <input type="text" name="res"  placeholder="Reason"  required> 
                                          </div>
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								<?php } ?>
								</div>
                            </div>
                        </div>
                        
                        <?php $image1=0; $query1 = mysqli_query($conn,"select * from `transtbl` where tin_number= '$edit_emplnumber' and trns_stj='1'")or die(mysqli_error());
								$row1 = mysqli_fetch_array($query1);
								{$image1=$row1['trns_pic'];}  ?>
                        <!-- /block -->
                    </div>
					
					<?php echo "<img src='uploads_transfer/$image1' class='thumbnail' width='10' height='10'  >"; ?>
					
			<?php $tin_number=0; $ndcrpt=0;		
if (isset($_POST['update'])){

$tin_number = $row['tin_number'];
$plot_no = $row['plot_no'];
$block = $row['block'];
$bname = $_POST['bname'];
$fname = $_POST['fname'];
$add = $_POST['add'];
$res = $_POST['res'];

$cntno = $_POST['cntno'];
$sndat = $_POST['sndat'];
$per =$_POST['per'];
$ndcrpt =$_POST['whatever'];

if($get_id===''){echo 'Select File Number'; exit(); }
$stj=2; 
if($sndat==='Transfer Not Clear'){ $stj='1'; } 
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
$dat = date('Y/m/d');  $tim = date('h:m:s');
$empno = date('Y/m/d');
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Accounts Checked')")or die(mysqli_error()); echo 'Done' . $rnlno . $aplname;
//,apn_name,cnt_no,ren_no,snd_dat,user,dat,ver_stj,ver_per,ver_urgrpt
//,'$aplname','$cntno','$rnlno','$sndat','$session_id','$empno','1','$per','$urgrpt'
/* mysqli_query($conn,"INSERT INTO `ndc`(`tin_number`, `ndc_dat`, `buyername`, `fathername`, `address`, `cnic`, `cntno`, `dealer`, `per`, `ndc_no`, `user`, `dat`, `ndc_stu`, `ndc_res`, `ndc_stj`, `ndc_rpt`) 
                                 VALUES ('$tin_number','$empno','$bname','$fname','$add','$cnic','$cntno','$sndat','$per','$rnlno','$session_id','$empno','Pending','0','1','$ndcrpt')")or die(mysqli_error());
                                 */
                                 
mysqli_query($conn,"update transtbl set trns_stu = '$sndat',trns_res='$res',act_dat='$dat',trns_stj='2' where tin_number = '$tin_number' and trns_stj='10'")or die(mysqli_error());


mysqli_query($conn,"update file set st_trns = '$sndat' where tin_number = '$tin_number' ")or die(mysqli_error());
mysqli_query($conn,"UPDATE `borrow` SET `date_return`='$dat',`ti_return`='$tim',file_status='returned'  where tin_number = '$tin_number' and file_status='borrowed'")or die(mysqli_error());
mysqli_query($conn,"update file set trade_name = '0',status='returned' ,stj='$stj' where tin_number = '$tin_number' ")or die(mysqli_error());

//mysqli_query($conn,"update verification set ver_stj = '5' where tin_number = '$tin_number' and ver_stj='4'")or die(mysqli_error());


echo 'Transfer Account Entry Sucessfully';
//} 
?>
 


 <?php  $from1=0;  
			$user_query2 = mysqli_query($conn,"select * from staff where username='$user_name'")or die(mysqli_error());
			 while($row2 = mysqli_fetch_array($user_query2)){
			 $from1= $row2['email'];} ?>
<?php  $from2=0;  
			$user_query3 = mysqli_query($conn,"select * from staff where staff_id=7")or die(mysqli_error());
			 while($row3 = mysqli_fetch_array($user_query3)){
			 $from2= $row3['email'];} ?>											
<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "$from1";
    $to = "$from2";
    $subject = "File sended";
    $message = "File No - $tin_number - Plot # $plot_no - $block Transfer  by $user_name - $from1 - by - $from2";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
		echo "The email message was sent.";
    } else {
    	echo "The email message was not sent.";
    }
    ?>


<script>
  window.location = "edit_transfer4.php"; 
</script>
 <?php } ?>

</body></html>




