<?php

include '../../DB.php';
$bid = $_REQUEST['sid'];
$q = "delete from tbl_sarav_question where id=$bid";
if (mysqli_query($con, $q)) {
   
    header('Location: ../SeeSaravQuestions.php');
    ?>

    <?php

} else {
    header('Location: ../SeeSaravQuestions.php');
    ?>

    <?php

}
mysqli_close($con);
?>
