<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Sarav Master View</li>
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
                            <a href="NewSaravMaster.php" class="btn btn-success">Add New</a>
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Details</th>
                                        <th>Status</th>
<!--                                        <th>Image</th>-->
                                        <th></th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include '../DB.php';
                                    mysqli_query($con, "SET NAMES utf8;");
                                    $qu = "SELECT id,title,details,`status`,imagepath,accountid,master_accountid FROM tbl_saravprashn_master";
                                    mysqli_query($con, "SET NAMES utf8;");
                                    $query = mysqli_query($con, $qu);
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        ?>

                                        <tr>
                                            
                                            <td><a  href="SeeSaravQuestionsBySaravMaster.php?sid=<?php echo $row['id']; ?>"> <i class="fa fa-eye" style="color: #0062cc" aria-hidden="true"></i></a></td>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['details']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
<!--                                            <td><?php echo $row['imagepath']; ?></td>-->
                                            <td><a  href="EditSaravMaster.php?id=<?php echo $row['id']; ?>"> <i class="fa fa-edit"  style="color: #00897b" aria-hidden="true"></i></a>&nbsp;|&nbsp;<a href="#" onclick="remove(<?php echo $row['id']; ?>);"> <i class="fa fa-trash"  style="color: tomato;" aria-hidden="true"></i></a></td>
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

<script>

    function remove(id) {
        var r = confirm("Do you want to remove ?");
        if (r)
            window.location.href = "ajax/ajax_remove_SaravMaster.php?sid=" + id;
    }

</script>

