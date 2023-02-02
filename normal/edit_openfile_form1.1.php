<html>
<head>
<form  method="post"  enctype="multipart/form-data" >
<table width="15%"   align="left"> 
    <td>
     <input type="number" name="frmno"  placeholder="Search Form Number">
    <button name="cat" class="btn btn-success"><i class="icon-save icon-large"></i></button>
    </td>
</table></form>

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
 <?php $tin_number=0; $frm=0;		
                                  if(isset($_POST['cat'])){
                                     $frm=$_POST['frmno']; } 
                                      echo 'Form No. ' . $frm?>
   <div class="row-fluid">
 
                        <!-- block -->
                        <div class="block" align="center">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Open Form Ready </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span6">
								
							 <?
                                $edit_emplnumber=0; 
								$query = mysqli_query($conn,"select * from file where form_no=$frm and stj='105' and opn_reg='1'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$flnm=$row['file_name']; 
								$rfname=$row['bookin_ref']; 
								?>
								<? if($edit_emplnumber!=''){ ?>
								<form method="post" enctype="multipart/form-data"><b>
									    File_number = <? echo ' ' .  $edit_emplnumber ?> 
									    Plot_number = <? echo ' ' .  $edit_firstname . ' ' . ' / ' . $edit_lastname   . ' - ' . $row['cat'] . ' - ' . $row['file_category'] . '  -' .  'Booking Refernce = ' . '  ' . $row['booking_ref']?> </b>
                                        <? } ?>
                                        
										<input type="hidden" name="tn" value="<? echo $edit_emplnumber ?> ">
										<div class="control-group">
                                        <input type="text" name="bname"  placeholder="Buyer Name" style="text-transform: uppercase"  required> 
                                        
                                        <input type="text" name="so"  placeholder="S/D/W/O" style="text-transform: uppercase" required> 
                                        
                                        <div class="control-group">
                                          <input type="text" name="fname"  placeholder="Father/Husband Name"  style="text-transform: uppercase" required> 
                                          
                                         <input type="text" name="add"  placeholder="Address" style="text-transform: uppercase" required> 
                                          </div>
                                        <input type="text" name="cty"  placeholder="City" style="text-transform: uppercase" required> 
                                          </div>
                                        <div class="control-group">
											
                                          <input type="text" name="cnic"  placeholder="CNIC #" style="text-transform: uppercase" required> 
                                          
                                          <input type="number" name="cntno"  placeholder="Contact No" style="text-transform: uppercase" required> 
                                        </div>
                                        
                                        <label>Type:</label>
											
                                          
                                            <select name="per"  class="" onchange="showfield1(this.options[this.selectedIndex].value)"  required>
                                        <option value="Single">Single</option>
                                        <option value="Joint">Joint</option>
                                            </select>
                                            
                                        <div id="div2">    
                                        <div class="control-group">
                                        <input type="text" name="jbname"  placeholder="Joint Buyer Name" style="text-transform: uppercase" value="0"> 
                                        
                                        <input type="text" name="jso"  placeholder="Joint S/D/W/O" style="text-transform: uppercase" value="0"> 
                                        </div>
                                        
                                          <div class="control-group">
											
                                          <input type="text" name="jfname"  placeholder="Joint Father/Husband Name" style="text-transform: uppercase" value="0"> 
                                          
                                          <input type="text" name="jadd"  placeholder="Joint Address" style="text-transform: uppercase" value="0"> 
                                          </div>
                                        
                                        <div class="control-group">
											
                                          <input type="text" name="jcnic"  placeholder="Joint CNIC #" style="text-transform: uppercase" value="0"> 
                                          
                                          <input type="number" name="jcntno"  placeholder="Joint Contact No" style="text-transform: uppercase" value="0"> 
                                        </div>
                                        
                                        </div>
                                            <div class="control-group">
											<label>Dealer Name:</label>
											
                                          
                                            <select name="sndat"  class="" required>
                                                <?php  
													$user_query1 = mysqli_query($conn,"select * from dealertbl ")or die(mysqli_error());
													while($row1 = mysqli_fetch_array($user_query1)){
												 ?>
                                             	<option value ="<? echo $row1['d_code']; ?> "> <? echo $row1['d_name']; ?></option>
												
											<?  } ?>
                                            </select>
                                          
											<label>Priority:</label>
											
                                          
                                            <select name="per"  class="" onchange="showfield(this.options[this.selectedIndex].value)"  required>
                                        <option value="Normal">Normal</option>
                                        <option value="Urgent">Urgent</option>
                                            </select>
                                          </div>
                                        </div>
                                       
                                        <div id="div1">Urgent Reciept No. <input type="Number" name="whatever" value="0">
                                        <input type="file" name="uploadfile" id="uploadfile"> 
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
<br>		
										<form  method="post"  enctype="multipart/form-data" target="_blank"  action="letterofthanks.php">

     <input type="number" name="ltrno"  placeholder="Enter File Number to Print Letter" required>
    <button name="ltr" class="btn btn-success"><i class="icon-save icon-large"></i></button>
    </form>
    </div>
    <br>
 <?php if($session_id==='7' or $session_id==='1' ){include('open_frmreg2.php'); } ?>
 
	<?php $tin_number=$edit_emplnumber; $ndcrpt=0; $openrpt=0; $filename=0;		
if (isset($_POST['update'])){
$tin_number = $_POST['tn'];
$appno=0; $altno=0;
$bname = $_POST['bname']; $fname = $_POST['fname']; $add = $_POST['add'];
$cnic = $_POST['cnic']; $cntno = $_POST['cntno']; 

$bname = strtoupper($bname); $fname = strtoupper($fname);
$so = $_POST['so']; $jso = $_POST['jso']; $cty =  $_POST['cty'];
$jbname = $_POST['jbname']; $jfname = $_POST['jfname']; $jadd = $_POST['jadd'];
$jcnic = $_POST['jcnic']; $jcntno = $_POST['jcntno'];

$jbname = strtoupper($jbname); $jfname = strtoupper($fname);
$sndat = $_POST['sndat']; $so = strtoupper($so); $jso = strtoupper($jso);
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
      
if($filename===''){ $filename=0; }
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Open File Register')")or die(mysqli_error()); echo 'Done' . $rnlno . $aplname;

mysqli_query($conn,"UPDATE `file` SET `file_name`='$bname',`fathername`='$fname',`cnicno`='$cnic',`address`='$add', city='$cty',`cnt_no`='$cntno',`jfile_name`='$jbname',`jfathername`='$jfname',`jcnicno`='$jcnic',`jaddress`='$jadd',`jcnt_no`='$jcntno',`stj`='104',`so`='$so',jso='$jso' where tin_number='$tin_number'")or die(mysqli_error());


mysqli_query($conn,"INSERT INTO `open_filedet`(`tin_number`, `rec_dat`, rec_tim,`dealer`, `per`, `rpt_no`, `user`,`opn_rptpic`) VALUES ('$tin_number','$dat', '$tim','$sndat','$per','$openrpt','$session_id','$filename')")or die(mysqli_error());

 /*
 $bname = $_POST['bname']; $fname = $_POST['fname']; $add = $_POST['add'];
$cnic = $_POST['cnic']; $cntno = $_POST['cntno']; 

$so = $_POST['so']; $jso = $_POST['jso'];
$jbname = $_POST['jbname']; $jfname = $_POST['jfname']; $jadd = $_POST['jadd'];
$jcnic = $_POST['jcnic']; $jcntno = $_POST['jcntno'];
*/


//,`fathername`='$bname',`cnicno`='$cnic',`address`='$add',`cnt_no`='$cntno',`jfile_name`='$jbname',`jfathername`='$jfname',`jcnicno`='$jcnic',`jaddress`='$jadd',`jcnt_no`='$jcntno',`stj`='4',`opn_rptno`='$openrpt',`opn_rptpic`='$filename' WHERE stj='5' and tin_number='$tin_number'

/*mysqli_query($conn,"UPDATE `file` SET `file_name`='$bname',`fathername`='$fname',`cnicno`='$cnic',`address`='$add',`cnt_no`='$cntno',`jfile_name`='$jbname',`jfathername`='$jfname',`jcnicno`='$jcnic',`jaddress`='$jadd',`jcnt_no`='$jcntno', stj='4' where tin_number='$edit_emplnumber'")or die(mysqli_error());  

*/
echo 'Open File  Sucessfully';
//} 
?>

<?php if($session_id==='10') {include('open_frmreg2.php'); } ?>

 <script>
  window.location = "edit_openfile1.1.php"; 
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






