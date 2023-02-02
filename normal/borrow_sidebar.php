
<html>
    
<head>
 <script>
     $(function(){
  var current_page_URL = location.href;
  $( "a" ).each(function() {
     if ($(this).attr("href") !== "#") {
       var target_URL = $(this).prop("href");
       if (target_URL == current_page_URL) {
          $('nav a').parents('li, ul').removeClass('active');
          $(this).parent('li').addClass('active');
          return false;
       }
     }
  });
});
 </script>
 </head>
 <body>		

 <div class="span2" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                    
						<?php if($session_id==='0') { ?>
                        
                            <li>
                            <a href="user_report.php" ><i class="icon-chevron-left"></i><i class="icon-file"></i>Issued Files</a>
                        </li>
                        <li>
                            <a href="edit_user.php"><i class="icon-chevron-left"></i><i class="icon-file"></i>Borrow File</a>
                            <?php } ?>
                            
                        <?php if($session_id==='1') { ?>
                        <li >
                            <a href="edit_user.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Borrow File</a>
                            <a href="edit_user_edit.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Edit Record</a>
                            <li >
                            <a href="edit_openfile5.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Open Form Inventory</a>
                            <li >
                            <a href="edit_openfile1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Open Form Ready Edit File</a> </li>
                         <?php } ?>   
                        <? if($session_id==='7' or $session_id==='1' ) { ?>
                        <li>
                            <a href="user_report.php" ><i class="icon-chevron-right"></i><i class="icon-file"></i>Issued Files</a>
                        </li>
                        <li >
                            <a href="edit_user1.php" ><i class="icon-chevron-right"></i><i class="icon-file"></i>Verification Apply</a>
                        
                        </li>
                        <li >
                            <a href="edit_ndc1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>N.D.C Apply</a>
                        
                        </li>
                        <li>
                            <a href="edit_transfer2.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>N.D.C Set</a>
                        </li>
                        
                        <li>
                            <a href="edit_transfer1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer Apply</a>
                        </li>
                        
                        <li>
                            <a href="edit_user20.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Open File Edit</a>
                        </li>
                        
                        <li>
                            <a href="edit_openfile1.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Open Form Reg</a>
                        </li>
                        
                        
                        <li>
                            <a href="edit_user11.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer Ready File</a>
                        </li>
                        <li>
                            <a href="edit_openfile7.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Open Form Ready File</a>
                        </li>
                        
                        <ul>
                            <li>
                            Reports
                            </li>
                            
                            
                        <li>
                            <a href="edit_ver_rpt.php" target="_blank"><i class="icon-chevron-right"></i><i class="icon-file"></i>Verification Report</a>
                        </li>
                        
                        
                        <li>
                            <a href="edit_ndc_rpt.php" target="_blank"><i class="icon-chevron-right"></i><i class="icon-file"></i>N.D.C Report</a>
                        </li>
                        
                        <li>
                            <a href="edit_trns_rpt.php" target="_blank"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer Report</a>
                        </li>
                        </ul>
                        
                        <li>
                            <a href="http://sahirs.com/ebill/admin/excel/billsheet3.php" target="_blank"><i class="icon-chevron-right"></i><i class="icon-file"></i>Electricity Bill</a>
                        </li>
                        
                        <li>
                            <a href="https://www.sahirs.com/ebill/admin/excel/indexsch.php" target="_blank"><i class="icon-chevron-right"></i><i class="icon-file"></i>Water Bill </a>
                        </li>
                        
                        


                        <? } ?>
                        
                        <? if($session_id==='8' or $session_id==='14' ) { ?>
                        <li>
                            <a href="user_report.php" ><i class="icon-chevron-right"></i><i class="icon-file"></i>Issued Files</a>
                        </li>
                        <li>
                            <a href="edit_user1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Verification Apply</a>
                        </li>
                        <? } ?>
                        
                        
                        <? if($session_id==='9' or $session_id==='20') { ?>
                        <li>
                            <a href="user_report.php" ><i class="icon-chevron-right"></i><i class="icon-file"></i>Issued Files</a>
                        </li>
                        
                        <li>
                            <a href="edit_ndc1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>N.D.C Apply</a>
                            
                        </li>
                        <li>
                            <a href="edit_transfer2.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>N.D.C Set</a>
                        </li>
                        
                        
                        
                        <? } ?>
                        
                        
                        <? if($session_id==='9') { ?>
                        <li>
                            <a href="edit_transfer1.1.php" ><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer Ready File</a>
                        </li>
                        <? } ?>
                        
                        <? if($session_id==='12' ) { ?>
                        
                       <li>
                            <a href="user_report.php" ><i class="icon-chevron-right"></i><i class="icon-file"></i>Issued Files</a>
                        </li>
                        
                        <li>
                            <a href="edit_user3.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Verification File</a>
                        </li>
                        
                        <li>
                            <a href="edit_user8.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer Ready File</a>
                        </li>
                        <li>
                            <a href="edit_user106.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Open Form Ready</a>
                        </li>
                        
                        <? } ?>
                        
                        <? if($session_id==='16' or $session_id==='17') { ?>
                        <li>
                            <a href="user_report.php" ><i class="icon-chevron-right"></i><i class="icon-file"></i>Issued Files</a>
                        </li>
                        <li>
                            <a href="edit_user3.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Verification File</a>
                        </li>
                        
                        <? } ?>
                        
                        
                        <? if($session_id==='17' ) { ?>
                        
                        <li>
                            <a href="edit_user4.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>N.D.C File</a>
                        </li>
                        <li>
                            <a href="edit_user12.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer Ready File</a>
                        </li>
                        
                         <li >
                            <a href="edit_openfile6.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Open Form Ready File</a>
                        <? } ?>
                        
                        <? if($session_id==='20' ) { ?>
                        <li>
                            <a href="edit_user13.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer Ready File</a>
                        </li>
                        <li>
                            <a href="edit_openfile8.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Open Reg Ready File</a>
                        </li>
                        <li >
                            <a href="edit_user.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Borrow File</a>
                       </li>
                        
                        <? } ?>
                        
                        <? if($session_id==='10' or $session_id==='11' or $session_id==='13') { ?>
                        <li >
                            <a href="edit_user.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Borrow File</a>
                       <li>
                            <a href="user_report.php" ><i class="icon-chevron-right"></i><i class="icon-file"></i>Issued Files</a>
                        </li>
                        <li>
                            <a href="edit_user7.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer Ready File</a>
                        </li>
                        
                        
                        <? } ?>
                        
                        <? if($session_id==='10' ) { ?>
                        <li>
                            <a href="edit_openfile1.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Open Form Reg</a>
                        </li>
                        
                        <li>
                            <a href="edit_user104.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Open Form Ready File</a>
                        </li>
                        <? } ?>
                        
                        <? if($session_id==='21' ) { ?>
                       <li >
                            <a href="edit_user.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Borrow File</a>
                       </li>
                           
                        <li>
                            <a href="user_report.php" ><i class="icon-chevron-right"></i><i class="icon-file"></i>Issued Files</a>
                        </li>
                        <li>
                            <a href="edit_user10.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer Ready File</a>
                        </li>
                        
                        <li >
                            <a href="edit_openfile4.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Open Form Ready File</a>
                        </li>
                        <? } ?>
                        
                        
                        <? if($session_id==='15') { ?>
                       <li>
                            <a href="user_report.php" ><i class="icon-chevron-right"></i><i class="icon-file"></i>Issued Files</a>
                        </li>
                        <li>
                            <a href="edit_user8.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer Ready File</a>
                        </li>
                        <li>
                            <a href="edit_user106.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Open Form Ready File</a>
                        </li>
                        
                        <? } ?>
                        
                        
                        
                        <? if($session_id==='18' or $session_id==='17') { ?>
                        <li>
                            <a href="user_report.php" ><i class="icon-chevron-right"></i><i class="icon-file"></i>Issued Files</a>
                        </li>
                        <li>
                            <a href="edit_user4.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>N.D.C File</a>
                        </li>
                        
                        <li>
                            <a href="edit_user6.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>N.D.C Clear </a>
                        </li>
                        
                        <?php /*
                        <li>
                            <a href="edit_user5.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer File</a>
                        </li> */ ?>
                        
                        <? } ?>
                        
                        <? if($session_id==='2' or $session_id==='3' or $session_id==='5') { ?>
                        
                        <li >
                            <a href="edit_user.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Borrow File</a>
                        <li>
                            <a href="user_report.php" ><i class="icon-chevron-right"></i><i class="icon-file"></i>Issued Files</a>
                        </li>
                        <li>
                            <a href="edit_user4.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Verification File</a>
                        </li>
                        
                        <li>
                            <a href="edit_ndc2.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>N.D.C Apply</a>
                        </li>
                        <li>
                            <a href="edit_transfer4.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer Apply</a>
                        </li>
                        
                        <li>
                            <a href="edit_user9.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer Ready File</a>
                        </li>
                        
                        <li>
                            <a href="edit_openfile3.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Open Form Reg</a>
                        </li>
                        <li>
                            <a href="http://sahirs.com/ebill/admin/excel/billsheet3.php" target="_blank"><i class="icon-chevron-right"></i><i class="icon-file"></i>Electricity Bill</a>
                        </li>
                        
                        <li>
                            <a href="https://www.sahirs.com/ebill/admin/excel/indexsch.php" target="_blank"><i class="icon-chevron-right"></i><i class="icon-file"></i>Water Bill </a>
                        </li>
                        
                        <? } ?>
                        
                        
                    </ul>
                </div>
                
<?php /*
<li >
                            <a href="files_in.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Files In Possesion (
							<?php 
					$received = mysqli_query($conn,"select * from borrow where file_status='borrowed' and employee_number='$empno'")or die(mysqli_error());
					$receiveda = mysqli_num_rows($received);
					echo '<font color="Red">'  . $receiveda .'</font>';

							?> )
							
							</a>
                        </li>
						<li >
                            <a href="pending_borrow.php"><i class="icon-chevron-right"></i><i class="icon-envelope"></i>Pending to Borrow (
							<?php 
					$received = mysqli_query($conn,"SELECT * FROM borrow_request WHERE status = 'not_confirmed' and employee_number='$empno'")or die(mysqli_error());
					$receiveda = mysqli_num_rows($received);
					echo '<font color="Red">'  . $receiveda .'</font>';

							?>  )</a>
				
                        </li>	
						<li >
                            <a href="pending_return.php"><i class="icon-chevron-right"></i><i class="icon-envelope"></i>Pending to Return (
							<?php 
					$received = mysqli_query($conn,"SELECT * FROM return_request WHERE status = 'not_confirmed' and employee_number='$empno'")or die(mysqli_error());
					$receiveda = mysqli_num_rows($received);
					echo '<font color="Red">'  . $receiveda .'</font>';

							?>  )</a>
							
                        </li>
                        */ ?>
                        
                        