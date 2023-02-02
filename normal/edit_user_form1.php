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
                                <div class="muted pull-left">Verification File</div>
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
								$jflnm=$row['jfile_name'];
								$ct=$row['cat'];
								
								$v_num=115;
								$query200 = mysqli_query($conn,"select * from `verification` ")or die(mysqli_error());
								$row200 = mysqli_fetch_array($query200);
								
								$v_num=$row200['ver_id'];
								
								?>
								<?php if($edit_emplnumber!=''){ ?>
								<form method="post" enctype="multipart/form-data">
									
									    <div class="control-group">
										Verification Number :  
                                        <?php  echo '  ' . $v_num+1 ?>
                                          </div>
                                          
                                          
										<div class="control-group">
										File Number :  
                                        <?php  echo '  ' . $edit_emplnumber ?>
                                          </div>
                                        
										<div class="control-group">
										Plot Number  :
                                         <?php  echo '  ' . $edit_firstname . ' - ' . $edit_lastname ?>
                                          </div>
                                          
                                        <div class="control-group">
										Category  :
                                         <?php  echo '  ' . $ct;?>
                                          </div> 
                                        
										<div class="control-group">
										Name  : 
                                            <?php echo '   ' .  $flnm ?>
                                          </div>
                                          
                                        <div class="control-group">
										Joint Name  : 
                                            <?php echo '   ' .  $jflnm ?>
                                          </div>
                                        
										
										<div class="control-group">
											
                                          <input type="text" name="aplname"  placeholder="Applicant Name" style="text-transform: uppercase" required> 
                                          </div>
                                        
								        <div class="control-group">
                                          <input type="number" name="cntno"  placeholder="Contact No" required> 
                                        </div>
                                        
                                            <div class="control-group">
											<label>Dealer Name:</label>
											
                                          <div class="controls">
                                            <select name="sndat"  class="" required>
                                                <?php  
													$user_query1 = mysqli_query($conn,"select * from dealertbl where active='0' order by d_name Asc")or die(mysqli_error());
													while($row1 = mysqli_fetch_array($user_query1)){
												 ?>
                                             	<option value ="<?php echo $row1['d_code']; ?> "> <?php echo $row1['d_name']; ?></option>
												
											<?php  } ?>
                                            </select>
                                          </div>
                                        </div>
                                        
                                    <div class="control-group">
											<label>Periority:</label>
											
                                          <div class="controls">
                                            <select name="per"  class="" onchange="showfield(this.options[this.selectedIndex].value)"  required>
                                        <option value="Normal">Normal</option>
                                        <option value="Urgent">Urgent</option>
                                            </select>
                                          </div>
                                        </div>
                                                                                      
                                        <div id="div1">Urgent Reciept No. <input type="Number" id="whatever" name="whatever"  value="0" onfocus="this.value=''" pattern=".{6}." title="6 Digit Only" required><br>
                                Urgent Reciept Picture upload:
                                <input type="file" name="uploadfile" id="uploadfile" >
                             </div>

											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large" title="Save"></i></button>

                                          </div>
                                        </div>
                                </form>
								<?php }	?>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			<?php  $urgrpt=0; $urgpic='0' ; $filename=0;		
if (isset($_POST['update'])){

$tin_number = $row['tin_number'];
$plot_no = $row['plot_no'];
$block = $row['block'];
$aplname = $_POST['aplname'];
$aplname = strtoupper($aplname);
$cntno = $_POST['cntno'];
$sndat = $_POST['sndat'];
$per =$_POST['per'];
$urgrpt =$_POST['whatever'];

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "uploads_ver/".$filename;
        
        
if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }

       

/*$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$emplnumber = $_POST['emplnumber'];
$status = $_POST['status'];
$username =$firstname.'.'.$lastname;
$password=12345;;*/

$user_query11 = mysqli_query($conn,"SELECT ver_id FROM `verification`")or die(mysqli_error());
						while($row11 = mysqli_fetch_array($user_query11)){
											
                                             $rnlno = $row11['ver_id']; }
                                             $rnlno=$rnlno+1;
								echo 'Reference No' . $rnlno; 
$dat=0; 
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d');
$empno = date('Y/m/d');



mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Verfication Pending')")or die(mysqli_error()); echo 'Done' . $rnlno . $aplname;
//mysqli_query($conn,"update borrow set date_return = '$dat',file_status='return' where tin_number = '$tin_number' and date_return='0000-00-00 00:00:00
//'")or die(mysqli_error());
//if($session_id==='7'){ ,cnt_no,ren_no,snd_dat,user,dat
//,'$cntno','$rnlno','$sndat','$username','$dat'

//,ver_dat,apn_name,cnt_no,ren_no,snd_dat,user,dat,ver_stj,ver_per,ver_urgrpt,ver_urgpic
//,'$empno','$aplname','$cntno','$rnlno','$sndat','$session_id','$empno','1','$per','$urgrpt','$filename'
// mysqli_query($conn,"insert into verification (tin_number) values('$tin_number')")or die(mysqli_error());

mysqli_query($conn,"INSERT INTO `verification`(`tin_number`, `ver_dat`, `apn_name`, `cnt_no`, `ren_no`, `snd_dat`, `user`, `dat`, `ver_stu`, `ver_res`, `ver_acstu`, `ver_acres`, `ver_stj`, `ver_per`, `ver_urgrpt`, `ver_urgpic`, `ver_letigationpic`, `ver_exp`)
VALUES ('$tin_number','$dat','$aplname','$cntno','$rnlno','$sndat','$session_id','0','Pending Verification','0','0','0','1','$per','$urgrpt','$filename','0','0')");


mysqli_query($conn,"update file set st_ver = 'Pending Verification', stj='1' where tin_number = '$tin_number' ")or die(mysqli_error());

echo 'File Verification Sucessfully';

//File upload 
?>







 <?php  $from1=0;  
			$user_query2 = mysqli_query($conn,"select * from staff where username='$user_name'")or die(mysqli_error());
			 while($row2 = mysqli_fetch_array($user_query2)){
			 $from1= $row2['email'];} ?>
<?php  $from2=0;  
			$user_query3 = mysqli_query($conn,"select * from staff where staff_id='$empno'")or die(mysqli_error());
			 while($row3 = mysqli_fetch_array($user_query3)){
			 $from2= $row3['email'];}  
			 ?>											
<?php
    
    $from = "$from1";
    $to = "$from2";
    $subject = "File sended";
    $message = "New Verifiction File send by $user_name ";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
		echo "The email message was sent.";
    } else {
    	echo "The email message was not sent.";
    }
    ?>

<script>
  window.location = "edit_user1.php"; 
</script>
<?php } ?> 

</body></html>





