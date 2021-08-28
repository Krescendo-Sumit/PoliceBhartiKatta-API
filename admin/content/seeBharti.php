<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Bharti Details</li>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="NewBharti.php" class="btn btn-success">Add New</a>
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Details</th>

                                        <th>PDF File</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Created Date</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include '../DB.php';
                                    mysqli_query($con, "SET NAMES utf8;");
                                    $qu = "SELECT  id,title,details,createddate,master_accountid,accountid,status,filepath,imagepath  FROM tbl_bharti_master";
                                    mysqli_query($con, "SET NAMES utf8;");
                                    $query = mysqli_query($con, $qu);
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        ?>

                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['details']; ?></td>

                                            <td><?php echo $row['filepath']; ?></td>
                                            <td><?php echo $row['imagepath']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><?php echo $row['createddate']; ?></td>

                                        </tr>
                                        <?php
                                    }
                                    mysqli_close($con);
                                    ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
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

