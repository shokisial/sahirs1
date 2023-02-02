<?php include('refresh.php'); ?>
<?php  include('header.php'); ?>
<?php  include('../session.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
					<?php include('borrow_sidebar.php'); ?>
                <!--/span-->
                <div class="span9" id="content">
						<div class="row-fluid"></div>
						
                    <div class="row-fluid">
            
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">STATISTICS</div>
                            </div>
                            <div class="block-content collapse in">
							        <div class="span12">
						
									<?php 
								$query = mysqli_query($conn,"select * from file")or die(mysqli_error());
								$count = mysqli_num_rows($query);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count; ?>"><?php echo $count; ?></div>
                                    <div class="chart-bottom-heading"><strong>Total Files</strong>

                                    </div>
                                </div>
								
								<?php 
								$query1 = mysqli_query($conn,"SELECT * FROM `borrow` WHERE `file_status`='borrowed'")or die(mysqli_error());
								$count1 = mysqli_num_rows($query1);
								?>
								
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count1; ?>"><?php echo $count1; ?></div>
                                    <div class="chart-bottom-heading"><strong>Issued Files</strong>

                                    </div>
                                </div>
								
								<?php /*
								$query2 = mysqli_query($conn,"select * from return_request where employee_number='$empno' and status = 'not_confirmed'")or die(mysqli_error());
								$count2 = mysqli_num_rows($query2);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count2 ?>"><?php echo $count2; ?></div>
                                    <div class="chart-bottom-heading"><strong>Pending Return Requests</strong>

                                    </div>
                                </div>	

								<?php */
								$query3 = mysqli_query($conn,"select * from file where stj = '0'")or die(mysqli_error());
								$count3 = mysqli_num_rows($query3);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count3 ?>"><?php $count3=$count-$count1; echo $count3; ?></div>
                                    <div class="chart-bottom-heading"><strong>Free Files</strong>

                                    </div>
                                </div>
						
                            </div>
                        </div>
                        <!-- /block -->
						
                    </div>
                    </div>
                
                </div>
            </div>
    
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>

</html>