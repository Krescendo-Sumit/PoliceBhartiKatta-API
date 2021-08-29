<?php

error_reporting(1);
include "DB.php";
//echo 'connected';
$code = $_REQUEST['code'];
$mobile = $_REQUEST['mobile'];
$testid = $_REQUEST['testid'];

mysqli_query($con, "SET NAMES utf8;");
$sql = mysqli_query($con, "SELECT * FROM tbl_copon_code WHERE ccode='$code' limit 1");
mysqli_query($con, "SET NAMES utf8;");
if ($row = mysqli_fetch_assoc($sql)) {
    //echo "<br>".$row['id'];

    if ($row['cstatus'] == 1) {
        echo "This coupon is alredy applied.\n Please Enter new coupon code.";
    } else
        {
        
        if(mysqli_query($con, "update tbl_copon_code set cstatus=1,mobile='$mobile' where ccode='$code'"))
        {
            echo 'Coupon applied. Please Refresh the list.';
        }else
        {
            echo 'Error to Apply coupon';
        }
         if(mysqli_query($con, "insert into  tbl_test_user_log(id,mobile,testid,cdate) values (0,'$mobile',$testid,curdate())"))
        {
            echo 'User Activated Successfully.';
        }else
        {
            echo 'error to activate user';
        }
        echo 'valid coupon';
    } 
} else {
    echo 'Invalid Coupon code';
}
//print(json_encode($output));
//if (json_last_error() !== JSON_ERROR_NONE) {
//    throw new RuntimeException(json_last_error_msg());
//}
mysqli_close($con);
?>