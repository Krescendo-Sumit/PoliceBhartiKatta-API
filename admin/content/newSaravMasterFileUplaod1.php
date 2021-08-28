
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add Sarav Master File Upload</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">




        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <?php
                    if (isset($_POST['btn_save'])) {
                        include '../DB.php';
                        $tid = $_REQUEST['saravid'];
                        $fname = $_SESSION['ufilename'];
                        if ($fname == "") {
                            echo "Please choose CSV file.";
                        } else {
                            mysqli_query($con, "SET NAMES utf8;");
                            $filename = "import/" . $_SESSION['ufilename'];
                            //   echo "<br>";
                            $file = fopen($filename, "r");
                            $cnt = 0;
                            while (($emapData = fgetcsv($file, 100000, ",")) !== FALSE) {
                                echo "<br>";
                                $sql = "INSERT INTO tbl_sarav_question (id,question,opt1,opt2,opt3,opt4,correct,hint,`status`,cdate,saravid) values"
                                        . "                         (0,'$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]',1,curdate(),$tid)";
                                //     echo $sql . "<br>";
                                if (mysqli_query($con, $sql))
                                    $cnt++;
                            }
                            fclose($file);
                            echo "<br>Total $cnt Record Inserted.<br> CSV File has been successfully Imported.";

//==============================================================

                            $_SESSION['ufilename'] = "";
                        }
                        mysqli_query($con, "SET NAMES utf8;");
                        mysqli_close($con);
                    }
                    ?>


                    <form method='post' action='' enctype='multipart/form-data'>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <span>Sarav Paper</span><br>
                                    <select name="saravid" class="form-control input-rounded">
                                        <?php
                                        include '../DB.php';
                                        mysqli_query($con, "SET NAMES utf8;");

                                        $q = "select id,title from tbl_saravprashn_master ";
                                        $query = mysqli_query($con, $q);

                                        while ($ror = mysqli_fetch_assoc($query)) {
                                            echo '<option value="' . $ror['id'] . '">' . $ror['title'] . '</option>';
                                        }

                                        mysqli_query($con, "SET NAMES utf8;");
                                        mysqli_close($con);
                                        ?>
                                    </select>  
                                </div>
                                <div class="col-md-4">
                                    <span>Status</span><br>
                                    <select class="form-control input-rounded" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="0">De-Active</option>
                                    </select>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                   
                            <div class="row">
                                <div class="col-md-2"></div>
                             
                                <div class="col-md-8">
                                    <span>CSV Data File</span><br>
                                    <iframe src="fileUplaod/uploadImportFile.php" height="140px" width="100%" frameBorder="0" ></iframe>
                                </div>

                                <div class="col-md-2"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <br>
                                    <input type="submit" class="form-control input-rounded btn btn-success" name="btn_save" value="Save">
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                        </div>

                    </form>   
                </div>
            </div>
        </div>
        <!-- End PAge Content -->


    </div>
    <!-- End Container fluid  -->
    <!-- footer -->
    <?php include './footer.php'; ?>
    <!-- End footer -->
</div>


