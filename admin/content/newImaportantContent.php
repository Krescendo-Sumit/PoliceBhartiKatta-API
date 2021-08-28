
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">New Important Notes </li>
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
                        $title = $_REQUEST['title'];
                        $details = $_REQUEST['details'];
                        $fname = $_SESSION['ufilename'];
                   
                        $status = $_REQUEST['status'];

                     if ($fname == "") {
                            echo "Pllease choose PDF file.";
                        } else {

                            mysqli_query($con, "SET NAMES utf8;");
                            $query = "INSERT INTO tbl_importantnotes_items (id,title,details,`status`,accountid,master_accountid,filepath,mater_imp_id) VALUES "
                                    . "(0,'$title','$details','$status',1,1,'$fname',2)";

                            // echo $query;
                            mysqli_query($con, "SET NAMES utf8;");
                            if (mysqli_query($con, $query)) 
                            {
                                echo "Record Saved.";
                                $_SESSION['ufilename'] = "";
                                $_SESSION['dpimage'] = "";
                            } else {
                                echo "Error to Upload Data.";
                            }
                            mysqli_query($con, "SET NAMES utf8;");
                            mysqli_close($con);
                        }
                    }
                    ?>


                    <form method='post' action='' enctype='multipart/form-data'>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <span>Title</span><br>
                                    <input type="text" class="form-control input-rounded" name="title" required>
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
                                    <span>Details</span><br>
                                    <textarea  name="details" rows="5" class="form-control input-rounded" required></textarea>
                                </div>

                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                              
                                <div class="col-md-8">
                                    <span>PDF File</span><br>
                                    <iframe src="fileUplaod/index.php?tit=importantnotes" height="140px" width="100%" frameBorder="0"></iframe>
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


