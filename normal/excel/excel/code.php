<?php 
session_start();
include('dbconfig.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data']))
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
                /* $b = $row['1'];
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
                
   `tin_number`,  INSERT INTO `file`( `plot_no`, `file_name`, `fathername`, `cnicno`, `address`, `city`, `cnt_no`,`file_category`, `block`, `cat`, `form_no`, `alt_no`) VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l')
   */
   
               $studentQuery = "INSERT INTO `file`(`plot_no`, `file_name`, `fathername`, `cnicno`, `address`, `city`, `cnt_no`, `jfile_name`, `jfathername`, `jcnicno`, `jaddress`, `jcity`, `jcnt_no`, `status`, `file_type`, `file_category`, `trade_name`, `block`, `region`, `st_ver`, `st_ndc`, `st_trns`, `stj`, `cat`, `form_no`, `alt_no`, `trns_rqno`, `trns_apldat`, `trns_aplno`, `trns_ldgno`, `frm_ish_dt`, `booking_ref`, `booking_client`, `frm_rcv_dt`, `opn_reg`, `so`, `jso`) VALUES ('1','2','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1')";
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
            header('Location: index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: index.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: index.php');
        exit(0);
    }
}

?>