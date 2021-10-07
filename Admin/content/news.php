<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
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
                            <input type="button" name="edit" value="Edit" id="<?php echo $res["id"]; ?>" class="btn btn-info btn-xs edit_data" />
                            <!-- <button type="button" class="btn btn-tool" name="edit" title="Edit News" id="<?php echo $res["id"]; ?>"><i class="fas fa-edit edit_data"></i>
                            </button> -->
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
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Message</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <label>Message</label>
                    <textarea name="message" id="message" class="form-control" rows="4" cols="50"></textarea>/>
                    <br />

                    <input type="hidden" name="id" id="id" />
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<scrip src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
    </script>


    <!-- ./wrapper -->