
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
<body style="margin:100px;"  justify-content:center;  onload="myFunction()">


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
 $plotno = $_POST['plotno'];
 $block = $_POST['block'];
 $flcat = $_POST['flcat'];
 $altno = $_POST['altno'];
 $bname = $_POST['bname'];
 $fname= $_POST['fname'];
 $gdn = $_POST['gdn'];
 $add= $_POST['add'];
 $cnic = $_POST['cnic'];
 $cat = $_POST['cat'];
 $ct = $_POST['ct'];
 $dat=0; 
 
 $typ=$_POST['typ']; 
 
 $jbname = $_POST['jbname'];  
 $jfname= $_POST['jfname'];
 $jadd= $_POST['jadd'];
 $jcty = $_POST['jcty'];
 $jcnic = $_POST['jcnic'];


date_default_timezone_set('Asia/Karachi'); 
$dat = date('d');
$empno = date('m/Y');
?>

 <br><br><br><br><br><br><br><br>   
 <br><br><br><br><br><br><br><br>
 <br><br><br><br><br><br><br><br>
 
 <h2 align="center">BUYER UNDERTAKING/AFFIDAVIT FOR TAX </h2></strong></p>

<p><strong>&nbsp;</strong></p>
<p style="font-size:20px" style="text-align: justify;">I, <u><b> <? echo $bname; ?>&nbsp;&nbsp;  </u></b></u> S/W/D/O &nbsp;&nbsp; <u> <b>  <? echo '   ' .$fname; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp;Bearing CNIC, <u> <b> <u><? echo $cnic; ?> </u></b>&nbsp;&nbsp; &nbsp;R/O &nbsp;&nbsp; <b> <u><? echo $add . '   ' . $ct; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></u>&nbsp;</u>

    <?php if($typ==='Joint'){ ?> <u><b> <? echo '/ ' .  $jbname; ?>&nbsp;&nbsp;  </u></b> S/W/D/O &nbsp;&nbsp; <u> <b>  <? echo '   ' .$jfname; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp;Bearing CNIC, <u>&nbsp;&nbsp; <b> <u><? echo $jcnic; ?> </u></b> </b></u>&nbsp; </u> R/O &nbsp;&nbsp; <b> <u><? echo $jadd; ?> <? echo $jcty; ?> &nbsp;&nbsp;&nbsp; </b> </u> <? } ?>
    
        </u>
        
        </u> 
        solemnly affirm and declare that I have paid all applicable government taxes / duties such as stamp duty, withholding tax, corporation fee &amp; cvt etc with respect to residential / commercial Plot  / House / Apartment No.<u> &nbsp;&nbsp; <b> <? echo $plotno; ?> </u></b>&nbsp;&nbsp; </u>measuring &nbsp;&nbsp; 
    <b><u><? echo $cat; ?> </u></b>&nbsp;&nbsp; Category &nbsp;&nbsp; <b> <u> <? echo $flcat; ?> </u></b>&nbsp;&nbsp; situated at&nbsp; block &nbsp;&nbsp; <b> <u><? echo $block; ?> </u></b>&nbsp;&nbsp;  Khayaban-e-Amin housing Scheme, Lahore. Therefore, I submit the original receipts with M/s Sahir Associates (pvt) limited so that the same may become part of file of plot mentioned herein above. The undersigned takes complete responsibility regarding genuineness of receipts/stamp paper of taxes   / duties. In case later on any deficiency or defect concerning payment of taxes surfaced by FBR relating to this plot the undersigned shall be solely responsible to cure such deficiency or defect.</p>
<p>&nbsp;</p>
<table width="696">
<tbody>
<tr>
<td width="213">
<p style="font-size:20px"><strong>Said</strong></p>
<p>&nbsp;</p>
<p style="font-size:20px"><strong>Mr. ________________</strong></p>
<p>&nbsp;</p>
<p style="font-size:20px"><strong>CNIC_______________</strong></p>
</td>
<td width="213">
<p>&nbsp;</p>
</td>
<td width="270">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>