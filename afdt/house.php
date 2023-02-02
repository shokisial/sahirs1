
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
 $flfname = $_POST['flfname'];
 $plotno = $_POST['plotno'];
 $address = $_POST['address'];
 $scnic = $_POST['scnic'];
 $block = $_POST['block'];
 $cat =  $_POST['cat'];
 
 $flcat = $_POST['flcat'];
 $altno = $_POST['altno'];
 $bname = $_POST['bname'];
 $fname= $_POST['fname'];
 $add= $_POST['add'];
 $cnic = $_POST['cnic'];
 //$gdn= $_POST['gdn'];
 $altdat=$_POST['altdat'];
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


<table width="950" border="0">
  <tbody>
      <br><br><br><br><br><br><br><br>   
 <br><br><br><br><br><br><br><br>
 <br><br><br><br><br><br><br><br>
 <br><br><br><br><br><br><br><br>

 <h1 align="center">PURCHASER HOUSE / APPARTMENT UNDERTAKING </h1></strong></p>

 <tr>   
      
</tr>
<tr>
<td>

<p style="font-size:20px" style="text-align: justify;">I,  <b> <u><? echo $bname; ?>&nbsp;&nbsp;  </u></b>   S/W/D/O <u> &nbsp;&nbsp;  </u></b> <b> <u><? echo $fname; ?>&nbsp;&nbsp;  </u></b>, bearing CNIC no.  <b> <u><? echo $cnic; ?>&nbsp;&nbsp; </b></u>&nbsp; </u> R/O &nbsp;&nbsp; <b> <u><? echo $add; ?> <? echo $cty; ?> &nbsp;&nbsp;&nbsp; </b> </u> </u></b>

    <?php if($typ==='Joint'){ ?> <u><b> <? echo '/ ' .  $jbname; ?>&nbsp;&nbsp;  </u></b> S/W/D/O &nbsp;&nbsp; <u> <b>  <? echo '   ' .$jfname; ?> &nbsp;&nbsp;&nbsp;&nbsp;</u></b>&nbsp;&nbsp;Bearing CNIC, <u>&nbsp;&nbsp; <b> <u><? echo $jcnic; ?> </u></b> </b></u>&nbsp; </u> R/O &nbsp;&nbsp; <b> <u><? echo $jadd; ?> <? echo $jcty; ?> &nbsp;&nbsp;&nbsp; </b> </u> <? } ?>
    
        </u>
        have purchased Apartment / House number  <b> <u><? echo $plotno; ?>&nbsp;&nbsp;  </u></b>, <b> <u><? echo $block ?>&nbsp;&nbsp;  </u></b>in Khayaban-e-Amin. I hereby give an undertaking that I will carry out the remaining works which include paints, finishing and fixtures myself at my own cost and will not claim any charges whatever from The Company M/s Sahir Associates (Pvt) Ltd on these counts. That what have been stated above is correct to the best of my knowledge and belief.</p>
 
</td><tr> <td>
  
<br><br><br><br><br><br><br><br>

 <p style="font-size:30px"> ________________</p>
</td><tr> <tr><td>
<p style="font-size:30px"> DEPONENT     
    </td><tr> <td></p>
        
    
 <br> <br>   

<p style="font-size:30px">Dated:- _______________ </p>
            
</td><tr> <tr><tr><tr><tr><tr>
</table>



</body>
</html>