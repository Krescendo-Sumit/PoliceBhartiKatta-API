
<?php

include './DB.php';
$qid = $_REQUEST['qid'];
$mobile = $_REQUEST['mobile'];
$message = $_REQUEST['message'];



$query = "insert into tbl_report_sarav_question(id,qid,message,cdate,mobile) values "
        . "(0,$qid,'$message',now(),'$mobile')";
if (mysqli_query($con, $query)) {
    Echo "Thank you for submitting you report.\nIt is helpful for future improvement. ";
}else
{
    Echo "Something went wrong...";
}
mysqli_close($con);
?>