<!DOCTYPE html>
<html>
  <head>
    <title>Sahir's File Manager</title>
    <style>
      .tableFixHead {
        overflow-y: auto;
        height: 200px;
      }
      .tableFixHead thead th {
        position: sticky;
        top: 0;
      }
      table {
        border-collapse: collapse;
        width: 99%;
      }
      th,
      td {
        padding: 8px 16px;
      }
      th {
        background: #eee;
      }
      .tableFixHead,
      .tableFixHead td {
        box-shadow: inset 1px -1px #000;
      }
      .tableFixHead th {
        box-shadow: inset 1px 1px #000, 0 1px #000;
      }
    </style>
    
    <style>
.thumbnail:hover {
    position:relative;
    top:-25px;
    left:-35px;
    width:500px;
    height:auto;
    display:block;
    z-index:999;
}
</style>

  </head>
  <body>
      <div class="row-fluid">
 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><h2> N.D.C File Detail </h2></div>
                            </div>
    <div class="tableFixHead">
      <table>
        <thead>
          <tr>
                                                <th>S.No</th>
                                                <th>File</th>
												<th>App. Date</th>
												<th>Plot</th>
												<th>Block</th>
												<th>Category</th>
												<th>Size</th>
												<th>Type</th>
												<th>Buyer</th>
												<th>Joint Name</th>
												<th>NDC Req #</th>
												<th>Dealer</th>
												<th>Priority</th>
												<th>Status</th>
												<th>Reason</th>
												<th>Action Date</th>
												<th>Urgent RPT#</th>
												<th>Wave OFF Pic</th>
												
												
          </tr>
        </thead>
       
       <form method="post">
									
										
							
                        <?php $sno=1;
								$query = mysqli_query($conn,"SELECT * FROM `ndc` JOIN file on file.tin_number=ndc.tin_number order by per desc ")or die(mysqli_error());
								while($row = mysqli_fetch_array($query)){
								 ?>
								 <tr>
								     <tbody>
								<td><?php  echo $sno; ?> </td> 
                                <td><?php  echo $row['tin_number']; ?> </td>
                                <td><?php  echo $row['ndc_dat']; ?>
                                <td><?php  echo $row['plot_no']; ?> </td>
                                <td><?php  echo $row['block']; ?> </td>
                                <td><?php  echo $row['file_category']; ?> </td>
                                <td><?php  echo $row['cat']; ?> </td>
                                <td><?php  echo $row['type']; ?> </td>
                                <td><?php  echo $row['buyername']; ?> </td>
                                <td><?php  echo $row['jbuyername']; ?> </td>
                                <td><?php  echo $row['ndc_no']; ?> </td>
                                <td><?php  echo $row['dealer']; ?> </td>
                                <td><?php  echo $row['per']; ?> </td>
                                <td><?php  echo $row['ndc_stu']; ?> </td>
                                <td><?php  echo $row['ndc_res']; ?> </td>
                                <td><?php  echo $row['dat']; ?> </td>
                                <td><?php  echo $row['ndc_rpt'];  $image=$row['ndc_urgpic']; ?> 
                                
                                
    <?php echo "<img src='uploads_ndc/$image' class='thumbnail' width='10' height='10'  >";  ?>	</td>
    
                               
    <td><?php  $image1=$row['ndc_waveoffpic'];?> 
                                
                                
    <?php echo "<img src='uploads_waveoff/$image1' class='thumbnail' width='10' height='10'  >";  $sno=$sno+1;}?>	</td>
    
                                 
      </table>
    </div>
  </body>
</html>
   
                            
                           
                            
								
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
			