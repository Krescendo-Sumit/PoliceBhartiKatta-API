<?php

include './DB.php';

$mobile = $_REQUEST['mobile'];
$password = $_REQUEST['password'];

mysqli_query($con, "SET NAMES utf8;");
$sql = mysqli_query($con, "select *,now() as localtoken from tbl_user where mobile='$mobile' and pass='$password' limit 1");
mysqli_query($con, "SET NAMES utf8;");
if ($row = mysqli_fetch_assoc($sql)) {
    //echo "<br>".$row['id'];
    $output[] = $row;
    
    if(mysqli_query($con, "Update tbl_user set installedid='".$row['localtoken']."'  where mobile='$mobile' and pass='$password'"))
    {
        
    }
    
}
print(json_encode($output));
if (json_last_error() !== JSON_ERROR_NONE) {
    throw new RuntimeException(json_last_error_msg());
}
mysqli_close($con);
?>

