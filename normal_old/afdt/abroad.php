
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
      table,
      table td {
        border: 1px solid #cccccc;
      }
      td {
        height: 80px;
        width: 160px;
        text-align: justify;
        vertical-align: justify;
      }
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

<p align="justify">CNIC No. ____________________________________on behalf of  <b><? echo $bname; ?></b> _ S/O <b><? echo $fname; ?></b>
</p>

<table width="800" border="0">
  <tbody>
      <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br> <br>
      <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br> <br>
 <tr>   
      <td align="center"> <h2> <u> Undertaking </u> </h2></td>
</tr>
<tr>
<td>

I ________________________________________________________ 
</td><tr> <td>
R/O _______________________________________________________
</td><tr> <td>
CNIC No. ____________________________________on behalf of  <b><? echo $bname; ?></b> _ S/O <b><? echo $fname; ?></b>
</td><tr> <td>
holding CNIC # <? echo $cnic; ?> do hereby solemnly affirm and decalre as under:
</td><tr> <td>
1.    That  __________________ have purchased the a   <? echo $plotno . ' ' ;?> measuring <? echo $flcat; ?> in the Kahayan-e-Amin Defence Road, Lahore,from ________________________________ holding CNIC # _____________
</td><tr> <td> 
2.   I undertake that the original Purchaser of above mentioned plot is presently not in Pakistan, so he/she </td><tr> <td>
    cannot sign the transfer papers regarding the above mentioned plot in Khayaban-e-Amin’s Office.
 </td><tr> <td>    
3.	I also assure you and undertake that Iwill sign all the necessary documents about transfer of siad plot 
</td><tr> <td>
in your office. Whenever he comes back to Pakistan.
</td><tr> <td>
4.	I further undertake that both seller and purchaser are themselves responsible for the sale price of the 
</td><tr> <td>
said plot and will not claim Sahir Associates (Pvt) Ltd in case of any dispute if arises between 
</td><tr> <td>
seller and purchaser.
</td><tr> <td>
5.	That whatsoever is stated is true to the best of my knowledge and belief.

</td>
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