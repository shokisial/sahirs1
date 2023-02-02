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
  
 
 <script type="text/javascript">
  function showfield1(name){
    if(name=='Joint')document.getElementById('div2').style.display="block";
    else document.getElementById('div2').style.display="none";
  }
 
 function hidefield1() {
 document.getElementById('div2').style.display='none';
 }
  </script>
  
</head>    
 <body onload="hidefield(); hidefield1();">  
   <div class="row-fluid">
 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">N.D.C Request From</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php //$edit_emplnumber='';
								$query = mysqli_query($conn,"select * from file inner join verification on verification.tin_number=file.tin_number where verification.ver_stj='3' and file.file_id = '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$flnm=$row['file_name'];
								$expdt=$row['ver_exp'];
								$snd_dat = $row['snd_dat']; 
								$ver_stu = $row['ver_stu']; 
								$ver_res = $row['ver_res'];
								$ver_acstu = $row['ver_acstu']; 
								$ver_acres = $row['ver_acres'];
								
								 if($edit_emplnumber!='') { ?>
								<form method="post" enctype="multipart/form-data">
									
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
                                            <?php echo '   ' .  $edit_lastname . ' - ' . 'Dealer:  ' . '  ' . $snd_dat ?>
                                         
                                          
                                        
                                        	<div class="control-group">
										Alctn Status  : 
                                            <?php echo '   ' .  $ver_stu . ' -  ' . $ver_res ?>
                                          </div>
                                        
                                        <div class="control-group">
										Account Status  : 
                                            <?php echo '   ' .  $ver_acstu . ' -  ' . $ver_acres ?>
                                          </div>
									</div>
                                        <div class="control-group">
									 
                                            <?php $empno1 = date('Y/m/d'); echo '   ' .  'Expiry Date' . ' -  ' . $expdt ?>
                                          </div>
                                          
                                      <? if($expdt>=$empno1){ ?>    
									<div class="control-group">
											
                                          <input type="number" name="altno"  placeholder="Allocation / Allotment No"  required> 
                                          </div>
                                          
                                          <div class="control-group"> Alotment Date
										  <input type="date" id="altdat" name="altdat" required>	
                                          </div>
                                          
                                        
										<div class="control-group">
											
                                          <input type="text" name="bname"  placeholder="Buyer Name"  style="text-transform: uppercase" required> 
                                          </div>
                                          
                                          <div class="control-group">
											<label>Guardian:</label>
											
                                          <div class="controls">
                                            <select name="gdn"  class=""  required>
                                        <option value="S/O">S/O</option>
                                        <option value="D/O">D/O</option>
                                        <option value="W/O">W/O</option>
                                            </select>
                                          </div>
                                        </div>
                                        
                                          <div class="control-group">
											
                                          <input type="text" name="fname"  placeholder="Father/ Husband Name"  style="text-transform: uppercase" required> 
                                          </div>
                                          <div class="control-group">
											
                                          <input type="text" name="add"  placeholder="Address"  style="text-transform: uppercase" required> 
                                          </div>
                                        
                                        <div class="control-group">
											
                                          <input type="text" name="cnic"  placeholder="CNIC #"  required> 
                                          </div>
                                          
								        <div class="control-group">
                                          <input type="text" name="cntno"  placeholder="Contact No" required> 
                                        </div>
                                        
                                        
                                        <div class="control-group">
											<label>Buyer Type</label>
											
                                          <div class="controls">
                                            <select name="type"  class="" onchange="showfield1(this.options[this.selectedIndex].value)"  required>
                                        <option value="Single">Single</option>
                                        <option value="Joint">Joint</option>
                                        <option value="Joint">Open</option>
                                            </select>
                                          </div>
                                        </div>
                                        
                                        <div id="div2">
                                        <div >Joint Name. <input type="text" name="jbname" value="0" placeholder="Joint Name" onfocus="this.value=''" style="text-transform: uppercase" required><br>
                                        </div>
                                        
                                        <div class="control-group">
											<label>Joint Guardian:</label>
											
                                          <div class="controls">
                                            <select name="jgdn"  class=""  required>
                                        <option value="0"></option>
                                        <option value="S/O">S/O</option>
                                        <option value="D/O">D/O</option>
                                        <option value="W/O">W/O</option>
                                            </select>
                                          </div>
                                        </div>
                                       
                                       <div class="control-group">
										 Joint Father/Husband Name	
                                          <input type="text" name="jfname"  placeholder="Joint Father/ Husband Name" value="0" onfocus="this.value=''"  style="text-transform: uppercase" required> 
                                          </div>
                                          <div class="control-group">
										 Joint Address	
                                          <input type="text" name="jadd"  placeholder="Joint Address" value="0" onfocus="this.value=''"  style="text-transform: uppercase" required> 
                                          </div>
                                        
                                        <div class="control-group">
										Joint CNIC #	
                                          <input type="text" name="jcnic"  placeholder="Joint CNIC #" value="0"  onfocus="this.value=''" required> 
                                          </div>
                                        Joint Contact No  
								        <div class="control-group">
                                          <input type="text" name="jcntno"  placeholder="Joint Contact No" value="0" onfocus="this.value=''" required> 
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
                                       
                                        <div id="div1">Urgent Reciept No. <input type="Number" name="whatever" value="0" onfocus="this.value=''" pattern=".{6}." title="Eight or more characters" required><br>
                                        Urgent Reciept Picture upload:
                                        <input type="file" name="uploadfile" id="uploadfile" >
                                        </div>
                                        
									<div class="control-group">
											<label>Wave OFF:</label>
											
                                          <div class="controls">
                                            <select name="wave">
                                        <option value="Nill">Nill</option>
                                        <option value="Wave OFF">Wave OFF</option>
                                           </select>
                                           <br>Please Upload Wave OFF Permission 
                                          </div>
                                        </div>
                                       
                                        <div id="div2">
                                        <input type="file" name="uploadfile1" id="uploadfile1"></div> 
                                        	
										
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
							<? } 
							else { ?>
							<form method="post" enctype="multipart/form-data">
								
							<div class="control-group">
										Verification Renwal Number:	
                                          <input type="number" name="vrnno"  placeholder="Verification Renwal Number"  required> 
                                        <br>  Renewal Reciept Picture upload:
                                        <input type="file" name="uploadfile5" id="uploadfile5" required>
                                          </div>
                                  
                                <div class="control-group">
                                          <div class="controls">
												<button name="update123" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div> </form> 
						<? }?>
						
						<? }?>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
<? 
if (isset($_POST['update123'])){
$vrnno=0; $tin_number = $row['tin_number'];
$vrno = $_POST['vrnno'];
$filename5=0;
$filename5 = $_FILES["uploadfile5"]["name"];
        $tempname5 = $_FILES["uploadfile5"]["tmp_name"];    
        $folder5 = "uploads_verexp/".$filename5;
        
        if (move_uploaded_file($tempname5, $folder5))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }

$next_due_date = date('Y/m/d', strtotime("+15 days"));
echo $next_due_date;
      
mysqli_query($conn,"update verification set ver_exprnl = '$vrno',ver_exppic='$filename5',ver_exp='$next_due_date' where tin_number = '$tin_number' and ver_stj='3'")or die(mysqli_error());
?>
<script>
  window.location = "edit_ndc1.php"; 
</script>
<? } ?>
					
			<?php $tin_number=0; $ndcrpt=0;	$filename=0; $filename1=0; 	
if (isset($_POST['update'])){

$tin_number = $row['tin_number'];
$plot_no = $row['plot_no'];
$block = $row['block'];

$altno = $_POST['altno'];
$altdat = $_POST['altdat']; $newDate = date("d/m/Y", strtotime($altdat));
$altdat=$newDate;
$bname = $_POST['bname'];  $bname = strtoupper($bname);
$fname = $_POST['fname'];  $fname = strtoupper($fname);
$add = $_POST['add'];      $add = strtoupper($add);
$cnic = $_POST['cnic'];   
$cntno = $_POST['cntno'];

$type = $_POST['type'];
$jbname = $_POST['jbname']; $jbname = strtoupper($jbname);
$jfname = $_POST['jfname']; $jfname = strtoupper($jfname);
$jadd = $_POST['jadd'];     $jadd = strtoupper($jadd);
$jcnic = $_POST['jcnic'];
$jcntno = $_POST['jcntno'];
$jgdn=$_POST['jgdn'];


//$sndat = $_POST['sndat'];
$per =$_POST['per'];
$ndcrpt =$_POST['whatever'];
$gdn=$_POST['gdn'];
$wave=$_POST['wave'];

        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "uploads_ndc/".$filename;
        
        $filename1 = $_FILES["uploadfile1"]["name"];
        $tempname1 = $_FILES["uploadfile1"]["tmp_name"];    
        $folder1 = "uploads_waveoff/".$filename1;
        
        
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



mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Edit User $username from $region Region')")or die(mysqli_error()); echo 'Done' . $rnlno . $aplname;
//,apn_name,cnt_no,ren_no,snd_dat,user,dat,ver_stj,ver_per,ver_urgrpt
//,'$aplname','$cntno','$rnlno','$sndat','$session_id','$empno','1','$per','$urgrpt'
 mysqli_query($conn,"INSERT INTO `ndc`(`tin_number`, `ndc_dat`, alt_no, alt_dat,`buyername`,gdn, `fathername`, `address`, `cnic`, `cntno`, type , `jbuyername`,jgdn, `jfathername`, `jaddress`, `jcnic`, `jcntno`,`dealer`, `per`, `ndc_no`, `user`, `dat`, `ndc_stu`, `ndc_res`, `ndc_stj`, `ndc_rpt`,ndc_urgpic,ndc_waveoff,ndc_waveoffpic) 
                                 VALUES ('$tin_number','$empno','$altno','$altdat', '$bname','$gdn','$fname','$add','$cnic','$cntno', '$type', '$jbname','$jgdn','$jfname','$jadd','$jcnic','$jcntno','$snd_dat','$per','$rnlno','$session_id','$empno','Pending','0','1','$ndcrpt','$filename','$wave' ,'$filename1')")or die(mysqli_error());
mysqli_query($conn,"update file set st_ndc = 'Pending' where tin_number = '$tin_number' ")or die(mysqli_error());

mysqli_query($conn,"update verification set ver_stj = '4' where tin_number = '$tin_number' and ver_stj='3'")or die(mysqli_error());


echo 'N.D.C Sucessfully';
//} 
?>

<?php
if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
?>

<?php
if (move_uploaded_file($tempname1, $folder1))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
?>

 <script>
  window.location = "edit_ndc1.php"; 
</script>
<? } ?> 

</body></html>
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






