<?php

error_reporting(1);
include "DB.php";
//echo 'connected';
$mobile=$_REQUEST['mobile'];

mysqli_query($con, "SET NAMES utf8;");
$sql = mysqli_query($con, "SELECT id,title,details,rate,status,concat('ebooks/dp/',imagepath)as imagepath,accountid,master_accountid,filepath,writer,pages,discountprize,(SELECT COUNT(*) FROM tbl_e_book_user_log WHERE bookid=s.id AND mobile='$mobile')AS active_status FROM tbl_e_book s");
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

