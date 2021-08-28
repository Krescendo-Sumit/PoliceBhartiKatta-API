<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Sarav Questions </li>
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
                            <a href="NewSaravQuestion.php" class="btn btn-success">Add New</a>
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Sarav Name</th>
                                        <th>Question</th>
                                        <th>Option 1</th>
                                        <th>Option 2</th>
                                        <th>Option 3</th>
                                        <th>Option 4</th>
                                        <th>Correct</th>
                                        <th>Hint</th>
                                        <th>Created Date</th>
                                      



                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include '../DB.php';
                                    $sid=$_REQUEST['sid'];
                                    mysqli_query($con, "SET NAMES utf8;");
                                    $qu = "SELECT id,question,opt1,opt2,opt3,opt4,correct,hint,`status`,cdate,(SELECT title FROM tbl_saravprashn_master WHERE id= saravid) as saravid FROM tbl_sarav_question where saravid=$sid";
                                    mysqli_query($con, "SET NAMES utf8;");
                                    $query = mysqli_query($con, $qu);
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        ?>

                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['saravid']; ?></td>
                                            <td><?php echo $row['question']; ?></td>
                                            <td><?php echo $row['opt1']; ?></td>
                                            <td><?php echo $row['opt2']; ?></td>
                                            <td><?php echo $row['opt3']; ?></td>
                                            <td><?php echo $row['opt4']; ?></td>
                                            <td><?php echo $row['correct']; ?></td>
                                             <td><?php echo $row['hint']; ?></td>
                                            <td><?php echo $row['cdate']; ?></td>

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


