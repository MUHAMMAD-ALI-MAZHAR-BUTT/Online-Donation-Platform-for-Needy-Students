<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Renew | Update Employees</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



    <script>
        $(document).ready(function() {
            $("#updaterealEmployeeModal").modal('show');
        });
    </script>

    </script>
</head>

<body>

    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <div class="modal fade" id="updaterealEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
        <?php

        include 'db_connection.php';

        $ids = $_GET['id'];

        $showquery = "select * from latest_news where id={$ids}";

        $showdata = mysqli_query($con, $showquery);

        $arrdata = mysqli_fetch_array($showdata);

        if (isset($_POST['edit'])) {
            $message = $_POST['message'];
            $today = date("Y/m/d");

            $query = "update latest_news set message='$message', date=CURRENT_TIMESTAMP where id=$ids ";


            if ($query = mysqli_query($con, $query)) {
                echo "<script>alert('Message successfully edited')</script>";
            } else {
                echo "<script>alert('Error occured')</script>";
            }

            echo "<script>window.open('news.php','_self')</script>";
        }



        ?>
        <div class="modal-dialog modal-md">
            <div style="color:white;  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 74%);" class="modal-content">
                <div class="modal-header">
                    <h4 style="color:white" class="modal-title" id="myModalLabel">Edit Message of <?php echo $arrdata['category']; ?> Category</h4>
                </div>

                <div class="modal-body">


                    <form role="form" method="post" action="">
                        <fieldset>

                            <div class=" form-group">

                                <textarea rows="4" cols="50" class="form-control" value="<?php echo $arrdata['message']; ?>" name="message" type="text" required=""><?php echo $arrdata['message']; ?></textarea>


                            </div>



                        </fieldset>


                </div>

                <div class="modal-footer">
                    <!-- <input type="button" class="btn btn-default" data-dismiss="modal" value="Back"> -->
                    <input type="submit" onClick="myFunction()" class="btn btn-default" data-dismiss="modal" value="Back">
                    <script>
                        function myFunction() {
                            window.location.href = "news.php";
                        }
                    </script>
                    <input type="submit" name="edit" class="btn btn-success" value="Save">


                </div>
            </div>
        </div>
    </div>
    <!-- update Modal HTML -->

</body>

</html>