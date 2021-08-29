<?php
error_reporting(1);
 	include "DB.php";
	//echo 'connected';
           mysqli_query($con,"SET NAMES utf8;");
           $mobile=$_REQUEST['mobile'];
  $sql=mysqli_query($con,"SELECT id,title,details,`status`,concat('testseries/dp/',imagepath)as imagepath,accountid,master_accountid,rate,(SELECT COUNT(*) FROM tbl_test_series_paper WHERE seriesid=s.id)AS noofq,(SELECT COUNT(*) FROM tbl_test_user_log WHERE testid=s.id AND mobile='$mobile')AS active_status FROM tbl_test_series_master s ");
   mysqli_query($con,"SET NAMES utf8;");
  while($row=mysqli_fetch_assoc($sql)) 
  {
     $output[]=$row;
  }
  print(json_encode($output));
  if (json_last_error() !== JSON_ERROR_NONE) {
    throw new RuntimeException(json_last_error_msg());
}
  mysqli_close($con);
?>