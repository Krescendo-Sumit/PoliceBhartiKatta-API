<?php
error_reporting(1);
 	include "DB.php";
	//echo 'connected';
        $index=$_REQUEST['type'];
           mysqli_query($con,"SET NAMES utf8;");
  $sql=mysqli_query($con,"SELECT id,title,details,`status`,concat('sarav_master/dp/',imagepath)as imagepath,accountid,master_accountid,(SELECT COUNT(*) FROM tbl_sarav_question WHERE saravid=s.id)AS noofcnt FROM tbl_saravprashn_master s");
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