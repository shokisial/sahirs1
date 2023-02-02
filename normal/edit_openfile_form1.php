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
                        <div class="block" >
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Open Form Registration Edit</div>
                            </div>
                            <div class="block-content collapse in">
                                <div >
								
							 <?php 
                                $edit_emplnumber=0; 
								$query = mysqli_query($conn,"select * from file where file_id='$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_lastname1 = $row['plot_no'];
								$edit_lastname = $row['block'];
								$flnm=$row['file_name']; 
								$so=$row['so'];
								$fname=$row['fathername'];
								$add=$row['address'];
								$cnicno=$row['cnicno'];
								$cntno=$row['cnt_no'];
								
								$jflnm=$row['jfile_name']; 
								$jso=$row['jso'];
								$jfname=$row['jfathername'];
								$jadd=$row['jaddress'];
								$jcnicno=$row['jcnicno'];
								$jcntno=$row['jcnt_no'];
								?>
								<?php if($edit_emplnumber!=''){ ?>
								<form method="post" enctype="multipart/form-data">
									    <b> File_number = <?php echo ' ' .  $edit_emplnumber ?> <Br>
									    <b>  Plot_number = <?php echo ' ' .  $edit_lastname1 . ' ' . '/' .  $edit_firstname  ?> 
                                        <?php } ?>
                                        <input type="hidden" name="tin_no"  value="<?php echo $edit_emplnumber; ?>" > 
                                        
										<div class="control-group">
										<b> Buyer Name </b>    
                                        <input type="text" name="bname"  value="<?php echo $flnm; ?>"  required><br> 
                                        <b> S / D / W / O </b>
                                        <input type="text" name="so"  value="<?php echo $so; ?>"  required> 
                                       
                                        <div class="control-group">
                                            <b> Father Name </b>
                                          <input type="text" name="fname"  value="<?php echo $fname; ?>" required> 
                                        <br> <b> Address </b>
                                         <input type="text" name="add" value="<?php echo $add; ?>"  required> 
                                          </div>
                                       
                                        <div class="control-group">
										 <b> CNIC # </b>
                                          <input type="text" name="cnic"  value="<?php echo $cnicno; ?>"  required> 
                                       <br> <b> Contact # </b>
                                          <input type="number" name="cntno"  value="<?php echo $cntno; ?>" required> 
                                        </div>
                                        
                                        <div class="control-group">
                                            <b> Joint Name </b>
                                        <input type="text" name="jbname"   value="<?php echo $jflnm; ?>"  required> 
                                        <br><b> Joint S/D/W/O </b>
                                        <input type="text" name="jso"   value="<?php echo $jso; ?>"  required> 
                                        </div>
                                        
                                          <div class="control-group">
											<b> Jnt Father Name </b>
                                          <input type="text" name="jfname"   value="<?php echo $jfname; ?>"  required> 
                                        <br><b> Joint Address </b> 
                                          <input type="text" name="jadd"  
                                          value="<?php echo $jadd; ?>" required> 
                                          </div> </b>
                                        
                                        <div class="control-group">
											<b> Joint CNIC #
                                          <input type="text" name="jcnic"   value="<?php echo $jcnicno; ?>"  required> 
                                          
                                      <br> <b> Joint Contact # </b>
                                        <input type="number" name="jcntno"   value="<?php echo $jcntno; ?>" required> 
                                        </div>
                                        
                                        
                                    
                                        </div>
                                       
                                        
                                        
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			<?php $tin_number=0; $ndcrpt=0;		
if (isset($_POST['update'])){

$appno=0; $altno=0; $edit_emplnumber=$_POST['tin_no']; 
$bname = $_POST['bname']; $fname = $_POST['fname']; 
$add = $_POST['add']; $cnic = $_POST['cnic']; $cntno = $_POST['cntno']; 

$so = $_POST['so']; $jso = $_POST['jso'];
$jbname = $_POST['jbname']; $jfname = $_POST['jfname']; $jadd = $_POST['jadd'];
$jcnic = $_POST['jcnic']; $jcntno = $_POST['jcntno'];
/*
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
  */    
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','G.M Edit Reg Form')")or die(mysqli_error()); echo 'Done' . $rnlno . $aplname;

 /*

UPDATE `file` SET `file_name`=[value-5],`fathername`=[value-6],`cnicno`=[value-7],`address`=[value-8],`city`=[value-9],`cnt_no`=[value-10],`jfile_name`=[value-11],`jfathername`=[value-12],`jcnicno`=[value-13],`jaddress`=[value-14],`jcity`=[value-15],`jcnt_no`=[value-16],`status`=[value-17],`file_type`=[value-18],`file_category`=[value-19],`trade_name`=[value-20],`block`=[value-21],`region`=[value-22],`st_ver`=[value-23],`st_ndc`=[value-24],`st_trns`=[value-25],`stj`=[value-26],`cat`=[value-27],`form_no`=[value-28],`alt_no`=[value-29],`trns_rqno`=[value-30],`trns_apldat`=[value-31],`trns_aplno`=[value-32],`trns_ldgno`=[value-33],`frm_ish_dt`=[value-34],`booking_ref`=[value-35],`booking_client`=[value-36],`frm_rcv_dt`=[value-37],`opn_reg`=[value-38] WHERE 1
  */
 
 $bname = $_POST['bname']; $fname = $_POST['fname']; $add = $_POST['add'];
$cnic = $_POST['cnic']; $cntno = $_POST['cntno']; 

$so = $_POST['so']; $jso = $_POST['jso'];
$jbname = $_POST['jbname']; $jfname = $_POST['jfname']; $jadd = $_POST['jadd'];
$jcnic = $_POST['jcnic']; $jcntno = $_POST['jcntno'];

mysqli_query($conn,"UPDATE `file` SET `file_name`='$bname',`fathername`='$fname',`cnicno`='$cnic',`address`='$add',`cnt_no`='$cntno',`jfile_name`='$jbname',`jfathername`='$jfname',`jcnicno`='$jcnic',`jaddress`='$jadd',`jcnt_no`='$jcntno',so='$so',jso='$jso' where tin_number='$edit_emplnumber'")or die(mysqli_error());  


echo 'Open File  Sucessfully';
//} 
?>
 <script>
  window.location = "edit_openfile1.php"; 
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

<?php
}  
//Mail

?>






