<?php

include '../../DB.php';
$bid = $_REQUEST['sid'];
$q = "delete from tbl_saravprashn_master where id=$bid";
if (mysqli_query($con, $q)) {
    
    
    $q1="DELETE FROM tbl_sarav_question WHERE saravid=$bid";
    if(mysqli_query($con, $q1))
    {
        
    }
    
    
    
    header('Location: ../SeeSaravMaster.php');
    ?>

    <?php

} else {
    header('Location: ../SeeSaravMaster.php');
    ?>

    <?php

}
mysqli_close($con);
?>
