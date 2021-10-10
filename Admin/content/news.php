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



                            <div class="card-tools">


                                <a href="updatenews.php?id=<?php echo $res['id']; ?>" type="button" name="edit"> <i class="fas fa-edit "></i> </a>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <?php
                    include 'db_connection.php';

                    // $selectquery = "select * from latest_news where category=$cat";
                    $selectquery = "select * from latest_news where category='Education'";
                    $query = mysqli_query($con, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {

                    ?>
                        <div class="card-body">
                            <?php echo $res['message']; ?>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- /.card-body -->
                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-header">

                        <?php
                        include 'db_connection.php';

                        // $selectquery = "select * from latest_news where category=$cat";
                        $selectquery = "select * from latest_news where category='Health'";
                        $query = mysqli_query($con, $selectquery);

                        $nums = mysqli_num_rows($query);

                        while ($res = mysqli_fetch_array($query)) {

                        ?>
                            <h3 class="card-title"><?php echo $res['category']; ?> Forms Latest News</h3>



                            <div class="card-tools">


                                <a href="updatenews.php?id=<?php echo $res['id']; ?>" type="button" name="edit"> <i class="fas fa-edit "></i> </a>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <?php
                    include 'db_connection.php';

                    // $selectquery = "select * from latest_news where category=$cat";
                    $selectquery = "select * from latest_news where category='Health'";
                    $query = mysqli_query($con, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {

                    ?>
                        <div class="card-body">
                            <?php echo $res['message']; ?>
                        </div>
                    <?php
                    }
                    ?>

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



                            <div class="card-tools">


                                <a href="updatenews.php?id=<?php echo $res['id']; ?>" type="button" name="edit"> <i class="fas fa-edit "></i> </a>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <?php
                    include 'db_connection.php';

                    // $selectquery = "select * from latest_news where category=$cat";
                    $selectquery = "select * from latest_news where category='Other Expenses'";
                    $query = mysqli_query($con, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {

                    ?>
                        <div class="card-body">
                            <?php echo $res['message']; ?>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- /.card-body -->
                </div>

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