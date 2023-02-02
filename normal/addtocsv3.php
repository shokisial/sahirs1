<?php  
 include('../connection/dbcon.php'); 


								
if ($_FILES[csv][size] > 0) { 

      //get the csv file 
    $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"r"); 
     
    //loop through the csv file and insert into database 
    do { 
       // if ($data[0]) { 


mysqli_query($conn,"UPDATE `file` SET `jfile_name`='".addslashes($data[9])."',`jfathername`='".addslashes($data[10])."',`jcnicno`='".addslashes($data[11])."',`jaddress`='".addslashes($data[12])."',`jcity`='".addslashes($data[13])."',`jcnt_no`='".addslashes($data[14])."' WHERE tin_number='".addslashes($data[0])."') "); 
            
      //  } 
    } while ($data = fgetcsv($handle,1000,",","'")); 
    // 
  echo 'Done';
    //redirect 
    header('Location:edit_user.php'); die; 

} 

?> 