<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> SAHIR File Manager</title>
<style type="text/css">


   input {font-weight:bold;}


<style type="text/css" media="print">
    @page { 
        size: 8.25 X 11;
        destination: Save as PDF;
    }
    
</style>
</style>
<style>
p.small {
  line-height: 0.7;
}

p.big {
  line-height: 1.8;
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
if (isset($_POST['cov'])){

 $tnm=$_POST['tnm'];
 $seller = $_POST['seller'];
 $flfname = $_POST['flfname'];
 $plotno = $_POST['plotno'];
 $address = $_POST['address'];
 $scnic = $_POST['scnic'];
 $block = $_POST['block'];
 $cat =  $_POST['cat'];
 
 $msr=$_POST['msr'];

 $altno = $_POST['altno'];
 $bname = $_POST['bname'];
 $fname= $_POST['fname'];
 $add= $_POST['add'];
 $plotno = $_POST['plotno'];
 $gdn= $_POST['gdn'];
 $typ= $_POST['typ']; 
 $image5=$_POST['image5']; 
 $dat=0; 
 $selso = $_POST['selso'];
 $aplno = $_POST['aplno'];
 $apldat = $_POST['apldat'];
 $trnsdat= $_POST['trnsdat'];
 
date_default_timezone_set('Asia/Karachi'); 
$dat = date('d');
$empno = date('m/Y');


$date=date('d/m/Y');

?>

<?php
$conn = mysqli_connect('localhost','v0503sah_newusr','rev$X,#zm9hlG1~;=P','v0503sah_saestatedb')or die(mysqli_error());




$tin_number=$tnm;


?>
<br>


<p align="center">
    <H1 align="center"><u>Covering Letter</u></H1>
</p>

    Number of Transfer: 1

<table cellpadding="30"  width="50%" align="center">
    <tbody>
        <tr>
            <td>
                <div>
                    <? echo "<img src='uploads_conspic/$image5' class='thumbnail' width='500' height='300' align='center' >"; ?>
                    
                    
                </div>
            </td>
        </tr>
    </tbody>
</table>

<br clear="ALL"/>
<table align="right" width="100%">
    <tbody>
        <tr>
            <td>
                
                    <p align="right">
                        BM Signatures                                  
                    </p>
                
            </td> <td></td><td></td><td></td><td></td>
        </tr>
    </tbody>
</table>

<br>
<br>
<table align="right" width="100%">
    <tbody>
        <tr>
            <td>
<p align="right">
    Seen By: __________________________
</p>
<table align="right" width="100%">
    <tbody>
        <tr>
            <td>
<p align="right">
    Transfer Officer
</p> 
<td></td><td></td><td></td> <td></td>
        </tr>
    </tbody>
</table>

<table align="right" width="100%">
    <tbody>
        <tr>
            <td>
<p align="right">
    Name of BM
</p>
<td></td><td></td><td></td> <td></td>
        </tr>
    </tbody>
</table>
<br>
<table align="left" width="100%">
    <tbody>
        <tr>
            <td>
   
    
    <strong>Allotment No:</strong>
    <b><u> <? echo $altno . '       '; ?> </u></b>
    Plot # <u> <b><? echo $plotno . '  '; ?>   <? echo $block . '  ';?> </b></u> 

</td><td></td><td></td> <td></td><td></td>
 </tr>
    </tbody>
</table>

<table align="left" width="100%">
    <tbody>
        <tr>
            <td>

    <br>
    <strong>Plot Size:</strong>
    <u><b> <? echo  $cat . '  '; ?> </b></u>
    <strong>Category:</strong>
    <u> <b><? echo  $msr . '  '; ?></b> </u>

</td>
 </tr>
    </tbody>
</table>
<p>
<table align="left" width="100%">
    <tbody>
        <tr>
            <td>
<br>
    <strong>Transfer the Plot on:</strong> 
   <b> <? $timestamp = strtotime($trnsdat);
       $new_date = date("d-m-Y", $timestamp);?>
    <u>Transfer Date <? echo '= ' . $new_date; ?></u></b>

</td>
 </tr>
 <tr></tr>
    </tbody>
</table>
</P>
<br>
<table align="left" width="100%">
    <tbody>
        <tr>
            <td>
<br>
    <strong>Transferor: </strong>
    <u> <? echo $seller . '  '; ?> </u>
    S/D/W/O <u> <? echo $selso. '  '; ?> </u>

</td>
 </tr>
    </tbody>
</table>
<table align="left" width="100%">
    <tbody>
        <tr>
            <td>
<br>
    <strong>Transferee: </strong>
    <u> <? echo $bname; ?>  </u>
    <b><? echo '  ' . $gdn . '  '; ?></b> <u> <? echo $fname; }?>  </u>

</td>
 </tr>
    </tbody>
</table>
<table align="left" width="100%">
    <tbody>
        <tr>
            <td>
                <br><br>
<p align="center">
<img src="sahirsdownlogo.png" align="center" width="300" height="100>"> </p>
 </td>
 </tr>
    </tbody>
</table>
 </body>



</html>