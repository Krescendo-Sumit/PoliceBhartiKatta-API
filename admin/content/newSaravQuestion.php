<style>

   table {

  width: 100%;
}
input[type="radio"]{
    height: 30px;
    width: 30px;
}
.tdcss {
  
  vertical-align: center;
}

</style>
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">New Sarav Question </li>
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

                        $question = $_REQUEST['question'];
                        $opt1 = $_REQUEST['opt1'];
                        $opt2 = $_REQUEST['opt2'];
                        $opt3 = $_REQUEST['opt3'];
                        $opt4 = $_REQUEST['opt4'];
                        $correctans = $_REQUEST['correctans'];
                        $hint = $_REQUEST['hint'];
                        $status = $_REQUEST['status'];
                        $saravid = $_REQUEST['saravid'];


                        mysqli_query($con, "SET NAMES utf8;");
                        $query = "INSERT INTO tbl_sarav_question (id,question,opt1,opt2,opt3,opt4,correct,hint,`status`,cdate,saravid) VALUES "
                                . "(0,'$question','$opt1','$opt2','$opt3','$opt4',$correctans,'$hint','$status',curdate(),$saravid)";

                       //echo $query;
                        mysqli_query($con, "SET NAMES utf8;");
                        if (mysqli_query($con, $query)) {
                            echo "Question Added Saved.";
                        } else {
                            echo "Error to Upload Data.";
                        }
                        mysqli_query($con, "SET NAMES utf8;");
                        mysqli_close($con);
                    }
                    ?>


                    <form method='post' action='' enctype='multipart/form-data'>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-2"></div>

                                <div class="col-md-8">
                                    <span>Sarav Master</span><br>
                                    <select class="form-control input-rounded" name="saravid" required>
                                        <?php
                                        include '../DB.php';
                                        mysqli_query($con, "SET NAMES utf8;");
                                        $qu = "SELECT id,title,details,`status`,imagepath,accountid,master_accountid FROM tbl_saravprashn_master";
                                        mysqli_query($con, "SET NAMES utf8;");
                                        $query = mysqli_query($con, $qu);
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                                            <?php
                                        }
                                        mysqli_close($con);
                                        ?>

                                    </select>
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <span>Question</span><br>
                                    <textarea class="form-control" name="question" rows="15" required style="height: 120px;" ></textarea>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">

                                    <table class="table1" > <td class="tdcss"><input type="radio" value="1" name="correctans"></td>
                                        <td><input type="text" class="form-control input-rounded" name="opt1" required placeholder="Choice 1"></td></tr></table>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">

                                    <table class="table1" ><td  class="tdcss"><input type="radio"  value="2"  name="correctans"> </td>
                                        <td><input type="text" class="form-control input-rounded" name="opt2" required  placeholder="Choice 2"></td></tr></table>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">

                                    <table class="table1" ><td  class="tdcss"><input type="radio"  value="3"  name="correctans"></td>
                                        <td><input type="text" class="form-control input-rounded" name="opt3" required  placeholder="Choice 3"></td></tr></table>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">

                                    <table class="table1" ><td  class="tdcss"><input type="radio"  value="4"  name="correctans"></td>
                                        <td><input type="text" class="form-control input-rounded" name="opt4" required  placeholder="Choice 4"></td></tr></table>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>

                                <div class="col-md-8">
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
                                    <span>Hint</span><br>
                                    <textarea  name="hint" rows="5" class="form-control input-rounded"></textarea>
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


