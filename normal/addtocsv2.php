<?php  
 include('../connection/dbcon.php'); 

/*$tn_no=0; $rn='returned'; $stj=105; $opn=1;
	$query = mysqli_query($conn,"SELECT max(tin_number) as tnno from file")or die(mysqli_error());
		$row = mysqli_fetch_array($query);
	{	$tn_no = $row['tnno'];  echo $tn_no; $tn_no=$tn_no+1; */
								
if ($_FILES[csv][size] > 0) { 

    //get the csv file 
    $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"r"); 
     
    //loop through the csv file and insert into database 
    do { 
        if ($data[0]) { 

mysqli_query($conn,"INSERT INTO `file`(`tin_number`, `plot_no`, `file_category`, `block`, `cat`, `form_no`, `frm_ish_dt`, booking_ref, stj, opn_reg,fector) VALUES 
                ( 
                   
                   '".addslashes($data[0])."',
                   '".addslashes($data[1])."',
                   '".addslashes($data[2])."',
                   '".addslashes($data[3])."',
                   '".addslashes($data[4])."',
                   '".addslashes($data[5])."',
                   '".addslashes($data[6])."',
                   '".addslashes($data[7])."',
                   '".addslashes($data[8])."',
                   '".addslashes($data[9])."',
                   '".addslashes($data[10])."'
                   
		                ) 
            "); 
          //  $tn_no=$tn_no+1;
        } 
    } while ($data = fgetcsv($handle,1000,",","'")); 
    // 
  echo 'Done';
    //redirect 
    header('Location:edit_user.php'); die; 

} 

?> 