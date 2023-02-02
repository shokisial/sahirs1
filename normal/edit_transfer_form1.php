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
                                <div class="muted pull-left">Transfer From</div>
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
								
								<form method="post" enctype="multipart/form-data">
									
										<div class="control-group">
										File Number :  
                                        <?php  echo '  ' . $edit_emplnumber ?>
                                          </div>
                                        
										<div class="control-group">
										Plot Number  :
                                         <?php  echo '  ' . $edit_firstname   . ' -  ' .  $edit_lastname?>
                                          </div>
                                        
										<div class="control-group">
										Seller : 
                                            <?php echo  $flnm    ?>
                                          </div>
                                       <?php  
												if($edit_emplnumber!=''){	$user_query2 = mysqli_query($conn,"select * from ndc where tin_number=$edit_emplnumber and ndc_stj='3' ")or die(mysqli_error());
										while($row2 = mysqli_fetch_array($user_query2)){  
										$typ=$row2['type']; 
										$buyername=$row2['buyername']; 
										$jbuyername=$row2['jbuyername']; 
										$gdn=$row2['gdn'];
										$jgdn=$row2['jgdn'];
										$fathername=$row2['fathername'];
										$jfathername=$row2['jfathername'];
										$address=$row2['address'];
										$jaddress=$row2['jaddress'];
										$cnic=$row2['cnic'];
										$jcnic=$row2['jcnic'];
										$cntno=$row2['cntno'];
										$jcntno=$row2['jcntno'];
										$ndc_no=$row2['ndc_no'];
										$alt_no=$row2['alt_no'];
										$dealer=$row2['dealer'];
										}
										?> 
										
										<div class="control-group">
										Type : 
                                        <?php echo  '  ' . $typ; ?>
                                          </div>
                                          
										<div class="control-group">
										Buyer Name : 
                                        <?php echo  '  ' . $buyername; ?>
                                          </div>
                                          
                                        <div class="control-group">
										<?php echo $gdn . ' : '; ?> 
                                        <?php echo  '  ' . $fathername; ?>
                                          </div>
										<div class="control-group">
										Address : 
                                        <?php echo  '  ' .  $address; ?>
                                          </div>
                                        <div class="control-group">
										CNIC : 
                                        <?php echo  '  ' .  $cnic;?>
                                          </div>
                                          
                                          <div class="control-group">
										Contact No : 
                                        <?php echo  '  ' .  $cntno; ?>
                                          </div>
                                        <?php if ($typ==='Joint') { ?>
                                        <div class="control-group">
										Joint Name : 
                                        <?php echo  '  ' . $jbuyername; ?>
                                          </div>
                                          
                                        <div class="control-group">
										<?php echo $jgdn . ' : '; ?> 
                                        <?php echo  '  ' . $jfathername; ?>
                                          </div>
										<div class="control-group">
										Joint Add : 
                                        <?php echo  '  ' .  $jaddress; ?>
                                          </div>
                                        <div class="control-group">
										Joint CNIC : 
                                        <?php echo  '  ' .  $jcnic;?>
                                          </div>
                                          
                                          <div class="control-group">
										Joint Contact : 
                                        <?php echo  '  ' .  $jcntno; ?>
                                          </div> 
                                          <?php } ?>
                                         <div class="control-group">
										NDC No : 
                                        <?php echo  '  ' . $ndc_no;   ?>
                                          </div>
                                          
                                         <div class="control-group">
										Alotmat No : 
                                        <?php echo  '  ' . $alt_no;   ?>
                                          </div>
                                          
                                         <div class="control-group">
										Dealer : 
                                        <?php echo  '  ' . $dealer;   ?>
                                          </div>
                                          
                                        
                                        <?php 
                                        
                                        
													$user_query3 = mysqli_query($conn,"select *  from transtbl")or die(mysqli_error());
										while($row3 = mysqli_fetch_array($user_query3)){  
										 $trns_rqno=$row3['trns_rqno']; 
										 $trns_appno=$row3['trns_appno'];
										
										$trns_ldgrow=$row3['trns_ldgrow'];
										$trns_ldgpage=$row3['trns_ldgpage'];
										$trns_ldgbook=$row3['trns_ldgbook'];
																				}   $trns_rqno=$trns_rqno+1; 
										    $trns_appno=$trns_appno+1;
										    
										    $trns_ldgrow=$trns_ldgrow+1;
										    if($trns_ldgrow>3){$trns_ldgrow=1;
										  $trns_ldgpage=$trns_ldgpage+1;
										    }
										    
										    if($trns_ldgpage>200){ 
										  $trns_ldgpage=1;
										  $trns_ldgbook=$trns_ldgbook+1; }
										    
										   ?> 
										
										<div class="control-group">
										TRNS Req No : 
                                        <?php echo  '  ' . $trns_rqno ?>
                                          </div>
                                          <div class="control-group">
										Application No : 
                                        <?php echo  '  ' . $trns_appno ?>
                                          </div>
										<div class="control-group">
										Leadger No : 
                                        <?php echo  '  ' . $trns_ldgbook . ' - ' . $trns_ldgpage . ' - ' .  $trns_ldgrow
                                       ?> 
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
                                       
                                        <div id="div1">Urgent Reciept No. <input type="Number" name="whatever" value="0" onfocus="this.value=''" required>
                                       <br> Urgent Reciept Picture upload:
                                       <input type="file" name="uploadfile" id="uploadfile" > </div>
                                       
                                       <div class="control-group">
								          <b>  Upload Cover Pictures Transfer Time </b>
								        <input type="file" name="uploadfile1" id="uploadfile1" required>
										</div>
										
									
                                            
                                        
											<div class="control-group">
                                          <div class="controls" class="text-left">
												<button name="update" class="btn btn-success" title="Save Trasfer"><i class="icon-save icon-large"></i></button>

                                        <button type="submit" name="update1" class="btn btn-success" formaction="afdt/sellerafd.php" formtarget="_blank" title="Print Transfer" float-right><i class="icon-save icon-large"></i></button>
                                        
                                          </div>
                                        </div>
                                      
                                     
										
                                        <?php } ?>
                                        
                                        
                                </form>
								
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			<?php $tin_number=0; $ndcrpt=0; $urgpic='0.jpg'; $filename=0;
if (isset($_POST['update'])){

$per =$_POST['per'];
$ndcrpt =$_POST['whatever'];

        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "uploads_transfer/".$filename;
        
      
if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }

$dat=0; 
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d'); $tim=date('H:i:s');
$empno = date('Y/m/d');

    $filename1 = $_FILES["uploadfile1"]["name"];     
    $tempname1 = $_FILES["uploadfile1"]["tmp_name"]; 
    $folder1 = "uploads_conspic/".$filename1;
    
if (move_uploaded_file($tempname1, $folder1))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
      
//if($get_id===''){echo 'Select File Number'; exit(); }


     
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Transfer File $edit_emplnumber ')")or die(mysqli_error()); echo 'Done OK' . $rnlno . $aplname;

mysqli_query($conn,"INSERT INTO `transtbl`(`tin_number`, `trns_rqno`, `trns_appno`, `trns_ldgrow`, `trns_ldgpage`, `trns_ldgbook`,`buyername`, `trns_altno`, `trns_verno`, `trns_ndcno`, `trns_stj`, `trns_dealer`, `trns_dat`, `trns_stu`, `trns_per`, `trns_rptno`, `trns_pic`, `act_dat`, `trns_res`,trns_conspic) 

   VALUES ('$edit_emplnumber','$trns_rqno','$trns_appno','$trns_ldgrow','$trns_ldgpage','$trns_ldgbook','$buyername','$alt_no','0','$ndc_no','1','$dealer','$dat','Transfer Complete','$per','$ndcrpt','$filename','0','0','$filename1')");                            
    mysqli_query($conn,"update file set st_trns = 'Pending Ready File' where tin_number = '$tin_number' ")or die(mysqli_error());

mysqli_query($conn,"update ndc set ndc_stj = '4' where tin_number = '$edit_emplnumber' and ndc_stj='3' ")or die(mysqli_error());

mysqli_query($conn,"UPDATE `borrow` SET `date_return`='$dat',`ti_return`='$tim',file_status='returned'  where tin_number = '$edit_emplnumber' and file_status='borrowed'")or die(mysqli_error());
mysqli_query($conn,"INSERT INTO `borrow` (`employee_number`, `tin_number`, `date_borrow`, `ti_barrow`, `file_status`, `date_return`, `ti_return`, `emp_request`, `cmnt`, reason, stj) VALUES ('9', '$edit_emplnumber', '$dat', '$tim', 'borrowed', '0', '0', 'record', 'Pending Ready', 'Pending Ready','1')")or die(mysqli_error());

mysqli_query($conn,"update file set trade_name = '9',status='borrowed' ,stj='4' where tin_number = '$edit_emplnumber' ")or die(mysqli_error());


echo 'Transfer Sucessfully';
//} 
?>



 <script>
  window.location = "edit_transfer1.php"; 
</script>
<?php } ?> 

</body></html>
<?php /*

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
VALUES ('$edit_emplnumber','$trns_rqno','$trns_appno','$trns_ldgrow','$trns_ldgpage','$trns_ldgbook','$buyername','$alt_no','0','$ndc_no','0','0','$empno','$per','$ndcrpt','$filename')")or die(mysqli_error());
//VALUES ('','$trns_rqno','','$trns_ldgrow','','$trns_ldgbook','','','0','','0','0','','','','')")or die(mysqli_error());

<?php
}  
//Mail

?>






