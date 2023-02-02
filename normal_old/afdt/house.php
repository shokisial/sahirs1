
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



</body>
</html>