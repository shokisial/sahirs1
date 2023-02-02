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
                                <div class="muted pull-left">N.D.C Account File</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php $edit_emplnumber=0; $prtimage=0; $nwop=0;
								$query = mysqli_query($conn,"select * from file inner join ndc on ndc.tin_number=file.tin_number where file.file_id = '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								$edit_status = $row['status'];
								$edit_emplnumber = $row['tin_number'];
								$edit_firstname = $row['plot_no'];
								$edit_lastname = $row['block'];
								$edit_cate = $row['file_category'];
								$flnm=$row['file_name'];
								$pr=$row['per'];
								$deal=$row['dealer'];
								$prtimage=$row['ndc_urgpic']
								
								?>
								<?php if($edit_emplnumber!=''){ ?>
								<form method="post">
									
										<div class="control-group">
										File Number :  
                                        <?php  echo '  ' . $edit_emplnumber ?>
                                          </div>
                                        
										<div class="control-group">
										Plot Number  :
                                         <?php  echo '  ' . $edit_firstname . ' - ' . $edit_lastname ?>
                                          </div>
                                          
                                          
										<div class="control-group">
										Name  : 
                                            <?php echo '   ' . $flnm   ?>
                                          </div>
                                         
                                        <div class="control-group">
										 <?php  echo  'Dealer Name' . '  =  ' . $deal    ?>
                                          </div>
                                        <div class="control-group">
										 <?php  echo  'Category' . '  =  ' . $edit_cate   ?>
                                          </div>  
										<div class="control-group">
										  Priority: 
                                            <?php echo '   ' . $pr . '  - ' . $row['ndc_rpt'] ;   ?>
                                          </div>
                                          
                                          
                                        
                                        <?php if($pr==='Urgent'){     ?>
                                        <div class="control-group" align="center">
                                          <?php echo "<img src='uploads_ndc/$prtimage' class='thumbnail' width='10' height='10'  >"; ?>	
                                        </div>  
                                        <?php } ?>
                                        
                                        <div class="control-group">
										  Wave OFF Status : 
                                            <?php echo '   ' . $row['ndc_waveoff'] ; $nwo= $row['ndc_waveoff'] ;  $nwop= $row['ndc_waveoffpic'] ;?>
                                          </div>
                                          
                                        <?php if($nwo==='Wave OFF'){     ?>
                                        <div class="control-group" align="center">
                                          <?php echo "<img src='uploads_waveoff/$nwop' class='thumbnail' width='10' height='10'  >"; ?>	
                                        </div>  
                                        <?php } ?>
                                        
                                            <div class="control-group">
											<label>N.D.C Action:</label>
											
                                          <div class="controls">
                                            <select name="sndat"  class="" required>
                                                
                                 <option value ="NDC Clear"> NDC Clear</option>
								 <option value ="NDC Not Clear"> NDC Not Clear</option>				
										
                                            </select>
                                          </div>
                                        </div>
                                       
                                       <div class="control-group">
											
                                          <input type="text" name="res"  placeholder="Reason"  required> 
                                          </div>
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								<?php } ?>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			<?php $tin_number=0; $ndcrpt=0;		
if (isset($_POST['update'])){

$tin_number = $row['tin_number'];
$plot_no = $row['plot_no'];
$block = $row['block'];
$bname = $_POST['bname'];
$fname = $_POST['fname'];
$add = $_POST['add'];
$res = $_POST['res'];

$cntno = $_POST['cntno'];
$sndat = $_POST['sndat'];
$per =$_POST['per'];
$ndcrpt =$_POST['whatever'];

if($get_id===''){echo 'Select File Number'; exit(); }
 
/*$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$emplnumber = $_POST['emplnumber'];
$status = $_POST['status'];
$username =$firstname.'.'.$lastname;
$password=12345;;*/

$user_query11 = mysqli_query($conn,"SELECT ndc_id FROM `ndc`")or die(mysqli_error());
						while($row11 = mysqli_fetch_array($user_query11)){
											
                                             $rnlno = $row11['ndc_id']; }
                                             $rnlno=$rnlno+1;
								echo 'Reference No' . $rnlno; 
$dat=0; 
date_default_timezone_set('Asia/Karachi'); 
$dat = date('Y/m/d');
$empno = date('Y/m/d');
$tim = date('h:m:s');
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','NDC Clear/Not ')")or die(mysqli_error()); echo 'Done' . $rnlno . $aplname;
  
$stj=2; 
if($sndat==='NDC Not Clear'){ $stj='10'; 
 mysqli_query($conn,"update ndc set ndc_stu = '$sndat',ndc_res='$res',ndc_stj='$stj',dat='$empno' where tin_number = '$tin_number' and ndc_stj='10'")or die(mysqli_error());
}    

else {
mysqli_query($conn,"update ndc set ndc_stu = '$sndat',ndc_res='$res',ndc_stj='$stj',dat='$empno' where tin_number = '$tin_number' and ndc_stj='10'")or die(mysqli_error());

mysqli_query($conn,"update file set st_ndc = '$sndat' where tin_number = '$tin_number' and st_ndc='Pending' ")or die(mysqli_error());

mysqli_query($conn,"update verification set ver_stj = '5' where tin_number = '$tin_number' and ver_stj='4'")or die(mysqli_error());

mysqli_query($conn,"UPDATE `borrow` SET `date_return`='$dat',`ti_return`='$tim',file_status='returned'  where tin_number = '$tin_number' and file_status='borrowed'")or die(mysqli_error());

mysqli_query($conn,"INSERT INTO `borrow` (`employee_number`, `tin_number`, `date_borrow`, `ti_barrow`, `file_status`, `date_return`, `ti_return`, `emp_request`, `cmnt`, reason, stj) VALUES ('18', '$tin_number', '$dat', '$tim', 'borrowed', '0', '0', 'record', '$res', 'NDC Complete', '1')")or die(mysqli_error());

mysqli_query($conn,"update file set trade_name = '18',status='borrowed' ,stj='$stj' where tin_number = '$tin_number' ")or die(mysqli_error());

echo 'N.D.C Sucessfully';
} 
?>
 <script>
  window.location = "edit_ndc2.php"; 
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






