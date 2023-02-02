<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> SAHIR File Manager</title>
<style type="text/css">


   input {font-weight:bold;}


<style type="text/css" media="print">
    @page { 
        size: 8.25 X 13;
        destination: Save as PDF;
    }
    
</style>
</style>
<style>
p.small {
  line-height: 0.7;
}

p.big {
  line-height: 1.8;
}
</style>

</head>
<body style="margin:100px;"  justify-content:center; onload="myFunction()">


<script>
function myFunction() {
    window.print();
}
</script>


<?php
 include('header2.php');
 include('../session.php'); 
 $get_id = $_GET['id'];
 $seller = $_POST['seller'];
 $flfname = $_POST['flfname'];
 $jseller = $_POST['jseller']; 
 $jflfname = $_POST['jflfname']; 
 
 $plotno = $_POST['plotno'];
 $address = $_POST['address'];
 $ct = $_POST['ct'];
 
 $ct=$_POST['ct'];
 $jaddress = $_POST['jaddress'];
 $jct=$_POST['jct'];
 
 $scnic = $_POST['scnic'];
 $block = $_POST['block'];
 $cat =  $_POST['cat'];
 
 $flcat = $_POST['flcat'];
 $altno = $_POST['altno'];
 $bname = $_POST['bname'];
 $fname= $_POST['fname'];
 $add= $_POST['add'];
 $cnic = $_POST['cnic'];
 $gdn= $_POST['gdn'];
 $altdat=$_POST['altdat'];
 $cty=$_POST['cty'];
 $jscnic = $_POST['jscnic']; 
 $typ=$_POST['typ']; 
 $dat=0; 
date_default_timezone_set('Asia/Karachi'); 
$dat = date('d');
$empno = date('m/Y');
?>
 <br><br><br><br><br><br><br><br>   
 <br><br><br><br><br><br><br><br>
 <br><br><br><br>
 
 <br><br><br>
 

 
<p style="text-align: center; ">&nbsp;</p>

<h2 align="center">Affidavit by the Transferor </h2></strong></p>

<p style="font-size:15px" style="text-align: justify; " > Affidavit of  <strong><u>&nbsp;&nbsp;  <b> <?php echo $seller; ?>&nbsp;&nbsp;  </u></b> S/W/D/O &nbsp;&nbsp; <u> <b>  <?php echo '   ' .$flfname; ?></u> &nbsp;</b> </strong> Resident&nbsp; of &nbsp;<?echo $address . ' ,  ' . $ct;?></p>
<p style="font-size:15px" style="text-align: justify;">bearing CNIC No.<u>&nbsp;&nbsp; <u> <b>  <?php echo '   ' .$scnic; ?> &nbsp;&nbsp;&nbsp; </u></b> </strong>

<?php if($typ==='Joint'){ ?> <u><b> <?php echo '/ ' . $jseller; ?>&nbsp;&nbsp;  </u></b> S/W/D/O &nbsp;&nbsp; <u> <b>  <?php echo '   ' .$jflfname; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp;Bearing CNIC, <u>&nbsp;&nbsp; <b> <u><?php echo $jscnic; ?> </u></b> </b></u>&nbsp; </u> &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; R/O &nbsp;&nbsp; <b> <u><?php echo $jaddress; ?>&nbsp;&nbsp; <?php echo $jct; ?> &nbsp;&nbsp;&nbsp; </b> </u> <?php } ?>
    
    
do hereby solemnly affirm and on oath as under:-</p>
<p style="font-size:15px" style="text-align: justify;">That I was allocated a House  /  Plot<u> &nbsp;&nbsp; <u> <b>  <?php echo '   ' .$plotno . '  '; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp; </u> <u> <b>  <?php echo $block; ?> </u></b></strong> <strong> - measuring</strong><strong> <u>&nbsp;&nbsp; <u> <b>  <?php echo '   ' .$cat; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b></u></strong>in the Kahayan-e-Amin vide. <strong>Allocation / Allotment letter No:<u> &nbsp;&nbsp; <u> <b>  <?php echo '   ' .$altno; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp;</u>Dated</strong> : <strong><u>&nbsp;<u> <b>  <?php echo '   ' .$altdat; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp; </u></strong></p>
<p style="font-size:15px" style="text-align: justify;">That I have applied for the transfer of the said Allotment in the name of <strong>Mr / Ms </strong>   <u> <b>  <?php echo '   ' .$bname; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>S/W/D/O &nbsp;&nbsp;  </u></b>&nbsp;&nbsp; <u> <b>  <?php echo '    ' .$fname; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp; </u>Resident of <u>&nbsp; <u> <b>  <?php echo '   ' .$add . '   ' . $cty; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp; </u></strong>thereby relinquishing all my rights, title interest etc. In favor of the above, and I have no objection whatsoever in respect of transfer of my allocation in the name of above said person.Also, I would be liable to clear the outstanding account of maintenance charges/ utility bills of this property if not paid yet,</p>
<p style="font-size:15px" style="text-align: justify;">I hereby return the original allotment letter and payment schedule for cancellation so that the same be issue in favor of That I have applied for the transfer of the said allotment in the name of <strong>Mr./Ms.</strong> <strong><u>&nbsp; <u> <b>  <?php echo '   ' .$bname; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp; </u>
S/W/D/O &nbsp; <?php echo '   ' .$gdn; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u> &nbsp;<u> <b>  <?php echo '       ' .$fname; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp; </u>Resident of <u>&nbsp; <u> <b>  <?php echo '   ' .$add . '  ' . $cty; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp;<u> <b>  <?php echo '   ' . 'CNIC #' . '  ' .$cnic; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp;  </u></strong><u>t</u>hat what have been stated above in correct to be best of my knowledge and belief.</p>
<p></p>
<br>
<p align="right" style="font-size:15px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;___________________&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>

<p align="right" style="font-size:15px">  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>Deponent</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p>

<h3><u><b>VERIFICATION </b></u></h3>

<p style="font-size:15px">Verified on oath this ___________________________ day of _____________________, that contents of the above affidavit are true and correct to the best of my knowledge and belief and that nothing has been concealed therein</p>
<br><br>
<p align="right" style="font-size:15px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;___________________&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>

<p align="right" style="font-size:15px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>Deponent</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p>