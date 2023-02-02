<html>
<head>
    <script type="text/javascript">
  function showfield(name){
    if(name=='Letigation')document.getElementById('div1').style.display="block";
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
                                <div class="muted pull-left">Record Verfication Confirmation</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
								$query = mysqli_query($conn,"SELECT * FROM `file` JOIN verification on verification.tin_number=file.tin_number where verification.ver_id= '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$edit_name = $row['file_name'];
								$cat= $row['file_category'];
								$size= $row['cat'];
								?>
								<?php if($edit_emplnumber!=''){ $image='0.jpg';?>
								<form method="post" enctype="multipart/form-data">
									
										<div class="control-group">
										 <?php  echo 'File Number  ' . '  = ' . '     ' . $edit_emplnumber ?>
                                         </div>
                                         
                                        <div class="control-group">
										 <?php  echo 'Name  ' . '  = ' . '     ' . $edit_name ?>
                                         </div>
                                         
										<div class="control-group">
										 <?php  echo  'Plot Number' . '  =  ' . $edit_firstname . ' -  ' . $edit_lastname?>
                                          </div>
                                          
                                          <div class="control-group">
										 <?php  echo  'Plot Size' . '  =  ' . $size .  ' - '  . $cat?>
                                          </div>
                                          
										
										<div class="control-group">
										 <?php  echo 'Verification Number  ' . '  = ' . '     ' . $row['ver_id']; ?>
                                         </div>
                                    
                                        <div class="control-group">
										 <?php  echo 'Periority  ' . '  = ' . '     ' . $row['ver_per'] . ' ' . $row['ver_urgrpt']; $image=$row['ver_urgpic']; ?>
							            </div>
                                        
                                        <div class="control-group" align="center">
                                          <?php echo "<img src='uploads_ver/$image' class='thumbnail' width='10' height='10'  >"; ?>	
                                        </div>  
                                            
										<div class="control-group">
											<label>File Status:</label>
											
                                          <div class="controls">
                                            <select name="region"  class="" onchange="showfield(this.options[this.selectedIndex].value)" required>
                                                
                                             	<option value ="Taxable"> Taxable </option>
												<option value ="Non-Taxable"> Non-Taxable </option>
												<option value ="Letigation"> Letigation </option>
												<option value ="Fake"> Fake </option>
											
                                            </select>
                                          </div>
                                        </div>
										
										                                                   
                                        <div id="div1"> Please Upload Letigation Proof  <input type="file" name="uploadfile" id="uploadfile" >
                             </div>
                             
										<div class="control-group">
										
                                            <input type="text" name="cmnt" placeholder="File Issue Reason" required autofocus>
                                          
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
$plot_no = $row['plot_no'];
$block = $row['block'];
$empno = $_POST['region'];								
$cmnt = $_POST['cmnt'];
/*$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$emplnumber = $_POST['emplnumber'];
$status = $_POST['status'];
$username =$firstname.'.'.$lastname;
$password=12345;;*/


$filename=0; 

        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "uploads_letigation/".$filename;
 
if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
       
        
$dat=0;
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d');
$tim = date('H:i:s');

if($empno==='Letigation') { $vrstj=0; $std=0; 

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Verfication . $cmnt')")or die(mysqli_error());

mysqli_query($conn,"UPDATE `verification` SET `ver_stu`='$empno',ver_res='$cmnt',dat='$dat',user='$session_id',ver_stj='0',ver_letigationpic='$filename' where tin_number = '$tin_number' and ver_stj='10'")or die(mysqli_error());

mysqli_query($conn,"UPDATE `borrow` SET `date_return`='$dat',`ti_return`='$tim',file_status='returned'  where tin_number = '$tin_number' and file_status='borrowed'")or die(mysqli_error());

mysqli_query($conn,"INSERT INTO `borrow` (`employee_number`, `tin_number`, `date_borrow`, `ti_barrow`, `file_status`, `date_return`, `ti_return`, `emp_request`, `cmnt`, reason, stj) VALUES ('0', '$tin_number', '$dat', '$tim', 'borrowed', '0', '0', 'Allocation', '$cmnt', 'Ver_Letigation','0')")or die(mysqli_error());

mysqli_query($conn,"update file set trade_name = '0',status='0' ,stj='0' where tin_number = '$tin_number' ")or die(mysqli_error());
}
else{



mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Verfication . $cmnt')")or die(mysqli_error());
mysqli_query($conn,"UPDATE `verification` SET `ver_stu`='$empno',ver_res='$cmnt',dat='$dat',user='$session_id',ver_stj='2',ver_letigationpic='$filename' where tin_number = '$tin_number' and ver_stj='10'")or die(mysqli_error());

mysqli_query($conn,"UPDATE `borrow` SET `date_return`='$dat',`ti_return`='$tim',file_status='returned'  where tin_number = '$tin_number' and file_status='borrowed'")or die(mysqli_error());

mysqli_query($conn,"INSERT INTO `borrow` (`employee_number`, `tin_number`, `date_borrow`, `ti_barrow`, `file_status`, `date_return`, `ti_return`, `emp_request`, `cmnt`, reason, stj) VALUES ('3', '$tin_number', '$dat', '$tim', 'borrowed', '0', '0', 'Allocation', '$cmnt', 'Verification','1')")or die(mysqli_error());

mysqli_query($conn,"update file set trade_name = '3',status='borrowed' ,stj='1' where tin_number = '$tin_number' ")or die(mysqli_error());
}

echo 'File Record Verified Sucessfully';
?>

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
    $subject = "File Record Check";
    $message = "Status";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
		echo "The email message was sent.";
    } else {
    	echo "The email message was not sent.";
    }
    ?>
<script>
  window.location = "edit_user3.php"; 
</script>
<?php
}  
//Mail

?>






