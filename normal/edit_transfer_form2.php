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
                                        <input type="hidden" name="plotno" value="<?php echo $edit_firstname; ?>">
                                       
                                        <input type="hidden" name="block" value="<?php echo $edit_lastname; ?>">
									
									   <input type="hidden" name="flcat" value="<?php echo $flcat; ?>">
									   
										<div class="control-group">
										Seller : 
                                            <?php echo  $flnm    ?>
                                <input type="hidden" name="seller" value="<?php echo $flnm; ?>">
                                <input type="hidden" name="jseller" value="<?php echo $jflnm; ?>">
                                <input type="hidden" name="flfname" value="<?php echo $flfname; ?>">
                                <input type="hidden" name="jflfname" value="<?php echo $jflfname; ?>">
                                <input type="hidden" name="address" value="<?php echo $address; ?>">
                                <input type="hidden" name="ct" value="<?php echo $ct; ?>">
                                <input type="hidden" name="scnic" value="<?php echo $scnic; ?>">
                                <input type="hidden" name="cat" value="<?php echo $cat; ?>">
                                <input type="hidden" name="alt_no" value="<?php echo $alt_no; ?>">
                                <input type="hidden" name="typ" value="<?php echo $type; ?>">
                                
                                <input type="hidden" name="jaddress" value="<?php echo $jaddress; ?>">
                                <input type="hidden" name="jct" value="<?php echo $jct; ?>">
                                <input type="hidden" name="jscnic" value="<?php echo $jscnic; ?>">
                                     
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
                                        <input type="hidden" name="bname" value="<?php echo $buyername; ?>" > 
                                        
                                        <div class="control-group">
									 
                                        <?php echo  '  ' . $gdn . '  ' . ' :  ' .$fathername; ?>
                                          </div>
                                        <input type="hidden" name="fname" value="<?php echo $fathername; ?>" >  
                                          
										<div class="control-group">
										Address : 
                                        <?php echo  '  ' .  $address; ?>
                                          </div>
                                          
                                       <input type="hidden" name="add" value="<?php echo $address; ?>" >  
                                        
                                        <div class="control-group">
									    City : 
                                        <?php echo  '  ' .  $cty; ?>
                                          </div>
                                          
                                       <input type="hidden" name="cty" value="<?php echo $cty; ?>" >    
                                       
                                        <div class="control-group">
										CNIC : 
                                        <?php echo  '  ' .  $cnic;?>
                                          </div>
                                         
                                         <input type="hidden" name="cnic" value="<?php echo $cnic; ?>" > 
                                         
                                          <div class="control-group">
										Contact No : 
                                        <?php echo  '  ' .  $cntno; ?>
                                          </div>
                                         
                                         <div class="control-group">
										Type : 
                                        <?php echo  '  ' .  $type . '       ' . '   ---    ' . 'Size : ' .  $cat; ?>
                                          </div>
                                         
                                       <?php if($type==='Joint'){ ?>  
                                         <div class="control-group">
										Joint Buyer Name : 
                                        <?php echo  '  ' . $jbuyername; ?>
                                          </div>
                                        <input type="hidden" name="jbname" value="<?php echo $jbuyername; ?>" > 
                                        
                                        <div class="control-group">
									 
                                        <?php echo  '  ' . $jgdn . '  ' . ' :  ' .$jfathername; ?>
                                          </div>
                                        <input type="hidden" name="jfname" value="<?php echo $jgdn . ' ' . $jfathername; ?>" >  
                                          
										<div class="control-group">
										Address : 
                                        <?php echo  '  ' .  $jaddress; ?>
                                          </div>
                                          
                                       <input type="hidden" name="jadd" value="<?php echo $jaddress; ?>" >  
                                          
                                       <div class="control-group">
										City: 
                                        <?php echo  '  ' .  $cty; ?>
                                          </div>
                                          
                                       <input type="hidden" name="jcty" value="<?php echo $cty; ?>" >  
                                          
                                          
                                        <div class="control-group">
										CNIC : 
                                        <?php echo  '  ' .  $jcnic;?>
                                          </div>
                                         
                                         <input type="hidden" name="jcnic" value="<?php echo $jcnic; ?>" > 
                                         
                                          <div class="control-group">
										Contact No : 
                                        <?php echo  '  ' .  $jcntno; ?>
                                          </div>
                                       <?php } ?>  
                                         
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
                                          
                                       <input type="hidden" name="altdat" value="<?php echo $alt_dat; ?>">
                                       <input type="hidden" name="altno" value="<?php echo $alt_no; ?>">
                                     
                                       <?php /*   
                                            <div class="control-group">
											<label>Dealer Name:</label>
											
                                          <div class="controls">
                                            <select name="sndat"  class="" required>
                                                <?php  
													$user_query1 = mysqli_query($conn,"select * from dealertbl")or die(mysqli_error());
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
                                       <?php /*  <button type="submit" name="update5" class="btn btn-success" formaction="afdt/misplace.php" formtarget="_blank" title="Misplace"><i class="icon-save icon-large"></i></button> 
                                         
                                         <button type="submit" name="update6" class="btn btn-success" formaction="afdt/abroad.php" formtarget="_blank" title="Abroad"><i class="icon-save icon-large"></i></button> */ ?>
                                              
                                        </div>
                                        </div>      
                                        <?php } ?>
                                </form>
								
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			





