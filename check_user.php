<?php

include './DB.php';

$mobile = $_REQUEST['mobile'];
$password = $_REQUEST['password'];

mysqli_query($con, "SET NAMES utf8;");
$sql = mysqli_query($con, "select * from tbl_user where mobile='$mobile' and pass='$password'");
mysqli_query($con, "SET NAMES utf8;");
while ($row = mysqli_fetch_assoc($sql)) {
    //echo "<br>".$row['id'];
    $output[] = $row;
}
print(json_encode($output));
if (json_last_error() !== JSON_ERROR_NONE) {
    throw new RuntimeException(json_last_error_msg());
}
mysqli_close($con);
?>

