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
                        <div class="block" align="left">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Open File Registration</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span400">
								
							<?php $edit_emplnumber=0; 
								$query = mysqli_query($conn,"select * from file where file_id = '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$flnm=$row['file_name'];
								$fname=$row['fathername'];
								$cnic=$row['cnicno'];
								$add=$row['address'];
								$jflnm=$row['jfile_name'];
								$jfname=$row['jfathername'];
								$jcnic=$row['jcnicno'];
								$jadd=$row['jaddress'];
								?>
								<? if($edit_emplnumber!=''){ ?>
								<form method="post" enctype="multipart/form-data">
									    File_number = <? echo ' ' .  $edit_emplnumber ?> <Br>
									    Plot_number = <? echo ' ' .  $edit_lastname . ' ' . '/' .  $edit_firstname  ?> 
									    <br>
									   File_Name = <? echo ' ' .  $flnm ?> <Br>
									   
									   Father Name = <? echo ' ' .  $fname ?> <Br>
									   
									   CNIC # = <? echo ' ' .  $cnic ?> <Br>
									   
                                       Address = <? echo ' ' .  $add?> <Br>
                                        
									   Joint File_Name = <? echo ' ' .  $jflnm ?> <Br>
									   
									   Joint Father Name = <? echo ' ' .  $jfname ?> <Br>
									   
									   Joint CNIC # = <? echo ' ' .  $jcnic ?> <Br>
									   
                                       Joint Address = <? echo ' ' .  $jadd?> <Br>                    
                
                                                        
										
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success" title="Save"><i class="icon-save icon-large"></i></button>

                                        
                                          </div>
                                        </div>
                                        <? } ?>
                                </form>
								
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			<?php $tin_number=0; $ndcrpt=0;		
if (isset($_POST['update'])){

/* $appno=0; $altno=0;
$bname = $_POST['bname']; $fname = $_POST['fname']; $add = $_POST['add'];
$cnic = $_POST['cnic']; $cntno = $_POST['cntno']; 

$so = $_POST['so']; $jso = $_POST['jso'];
$jbname = $_POST['jbname']; $jfname = $_POST['jfname']; $jadd = $_POST['jadd'];
$jcnic = $_POST['jcnic']; $jcntno = $_POST['jcntno'];

$sndat = $_POST['sndat'];
$per =$_POST['per']; $openrpt =$_POST['whatever'];
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d'); $tim = date('h:m:s');
$empno = date('Y/m/d');

$filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "uploads_openfile/".$filename;

if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
     

 
$bname = $_POST['bname']; $fname = $_POST['fname']; $add = $_POST['add'];
$cnic = $_POST['cnic']; $cntno = $_POST['cntno']; 

$so = $_POST['so']; $jso = $_POST['jso'];
$jbname = $_POST['jbname']; $jfname = $_POST['jfname']; $jadd = $_POST['jadd'];
$jcnic = $_POST['jcnic']; $jcntno = $_POST['jcntno'];
*/ 
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Open File Urooj Clear')")or die(mysqli_error()); echo 'Done' . $rnlno . $aplname;

mysqli_query($conn,"UPDATE `file` SET stj='109',trade_name='1' where opn_reg='1' and stj='108' and tin_number='$edit_emplnumber'")or die(mysqli_error());  


echo 'Open File Clear by Urooj Sucessfully';
//} 
?>
 <script>
  window.location = "edit_openfile4.php"; 
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






