 <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                      <li> <a href="dashboard.php"><i class="icon-chevron-right"></i><i class="icon-home"></i>&nbsp;Dashboard</a> </li>
					<li class="active">
                            <a href="edit_user.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Borrow File</a>
                        </li>
					<? /*	<li>
                            <a href="return_file.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Return File</a>
                        </li>
					*/ ?>	
						<li>
                            <a href="user_report.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Issued Files</a>
                        </li>
                        <? if($session_id==='7' or $session_id==='1') { ?>
                        <li>
                            <a href="edit_user1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Verification Files</a>
                        </li>
                        <li>
                            <a href="edit_ndc1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>N.D.C Files</a>
                        </li>
                        <li>
                            <a href="edit_transfer2.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer Set</a>
                        </li>
                        
                        <li>
                            <a href="edit_transfer1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer Files</a>
                        </li>
                        
                        <li>
                            <a href="edit_openfile1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Open File Reg</a>
                        </li>
                        
                        
                        <li>
                            <a href="edit_user11.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Ready File</a>
                        </li>
                        
                        
                        
                        <li>
                            <a href="http://sahirs.com/ebill/admin/excel/billsheet3.php" target="_blank"><i class="icon-chevron-right"></i><i class="icon-file"></i>Electricity Bill</a>
                        </li>
                        
                        <li>
                            <a href="https://www.sahirs.com/ebill/admin/excel/indexsch.php" target="_blank"><i class="icon-chevron-right"></i><i class="icon-file"></i>Water Bill </a>
                        </li>
                        
                        <? } ?>
                        
                        <? if($session_id==='12' ) { ?>
                        <li>
                            <a href="edit_user3.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Verification File</a>
                        </li>
                        
                        <? } ?>
                        
                        <? if($session_id==='16' ) { ?>
                        <li>
                            <a href="edit_user3.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Verification File</a>
                        </li>
                        
                        <? } ?>
                        
                        
                        <? if($session_id==='17' ) { ?>
                        <li>
                            <a href="edit_user12.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Ready File</a>
                        </li>
                        
                        <? } ?>
                        
                        <? if($session_id==='20' ) { ?>
                        <li>
                            <a href="edit_user13.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Ready File</a>
                        </li>
                        
                        <? } ?>
                        
                        <? if($session_id==='10' ) { ?>
                        <li>
                            <a href="edit_user7.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Ready File</a>
                        </li>
                        
                        <? } ?>
                        
                        <? if($session_id==='21' ) { ?>
                        <li>
                            <a href="edit_user10.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Ready File</a>
                        </li>
                        
                        <? } ?>
                        
                        
                        <? if($session_id==='12'  or $session_id==='15') { ?>
                        <li>
                            <a href="edit_user8.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Ready File</a>
                        </li>
                        
                        <? } ?>
                        
                        
                        
                        <? if($session_id==='18' ) { ?>
                        <li>
                            <a href="edit_user4.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>N.D.C File</a>
                        </li>
                        
                        <li>
                            <a href="edit_user6.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>N.D.C Clear </a>
                        </li>
                        
                        
                        <li>
                            <a href="edit_user5.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer File</a>
                        </li>
                        
                        <? } ?>
                        
                        <? if($session_id==='2' or $session_id==='3' or $session_id==='5') { ?>
                        <li>
                            <a href="edit_user4.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Verification File</a>
                        </li>
                        
                        <li>
                            <a href="edit_ndc2.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>N.D.C Files</a>
                        </li>
                        <li>
                            <a href="edit_transfer4.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Transfer Files</a>
                        </li>
                        
                        <li>
                            <a href="edit_user9.1.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>Ready File</a>
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
                
<? /*
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