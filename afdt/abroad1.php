
<html>
	
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> SAHIR File Manager</title>

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


<div>
I ________________________________________________________ 

R/O _______________________________________________________

CNIC No. ____________________________________on behalf of  <b><? echo $bname; ?></b> _ S/O <b><? echo $fname; ?></b>

holding CNIC # <? echo $cnic; ?> do hereby solemnly affirm and decalre as under:

1.    That  __________________ have purchased the a   <? echo $plotno . ' ' ;?> measuring <? echo $flcat; ?> in the Kahayan-e-Amin Defence Road, Lahore,from ________________________________ holding CNIC # _____________
2.   I undertake that the original Purchaser of above mentioned plot is presently not in Pakistan, so he/she 
    cannot sign the transfer papers regarding the above mentioned plot in Khayaban-e-Amin’s Office.
    
3.	I also assure you and undertake that Iwill sign all the necessary documents about transfer of siad plot 

in your office. Whenever he comes back to Pakistan.

4.	I further undertake that both seller and purchaser are themselves responsible for the sale price of the 

said plot and will not claim Sahir Associates (Pvt) Ltd in case of any dispute if arises between 

seller and purchaser.

5.	That whatsoever is stated is true to the best of my knowledge and belief.
</div>
<table>
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
<div>
Verified on oath this ____<? echo  $dat; ?>_____________ day of _ <? echo $empno; ?>________, that contents of the
above    affidavit are true and correct to the best of my knowledge and belief and that nothing has been concealed 
therein
</div>
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