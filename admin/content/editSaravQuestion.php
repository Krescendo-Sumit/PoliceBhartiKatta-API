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
                        $id=$_REQUEST['id'];  

                        mysqli_query($con, "SET NAMES utf8;");
                        $query = "Update tbl_sarav_question set question='$question',opt1='$opt1',opt2='$opt2',opt3='$opt3',opt4='$opt4',correct=$correctans,hint='$hint',status='$status',saravid=$saravid  where id=$id ";
                        //echo $query;
                        mysqli_query($con, "SET NAMES utf8;");
                        if (mysqli_query($con, $query)) {
                            echo "Question Updated.";
                        } else {
                            echo "Error to Upload Data.";
                        }
                        mysqli_query($con, "SET NAMES utf8;");
                        mysqli_close($con);
                    }
                    ?>


                    <form method='post' action='' enctype='multipart/form-data'>
                        <?php
                        include '../DB.php';
                        $id = $_REQUEST['id'];
                        mysqli_query($con, "SET NAMES utf8;");
                        $qq = "select id,question,opt1,opt2,opt3,opt4,correct,hint,`status`,cdate,saravid FROM tbl_sarav_question where id=$id";
                        if ($row1 = mysqli_fetch_assoc(mysqli_query($con, $qq))) {
                            ?>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-2"><input type="hidden" name="id" value="<?php echo $id; ?>"></div>

                                    <div class="col-md-8">
                                        <span>Sarav Master</span><br>
                                        <select class="form-control input-rounded" name="saravid" id="ssid" required>
                                            <?php
                                            //  include '../DB.php';
                                            mysqli_query($con, "SET NAMES utf8;");
                                            $qu = "SELECT id,title,details,`status`,imagepath,accountid,master_accountid FROM tbl_saravprashn_master";
                                            mysqli_query($con, "SET NAMES utf8;");
                                            $query = mysqli_query($con, $qu);
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                                                <?php
                                            }
                                          //  mysqli_close($con);
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
 <script>
                                document.getElementById("ssid").value="<?php echo $row1['saravid']; ?>";
                                </script>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <span>Question</span><br>
                                        <textarea class="form-control " name="question" style="height: 120px;" required ><?php echo $row1['question']; ?></textarea>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">

                                        <table class="table1" > <td class="tdcss"><input type="radio" value="1" name="correctans" <?php if($row1['correct']==1){echo 'checked';} ?>></td>
                                            <td><input type="text" class="form-control input-rounded" name="opt1" required placeholder="Choice 1" value="<?php echo $row1['opt1']; ?>"></td></tr></table>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <table class="table1" ><td  class="tdcss"><input type="radio"  value="2"  name="correctans" <?php if($row1['correct']==2){echo 'checked';} ?>> </td>
                                            <td><input type="text" class="form-control input-rounded" name="opt2" required  placeholder="Choice 2"  value="<?php echo $row1['opt2']; ?>"></td></tr></table>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <table class="table1" ><td  class="tdcss"><input type="radio"  value="3"  name="correctans" <?php if($row1['correct']==3){echo 'checked';} ?>></td>
                                            <td><input type="text" class="form-control input-rounded" name="opt3" required  placeholder="Choice 3"  value="<?php echo $row1['opt3']; ?>"></td></tr></table>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">

                                        <table class="table1" ><td  class="tdcss"><input type="radio"  value="4"  name="correctans" <?php if($row1['correct']==4){echo 'checked';} ?>></td>
                                            <td><input type="text" class="form-control input-rounded" name="opt4" required  placeholder="Choice 4"  value="<?php echo $row1['opt4']; ?>"></td></tr></table>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>

                                    <div class="col-md-8">
                                        <span>Status</span><br>
                                        <select class="form-control input-rounded" name="status" id="sts" required>
                                            <option value="1">Active</option>
                                            <option value="0">De-Active</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                  <script>
                                document.getElementById("sts").value="<?php echo $row1['status']; ?>";
                                </script>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <span>Hint</span><br>
                                        <textarea  name="hint" rows="5" class="form-control input-rounded"><?php echo $row1['hint']; ?></textarea>
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

                            </div><?php
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


