<?php

error_reporting(1);
include "DB.php";
//echo 'connected';
mysqli_query($con, "SET NAMES utf8;");
$sql = mysqli_query($con, "SELECT id,title,details,concat('Purchase in just Rs.',rate,'.')as rate,status,concat('ebooks/dp/',imagepath)as imagepath,accountid,master_accountid,filepath FROM tbl_e_book");
mysqli_query($con, "SET NAMES utf8;");
while ($row = mysqli_fetch_assoc($sql)) 
{
    $output[] = $row;
}
print(json_encode($output));
if (json_last_error() !== JSON_ERROR_NONE) {
    throw new RuntimeException(json_last_error_msg());
}
mysqli_close($con);
?>

