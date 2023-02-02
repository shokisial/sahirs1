
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
<body onload="myFunction()">


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
 $add= $_POST['add'];
 $cnic = $_POST['cnic'];
 $dat=0; 
date_default_timezone_set('Asia/Karachi'); 
$dat = date('d');
$empno = date('m/Y');
?>


<table width="800" border="0">
  <tbody>
      <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br> <br>
      <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br> <br>
 <tr>   
      <td align="center"> <h2> Affidavit/Undertaking </h2></td>
</tr>
<tr>
<td>

Affidavit of That I have applied for the transfer of the said Allotment in the name of<b><? echo '  ' . $bname; ?></b> _ S/W/O  <b> </td><tr> <td>
<? echo $fname; ?></b>Resident of <b><? echo '  ' . $add; ?></b> hereby solemnly affirms and declares on oath as under:-
</td><tr> <td>
That I have applied to transfer for a House/Plot <? echo $plotno . ' ' . $block ; ?> measuring <? echo ' ' . $flcat; ?> in the Kahayan-e-Amin vide.
</td><tr> <td>
Allocation / Allotment letter No: <? echo ' ' . $altno; ?> Dated : ______ as stated in Part D and E or the application
</td><tr> <tr><tr><tr><tr><tr>
<br>
<td>
form (Form 1-A).That I undertake that I shall pay the amount of C.V.T due (under section 7 of the Finance
</td><tr> <td>
Act 1989) as and when called by M/s Sahir Associates (Pvt) Ltd, or become due against me in connection
</td><tr> <td>
with this transaction according to the rules of concerned department if applicable.
</td><tr> <td>
That I undertake to abide by the terms and conditions laid down in the application (form1) and any
</td><tr> <td>
other bye-laws / rules and regulation / policies as framed and amended from time by the management of
</td><tr> <td>
Khayaban-e-Amin / M/s Sahir Associates (Pvt.) Ltd.
</td><tr> <td>
I certify that the information tendered by me is correct and nothing has been concealed in Application
</td><tr> <td>
 Form (Form-1-A) by me.
</td></tr> <td>
That what have been stated above is correct to the best of my knowledge and belief.
</td><tr> <td>
<tr> <tr><tr><tr><tr><tr>
<td align="right"> __________________ </td> 
<tr><tr><tr><tr><tr>
<td align="right">Deponent
</td>
<br>
<br>
<tr>
    <tr><tr><tr><tr><tr>
    <td align="left">
<b><u>VERIFICATION </u></b></td>

<tr> <tr><tr><tr><tr>
 <td>   
Verified on oath this ____<? echo  $dat; ?>_____________ day of _ <? echo $empno; ?>________, that contents of the
above 
</td><tr> <td>
    affidavit are true and correct to the best of my knowledge and belief and that nothing has been
concealed therein
</td>
</tr>

<td align="right"> __________________ </td> 
<tr><tr><tr><tr><tr>
<td align="right">Deponent
</td>
</tr>
</table>




</body>
</html>