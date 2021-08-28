<?php
error_reporting(1);
 	include "DB.php";
	//echo 'connected';
           mysqli_query($con,"SET NAMES utf8;");
  $sql=mysqli_query($con,"SELECT id,title,concat('yashogatha/dp/',imagepath)as imagepath,cdate,location,feedback,others,accountid,master_accountid,concat('yashogatha/',filepath)as filepath,mobile,post FROM tbl_yashogatha");
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
