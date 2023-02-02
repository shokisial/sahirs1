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
if (isset($_POST['lot'])){

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
date_default_timezone_set('Asia/Karachi'); 
$dat = date('d');
$empno = date('m/Y');


$date=date('d/m/Y');
date_add($date,date_interval_create_from_date_string("-2 days"));
echo date_format($date,"d/m/Y");
$next_due_date=0;
$next_due_date = date('d/m/Y', strtotime("-2 days"));

?>

<?php
$conn = mysqli_connect('localhost','v0503sah_newusr','rev$X,#zm9hlG1~;=P','v0503sah_saestatedb')or die(mysqli_error());




$tin_number=$tnm;

$filename=0;
$filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "uploads_coverpic/".$filename;
        
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
    
$filenamej=0;
$filenamej = $_FILES["uploadfilej"]["name"];
        $tempnamej = $_FILES["uploadfilej"]["tmp_name"];    
        $folderj = "uploads_bpicjoint/".$filenamej;
        
        if (move_uploaded_file($tempnamej, $folderj))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
      
mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'Bisma Anwar','Buyer Pics Upload Print')")or die(mysqli_error());

mysqli_query($conn,"UPDATE `transtbl` SET trns_coverpic='$filename', trns_jpic='$filenamej', trns_appno='$aplno', trns_altno='$altno' where tin_number = '$tin_number' and trns_stj='2'")or die(mysqli_error());


}

?>
<br><br><br>
<p style="text-align: center; padding-left: 40px;"><strong><em><h2 align="center"><u>ORIGINAL </u></h2></em></strong>

                                          	
                                       
                                        </p>
     
<table  width="950">
<tbody>
<tr>
<td style="text-align: left;"><nav><strong>To</strong><br><strong>Mr. </strong><strong><? echo $bname; ?>  </strong> <br> <strong><? echo $gdn . '  '; ?> <? echo $fname; ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br> </strong><strong><? echo $add; ?>
<p>Copy to:<strong>&nbsp;&nbsp;&nbsp; </strong>
<br> <strong><? echo $seller . '  '; ?></strong><br>
<strong>S/O <? echo $selso . '  '; ?></strong></p>
</strong></nav></td>
<?php $aa="  "; ?>
<td ><article align="right"> <strong><u><? echo date('d/m/Y')  .  "</strong>"  . $aa . "<p>"; ?>
                                         <?php 
                                          $image=$filename; 
                                          echo "<img src='uploads_coverpic/$image' class='thumbnail' width='200' height='200'  >"; ?>	
                                       
                                          <? if($typ==='Joint') { $image1=$filenamej;
                                          echo "<img src='uploads_bpicjoint/$image1' class='thumbnail' width='200' height='200' align='right' >"; }?></article></td>
</tr>
</tbody>
</table>

<article><img align="right" /></article>
<table width="100%">
<tbody>
<tr>
<td>
<p style="text-align: justify;"><strong><em>Subject: -<u> Transfer Of Allotment # &nbsp; <? echo $altno . '   '; ?> &nbsp; Plot &nbsp; <? echo $plotno . '  ';  echo '  -   ' .$block . '  -  '; ?> &nbsp; Measuring&nbsp;  <? echo  $cat . '  '; ?>Category&nbsp; <? echo $msr  . '  '; ?> </U> <u>in Phase 1 of Khyban-e-Amin Defence Road, Lahore</u></em></strong></p>
<table style="border-collapse: collapse; width: 100%;" border="0">
<tbody>
<tr>
<td style="width: 100%;">
<p>Dear Member,</p>
<ol>
<li style="text-align: left;">Reference to your Application No. <strong><u>&nbsp; <? echo $aplno . '  '; ?> &nbsp; </u></strong>dated <strong> <? echo $apldat . '  '; ?></strong></li>
<li style="text-align: left;">The transfer of the allotment of subject Commercial Plot # <strong><u>&nbsp;<? echo $plotno . '  '; ?>  </u></strong>in  <strong><u>&nbsp;<? echo $block . '  '; ?> </u></strong>has been approved in your name by the company in the meeting held on <strong><u><? echo $next_due_date;?> </u></strong>Pursuant to the application number <strong><u>&nbsp; <? echo $aplno . '  '; ?>&nbsp; </u></strong></li>
<li style="text-align: justify;">If the physical measurements, of plot area exceeds the area of the plot as stated above you will be required to pay additional cost of excess land within 30 days from the date of issue of a Demand Notice. If the area is less, you will be entitled for refund on pro-rata basis of original price of plot as paid by you.</li>
<li style="text-align: justify;">Possession of plot will take place on the completion of development works of the above mentioned scheme and you will be intimated in this regard along with a notice requiring you to deposit the installment which is due on possession as per Form (II) there on a formal possession letter will be issued to you in this regard.</li>
<li style="text-align: justify;">You are required to construct the Commercial building on your plot within three years from the date the plot is initially offered for possession. The building should strictly be according to commercial building bye-laws of the society and the LDA.&nbsp;&nbsp;&nbsp;</li>
<li style="text-align: justify;">If the construction is not completed within the prescribed period the society shall charge fees for extension of the building as per The Company policy.</li>
<li style="text-align: justify;">The society reserves the right to make adjustment in location and dimension of plot if need arises due to any legal impediment or any ground situation imposes any limitation, or to comply with any conditions of LDA. In case of such eventuality, you will be provided with plot of similar category.</li>
<li style="text-align: justify;">Please give Plot number mentioned above as reference in all your future correspondence.</li>
<li style="text-align: justify;">You shall be responsible to intimate any change in particulars given in Part-A of Application</li>
</ol>
<p>Form (Form-I)</p>
<p>Ensuring our best cooperation at all time,</p>
<p>Yours truly,</p>
<table style="border-collapse: collapse; width: 100%;" border="0">
<tbody>
<tr>
    <br><br><br>
<td style="width: 100%;">
    
<p>__________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Authorized Signature</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<br>
<p align="center">
<img src="sahirsdownlogo.png" align="center" width="300" height="70>"> </p>
 

<p style="page-break-before: always">
   <br><br>
<p style="text-align: center; padding-left: 40px;"><strong><em><h2 align="center"><u>OFFICE COPY </u></h2></em></strong>

                                          	
                                       
                                        </p>
     
<table  width="950">
<tbody>
<tr>
<td style="text-align: left;"><nav><strong>To</strong><br><strong>Mr. </strong><strong><? echo $bname; ?>  </strong> <br> <strong><? echo $gdn . '  '; ?> <? echo $fname; ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br> </strong><strong><? echo $add; ?>
<p>Copy to:<strong>&nbsp;&nbsp;&nbsp; </strong><br><strong><? echo $seller . '  '; ?></strong><br>
S/O <? echo $selso . '  '; ?></strong></p>
</strong></nav></td>

<td style="text-align: right;"><article> <strong> <? echo date('d/m/Y') .  "</strong>" .  "<p>";
                                          
                                          $image=$filename; 
                                          echo "<img src='uploads_coverpic/$image' class='thumbnail' width='200' height='200'  >"; ?>	
                                       
                                          <? if($typ==='Joint') { $image1=$filenamej;
                                          echo "<img src='uploads_bpicjoint/$image1' class='thumbnail' width='200' height='200' align='right' >"; }?></article></td>
</tr>
</tbody>
</table>

<article><img align="right" /></article>
<table width="100%">
<tbody>
<tr>
<td>
<p style="text-align: justify;"><strong><em>Subject: -<u> Transfer Of Allotment # &nbsp; <? echo $altno . '   '; ?> &nbsp; Plot &nbsp; <? echo $plotno . '  ';  echo '  -   ' .$block . '  -  '; ?> &nbsp; Measuring&nbsp;  <? echo  $cat . '  '; ?>Category&nbsp; <? echo $msr  . '  '; ?> </U><u>in Phase 1 of Khyban-e-Amin Defence Road, Lahore</u></em></strong></p>
<table style="border-collapse: collapse; width: 100%;" border="0">
<tbody>
<tr>
<td style="width: 100%;">
<p style="text-align: justify;">Dear Member,</p>
<ol>
<li style="text-align: justify;">Reference to your Application No. <strong><u>&nbsp; <? echo $aplno . '  '; ?> &nbsp; </u></strong>dated <strong> <? echo $apldat . '  '; ?></strong></li>
<li style="text-align: justify;">The transfer of the allotment of subject Commercial Plot # <strong><u>&nbsp;<? echo $plotno . '  '; ?>  </u></strong>in  <strong><u>&nbsp;<? echo $block . '  '; ?> </u></strong>has been approved in your name by the company in the meeting held on <strong><u><? echo date_format($date,'Y/m/d'); ?> </u></strong>Pursuant to the application number <strong><u>&nbsp; <? echo $aplno . '  '; ?>&nbsp; </u></strong></li>
<li style="text-align: justify;">If the physical measurements, of plot area exceeds the area of the plot as stated above you will be required to pay additional cost of excess land within 30 days from the date of issue of a Demand Notice. If the area is less, you will be entitled for refund on pro-rata basis of original price of plot as paid by you.</li>
<li style="text-align: justify;">Possession of plot will take place on the completion of development works of the above mentioned scheme and you will be intimated in this regard along with a notice requiring you to deposit the installment which is due on possession as per Form (II) there on a formal possession letter will be issued to you in this regard.</li>
<li style="text-align: justify;">You are required to construct the Commercial building on your plot within three years from the date the plot is initially offered for possession. The building should strictly be according to commercial building bye-laws of the society and the LDA.&nbsp;&nbsp;&nbsp;</li>
<li style="text-align: justify;">If the construction is not completed within the prescribed period the society shall charge fees for extension of the building as per The Company policy.</li>
<li style="text-align: justify;">The society reserves the right to make adjustment in location and dimension of plot if need arises due to any legal impediment or any ground situation imposes any limitation, or to comply with any conditions of LDA. In case of such eventuality, you will be provided with plot of similar category.</li>
<li style="text-align: justify;">Please give Plot number mentioned above as reference in all your future correspondence.</li>
<li style="text-align: justify;">You shall be responsible to intimate any change in particulars given in Part-A of Application</li>
</ol>
<p>Form (Form-I)</p>
<p>Ensuring our best cooperation at all time,</p>
<p>Yours truly,</p>
<table style="border-collapse: collapse; width: 100%;" border="0">
<tbody>
<tr>
    <br><br><br>
<td style="width: 100%;">
    
<p>__________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Authorized Signature</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p align="center">
<img src="sahirsdownlogo.png" align="center" width="300" height="70>"> </p>
 </P>
 </body>



</html>