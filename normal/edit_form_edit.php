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
                                <div class="muted pull-left">Edit File Record</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php  $prt=0; $prtur=0; $prtimage='0';
								
								 

								$query = mysqli_query($conn,"SELECT * FROM `file` where file_id= '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								?>
								<?php if($edit_emplnumber!=''){ $image='0';?> 
								<form method="post" enctype="multipart/form-data">
								
							
										
										 <?php  echo 'File' . '  = ' . '     ' . $edit_emplnumber . '  - '  ?>
										
								<br> Plot # =<input type="text" name="plot" value="<?php echo $row['plot_no'] ; ?>" >
                            	 
								<br>	Block =	<input type="text" name="block" value="<?php echo $row['block'] ; ?>" >
                            	 <?php  echo 'Name ' .  '  =   ' ;
										?> 		
									  <input type="text" name="name" value="<?php echo $row['file_name'] ;?>"  style="text-transform: uppercase">
									<br>  
								<?php  echo 'S/O ' .  '  =   ' ;
										?> 		
									  <input type="text" name="gdn" value="<?php echo $row['so'] ;?>" >
									  
									
                                        
									S/W/D=	<input type="text" name="fname" value="<?php echo $row['fathername'];  ?>" style="text-transform: uppercase">
                                         
                                         
								    Adress 
								    <input type="text" rows="5" cols="50" name="adr" value="<?php echo $row['address']; ?>" style="text-transform: uppercase">
								  <br>City  = <input type="text" name="city" value="<?php echo $row['city'] ;  ?>" > 
                                    
                                      
                                 <br>CNIC #<input type="text" name="cn" value="<?php echo $row['cnicno'] ;  ?>" > 
                                   
                                <br> Size  <input type="text" name="size" value="<?php echo $row['cat'] ;  ?>" > 
                               
                                <br> Ctegry <input type="text" name="cat" value="<?php echo $row['file_category'] ;  ?>" > 
                                 
                                    <br>Contact<input type="text" name="cntno" value="<?php echo $row['cnt_no'] ;  ?>" > 
                                    
                                	<div class="controls">
                                            <select name="type"  class="" onchange="showfield(this.options[this.selectedIndex].value)"  required>
                                        <option value="Single">Single</option>
                                        <option value="Joint">Joint</option>
                                        
                                            </select>
                                          </div>	
                                   
                                   
                                        <div id="div1">
                                        <div>Joint Name. <input type="text" name="jbname" value="<?php echo $row['jfile_name'] ;  ?>"  style="text-transform: uppercase" required><br>
                                        </div>
                                        
                                        <?php  echo 'Joint S/O' ;
										?> 		
									  <input type="text" name="jgdn" value="<?php echo $row['jso'] ;?>" >
									  
									  
                                        
                                       
                                       <div class="control-group">
										 Joint Father/Husband Name	
                                          <input type="text" name="jfname"   value="<?php echo $row['jfathername'] ;  ?>" style="text-transform: uppercase" required> 
                                          </div>
                                          <div class="control-group">
										 Joint Address	
                                          <input type="text" name="jadd"  
                                          value="<? echo $row['jaddress'] ;  ?>"  required> 
                                          </div>
                                        
                                        Joint City
								        <div class="control-group">
                                          <input type="text" name="jcity"   value="<?php echo $row['jcity'] ;  ?>" style="text-transform: uppercase" required> 
                                        </div>
                                        
                                       
                                        <div class="control-group">
										Joint CNIC #	
                                          <input type="text" name="jcnic"   value="<?php echo $row['jcnicno'] ;  ?>"  required> 
                                          </div>
                                        Joint Contact No  
								        <div class="control-group">
                                          <input type="text" name="jcntno"   value="<?php echo $row['jcnt_no'] ;  ?>"  required> 
                                        </div>
                                        
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
echo $edit_emplnumber;
//$row['tin_number'];

$plot = $_POST['plot'];
$block = $_POST['block'];
$name = $_POST['name'];	
$fname= $_POST['fname'];
$so = $_POST['gdn'];
$adr=$_POST['adr'];
$city=$_POST['city'];
$cn=$_POST['cn'];
$cntno=$_POST['cntno'];
$size=$_POST['size'];
$type=$_POST['type'];
$cat=$_POST['cat'];
$gdn=$_POST['gdn'];
$jbname=$_POST['jbname'];
$jgdn=$_POST['jgdn'];
$jfname=$_POST['jfname'];
$jadd=$_POST['jadd'];
$jcnic=$_POST['jcnic'];
$jcntno=$_POST['jcntno'];
$jcity=$_POST['jcity'];
$dat=0; $vrpic='';
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d');
$tim = date('H:i:s');


/*
mysqli_query($conn,"UPDATE `file` SET `plot_no`='$plot',`block`='$block',`file_name`='$name',`fathername`='$so',`cnicno`='$cn',`address`='$adr',`city`='$city',`cnt_no`='$cntno',cat='$size', file_category='$cat',file_type='$type',`jfile_name`='$jbname',`jfathername`='$jfname',`jcnicno`='$jcnic',`jaddress`='$jadd',`jcity`='$jcity',`jcnt_no`='$jcntno',`so`='$gdn',`jso`='$jgdn' WHERE `tin_number`='$tin_number' ")or die(mysqli_error());
*/
mysqli_query($conn,"UPDATE `file` SET `plot_no`='$plot',`file_name`='$name' ,`block`='$block',`fathername`='$fname',`so`='$gdn',`cnicno`='$cn',`address`='$adr',`city`='$city',`cnt_no`='$cntno',cat='$size', file_category='$cat',file_type='$type',`jfile_name`='$jbname',`jfathername`='$jfname',`jcnicno`='$jcnic',`jaddress`='$jadd',`jcity`='$jcity',`jcnt_no`='$jcntno',`jso`='$jgdn' WHERE `tin_number`='$tin_number'")or die(mysqli_error());

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','G.M Change File $dat')")or die(mysqli_error());


echo 'File Record Update Sucessfully';



?>



 
<script>
  window.location = "edit_user_edit.php"; 
</script>
<?php
  
//Mail
}
?>






