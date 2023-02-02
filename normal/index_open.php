<?php include('header2.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php 
include 'DBController.php'; $sno=1;

$db_handle = new DBController();
$productResult = $db_handle->runQuery("SELECT file.tin_number,file.plot_no,file.file_name,file.fathername,file.cnicno,file.address,file.city,file.`cnt_no`,file.`file_type`,file.`jfile_name`,file.`jfathername`,file.`jcnicno`,file.`jaddress`,file.`jcity`,file.`jcnt_no`,file.file_category,file.block,file.cat, file.form_no,file.booking_ref,file.fector FROM `file`where opn_reg='1'");

if (isset($_POST["export"])) {
  
  $filename = "Export_excel.xls";
    
    header("Content-Disposition: attachment; filename=\"$filename\"");
   
 $isPrintHeader = false;
   $sno=0;  if (! empty($productResult)) {
        foreach ($productResult as $row) {
            if (! $isPrintHeader) {
               
 echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }

    exit();
}

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style>
body {
    font-size: 0.95em;
    font-family: arial;
    color: #212121;
}

th {
    background: #E6E6E6;
    
border-bottom: 1px solid #000000;
}

#table-container {
    width: 850px;
    margin: 50px auto;
}

table#tab {
    border-collapse: collapse;
  
  width: 100%;
}

table#tab th, table#tab td {
    border: 1px solid #E0E0E0;
    padding: 8px 15px;
    text-align: left;
    font-size: 0.95em;
}

.btn {
    
padding: 8px 4px 8px 1px;
}
#btnExport {
    padding: 10px 40px;
    background: #499a49;
    border: #499249 1px solid;
    color: #ffffff;
    font-size: 0.9em;
   
 cursor: pointer;
}
</style>
</head>
<body>
    <div >
        <table id="tab">
            <thead>
                <tr>
 <th >S.No</th>                  
 <th >File #</th>
 <th >Plot #</th>
 <th >Name</th>
 <th >Guardian</th>
 <th >CNIC #</th>
 <th >Address</th>
 <th >City</th>
 <th >Contact #</th>
 <th >Type</th>
 
 <th >J.Name</th>
 <th >J.Guardian</th>
 <th >J.CNIC #</th>
 <th >J.Address</th>
 <th >J.City</th>
 <th >J.Contact #</th>
 <th >Category</th>
 <th >Block</th>
 <th >Cat</th>
 <th >Form No</th>
 <th >Booking Ref</th>
 <th >Factor</th>
       
             

                </tr>
            </thead>
            <tbody>
 
            <?php 
            if (! empty($productResult)) {
                foreach ($productResult as $key => $value) {
                    ?>
                 
                     <tr>
<td><?php echo $sno; ?> </td>    
<td><?php echo $productResult[$key]["tin_number"]; ?> </td>             
<td><?php echo $productResult[$key]["plot_no"]; ?></td>  
 <td><?php echo $productResult[$key]["file_name"]; ?></td>  
 <td><?php echo $productResult[$key]["fathername"]; ?></td>  
<td><?php echo $productResult[$key]["cnicno"]; ?></td>  
<td><?php echo $productResult[$key]["address"]; ?></td>
<td><?php echo $productResult[$key]["city"]; ?></td>
<td><?php echo $productResult[$key]["cnt_no"]; ?></td>
<td><?php echo $productResult[$key]["file_type"]; ?></td>  
<td><?php echo $productResult[$key]["jfile_name"]; ?></td>  
 <td><?php echo $productResult[$key]["jfathername"]; ?></td>  
<td><?php echo $productResult[$key]["jcnicno"]; ?></td>  
<td><?php echo $productResult[$key]["jaddress"]; ?></td>
<td><?php echo $productResult[$key]["jcity"]; ?></td>
<td><?php echo $productResult[$key]["jcnt_no"]; ?></td>
<td><?php echo $productResult[$key]["file_category"]; ?></td>
<td><?php echo $productResult[$key]["block"]; ?></td>
<td><?php echo $productResult[$key]["cat"]; ?></td>
<td><?php echo $productResult[$key]["form_no"]; ?></td>
<td><?php echo $productResult[$key]["booking_ref"]; ?></td>
<td><?php echo $productResult[$key]["fector"]; ?></td>


  
</tr>
             <?php $sno=$sno+1;
                }
            }
           ?>
            
            
      </tbody>
        </table>
      </tbody>
        </table>

        <div class="btn">
            <form action="" method="post">
                <button type="submit" id="btnExport"
                    name='export' value="Export to Excel"
                    class="btn btn-info">Export to Excel</button>
            </form>
        </div>
    </div>
</body>
</html>