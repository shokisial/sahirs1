
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
Allocation / Allotment letter No: <? echo $altno; ?> Dated : ______
</td><tr> <tr><tr><tr><tr><tr>
<br>
<td>
That I have applied for the transfer of the said Allotment in the name of <? echo $bname; ?> W/O 
</td><tr> <td>
<? echo $fname; ?> Resident of <? echo $add; ?>
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

<p style="page-break-before: always">


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

<p style="page-break-before: always">


<table width="800" border="0">
  <tbody>
      <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br> <br>
      <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br> <br>
 <tr>   
      <td align="center"> <h2> UNDERTAKING/AFFIDAVIT  </h2></td>
</tr>
<tr>
<td>

I<b><? echo '  ' . $bname; ?></b> _ S/W/O  <b> 
<? echo $fname; ?></b>Resident of </td><tr> <td> <b><? echo '  ' . $add; ?></b> solemnly affirms </td><tr> <td> and declares that I have paid all applicable governmental </td><tr> <td> taxes/duties such as stamp duty, withholding tax , corporation </td><tr> <td> fee & cvt etc with respect to residential/commercial </td><tr> <td> House/Plot/Apartment No <? echo $plotno . ' ' . $block ; ?> measuring <? echo ' ' . $flcat; ?> in the Kahayan-e-Amin.
</td><tr> <td>
Therefore, I submit the original receipts with M/S Sahir 
</td><tr> <td>
Associates (pvt) limited so that the same may become part of     
</td><tr> <td>
file of plot mentioned hereinabove. The undersigned takes 
</td><tr> <td>
complete responsibility regarding genuineness of 
</td><tr> <td>
receipts/stamp paper of taxes/duties. In case later on any 
</td><tr> <td>
deficiency or defect concerning payment of taxes surfaced by     
</td><tr> <td>
FBR relating to this plot the undersigned shall be solely 
</td><tr> <td>
responsible to cure such deficiency or defect. 
</td><tr> <td>
   Said
</td><tr> <td>
Mr. ________________
</td><tr> <tr><td>
    
    

CNIC_______________
            
</td><tr> <tr><tr><tr><tr><tr>
</table>

<p style="page-break-before: always">


<table width="800" border="0">
  <tbody>
      <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br> <br>
      <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br> <br>
 <tr>   
      <td align="center"> <h2> UNDERTAKING/AFFIDAVIT  </h2></td>
</tr>
<tr>
<td>

I<b><? echo '  ' . $seller; ?></b> _ S/W/O  <b> 
<? echo '___________________'; ?></b>Resident of </td><tr> <td> <b><? echo '  ' . '__________________________'; ?></b> solemnly affirms </td><tr> <td> and declares that I have paid all applicable governmental </td><tr> <td> taxes/duties such as gain tax etc with respect to residential/commercial </td><tr> <td> House/Plot/Apartment No <? echo $plotno . ' ' . $block ; ?> measuring <? echo ' ' . $flcat; ?> in the Kahayan-e-Amin.
</td><tr> <td>
Therefore, I submit the original receipts with M/S Sahir 
</td><tr> <td>
Associates (pvt) limited so that the same may become part of     
</td><tr> <td>
file of plot mentioned hereinabove. The undersigned takes 
</td><tr> <td>
complete responsibility regarding genuineness of 
</td><tr> <td>
receipts/stamp paper of taxes/duties. In case later on any 
</td><tr> <td>
deficiency or defect concerning payment of taxes surfaced by     
</td><tr> <td>
FBR relating to this plot the undersigned shall be solely 
</td><tr> <td>
responsible to cure such deficiency or defect. 
</td><tr> <td>
   Said
</td><tr> <td>
Mr. ________________
</td><tr> <tr><td>
    
    

CNIC_______________
            
</td><tr> <tr><tr><tr><tr><tr>
</table>

<p style="page-break-before: always">


<table width="800" border="0">
  <tbody>
      <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br> <br>
      <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br> <br>
 <tr>   
      <td align="center"> <h2> <u> Undertaking </u></h2></td>
</tr>
<tr>
<td>

I<b><? echo '  ' . $bname; ?></b> _ S/W/O  <b> 
<? echo $bname; ?></b> </td><tr> <td align="justify">  CNIC #  <b><? echo '  ' . $cnic; ?></b> have purchased Apartment / House number </td><tr> <td> 
<? echo $plotno . ' ' . $block ; ?> in the Kahayan-e-Amin, I hereby give an undertaking  </td><tr> <td> that I will carry out the remaining works which include paints, finishes and </td><tr> <td> fixtures myself at my own cost and will not claim any charges whatever from </td><tr> <td>
    The Company i.e. M/s Sahir Associates (Pvt) Ltd on these counts.
    </td><tr> <td> That what have been stated above is correct to the best of my knowledge and belief.

 
</td><tr> <td>
  

 ________________
</td><tr> <tr><td>
DEPONENT     
    </td><tr> <td>
        
    
    

Dated:- _______________
            
</td><tr> <tr><tr><tr><tr><tr>
</table>

<p style="page-break-before: always">

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

<p style="page-break-before: always">

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