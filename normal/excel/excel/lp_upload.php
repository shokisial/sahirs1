<?php 
session_start();
include('dbconfig.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_lp_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        { 
            if($count > 0)
            {
                $a = $row['0']; 
                $b = $row['1'];
                $c = $row['2'];
                $d = $row['3'];
                $e = $row['4'];
                $f = $row['5'];
                $g = $row['6'];
                $h = $row['7'];
                $i = $row['8'];
                $j = $row['9'];
                $k = $row['10'];
                $l = $row['11'];
                
               $studentQuery = "INSERT INTO `lptbl`(`delivery`, `shiptoname`, `rfdoc`, `whname`, `gdsmdat`, `material`, `des`, `qty`, `lptakendat`, `avaliable`, `balance`, `required`)
 VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l')";
                $result = mysqli_query($con, $studentQuery);
                $msg = true;
            }
            else
            {
                $count = "1";
            }
        }

        if(isset($msg))
        {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: lp_index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: lp_index.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: lp_index.php');
        exit(0);
    }
}

?>