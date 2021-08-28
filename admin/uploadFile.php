<?php
session_start();
if (isset($_POST['btnSubmit'])) {
    $uploadfile = $_FILES["uploadImage"]["tmp_name"];
    $folderPath = "uploads/";
    $_SESSION['ufilename']=$_FILES["uploadImage"]["name"];
    if (! is_writable($folderPath) || ! is_dir($folderPath)) {
        echo "error";
        exit();
    }
    if (move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $folderPath . $_FILES["uploadImage"]["name"])) {
        echo '<iframe src="' . $folderPath . "" . $_FILES["uploadImage"]["name"] . '"></iframe>';
        $_SESSION['ufilename']=$_FILES["uploadImage"]["name"];
        exit();
    }
}
?>