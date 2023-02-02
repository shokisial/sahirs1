<html>
	
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style type="text/css">


   input {font-weight:bold;}


<style type="text/css" media="print">
    @page { 
        size: 8.25 X 11;
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
 $letno = $_POST['ltrno']; 
 
 $query = mysqli_query($conn,"SELECT * FROM `file` inner join open_filedet on open_filedet.tin_number=file.tin_number where file.opn_reg='1' and file.tin_number=$letno")or die(mysqli_error());
								while($row = mysqli_fetch_array($query)){
 ?>

    

<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>&nbsp;</span></p>
<br><br><br><br><br><br><br>
<table align="center" style="border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td height="50" style="width: 221.4pt;  border-width: 2.25pt 1pt 1pt 2.25pt;border-color: windowtext;border-style: solid;padding: 0cm 5.4pt;vertical-align: center;">
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>M/s &nbsp;<b><u><? echo $row['file_name'];  ?>  </u></b></span></p>
                
            </td>
            <p></p>
            <td height="50" style="width: 221.4pt;border-top: 2.25pt  solid windowtext;border-left: none;border-bottom: 1pt solid windowtext;border-right: 2.25pt solid windowtext;padding: 0cm 5.4pt;vertical-align: center;">
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'> <b><u><? echo $row['so'];  ?>  </u></b> &nbsp; &nbsp; <b><u><? echo $row['fathername'];  ?>  </u></b></span></p>
            </td>
            
        </tr>
        <tr>
            <td height="50" style="width: 221.4pt;border-top: none;border-left: 2.25pt solid windowtext;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: center;">
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>CNIC# <b><u><? echo $row['cnicno'];  ?>  </u></b></span></p>
            </td>
            <p></p>
            <td height="50" style="width: 221.4pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 2.25pt solid windowtext;padding: 0cm 5.4pt;vertical-align: center;">
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>Contact# <b><u><? echo $row['cnt_no'];  ?>  </u></b></span></p>
            </td>
        </tr>
        <tr>
            <td height="50" style="width: 221.4pt;border-top: none;border-left: 2.25pt solid windowtext;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: center;">
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>Form# <b><u><? echo $row['form_no'];  ?>  </u></b></span></p>
            </td>
            <p></p>
            <td height="50" style="width: 221.4pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 2.25pt solid windowtext;padding: 0cm 5.4pt;vertical-align: center;">
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>Plot# <b><u><? echo $row['plot_no'];  ?>  </u></b></span></p>
            </td>
        </tr>
        <tr>
            <td height="50" style="width: 221.4pt;border-top: none;border-left: 2.25pt solid windowtext;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: center;">
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>Block: <b><u><? echo $row['block'];  ?>  </u></b></span></p>
            </td>
            <td height="50" style="width: 221.4pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 2.25pt solid windowtext;padding: 0cm 5.4pt;vertical-align: center;">
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>Date: <b><u><? echo $row['rec_dat'];  ?>  </u></b></span></p>
            </td>
        </tr>
        <tr>
            <td height="50" style="width: 221.4pt;border-top: none;border-left: 2.25pt solid windowtext;border-bottom: 2.25pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: center;">
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>Time: <b><u><? echo $row['rec_tim'];  ?>  </u></b></span></p>
            </td>
            <? $usr=0; $usr1=0;  $usr=$row['user']; 
                                $query1 = mysqli_query($conn,"SELECT * FROM `staff` WHERE `staff_id`=$usr")or die(mysqli_error());
								while($row1 = mysqli_fetch_array($query1)){
								$usr1=$row1['username'];}  ?>
								
            <td height="50" style="width: 221.4pt;border-top: none;border-left: none;border-bottom: 2.25pt solid windowtext;border-right: 2.25pt solid windowtext;padding: 0cm 5.4pt;vertical-align: center;">
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>Form Received By: <b><u><? echo $usr1; } ?>  </u></b></span></p>
                <p height="50" style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>&nbsp;</span></p>
            </td>
        </tr>
    </tbody>
</table>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";text-align:justify;'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>Dear Valued Member,</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";text-align:justify;'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";text-align:justify;line-height:115%;'><span style='font-size:18px;line-height:115%;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>Thank you for purchasing the property in our project. Your support and trust in us are much appreciated.&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";text-align:justify;line-height:115%;'><span style='font-size:18px;line-height:115%;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>We have received your application form along with required documents, for allotment letter proceeding and you shall be receiving your allotment letter in a period of 5 weeks from Marketing Office L- block Khayaban-e-Amin.</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";text-align:justify;'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";text-align:justify;'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>Looking forward to a long-term partnership with you.</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;'>&nbsp;<br> <span style="background:white;">Best Regards,</span></span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>Management&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:18px;font-family:"Helvetica","sans-serif";color:#4F4F6F;background:white;'>Sahir Associates Pvt.Ltd.</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:13px;font-family:"Times New Roman","serif";'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'><span style='font-size:13px;font-family:"Times New Roman","serif";'>&nbsp;</span></p>
<p style='margin:0cm;margin-bottom:.0001pt;font-size:30px;font-family:"Cambria","serif";'>&nbsp;</p>