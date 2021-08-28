
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">New Sarav Master </li>
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
                        $id=$_REQUEST['id'];
                        $title = $_REQUEST['title'];
                        $details = $_REQUEST['details'];
                        //   $fname = $_SESSION['ufilename'];
                        //  $dp = $_SESSION['dpimage'];
                        $dp = "";
                        $status = $_REQUEST['status'];

//                        if ($dp == "") {
//                            echo "Please Chooose Image  File";
//                        } else {

                        mysqli_query($con, "SET NAMES utf8;");
                        $query = "update  tbl_saravprashn_master set title='$title',details='$details',status='$status' where id=$id ";
                            
                        // echo $query;
                        mysqli_query($con, "SET NAMES utf8;");
                        if (mysqli_query($con, $query)) {
                            echo "Record Updated.";
                            //   $_SESSION['ufilename'] = "";
                            //    $_SESSION['dpimage'] = "";
                        } else {
                            echo "Error to Upload Data.";
                        }
                        mysqli_query($con, "SET NAMES utf8;");
                        mysqli_close($con);
                       ?>
                    <script type="text/javascript">
                        
                        window.location = "SeeSaravMaster.php";
                        
                    </script>
                    <?php
                    }
                    
                    //         }
                    ?>


                    <form method='post' action='' enctype='multipart/form-data'>

                        <?php
                        include '../DB.php';
                        $id = $_REQUEST['id'];
                         mysqli_query($con, "SET NAMES utf8;");
                        $qq = "select id,title,details,status FROM tbl_saravprashn_master where id=$id";
                        if ($row = mysqli_fetch_assoc(mysqli_query($con, $qq))) {
                            ?>


                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
                                        <span>Title</span><br>
                                        <input type="text" class="form-control input-rounded" name="title" required value="<?php echo $row['title']; ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <span>Status</span><br>
                                        <select class="form-control input-rounded" name="status" required id="sts">
                                            <option value="1">Active</option>
                                            <option value="0">De-Active</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <script>
                                document.getElementById("sts").value="<?php echo $row['status']; ?>";
                                </script>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <span>Details</span><br>
                                        <textarea  name="details" rows="5" class="form-control input-rounded" required><?php echo $row['details']; ?></textarea>
                                    </div>

                                    <div class="col-md-2"></div>
                                </div>
                                <!--                            <div class="row">
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-4">
                                                                    <span>DP Image File</span><br>
                                                                    <iframe src="fileUplaod/uploadimage.php?tit=sarav_master" height="140px" width="100%" frameBorder="0" ></iframe>
                                                                </div>
                                                                <div class="col-md-4">
                                                                </div>
                                                                <div class="col-md-2"></div>
                                                            </div>-->

                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <br>
                                        <input type="submit" class="form-control input-rounded btn btn-success" name="btn_save" value="Save">
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                            </div>
                            <?php
                        }mysqli_close($con);
                        ?>
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


