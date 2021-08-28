<?php
session_start();
if (isset($_POST['btnSubmit'])) {
   
    $uploadfile = $_FILES["uploadImage"]["tmp_name"];
    $server_path = "http://localhost/policebharti/admin/fileupload/";
    $title=$_REQUEST['title'];

      $folderPath = "../../$title/dp/";
    
    $_SESSION['dpimage'] = $_FILES["uploadImage"]["name"];
    if (!is_writable($folderPath) || !is_dir($folderPath)) {
        echo "error";
        exit();
    }
    if (move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $folderPath . $_FILES["uploadImage"]["name"])) {
        $pp = "http://localhost/poilcebharti/admin/fileupload/uploads/Prajakta%20Kale%20PAN%20Card.pdf";
        $_SESSION['dpimage'] = $_FILES["uploadImage"]["name"];
       // echo $pp;
        echo 'Image upload success.';
        exit();
    }
}
?>

