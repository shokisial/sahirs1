<html>
<head>
    <script type="text/javascript">
  function showfield(name){
    if(name=='Transfer Data Verified')document.getElementById('div1').style.display="block";
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
                                <div class="muted pull-left">Open Form Reg File Issuence</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php  $prt=0; $prtur=0; $prtimage='0';
								
								$query = mysqli_query($conn,"SELECT * FROM `file` where file_id= '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$edit_name = $row['file_name'];
								$edit_bname = $row['buyername'];
								
								?>
								<? if($edit_emplnumber!=''){ $image='0';?> 
								<form method="post" enctype="multipart/form-data">
									
										<div class="control-group">
										 <?php  echo 'File' . '  = ' . '     ' . $edit_emplnumber . '  - ' .  $edit_firstname . ' -  ' . $edit_lastname ?>
                                         </div>
                                        
                                      
								        <div class="control-group">
										 <?php  echo 'Buyer ' . '  = ' ;
										?> 
										
									  <input type="text" name="name" value="<? echo $row['file_name'] ;?>" style="text-transform: uppercase">
										
									Gardian	<input type="text" name="so" value="<? echo $row['so'] ;?>" style="text-transform: uppercase" >
										
									Father Name	<input type="text" name="frn" value="<? echo $row['fathername'];  ?>" style="text-transform: uppercase">
                                         </div>
                                         
								    Address <input type="text" name="adr" value="<? echo $row['address'] ;  ?>" style="text-transform: uppercase" > 
								   <br>
								   City <br><input type="text" name="cty" value="<? echo $row['city'] ;  ?>" style="text-transform: uppercase" > 
                                         
                                    CNIC <input type="text" name="cn" value="<? echo $row['cnicno'] ;  ?>" style="text-transform: uppercase"> 
                                    
                                    
                                    Contact <input type="text" name="ctno" value="<? echo $row['cnt_no'] ;  ?>" style="text-transform: uppercase" > 
                                    
                                 <?  /*  <p>     
                                    TRNS Type <input type="text" name="tp" value="<? echo $row1['type'] ;  ?>" style="text-transform: uppercase" > */ ?>
                                   
                                   <? if ($row1['type']==='Joint') { ?>
                                   
                                    <p>  
                                    
                                   Jnt Name <input type="text" name="jbrname" value="<? echo $row1['jbuyername'] ;?>" style="text-transform: uppercase" >
								</p>
								<p>	
								   Jnt Gardian	<input type="text" name="jgd" value="<? echo $row1['jgdn'] ;?>">
								</P>		
									Jnt F.Name	<input type="text" name="jfrn" value="<? echo $row1['jfathername'];  ?>" style="text-transform: uppercase" >
                                         
                                         
								    Jnt Address <input type="text" name="jadr" value="<? echo $row1['jaddress'] ;  ?>" style="text-transform: uppercase" > 
                                         
                                    Jnt CNIC <input type="text" name="jcn" value="<? echo $row1['jcnic'] ;  ?>" style="text-transform: uppercase" > 
                                    
                                    <p>
                                    Jnt Contact <input type="text" name="jctno" value="<? echo $row1['jcntno'] ;  ?>" style="text-transform: uppercase" > 
                                   </P>
                                   
                                    <? } ?>
                                        
                                        <div class="control-group">
											<label>File Issue Reason:</label>
											
                                          <div class="controls">
                                            <select name="cmnt"  class="" onchange="showfield(this.options[this.selectedIndex].value)"  required>
                                         	  <option value ="Transfer Data Not Verified">Transfer Data Not Verified</option>
										      <option value ="Transfer Data Verified">Transfer Data Verified</option>
										 </select>
                                          </div>
                                        </div>
                                        
                                        <div id="div1" class="control-group">
											<label>File Issue To:</label>
											
                                          <div class="controls">
                                            <select name="cmnt1"   required>
                                         	<option value ="12">Bisma Anwar</option>
                                         	<option value ="15">Irum Shehzadi</option>
										 </select>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
								          <b>  Reason </b>
								            <input type="text" name="reason" id="trns_res" required>
										</div>
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                      
                                </form>
									<? }	?>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			<?php		
if (isset($_POST['update'])){

$tin_number = $edit_emplnumber;

$brname=$_POST['name'];
$gd=$_POST['so'];
$frn=$_POST['frn'];
$adr=$_POST['adr'];
$cty=$_POST['cty'];
$cn=$_POST['cn'];
$tp=$_POST['tp'];
$ctno=$_POST['ctno'];

$jbrname=$_POST['jbrname'];
$jgd=$_POST['jgd'];
$jfrn=$_POST['jfrn'];
$jadr=$_POST['jadr'];
$jcn=$_POST['jcn'];
$jctno=$_POST['jctno'];

$cmnt=$_POST['cmnt'];
$cmnt1=$_POST['cmnt1'];
$reason=$_POST['reason'];

$dat=0; $vrpic='';
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d');
$tim = date('H:i:s');


 $stj=2; 
if($cmnt==='Transfer Data Not Verified'){ 
 mysqli_query($conn,"UPDATE `file` SET `cmnt`='$cmnt',reason='$reason' where tin_number = '$tin_number' and stj='104'")or die(mysqli_error());
}  
else{
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Ready File issue to $cmnt1')")or die(mysqli_error());

mysqli_query($conn,"INSERT INTO `borrow` (`employee_number`, `tin_number`, `date_borrow`, `ti_barrow`, `file_status`, `date_return`, `ti_return`, `emp_request`, `cmnt`, reason, stj) VALUES ('$cmnt1', '$tin_number', '$dat', '$tim', 'borrowed', '0', '0', 'record', '$cmnt','Open Ready File', '106')")or die(mysqli_error());
mysqli_query($conn,"update file set trade_name = '$cmnt1',status='borrowed' ,stj='106',reason='0' where tin_number = '$tin_number' ")or die(mysqli_error());

echo 'Open Reg File Issued Sucessfully';
}
?>



 <?php  $from1=0;  
			$user_query2 = mysqli_query($conn,"SELECT * FROM `staff` WHERE `staff_id`='0'")or die(mysqli_error());
			 while($row2 = mysqli_fetch_array($user_query2)){
			 $from1= $row2['email'];} ?>
<?php  $from2=0;  
			$user_query3 = mysqli_query($conn,"select * from staff where staff_id='12'")or die(mysqli_error());
			 while($row3 = mysqli_fetch_array($user_query3)){
			 $from2= $row3['email'];} ?>											
<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "$from1";
    $to = "$from2";
    $subject = "Ready File Issue Printing";
    $message = "Status send";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
		echo "The email message was sent.";
    } else {
    	echo "The email message was not sent.";
    }
    
     ?>
<script>
  window.location = "edit_user104.php"; 
</script>
<?php
}  
//Mail

?>






