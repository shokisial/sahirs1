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
 $plotno = $_POST['plotno'];
 $address = $_POST['address'];
 $scnic = $_POST['scnic'];
 $block = $_POST['block'];
 $cat =  $_POST['cat'];
 $cty = $_POST['cty'];
 
 $flcat = $_POST['flcat'];
 $altno = $_POST['altno'];
 $bname = $_POST['bname'];
 $fname= $_POST['fname'];
 $add= $_POST['add'];
 $cnic = $_POST['cnic'];
 
 $jbname = $_POST['jbname'];  
 $jfname= $_POST['jfname'];
 $jadd= $_POST['jadd'];
 $jcty = $_POST['jcty'];
 $jcnic = $_POST['jcnic'];
 
 $gdn= $_POST['gdn'];
 $altdat=$_POST['altdat'];
 $typ=$_POST['typ']; 
 $dat=0; 
date_default_timezone_set('Asia/Karachi'); 
$dat = date('d');
$empno = date('m/Y');
?>
 
 
 <br><br><br><br><br><br><br><br>
 <br><br><br><br><br><br><br>
 <br><br>
 
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<h2 align="center">Transferee Affidavit/Undertaking </h2></strong></p>
<p>&nbsp;</p>
<p style="font-size:15px" style="text-align: justify;">Affidavit of That I have applied for the transfer of the said Allotment in the name of <strong><u>&nbsp; <u> <b>  <? echo '   ' . $bname . '   '; ?> </u>&nbsp;&nbsp;&nbsp;&nbsp;</u></b></strong><strong>&nbsp;<u> <b>  <? echo '   ' . 'S/W/D/O'. '   '; ?> </u></b>&nbsp;&nbsp; <u> <b>  <? echo '   ' . $fname . '   '; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp;  </u></strong>Resident of <strong><u>&nbsp; <u> <b>  <? echo '   ' . $add . '   ' . '  ' . $cty; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp; </u> CNIC No.  &nbsp; <u> <b>  <? echo '   ' . $cnic . '   '; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>

    <?php if($typ==='Joint'){ ?> <u><b> <? echo '/ ' .  $jbname; ?>&nbsp;&nbsp;  </u></b> S/W/D/O &nbsp;&nbsp; <u> <b>  <? echo '   ' .$jfname; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp;Bearing CNIC, <u>&nbsp;&nbsp; <b> <u><? echo $jcnic; ?> </u></b> </b></u>&nbsp; </u> &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; R/O &nbsp;&nbsp; <b> <u><? echo $jadd; ?>&nbsp;&nbsp; <? echo $jcty; ?> &nbsp;&nbsp;&nbsp; </b> </u> <? } ?>
    
        </u>
        
        &nbsp;&nbsp; &nbsp;&nbsp; </u></strong>hereby solemnly affirms and declares on oath as under:-</p>
<p style="font-size:15px" style="text-align: justify;">That I have applied to transfer for a <strong>House/Plot<u>&nbsp;<u> <b>  <? echo '   ' . $plotno . '   '; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp;  </u></strong><strong></strong><strong><u>&nbsp;&nbsp;&nbsp; <u> <b>  <? echo '   ' . $block . '   '; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp;  </u></strong><strong> Measuring</strong> <strong><u>&nbsp;&nbsp; <u> <b>  <? echo '   ' . $cat . '   '; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </u></strong>in the Khayaban-e-Amin 561/28vide. <strong>Allocation letter no:<u>&nbsp;&nbsp;&nbsp; <u> <b>  <? echo '   ' . $altno . '   '; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp; </u> Dated </strong><strong><u>&nbsp;&nbsp;<u> <b>  <? echo '   ' . $altdat . '   '; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp; &nbsp;&nbsp; </u></strong><strong>&nbsp;</strong>as stated in Part D and E or the application form (Form 1-A).That I undertake that I shall pay the amount of <strong>C.V.T</strong> due (<strong>under section 7 of the Finance Act 1989</strong>) as and when called by M/s Sahir Associates (Pvt) Ltd, or become due against me in connection with this transaction according to the rules of concerned department if applicable. Also, I would be liable to clear the outstanding account of maintenance charges/ utility bills of this property if not paid yet.</p>
<p style="font-size:15px" style="text-align: justify;">That I undertake to abide by the terms and conditions laid down in the application (form1)and other bye-laws / rules and regulation / policies as framed and amended from time by the management of Khayaban-e-Amin / M/s Sahir Associates (Pvt.) Ltd.</p>
<p style="font-size:15px" style="text-align: justify;">I certify that the information tendered by me is correct and nothing has been concealed in Application Form (Form-1-A) by me.</p>
<p style="font-size:15px"  style="text-align: justify;">That what have been stated above is correct to the best of my knowledge and belief.</p>
<br><br><br>
<p align="right">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;___________________&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
<p align="right">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>Deponent</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p>
<h3><u>VERIFICATION&nbsp;</u></h3>

<p style="font-size:15px">Verified on oath this _______________________ day of _____________________, that contents of the above affidavit are true and correct to the best of my knowledge and belief and that nothing has been concealed therein</p>
<br><br>
<p align="right">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;___________________&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
<p align="right">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>Deponent</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p>

</body>
</html>