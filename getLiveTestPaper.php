<?php

error_reporting(1);
include "DB.php";
//echo 'connected';
//$id = $_REQUEST['id'];
$mobile = $_REQUEST['mobile'];
mysqli_query($con, "SET NAMES utf8;");
$sql = mysqli_query($con, "SELECT id,title,details,rate,`STATUS`,concat('livetest/dp/',imagepath)as imagepath,accountid,master_accountid,seriesid,filepath,totq,totalduration,tdate,ttime,(SELECT COUNT(*) FROM tbl_live_test_result WHERE testid=s.id AND mobile='$mobile' )AS resultcnt,(SELECT COUNT(*) FROM tbl_livetest_user_log WHERE testid=s.id AND mobile='$mobile')AS active_status FROM tbl_live_test_paper s");
mysqli_query($con, "SET NAMES utf8;");
while ($row = mysqli_fetch_assoc($sql)) {
    $output[] = $row;
}
print(json_encode($output));
if (json_last_error() !== JSON_ERROR_NONE) {
    throw new RuntimeException(json_last_error_msg());
}
mysqli_close($con);
?>