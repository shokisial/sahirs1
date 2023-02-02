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
p.small {
  line-height: 0.7;
}

p.big {
  line-height: 1.8;
}
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
 $gdn= $_POST['gdn'];
 $altdat=$_POST['altdat'];
 $dat=0; 
date_default_timezone_set('Asia/Karachi'); 
$dat = date('d');
$empno = date('m/Y');
?>
 <br><br><br><br><br><br><br><br>   
 <br><br><br><br><br><br><br><br>
 <br><br><br><br>
 
<p style="text-align: center;">&nbsp;</p>

<h2 align="center">Purchase Consent </h2></strong></p>

<p style="font-size:15px" style="text-align: justify;">I, <u>&nbsp;&nbsp;<? echo $bname; ?> &nbsp;&nbsp; </u> S/W/D/O  &nbsp;&nbsp;<? echo $gdn; ?><u> &nbsp;<? echo $fname; ?>&nbsp;</u>&nbsp;bearing CNIC <u>&nbsp;&nbsp; <? echo $cnic; ?>&nbsp;&nbsp; </u>&nbsp;has purchased Plot #<u>&nbsp; &nbsp;<? echo $plotno; ?>&nbsp; </u> Block <u>&nbsp;<? echo $block; ?>&nbsp; </u>of Khayaban-e-Amin, and has received the allotment letter for the same. I undertake:</p>
<ol style="text-align: justify;" style="font-size:15px">
<li style="font-size:15px">That I abide by the schedule of payment as received</li>
<li style="font-size:15px">Payment shall be made through cash/banking instrument if favor of M/s Sahir Associates (Pvt) Ltd.</li>
<li style="font-size:15px">Installment received from the Applicant/Allotee after due date shall only be accepted with a surcharge of 20% per annum for the period of default (calculated on daily basis) up to 15 days from the due date.</li>
<li style="font-size:15px">In case default in payment is continued for more than 15 days, the company shall have the right to cancel the allotment and allot/sell the same to any other person and the defaulter shall have no right or lien whatsoever to such a plot except for the refund of the amount paid after 10% deduction of total cost of the plot less down payment.</li>
<li style="font-size:15px">If the applicant wants to resume with a cancelled allotment, he/she needs to pay activation fee PKR 100,000/- at every cancellation.</li>
<li style="font-size:15px">Any factor amount if applicable, would be charged at the time of possession.</li>
<li style="font-size:15px">The applicant and the successor are bound to clear the accounts of developmental if applied at any point.</li>
<li style="font-size:15px">The decision of the company in respect of allotment /cancellation shall be final and binding on the applicant/allotee and shall not be challenged before any court of law, forum or authority.</li>
<li style="font-size:15px">Plot allotted shall not be used for any other purpose except for the purpose as specified in the bye-laws.</li>
<li style="font-size:15px">The company reserves the right to make adjustments / relocation of the plot if need arises. This would be done only when the ground situation imposes any unavoidable limitations.</li>
<li style="font-size:15px">In case of any dispute arising between the Allotee and the Company / Association/Project Management, Estate Management or any of their officer, the dispute shall be referred to the arbitration of Chief Executive of M/s Sahir Associates (Pvt.) Ltd. Whose decision Shall be final and binding on the parties.</li>
</ol>

<br><br>
<p align="right" style="font-size:15px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;___________________&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
<p align="right" style="font-size:15px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>Deponent</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p>
<p style="font-size:15px" style="text-align: justify;"><strong><u>VERIFICATION:- </u></strong></p>
<p style="font-size:15px" style="text-align: justify;">Verified on oath this _______________________ day of _________________ that content of the above affidavit are true and correct to the best of my knowledge and belief and that nothing has been concealed there in.</p>
<p></p> 
<p></p> 
<p></p> 
<br><br>
<p align="right" style="font-size:15px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;___________________&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
<p align="right" style="font-size:15px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>Deponent</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p>