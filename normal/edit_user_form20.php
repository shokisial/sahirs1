<html>
<head>
    <script type="text/javascript">
  function showfield(name){
    if(name=='Joint')document.getElementById('div1').style.display="block";
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
                                <div class="muted pull-left">Open File Edit</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php  
							
								$query = mysqli_query($conn,"SELECT * FROM `file` JOIN ndc on ndc.tin_number=file.tin_number where ndc_id= '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$edit_name = $row['file_name'];
								$edit_bname = $row['buyername'];
								$prt=$row['trns_per']; $prtur=$row['trns_rptno']; $prtimage=$row['trns_pic'];
								
								?>
								<?php if($edit_emplnumber!=''){ $image='0';?> 
								<form method="post" enctype="multipart/form-data">
									
										<div class="control-group">
										 <?php  echo 'File' . '  = ' . '     ' . $edit_emplnumber . '  - ' .  $edit_firstname . ' -  ' . $edit_lastname ?>
                                         </div>
                                         
                                        <div class="control-group">
										 <?php  echo 'File Name  ' . '  = ' . '     ' . $edit_name ?>
                                         </div>
        								
										<div class="control-group">
										 <?php  echo 'NDC Number  ' . '  = ' . '     ' . $row['ndc_no'] . ' - ' . $row['ndc_rpt'] . '     ' . $row['per']; 
										 $image=$row['ndc_urgpic']; 
									?>
                                         </div>
                                    
                                       
                                
                                      
    <?php $query1 = mysqli_query($conn,"SELECT * FROM `ndc` WHERE ndc.`type`='Open' and ndc.`buyername`=0  and tin_number='$edit_emplnumber'")or die(mysqli_error());
								$row1 = mysqli_fetch_array($query1); ?>
								
								        
									
										
                                          <div class="controls">
                                              File Type
                                            <select name="tp"  class="" onchange="showfield(this.options[this.selectedIndex].value)"  required>
                                         	 <option value ="Open">Open</option>
                                         	 
                                         	  <option value ="Single">Single</option>
										      <option value ="Joint">Joint</option>
										 </select>
                                          </div>
                                       
                                      <div class="control-group">
										 <?php  echo 'Buyer ' . '  = ' ;
										?>   
									  <input type="text" name="brname" value="<?php echo $row1['buyername'] ;?>" style="text-transform: uppercase" required>
										
									Gardian	<input type="text" name="gd" value="<?php echo $row1['gdn'] ;?>" style="text-transform: uppercase" required >
										
									 Father Name<input type="text" name="frn" value="<?php echo $row1['fathername'];  ?>" style="text-transform: uppercase" required >
                                         </div>
                                         
								    Address <input type="text" name="adr" value="<?php echo $row1['address'] ;  ?>" style="text-transform: uppercase" required> 
                                         
                                    CNIC <input type="text" name="cn" value="<?php echo $row1['cnic'] ;  ?>" style="text-transform: uppercase" required> 
                                    
                                    
                                    Contact <input type="text" name="ctno" value="<?php echo $row1['cntno'] ;  ?>" style="text-transform: uppercase" required> 
                                        
                                        <div id="div1" class="control-group">
											<label>Joint Detail</label>

                                   Jnt Name <input type="text" name="jbrname" value="<?php echo $row1['jbuyername'] ;?>" style="text-transform: uppercase" required>
								</p>
								<p>	
								   Jnt Gardian	<input type="text" name="jgd" value="<?php echo $row1['jgdn'] ;?>" style="text-transform: uppercase" required>
								</P>		
									Jnt F.Name	<input type="text" name="jfrn" value="<?php echo $row1['jfathername'];  ?>" style="text-transform: uppercase" required>
                                         
                                         
								    Jnt Address <input type="text" name="jadr" value="<?php echo $row1['jaddress'] ;  ?>" style="text-transform: uppercase" required> 
                                         
                                    Joint CNIC <input type="text" name="jcn" value="<?php echo $row1['jcnic'] ;  ?>" style="text-transform: uppercase" required> 
                                    
                                   
                                    Joint Contact <input type="text" name="jctno" value="<?php echo $row1['jcntno'] ;  ?>" style="text-transform: uppercase" required> 
                                  </div>
                                   
                                 
                                        <div class="control-group" align="center">
                                          <?php echo "<img src='uploads_ndc/$image' class='thumbnail' width='10' height='10'  >"; ?>	
                                        </div>  
                                        
                                        
                                        <div class="control-group">
								          <b>Comments </b>
								            <input type="text" name="trns_res" id="trns_res" required>
										</div>
										
										
									
										
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                      
                                </form>
									<?php }	?>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			<?php		
if (isset($_POST['update'])){

$tin_number = $row['tin_number'];
							
$cmnt = $_POST['trns_res'];

$brname=$_POST['brname'];
$gd=$_POST['gd'];
$frn=$_POST['frn'];
$adr=$_POST['adr'];
$cn=$_POST['cn'];
$tp=$_POST['tp'];
$ctno=$_POST['ctno'];

$jbrname=$_POST['jbrname'];
$jgd=$_POST['jgd'];
$jfrn=$_POST['jfrn'];
$jadr=$_POST['jadr'];
$jcn=$_POST['jcn'];
$jctno=$_POST['jctno'];

$dat=0; $vrpic='';
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d');
$tim = date('H:i:s');

if($tp!='Open'){
mysqli_query($conn,"UPDATE `ndc` SET `buyername`='$brname',`gdn`='$gd',`fathername`='$frn',`address`='$adr',`cnic`='$cn',`cntno`='$ctno',`type`='$tp',`jbuyername`='$jbrname',`jgdn`='$jgd',`jfathername`='$jfrn',`jaddress`='$jadr',`jcnic`='$jcn',`jcntno`='$jctno',ndc_res='$cmnt' WHERE `tin_number`='$tin_number' and ndc.`type`='Open' and ndc.`buyername`=0 ")or die(mysqli_error());


mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Open File Data Feed')")or die(mysqli_error());
}
else
{
    echo 'Open File Type Not Acceptable';
}
?>
<script>
  window.location = "edit_user20.php"; 
</script>
<?php
}  


?>






