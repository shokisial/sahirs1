<html>
<head>
<form action="" enctype="multipart/form-data" method="post" name="cat">
<table width="100%"  cellpadding="0" cellspacing="0" align="right"> 
<td> 
Start Date<input type="date" name="start" required focus>  End Date<input type="date" name="end" required >

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
   <h2>N.D.C Report from  - <? echo $start . ' - To - ' . $end ; ?>   </h2></td> <? } ?>
  
</table> 

<table width="100%" border="1" cellpadding="0" cellspacing="0"   > 
<thead>
		
		   <th> S#</th>							
           <th> File No.  </th>
           
	       <th> Plot No </th> 
	       <th> Block </th>
	       <th> N.D.C Date </th>
           <th> Buyer Name</th>
	       <th> Father Name</th>						
           <th> Accounts </th>
	       <th> Comments </th>
	           </thead>
<? $sno=1;
$query200 = mysqli_query($conn,"SELECT * FROM `ndc` INNER JOIN file on file.tin_number=ndc.tin_number WHERE ndc.`ndc_dat`>='$start' and ndc.`ndc_dat`<='$end'")or die(mysqli_error());
							
							while($row200 = mysqli_fetch_array($query200)){ ?>
						<td align="center"> <? echo $sno; ?> </td>
						<td align="center"> <? echo $row200['tin_number']; ?> </td>
					<td align="center"> <? echo $row200['plot_no'];  ?> </td>
					<td align="center"> <? echo $row200['block'];  ?> </td>
					<td align="center"> <? echo $row200['ndc_dat'];  ?> </td>
					<td align="left"> <? echo $row200['buyername'];  ?> </td>
					<td align="left"> <? echo $row200['gdn'] . '  '. $row200['fathername'];  ?> </td>
					<td align="center"> <? echo $row200['ndc_stu'];  ?> </td>
					<td align="left"> <? echo $row200['ndc_res'];  ?> </td>
					
						<tr></tr>
						
					<? 	 $sno=$sno+1; }?> 
								
								
								
 		     
	                           	
                             
 


</table>
</body>
</html>
