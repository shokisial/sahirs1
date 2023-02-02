<?php  

//connect to the database 

mysql_connect("localhost","v0503sah","rev$X,#zm9hlG1~;=P");
mysql_select_db("v0503sah_saestatedb");

if ($_FILES[csv][size] > 0) { 

    //get the csv file 
    $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"r"); 
     
    //loop through the csv file and insert into database 
    do { 
        if ($data[0]) { 
    mysql_query("INSERT INTO `file`(`file_id`, `tin_number`) VALUES 
                ( 
                   '".addslashes($data[0])."', 
                   '".addslashes($data[1])."'
                  
                   
		                ) 
            "); 
        } 
    } while ($data = fgetcsv($handle,1000,",","'")); 
    // 

    //redirect 
    header('Location:csv.php?success=1'); die; 

} 

//, `jfile_name`, `jfathername`, `jcnicno`, `jaddress`, `jcity`, `jcnt_no`, `status`, `file_type`, `file_category`, `trade_name`, `block`, `region`, `st_ver`, `st_ndc`, `st_trns`, `stj`, `cat`, `form_no`, `alt_no`, `trns_rqno`, `trns_apldat`, `trns_aplno`, `trns_ldgno`

/*,
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
                   '".addslashes($data[32])."'
                   */
?> 