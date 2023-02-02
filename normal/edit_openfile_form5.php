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
								
								$size = $row['cat'];
								$category = $row['file_category'];
								$booking_ref = $row['booking_ref'];
								$fector = $row['fector'];
								$form = $row['form_no'];
								
								
								?>
								<?php if($edit_emplnumber!=''){ ?>
								<form method="post" enctype="multipart/form-data">
									    <b> File_number = <?php echo ' ' .  $edit_emplnumber . ' - '  . 'Form # ' . $form  ?> <Br>
									    <b>  Plot_number = <?php echo ' ' .  $edit_lastname1 . ' ' . '/' .  $edit_firstname  ?> 
                                        <?php } ?>
                                        <input type="hidden" name="tin_no"  value="<?php echo $edit_emplnumber; ?>" > 
                                        
										<div class="control-group">
										<b> Block </b>    
                                        <input type="text" name="block"  value="<?php echo $edit_lastname; ?>"  required><br> 
                                        <b> Size </b><br>
                                        <input type="text" name="size"  value="<?php echo $size; ?>"  required> 
                                       
                                        <div class="control-group">
                                            <b> Category </b>
                                          <input type="text" name="cat"  value="<?php echo $category; ?>" required> 
                                        <br> <b> Booking Ref </b>
                                         <input type="text" name="book" value="<?php echo $booking_ref; ?>"  required> 
                                          </div>
                                       
                                        <div class="control-group">
										 <b> Factor </b>
                                          <input type="text" name="fector"  value="<?php echo $fector; ?>"  required> 
                                       
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
$block = $_POST['block']; $size = $_POST['size']; 
$cat = $_POST['cat']; $book = $_POST['book']; $fector = $_POST['fector']; 

  
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_name','G.M Edit Open Reg Form')")or die(mysqli_error()); echo 'Done' . $rnlno . $aplname;

 
mysqli_query($conn,"UPDATE `file` SET `block`='$block',`cat`='$size',`file_category`='$cat',`booking_ref`='$book',`fector`='$fector' where tin_number='$edit_emplnumber'")or die(mysqli_error());  


echo 'Open File  Sucessfully';
//} 
?>
 <script>
  window.location = "edit_openfile5.php"; 
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
*/
?>






