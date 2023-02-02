
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



</body>
</html>