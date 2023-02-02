<?php  
 include('../connection/dbcon.php'); 
if ($_FILES[csv][size] > 0) { 

    //get the csv file 
    $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"r"); 
     
    //loop through the csv file and insert into database 
    do { 
       // if ($data[0]) { 

mysqli_query($conn,"INSERT INTO `file`(`tin_number`, `old_no`, `plot_no`, `file_name`, `fathername`, `cnicno`, `address`, `city`, `cnt_no`, `jfile_name`, `jfathername`, `jcnicno`, `jaddress`, `jcity`, `jcnt_no`, `status`, `file_type`, `file_category`, `trade_name`, `block`, `region`, `st_ver`, `st_ndc`, `st_trns`, `stj`, `cat`, `form_no`, `alt_no`, `trns_rqno`, `trns_apldat`, `trns_aplno`, `trns_ldgno`, `frm_ish_dt`, `booking_ref`, `booking_client`, `frm_rcv_dt`, `opn_reg`, `so`, `jso`,fector) VALUES 
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
                   '".addslashes($data[10])."',
                   '".addslashes($data[11])."',
                   '".addslashes($data[12])."',
                   '".addslashes($data[13])."',
                   '".addslashes($data[14])."',
                   '".addslashes($data[15])."',
                   '".addslashes($data[16])."',
                   '".addslashes($data[17])."',
                   '".addslashes($data[18])."',
                   '".addslashes($data[19])."',
                   '".addslashes($data[20])."',
                   '".addslashes($data[21])."',
                   '".addslashes($data[22])."',
                   '".addslashes($data[23])."',
                   '".addslashes($data[24])."',
                   '".addslashes($data[25])."',
                   '".addslashes($data[26])."',
                   '".addslashes($data[27])."',
                   '".addslashes($data[28])."',
                   '".addslashes($data[29])."',
                   '".addslashes($data[30])."',
                   '".addslashes($data[31])."',
                   '".addslashes($data[32])."',
                   '".addslashes($data[33])."',
                   '".addslashes($data[34])."',
                   '".addslashes($data[35])."',
                   '".addslashes($data[36])."',
                   '".addslashes($data[37])."',
                   '".addslashes($data[38])."',
                   '".addslashes($data[39])."'
                 
                   
                   
                  
		                ) 
            "); 
      //  } 
    } while ($data = fgetcsv($handle,1000,",","'")); 
    // 
  echo 'Done';
    //redirect 
    header('Location:csv.php?success=1'); die; 

} 

?> 