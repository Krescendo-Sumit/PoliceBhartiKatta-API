<?php
error_reporting(1);

$id=$_REQUEST['id'];



 	include "DB.php";
	//echo 'connected';
           mysqli_query($con,"SET NAMES utf8;");
  $sql=mysqli_query($con,"SELECT id,title,details,`status`,concat('importantnotes/',filepath)as filepath,accountid,master_accountid,mater_imp_id FROM tbl_importantnotes_items WHERE  mater_imp_id=$id");
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
