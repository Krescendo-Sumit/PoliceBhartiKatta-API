<?php

error_reporting(1);
include "DB.php";
//echo 'connected';
$id = $_REQUEST['id'];
$mobile = $_REQUEST['mobile'];
mysqli_query($con, "SET NAMES utf8;");
$sql = mysqli_query($con, "SELECT id,title,details,`STATUS`,concat('testseriespaper/dp/',imagepath)as imagepath,accountid,master_accountid,seriesid,filepath,totq,(SELECT COUNT(*) FROM tbl_test_series_result WHERE testid=s.id AND mobile='$mobile' )AS resultcnt FROM tbl_test_series_paper s where seriesid=$id");
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