<?php

error_reporting(1);
include "DB.php";
//echo 'connected';
$pid = $_REQUEST['id'];
mysqli_query($con, "SET NAMES utf8;");
$sql = mysqli_query($con, "SELECT id,paperid,papermaster_id,questionno,ans,details,cdate FROM tbl_live_test_quetion_answer where paperid=$pid");
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