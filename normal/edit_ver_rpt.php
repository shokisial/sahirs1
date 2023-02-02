<html>
<head>
<form action="" enctype="multipart/form-data" method="post" name="cat">
<table width="100%"  cellpadding="0" cellspacing="0" align="right"> 
<td> 
Start Date<input type="date" name="start" required>  End Date<input type="date" name="end" required>

 <input name="submit" type="submit" value="Submit" /></td>
 </td> 
</tr></table></form>
<style type="text/css" media="screen">
    .printspan
    {
        display: none;
    }
</style>
<style type="text/css" media="print">
    .printspan
    {
        display: inline;
        font-family: Arial, sans-serif;
        font-size: 20 pt;
        color: red;
    }
</style>
<style> 
body,td,th {
	font-size: 16px;
}
</style> 

<style type="text/css" media="print,screen" >
table td {
	border-bottom:1px solid gray;
}
th {
font-family:Arial;
color:black;

}
thead {
	display:table-header-group;
}
tbody {
	display:table-row-group;
}
</style>
</head>

<body>
<?php include('header2.php'); ?>
<?php include('../session.php'); ?>
<table  width="1000" border="1" cellpadding="0" cellspacing="0"  align="center"> 
	<TD align="center"><img src="sahir.jpg" width="100" height="100" alt=""/></TD>
 <td align="center" > 
 <? if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $start=$_POST['start'];   $start=date_create("$start"); 
 $start=date_format($start,"Y/m/d");     
    $end=$_POST['end'];       $end=date_create("$end"); 
 $end=date_format($end,'Y/m/d'); ?>
 <h2>Verification Report from  -
 <? $test0=$start; echo date('d/m/Y',strtotime($test0));?> - To - 
 <? $test2=$end; echo date('d/m/Y',strtotime($test2));?>
   </h2></td> 
  <? } ?>
</table> 

<table width="100%" border="1" cellpadding="0" cellspacing="0"   > 
<thead>
		
		   <th> S#</th>							
           <th> File No.  </th>
           
	       <th> Plot No </th> 
	       <th> Block </th>
	       <th> Verification Date </th>
           <th> App. Name</th>
           <th> Dealer </th>
	       <th> Allocation </th>
	       <th> Date</th>
	       <th> Accounts Comments </th>
	           </thead>
<? $sno=1;
$query200 = mysqli_query($conn,"SELECT * FROM `verification` INNER JOIN file on file.tin_number=verification.tin_number WHERE verification.`ver_dat`>='$start' and verification.`ver_dat`<='$end' order by ver_dat ASC")or die(mysqli_error());
							
							while($row200 = mysqli_fetch_array($query200)){ ?>
						<td align="center"> <? echo $sno; ?> </td>
						<td align="center"> <? echo $row200['tin_number']; ?> </td>
					<td align="center"> <? echo $row200['plot_no'];  ?> </td>
    
					<td align="center"> <? echo $row200['block'];  ?> </td>
					<td > <? $test1=$row200['ver_dat']; echo date('d/m/Y',strtotime($test1));?></td>
					<td align="left"> <? echo $row200['apn_name'];  ?> </td>
					<td align="left"> <? echo $row200['snd_dat'];  ?> </td>
					<td align="left"> <? echo $row200['ver_stu'];  ?> </td>
				    <td align="center"> <? $test2=$row200['dat']; echo date('d/m/Y',strtotime($test2));?>  </td>
				    <td align="left"> <? echo $row200['ver_acres'];  ?> </td>
					
						<tr></tr>
						
					<? 	 $sno=$sno+1; }?> 
								
								
								
 		     
	                           	
                             
 


</table>
</body>
</html>
