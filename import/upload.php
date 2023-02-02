<?php
// include mysql database configuration file
include_once 'connection.php';
 
if (isset($_POST['submit']))
{
 
    // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
 
    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
    {
 
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
            // Skip the first line
            fgetcsv($csvFile);
 
            // Parse data from CSV file line by line
             // Parse data from CSV file line by line
            while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
            {
                // Get row data
                $name = $getData[0];
                $email = $getData[1];
                $phone = $getData[2];
                $status = $getData[3];
 
                
                     mysqli_query($conn, "INSERT INTO `file`(`tin_number`, `old_no`, `plot_no`, `file_name`) VALUES ('" . $name . "', '" . $email . "', '" . $phone . "', '" . $status . "')");
 
                
            }
 
            // Close opened CSV file
            fclose($csvFile);
            echo 'Done';
            header("Location: index.php");
         
    }
    else
    {
        echo "Please select valid file";
    }
}