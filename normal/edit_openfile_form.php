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
                        <div class="block" align="center">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Open File Registration</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span400">
								
								
								<form method="post" enctype="multipart/form-data">
									
									    <div class="control-group">
                                        <input type="text" name="appno"  placeholder="Application #"  required> 
                                        </div>
                                        
                                        <div class="control-group">
                                        <input type="text" name="altno"  placeholder="Allotment # "  required> 
                                        </div>
                                        
                                        <div class="control-group">
                                        <input type="text" name="pltno"  placeholder="Plot # "  required> 
                                        </div>
                                        
										<div class="control-group">
                                        <input type="text" name="bname"  placeholder="Buyer Name"  required> 
                                        </div>
                                          
                                          <div class="control-group">
											
                                          <input type="text" name="fname"  placeholder="Father/Husband Name"  required> 
                                          </div>
                                          
                                          <div class="control-group">
											
                                          <input type="text" name="add"  placeholder="Address"  required> 
                                          </div>
                                        
                                        <div class="control-group">
											
                                          <input type="text" name="cnic"  placeholder="CNIC #"  required> 
                                          </div>
                                          
								        <div class="control-group">
                                          <input type="number" name="cntno"  placeholder="Contact No" required> 
                                        </div>
                                        
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
					
			<?php $tin_number=0; $ndcrpt=0;		
if (isset($_POST['update'])){

$appno = $_POST['appno']; $altno = $_POST['altno'];  $pltno = $_POST['pltno'];  $block = $row['block'];
$bname = $_POST['bname']; $fname = $_POST['fname']; $add = $_POST['add'];
$cnic = $_POST['cnic']; $cntno = $_POST['cntno']; $sndat = $_POST['sndat'];
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
      
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','Open File Register')")or die(mysqli_error()); echo 'Done' . $rnlno . $aplname;

mysqli_query($conn,"INSERT INTO `openfile`(tin_number,`open_dat`, `open_tim`, `open_apnno`, `open_altno`, `open_bname`, `open_fname`, `open_add`, `open_cnic`, `open_cntno`, `open_dealer`, `open_per`, `open_rpt`, `open_urgpic`, `open_stj`) 
                                   VALUES ('0','$dat','$tim','$appno','$altno','$bname','$fname','$add','$cnic','$cntno','$sndat','$per','$openrpt','$filename','1')")or die(mysqli_error());
//mysqli_query($conn,"update file set st_ndc = 'Pending' where tin_number = '$tin_number' ")or die(mysqli_error());

//mysqli_query($conn,"update verification set ver_stj = '4' where tin_number = '$tin_number' and ver_stj='3'")or die(mysqli_error());


echo 'Open File  Sucessfully';
//} 
?>
 <script>
  window.location = "edit_openfile1.php"; 
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






