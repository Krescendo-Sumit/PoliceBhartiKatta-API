
        <?php
        error_reporting(1);
        include "DB.php";
       
//        
//		$content = file_get_contents('php://input');
//		$a=json_decode($content,'nameValuePairs');
//         $mobile = $a['mobile'];    
//         $id = $a['id'];
//         $type = $a['type'];
            
        $mobile = $_REQUEST['mobile'];    
        $id = $_REQUEST['id'];
        $type = $_REQUEST['type'];
        $data = "";
        switch ($type) {
            case 1:
                $data = "qualification";
                break;
            case 2:
                $data = "writtentext";
                break;
            case 3:
                $data = "ground";
                break;
            case 4:
                $data = "readingbooks";
                break;
            case 5:
                $data = "classneed";
                break;
            case 6:
                $data = "writtenskill";
                break;
            case 7:
                $data = "groundtesttraining";
                break;
            case 8:
                $data = "dailyschedule";
                break;
        }


        mysqli_query($con, "SET NAMES utf8;");
        $sql = mysqli_query($con, "SELECT id,title,$data as data FROM tbl_bharti_master where id=$id");
  
        mysqli_query($con, "SET NAMES utf8;");
        while ($row = mysqli_fetch_assoc($sql)) {
            //echo "<br>".$row['id'];
            $output[] = $row;
            //  echo $row['data'];
        }

        print(json_encode($output));
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException(json_last_error_msg());
        }
        mysqli_close($con);
        ?>
