<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>SAHIR FILE MANAGER</title>
        <!-- Bootstrap -->
			<link href="../admin/images/favicon.ico" rel="icon" type="image">
			<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
			<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
			<link href="bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
			<link href="bootstrap/css/my_style.css" rel="stylesheet" media="screen">
			<link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
			<link href="assets/styles.css" rel="stylesheet" media="screen">

		<link href="vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
		<script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<!-- data table -->
		<link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<!-- notification  -->
		<link href="vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
		<!-- wysiwug  -->
		<link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
	
		<script src="vendors/jGrowl/jquery.jgrowl.js"></script>
		<script type = "text/javascript" >
    history.pushState(null, null, 'dashboard.php');
    window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'dashboard.php');
    });
    </script>
    </head>
<?php include('../connection/dbcon.php'); ?>