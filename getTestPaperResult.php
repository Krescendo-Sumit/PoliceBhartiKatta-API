<?php
error_reporting(1);
 	include "DB.php";
	//echo 'connected';
        $testid=$_REQUEST['id'];
        $mobile=$_REQUEST['mobile'];
        mysqli_query($con,"SET NAMES utf8;");
  $sql=mysqli_query($con,"SELECT id,testid,mobile,cdate,ctime,correct,total,unanswer,wrong FROM tbl_test_series_result where mobile='$mobile' and testid=$testid");
   mysqli_query($con,"SET NAMES utf8;");
  while($row=mysqli_fetch_assoc($sql)) 
  {
   //echo "<br>".$row['id'];
    $output[]=$row;
  }
  print(json_encode($output));
  if (json_last_error() !== JSON_ERROR_NONE) {
    throw new RuntimeException(json_last_error_msg());
}
  mysqli_close($con);
?>