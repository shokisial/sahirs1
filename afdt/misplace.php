
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
      <td align="center"> <h2> <u> Undertaking </u> </h2></td>
</tr>
<tr>
<td>

It is stated that I  <b><? echo $seller; ?></b> _ S/O __________ 
</td><tr> <td>
having CNIC # _____________________ I misplaced Original Transfer Letter 
</td><tr> <td>
of  <? echo $plotno . ' ' ;?> measuring <? echo $flcat; ?> in the Kahayan-e-Amin
</td><tr> <td>
That if the above mentioned misplaced Transfer Letter misused by me 
</td><tr> <td>
or my family member or any other person, I will the responsible of 
</td><tr> <td>
this matter and I will never challenge or claim this letter if I found it 
</td><tr> <td>
in future
</td><tr> <td>
That whatever stated above is correct and true to the best of my 
</td><tr> <td>
knowledge and belief and nothing has been concealed therein. 

 
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