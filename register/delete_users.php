<?php
include('admin/dbcon.php');
if (isset($_POST['delete_user'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM file where _id='$id[$i]'");
}
header("location: return_file.php");
}
?>