<?php
error_reporting(1);
 	include "DB.php";
	//echo 'connected';
           mysqli_query($con,"SET NAMES utf8;");
  $sql=mysqli_query($con,"SELECT id,title,details,qualification,writtentext,ground,readingbooks,classneed,writtenskill,groundtesttraining,dailyschedule,videolink,applylink,notificationdocument,createddate,master_accountid,accountid,concat('bharti/dp/', imagepath)as imagepath,concat('bharti/', filepath)as filepath FROM tbl_bharti_master");
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