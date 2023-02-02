<?php 
//session_start();
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
                $m = $row['12'];
                $n = $row['13'];
                $o = $row['14'];
                $p = $row['15'];
                $q = $row['16'];
                $r = $row['17'];
                $s = $row['18'];
                $t = $row['19'];
                
                $u = $row['20']; 
                $v = $row['21'];
                $w = $row['22'];
                $x = $row['23'];
                $y = $row['24'];
                $z = $row['25'];
                $aa = $row['26'];
                $ab = $row['27'];
                $ac = $row['28'];
                $ad = $row['29'];
                
                $ae = $row['30']; 
                $af = $row['31'];
                $ag = $row['32'];
                
                echo "<br>" . $a;   echo "<br>" . $b; echo "<br>" . $b; echo "<br>" . $c; echo "<br>" . $d; echo "<br>" . $d; 
                
        mysqli_query($con,"UPDATE `file` SET `old_no`='$b',`plot_no`='$c',`file_name`='$d',`fathername`='$e',`cnicno`='$f',`address`='$g',`city`='$h',`cnt_no`='$i',`jfile_name`='$j',`jfathername`='$k',`jcnicno`='$l',`jaddress`='$m',`jcity`='$n',`jcnt_no`='$o',`file_type`='$p',`file_category`='$q',`block`='$r',`cat`='$s',`form_no`='$t', `alt_no`='$u', `trns_rqno`='$v', `trns_apldat`='$w', `trns_aplno`='$x', `trns_ldgno`='$y', `frm_ish_dt`='$z', `booking_ref`='$aa' ,`booking_client`='$ab', `frm_rcv_dt`='$ac', `opn_reg`='$ad',`so`='$ae', `jso`='$af',`fector`='$ag' WHERE `tin_number`='$a'")or die(mysqli_error()); 
                      
          
            }
            else
            {
                $count = "1";
            }
        }

        if(isset($msg))
        {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: item_index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: item_index.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: item_index.php');
        exit(0);
    }
}

?>