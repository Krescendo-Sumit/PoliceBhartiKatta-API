<?php

include './DB.php';
error_reporting(1);
$mobile = $_REQUEST['mobile'];
$uid = $_REQUEST['uid'];
$installedid = $_REQUEST['installedid'];

mysqli_query($con, "SET NAMES utf8;");
$sql = mysqli_query($con, "select * from tbl_user where mobile='$mobile' and installedid='$installedid' and id=$uid");
mysqli_query($con, "SET NAMES utf8;");
//echo "select * from tbl_user where mobile='$mobile' and installedid='$installedid' and id=$uid";
if ($row = mysqli_fetch_assoc($sql)) {
   echo "Success.";
}else
{
    echo "Fail.";
}

if (json_last_error() !== JSON_ERROR_NONE) {
    throw new RuntimeException(json_last_error_msg());
}
mysqli_close($con);
?>

