<?php
include("db_connection.php");
if (isset($_POST['user_save'])) {
    $id = $_GET['id'];

    $message = $_POST['message'];

    $id = $_POST['id'];


    $update_profile = "update latest_news set message='$message' id='$id'";
    if (mysqli_query($dbcon, $update_profile)) {
        echo "<script>alert('Account successfully updated!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    } else {
        echo "<script>alert('Error Found!')</script>";
    }
}

?>
<div class="content-wrapper">


    <div class="table-wrapper" style="background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-4">
                    <h2 style="font-family: sans-serif; font-weight:bold; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Latest News Section</h2>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>


    </div>

    <div class="container" style="padding-top:1%">
        <div class="row">

            <!-- /.col -->
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-header">

                        <?php
                        include 'db_connection.php';
                        $cat = "Education";
                        // $selectquery = "select * from latest_news where category=$cat";
                        $selectquery = "select * from latest_news where category='Education'";
                        $query = mysqli_query($con, $selectquery);

                        $nums = mysqli_num_rows($query);

                        while ($res = mysqli_fetch_array($query)) {

                        ?>
                            <h3 class="card-title"><?php echo $res['category']; ?> Forms Latest News</h3>
                        <?php
                        }
                        ?>


                        <div class="card-tools">


                            <a data-toggle="modal" type="button" name="edit" id="<?php echo $res["id"]; ?>" data-target="#setAccount"> <i class="fas fa-edit "></i> </a>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        The body of the card
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-header">

                        <?php
                        include 'db_connection.php';
                        $cat = "Education";
                        // $selectquery = "select * from latest_news where category=$cat";
                        $selectquery = "select * from latest_news where category='Health'";
                        $query = mysqli_query($con, $selectquery);

                        $nums = mysqli_num_rows($query);

                        while ($res = mysqli_fetch_array($query)) {

                        ?>
                            <h3 class="card-title"><?php echo $res['category']; ?> Forms Latest News</h3>



                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" title="Edit News"><i class="fas fa-edit"></i>
                                </button>

                            </div>
                        <?php
                        }
                        ?>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        The body of the card
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-header">

                        <?php
                        include 'db_connection.php';
                        $cat = "Education";
                        // $selectquery = "select * from latest_news where category=$cat";
                        $selectquery = "select * from latest_news where category='Other Expenses'";
                        $query = mysqli_query($con, $selectquery);

                        $nums = mysqli_num_rows($query);

                        while ($res = mysqli_fetch_array($query)) {

                        ?>
                            <h3 class="card-title"><?php echo $res['category']; ?> Forms Latest News</h3>
                        <?php
                        }
                        ?>


                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" title="Edit News"><i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        The body of the card
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="setAccount" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
    <div class="modal-dialog modal-md">
        <div style="color:white;background-color:#ad1deb" class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">


                <form enctype="multipart/form-data" method="post" action="">
                    <fieldset>


                        <p>Edit Message</p>
                        <div class="form-group">

                            <textarea class="form-control" placeholder="Message" name="message" type="text" value="<?php echo $message; ?>" required></textarea>


                        </div>

                        <div class="form-group">

                            <input class="form-control hide" name="id" type="text" value="<?php echo $id; ?>" required>


                        </div>








                    </fieldset>


            </div>
            <div class="modal-footer">

                <button class="btn btn-block btn-success btn-md" name="user_save">Save</button>

                <button type="button" class="btn btn-block btn-danger btn-md" data-dismiss="modal">Cancel</button>


                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#priceinput').keypress(function(event) {
            return isNumber(event, this)
        });
    });

    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
</script>
<scrip src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
    </script>


    <!-- ./wrapper -->