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
                                <div class="muted pull-left">Transfer Set From</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php $edit_emplnumber=0;
								$query = mysqli_query($conn,"select * from file where file_id = '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$address = $row['address'];
								$ct = $row['city'];  
								$scnic = $row['cnicno']; 
								$cat = $row['cat'];
								$edit_lastname = $row['block'];
								$flnm=$row['file_name'];
								$jflnm=$row['jfile_name'];
								$flfname=$row['fathername'];
								$jflfname=$row['jfathername'];
								$flcat=$row['file_category'];
								$type=$row['file_type'];
								
								$jaddress = $row['jaddress'];
								$jct = $row['jcity'];  
								$jscnic = $row['jcnicno']; 
								
								
								?>
								
								<form method="post" action="">
									
										<div class="control-group">
										File Number :  
                                        <?php  echo '  ' . $edit_emplnumber ?>
                                          </div>
                                        
										<div class="control-group">
										Plot Number  :
                                         <?php  echo '  ' . $edit_firstname   . ' -  ' .  $edit_lastname . ' - ' . $flcat ?>
                                          </div>
                                        <input type="hidden" name="plotno" value="<? echo $edit_firstname; ?>">
                                       
                                        <input type="hidden" name="block" value="<? echo $edit_lastname; ?>">
									
									   <input type="hidden" name="flcat" value="<? echo $flcat; ?>">
									   
										<div class="control-group">
										Seller : 
                                            <?php echo  $flnm    ?>
                                <input type="hidden" name="seller" value="<? echo $flnm; ?>">
                                <input type="hidden" name="jseller" value="<? echo $jflnm; ?>">
                                <input type="hidden" name="flfname" value="<? echo $flfname; ?>">
                                <input type="hidden" name="jflfname" value="<? echo $jflfname; ?>">
                                <input type="hidden" name="address" value="<? echo $address; ?>">
                                <input type="hidden" name="ct" value="<? echo $ct; ?>">
                                <input type="hidden" name="scnic" value="<? echo $scnic; ?>">
                                <input type="hidden" name="cat" value="<? echo $cat; ?>">
                                <input type="hidden" name="alt_no" value="<? echo $alt_no; ?>">
                                <input type="hidden" name="typ" value="<? echo $type; ?>">
                                
                                <input type="hidden" name="jaddress" value="<? echo $jaddress; ?>">
                                <input type="hidden" name="jct" value="<? echo $jct; ?>">
                                <input type="hidden" name="jscnic" value="<? echo $jscnic; ?>">
                                     
                                          </div>
                                       <?php  
												if($edit_emplnumber!=''){	$user_query2 = mysqli_query($conn,"select * from ndc where tin_number=$edit_emplnumber and ndc_stj<'5'")or die(mysqli_error());
										while($row2 = mysqli_fetch_array($user_query2)){  
										
										$buyername=$row2['buyername']; 
										$fathername=$row2['fathername']; 
										$address=$row2['address']; 
										$cty=$row2['city'];   
										$cnic=$row2['cnic'];
										$cntno=$row2['cntno'];
										$type=$row2['type'];
										
										
										$jbuyername=$row2['jbuyername']; 
										$jfathername=$row2['jfathername']; 
										$jaddress=$row2['jaddress'];  
										$jcty=$row2['jcity'];   
										$jcnic=$row2['jcnic'];
										$jcntno=$row2['jcntno'];
										
										
										$ndc_no=$row2['ndc_no'];
										$gdn=$row2['gdn'];
										$alt_no=$row2['alt_no'];
										$alt_dat=$row2['alt_dat'];
										}
										?> 
										
										<div class="control-group">
										Buyer Name : 
                                        <?php echo  '  ' . $buyername; ?>
                                          </div>
                                        <input type="hidden" name="bname" value="<? echo $buyername; ?>" > 
                                        
                                        <div class="control-group">
									 
                                        <?php echo  '  ' . $gdn . '  ' . ' :  ' .$fathername; ?>
                                          </div>
                                        <input type="hidden" name="fname" value="<? echo $fathername; ?>" >  
                                          
										<div class="control-group">
										Address : 
                                        <?php echo  '  ' .  $address; ?>
                                          </div>
                                          
                                       <input type="hidden" name="add" value="<? echo $address; ?>" >  
                                        
                                        <div class="control-group">
									    City : 
                                        <?php echo  '  ' .  $cty; ?>
                                          </div>
                                          
                                       <input type="hidden" name="cty" value="<? echo $cty; ?>" >    
                                       
                                        <div class="control-group">
										CNIC : 
                                        <?php echo  '  ' .  $cnic;?>
                                          </div>
                                         
                                         <input type="hidden" name="cnic" value="<? echo $cnic; ?>" > 
                                         
                                          <div class="control-group">
										Contact No : 
                                        <?php echo  '  ' .  $cntno; ?>
                                          </div>
                                         
                                         <div class="control-group">
										Type : 
                                        <?php echo  '  ' .  $type . '       ' . '   ---    ' . 'Size : ' .  $cat; ?>
                                          </div>
                                         
                                       <? if($type==='Joint'){ ?>  
                                         <div class="control-group">
										Joint Buyer Name : 
                                        <?php echo  '  ' . $jbuyername; ?>
                                          </div>
                                        <input type="hidden" name="jbname" value="<? echo $jbuyername; ?>" > 
                                        
                                        <div class="control-group">
									 
                                        <?php echo  '  ' . $jgdn . '  ' . ' :  ' .$jfathername; ?>
                                          </div>
                                        <input type="hidden" name="jfname" value="<? echo $jgdn . ' ' . $jfathername; ?>" >  
                                          
										<div class="control-group">
										Address : 
                                        <?php echo  '  ' .  $jaddress; ?>
                                          </div>
                                          
                                       <input type="hidden" name="jadd" value="<? echo $jaddress; ?>" >  
                                          
                                       <div class="control-group">
										City: 
                                        <?php echo  '  ' .  $cty; ?>
                                          </div>
                                          
                                       <input type="hidden" name="jcty" value="<? echo $cty; ?>" >  
                                          
                                          
                                        <div class="control-group">
										CNIC : 
                                        <?php echo  '  ' .  $jcnic;?>
                                          </div>
                                         
                                         <input type="hidden" name="jcnic" value="<? echo $jcnic; ?>" > 
                                         
                                          <div class="control-group">
										Contact No : 
                                        <?php echo  '  ' .  $jcntno; ?>
                                          </div>
                                       <? } ?>  
                                         
                                         <div class="control-group">
										NDC No : 
                                        <?php echo  '  ' . $ndc_no;   ?>
                                          </div>
                                        
                                       <div class="control-group">
										Alotment No : 
                                        <?php echo  '  ' . $alt_no;   ?>
                                          </div>
                                          
                                          <div class="control-group">
										Alotment Date : 
                                        <?php echo  '  ' . $alt_dat;   ?>
                                          </div>
                                          
                                       <input type="hidden" name="altdat" value="<? echo $alt_dat; ?>">
                                       <input type="hidden" name="altno" value="<? echo $alt_no; ?>">
                                     
                                       <? /*   
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
                                            <select name="per"  class="" onchange="showfield(this.options[this.selectedIndex].value)"  required>
                                        <option value="Normal">Normal</option>
                                        <option value="Urgent">Urgent</option>
                                            </select>
                                          </div>
                                        </div>
                                       
                                        <div id="div1">Urgent Reciept No. <input type="Number" name="whatever" value="0"></div>
                                        */ ?>
											<div class="control-group">
                                          <div class="controls">
										
										<button type="submit" name="update" class="btn btn-success" formaction="afdt/afdtransferor.php" formtarget="_blank" title="Affidavit by the Transferor"><i class="icon-save icon-large"></i></button>

                                        <button type="submit" name="update1" class="btn btn-success" formaction="afdt/sellerafd.php" formtarget="_blank" title="Affidavit by the Transferee"><i class="icon-save icon-large"></i></button>

                                        <button type="submit" name="update2" class="btn btn-success" formaction="afdt/undtax.php" formtarget="_blank" title="Seller Tax Under taking"><i class="icon-save icon-large"></i></button>

                                       <button type="submit" name="update3" class="btn btn-success" formaction="afdt/bundtax.php" formtarget="_blank" title="Buyer Tax Under taking"><i class="icon-save icon-large"></i></button>

                                        <button type="submit" name="update4" class="btn btn-success" formaction="afdt/house.php" formtarget="_blank" title="House Under taking"><i class="icon-save icon-large"></i></button>
                                                                                  </div>
                                                                                  <button type="submit" name="update8" class="btn btn-success" formaction="afdt/purct.php" formtarget="_blank" title="Purchase Consent"><i class="icon-save icon-large"></i></button>
                                                                                 
                                        </div>
                                        
                                        
                                        <div class="control-group">
                                          <div class="controls">
                                       <? /*  <button type="submit" name="update5" class="btn btn-success" formaction="afdt/misplace.php" formtarget="_blank" title="Misplace"><i class="icon-save icon-large"></i></button> 
                                         
                                         <button type="submit" name="update6" class="btn btn-success" formaction="afdt/abroad.php" formtarget="_blank" title="Abroad"><i class="icon-save icon-large"></i></button> */ ?>
                                              
                                        </div>
                                        </div>      
                                        <? } ?>
                                </form>
								
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			<?php 

			
			/*$tin_number=0; $ndcrpt=0;		
if (isset($_POST['update'])){

$tin_number = $row['tin_number'];

$altno = $_POST['altno']; ?>
 <script>
  window.location = "edit_transfer1.php"; 
</script>   
    
<? } 
/*


/*$fname = $_POST['fname'];
$add = $_POST['add'];
$cnic = $_POST['cnic'];

$cntno = $_POST['cntno'];


$sndat = $_POST['sndat'];
$per =$_POST['per'];
$ndcrpt =$_POST['whatever'];

if($get_id===''){echo 'Select File Number'; exit(); }


$dat=0; 
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d');
$empno = date('Y/m/d');
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Edit User $username from $region Region')")or die(mysqli_error()); echo 'Done' . $rnlno . $aplname;
//,apn_name,cnt_no,ren_no,snd_dat,user,dat,ver_stj,ver_per,ver_urgrpt
//,'$aplname','$cntno','$rnlno','$sndat','$session_id','$empno','1','$per','$urgrpt'
 mysqli_query($conn,"INSERT INTO `transtbl`(`tin_number`, `trns_rqno`, `trns_appno`, `trns_ldgrow`, `trns_ldgpage`, `trns_ldgbook`, `buyername`, `trns_altno`, `trns_verno`, `trns_ndcno`, `trns_ndc`, `trns_dat`,trns_per,trns_rptno) VALUES ('$edit_emplnumber','$trns_rqno','$trns_appno','$trns_ldgrow','$trns_ldgpage','$trns_ldgbook','$buyername','$altno','0','$ndc_no','0','$empno','$per','$ndcrpt')")or die(mysqli_error());
mysqli_query($conn,"update file set st_trns = 'Done',st_ver='0',st_ndc='0' where tin_number = '$tin_number' ")or die(mysqli_error());

mysqli_query($conn,"update ndc set ndc_stj = '3' where tin_number = '$tin_number' ")or die(mysqli_error());


mysqli_query($conn,"update transtbl set trns_stu = 'Done' where tin_number = '$tin_number' ")or die(mysqli_error());


echo 'Transfer Sucessfully';
//} 
?>
 
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






