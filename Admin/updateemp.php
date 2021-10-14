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


    <!-- update Modal HTML -->
    <div id="updaterealEmployeeModal" class="modal fade">

        <?php

        include 'db_connection.php';

        $ids = $_GET['id'];
        extract($_POST);
        $showquery = "select * from emp where emp_id={$ids}";

        $showdata = mysqli_query($con, $showquery);

        $arrdata = mysqli_fetch_array($showdata);
        function test_input($data)
        {

            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //initialize variables for value as well as errors
        $emp_name = $emp_email = $emp_phone = "";
        $name_err = $email_err = $phone_err  = "";

        // Check if coming from submitted form and do the validations on user inputs in form
        if (isset($_POST['edit'])) {
            $pattern = '/^((?:00|\+)92)?(0?3(?:[0-46]\d|55)\d{7})$/';
            if (empty($_POST["emp_name"])) {
                $name_err = 'bbb';
                echo "<script>alert('Name should not be empty, Detail not edited')</script>";
                echo "<script>window.open('empdetails.php','_self')</script>";
            } else {
                $emp_name = test_input($_POST["emp_name"]);
                // check for correctness of name or validate our name test_input
                if (!preg_match("/^[a-zA-z ]*$/", $emp_name)) {
                    $name_err = "Name is not in valid format, can contain only letters.";
                    echo "<script>alert('Name is not in valid format, can contain only letters. Detail not edited')</script>";
                    echo "<script>window.open('empdetails.php','_self')</script>";
                }
            }
            if (empty($_POST["emp_phone"])) {
                $name_err = 'bbb';
                echo "<script>alert('Phone number should not be empty, Detail not edited')</script>";
                echo "<script>window.open('empdetails.php','_self')</script>";
            } else {
                $emp_phone = test_input($_POST["emp_phone"]);
                // check for correctness of name or validate our name test_input
                if (!preg_match($pattern, $emp_phone)) {
                    $phone_err = "Phone Number is not in valid format, follow 03XXXXXXXXX format";
                    echo "<script>alert('Phone Number is not in valid format, follow 03XXXXXXXXX format, Detail not edited')</script>";
                    echo "<script>window.open('empdetails.php','_self')</script>";
                }
            }

            if (empty($_POST["emp_email"])) {
                $email_err = "Email cannot be left blank.";
                echo "<script>alert('Email cannot be left blank.')</script>";
                echo "<script>window.open('empdetails.php','_self')</script>";
            } else {
                $emp_email = test_input($_POST["emp_email"]);
                if (!filter_var($emp_email, FILTER_VALIDATE_EMAIL)) {
                    $email_err = "Email format is not correct, Detail not edited";
                    echo "<script>alert('Email format is not correct, Detail not edited')</script>";
                    echo "<script>window.open('empdetails.php','_self')</script>";
                }
            }

            if (isset($_POST['edit']) and ($name_err == "" and $email_err == "" and $phone_err == "")) {


                $query = "SELECT * FROM emp where emp_phone='$emp_phone' where emp_id<>'$ids'";
                $qu = mysqli_query(
                    $con,
                    $query
                );

                if (mysqli_num_rows($qu) != 0) {
                    echo "<script>alert('This Mobile Number already exists!, Detail not edited')</script>";
                    echo "<script>window.open('empdetails.php','_self')</script>";
                } else {
                    $query = "SELECT * FROM emp where emp_email='$emp_email' where emp_id<>'$ids'";
                    $qu = mysqli_query($con, $query);

                    if (
                        mysqli_num_rows($qu) != 0
                    ) {
                        echo "<script>alert('This Email already exists!, Detail not edited')</script>";
                        echo "<script>window.open('empdetails.php','_self')</script>";
                    } else {


                        $q = "UPDATE emp set emp_phone='$emp_phone',emp_email='$emp_email' where emp_id='$ids'";

                        if ($query = mysqli_query($con, $q)) {
                            echo "<script>alert('Details of employee $emp_name successfully edited')</script>";
                        } else {
                            echo "<script>alert('Error occured')</script>";
                        }

                        echo "<script>window.open('empdetails.php','_self')</script>";
                    }
                }
            }
        }



        // if (isset($_POST['edit'])) {
        //     $emp_name = $_POST['emp_name'];
        //     $emp_phone = $_POST['emp_phone'];
        //     $emp_email = $_POST['emp_email'];


        //     $query = "SELECT * FROM emp where emp_phone=$emp_phone where emp_id<>$ids";
        //     $qu = mysqli_query($con, $query);

        //     if (mysqli_num_rows($qu) > 0) {
        //         echo "<script>alert('This Mobile Number already exists, Data not changed!')</script>";
        //         echo "<script>window.open('empdetails.php','_self')</script>";
        //     } else {
        //         $query = "SELECT * FROM emp where emp_email=$emp_email where emp_id<>$ids";
        //         $qu = mysqli_query($con, $query);

        //         if (mysqli_num_rows($qu) > 0) {
        //             echo "<script>alert('This Email already exists, Data not changed!')</script>";
        //             echo "<script>window.open('empdetails.php','_self')</script>";
        //         } else {


        //             $query = "update emp set emp_name='$emp_name', emp_phone='$emp_phone', emp_email='$emp_email' where emp_id=$ids";


        //             if ($query = mysqli_query($con, $query)) {
        //                 echo "<script>alert('Employee data successfully edited')</script>";
        //             } else {
        //                 echo "<script>alert('Error occured')</script>";
        //             }

        //             echo "<script>window.open('empdetails.php','_self')</script>";
        //         }
        //     }
        // }



        ?>





        <div class="modal-dialog">

            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Employee</h4>
                        <button type="button" class="close" onClick="my()" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <script>
                            function my() {
                                window.location.href = "empdetails.php";
                            }
                        </script>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Employee Name</label>
                            <input type="text" name="emp_name" value="<?php echo $arrdata['emp_name']; ?>" class="form-control" required="" readonly>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Employee Phone</label>
                                <input type="number" name="emp_phone" value="0<?php echo $arrdata['emp_phone']; ?>" class="form-control" required="">
                            </div>

                            <div class="form-group">
                                <label>Employee Email</label>
                                <input type="email" name="emp_email" value="<?php echo $arrdata['emp_email']; ?>" class="form-control" required="">
                            </div>



                        </div>
                        <div class="modal-footer">
                            <!-- <input type="button" class="btn btn-default" data-dismiss="modal" value="Back"> -->
                            <input type="submit" onClick="myFunction()" class="btn btn-default" data-dismiss="modal" value="Back">
                            <script>
                                function myFunction() {
                                    window.location.href = "empdetails.php";
                                }
                            </script>
                            <input type="submit" name="edit" class="btn btn-success" value="Save">


                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>