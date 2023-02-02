
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
 $gdn= $_POST['gdn'];
 $altdat=$_POST['altdat'];
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
      <td align="center"> <h2> Affidavit by the Transferor </h2></td>
</tr>
<tr>
<td>

Affidavit of <b><? echo $seller; ?></b> _ S/O __________ Resident of
</td><tr> <td>
_____________________do hereby solemnly affirm and on oath as under:-
</td><tr> <td>
That I was allocated a House / Plot <? echo $plotno . ' ' . $block ; ?> measuring <? echo $flcat; ?> in the Kahayan-e-Amin vide.
</td><tr> <td>
Allocation / Allotment letter No: <? echo $altno; ?> Dated : <? echo $altdat; ?> 
</td><tr> <tr><tr><tr><tr><tr>
<br>
<td>
That I have applied for the transfer of the said Allotment in the name of <? echo $bname; ?>  
</td><tr> <td>
<? echo ' ' . $gdn . ' ' . $fname; ?> Resident of <? echo $add; ?>
</td><tr> <td>
 thereby relinquishing all my rights, title interest etc. In favour of the above, and I 
</td><tr> <td>
have no objection whatsoever in respect of transfer of my allocation in the name of above said person.
</td><tr> <td>
I hereby return the original allotment letter and payment schedule for cancellation so that the same be issue
</td><tr> <td>
in favour of That I have applied for the transfer of the said allotment in the name of <?echo $bname; ?> W/O
</td><tr> <td>
<? echo $fname; ?> Resident of <? echo $add; ?>
</td><tr> <td>
 that what have been stated above in correct to be best of my knowledge and belief.
</td></tr> 
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
above affidavit are true and correct to the best of my knowledge and belief and that nothing has been
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