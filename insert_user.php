<?php

include './DB.php';
$name = $_REQUEST['name'];
$mobile = $_REQUEST['mobile'];
$password = $_REQUEST['password'];

$query = "insert into tbl_user(id,sname,mobile,pass) values "
        . "(0,'$name','$mobile','$password')";
if (mysqli_query($con, $query)) {
    Echo "User Registered Successfully";
}else
{
    Echo "Error to Submit user Details.";
}
mysqli_close($con);
?>