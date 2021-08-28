<?php

include './DB.php';
$testid = $_REQUEST['testid'];
$mobile = $_REQUEST['mobile'];
$correct = $_REQUEST['correct'];
$total = $_REQUEST['total'];
$unanswer = $_REQUEST['unanswer'];
$wrong = $_REQUEST['wrong'];


$query = "insert into tbl_live_test_result(id,testid,mobile,cdate,ctime,correct,total,unanswer,wrong) values "
        . "(0,$testid,'$mobile',curdate(),curtime(),$correct,$total,$unanswer,$wrong)";
if (mysqli_query($con, $query)) {
    Echo "Result Submitted .";
}else
{
    Echo "Error to Submit Result.";
}
mysqli_close($con);
?>