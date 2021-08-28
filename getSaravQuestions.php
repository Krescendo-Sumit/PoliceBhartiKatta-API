<?php

error_reporting(1);
include "DB.php";
$id = $_REQUEST['id'];
mysqli_query($con, "SET NAMES utf8;");
$sql = mysqli_query($con, "SELECT id,question,opt1,opt2,opt3,opt4,correct,hint,`status`,cdate,saravid FROM tbl_sarav_question where saravid=$id");
mysqli_query($con, "SET NAMES utf8;");
while ($row = mysqli_fetch_assoc($sql)) {
    //echo "<br>".$row['id'];
    $output[] = $row;
}
print(json_encode($output));
if (json_last_error() !== JSON_ERROR_NONE) {
    throw new RuntimeException(json_last_error_msg());
}
mysqli_close($con);
?>