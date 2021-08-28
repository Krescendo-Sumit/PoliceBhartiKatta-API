<?php

include '../../DB.php';
echo "Connect";
echo $filename = "../import/sample.csv";
echo "<br>";
$file = fopen($filename, "r");
while (($emapData = fgetcsv($file, 100000, ",")) !== FALSE) {
    echo "<br>";
    $sql = "INSERT INTO tbl_sarav_question (id,question,opt1,opt2,opt3,opt4,correct,hint,`status`,cdate,saravid) values"
            . "                         (0,'$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]',1,curdate(),1)";
    echo $sql . "<br>";
    mysqli_query($con, $sql);
}
fclose($file);
echo "<br>CSV File has been successfully Imported.";
mysqli_close($con);
?>