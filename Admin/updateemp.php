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


    if (isset($_POST["edit"])) {
        sleep(3);
        $connect = new PDO("mysql:host=localhost; dbname=base", "root", "");
        $pattern = '/^((?:00|\+)92)?(0?3(?:[0-46]\d|55)\d{7})$/';


        $success = '';

        // $emp_name = $_POST["emp_name"];
        // $emp_email = $_POST["emp_email"];
        // $emp_phone = $_POST["emp_phone"];
        $emp_id = $_POST["emp_id"];
        $emp_name = test_input($_POST["emp_name"]);
        $emp_phone = test_input($_POST["emp_phone"]);
        $emp_email = test_input($_POST["emp_email"]);
        $name_error = '';
        $email_error = '';
        $phone_error = '';



        if (empty($emp_name)) {
            $name_error = 'Name is Required';
        } else {

            if (!preg_match("/^[a-zA-Z-' ]*$/", $emp_name)) {
                $name_error = 'Only Letters and White Space Allowed';
            }
        }

        if (empty($emp_email)) {
            $email_error = 'Email is Required';
        } else {
            if (!filter_var($emp_email, FILTER_VALIDATE_EMAIL)) {
                $email_error = 'Email format is not correct.';
            }
        }
        $query = "SELECT * FROM emp where emp_phone='$emp_phone' and emp_id<>'$emp_id'";
        $qu = mysqli_query(
            $con,
            $query
        );

        if (mysqli_num_rows($qu) > 0) {
            $Phone_error = 'This Phone number already exists';
        }
        $query = "SELECT * FROM emp where emp_email='$emp_email' and emp_id<>'$emp_id'";
        $qu = mysqli_query(
            $con,
            $query
        );

        if (mysqli_num_rows($qu) > 0) {
            $email_error = 'This email already exists';
        }
        if (empty($emp_phone)) {
            $phone_error = 'Phone Number is Required';
        } else {
            if (!preg_match($pattern, $emp_phone)) {
                $phone_error = 'Phone Number is not in valid format, follow 03XXXXXXXXX format';
            }
        }

        if ($name_error == '' && $email_error == '' && $phone_error == '' && $success == '') {


            $data = array(
                ':emp_name'            =>    $emp_name,
                ':emp_email'        =>    $emp_email,
                ':emp_phone'        =>    $emp_phone

            );

            $query = "update emp set emp_name='$emp_name', emp_phone='$emp_phone', emp_email='$emp_email' where emp_id='$emp_id'";

            $statement = $connect->prepare($query);

            $statement->execute($data);
            $success = "Details of $emp_name successfully edited";
        }

        $output = array(
            'success'        =>    $success,
            'name_error'    =>    $name_error,
            'email_error'    =>    $email_error,
            'phone_error'    =>    $phone_error

        );

        echo json_encode($output);
    }
    // Check if coming from submitted form and do the validations on user inputs in form



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

  <!DOCTYPE html>

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Edit Employees</title>

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
          <div class="modal-dialog">

              <div class="modal-content">
                  <form id="editform">
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
                          <input type="hidden" id="emp_id" name="emp_id" value="<?php echo $arrdata['emp_id']; ?>" class="form-control form_data" required>
                          <div class="form-group">
                              <label>Employee Name</label>
                              <input type="text" name="emp_name" value="<?php echo $arrdata['emp_name']; ?>" class="form-control form_data" required="" readonly>
                              <span id="name_error" class="text-danger"></span>
                          </div>

                          <div class="form-group">
                              <label>Employee Phone</label>
                              <input type="text" name="emp_phone" value="0<?php echo $arrdata['emp_phone']; ?>" class="form-control form_data" required="">
                              <span id="phone_error" class="text-danger"></span>
                          </div>

                          <div class="form-group">
                              <label>Employee Email</label>
                              <input type="email" name="emp_email" value="<?php echo $arrdata['emp_email']; ?>" class="form-control form_data" required="">
                              <span id="email_error" class="text-danger"></span>
                              <span id="suc" class="text-success"></span>
                              <span id="mail_error" class="text-success"></span>
                          </div>

                          <div class="modal-footer">
                              <!-- <input type="button" class="btn btn-default" data-dismiss="modal" value="Back"> -->
                              <input type="submit" onClick="myFunction()" class="btn btn-default" data-dismiss="modal" value="Back">
                              <script>
                                  function myFunction() {
                                      window.location.href = "empdetails.php";
                                  }
                              </script>
                              <input type="submit" onclick="save_emp();" name="edit" class="btn btn-success" value="Save">

                          </div>
                  </form>
              </div>
          </div>
      </div>
      <script>
          function save_emp() {
              var form_element = document.getElementsByClassName('form_data');

              var form_data = new FormData();

              for (var count = 0; count < form_element.length; count++) {
                  form_data.append(form_element[count].name, form_element[count].value);
              }

              document.getElementById('edit').disabled = true;

              var ajax_request = new XMLHttpRequest();

              ajax_request.open('POST', 'updateemp.php');

              ajax_request.send(form_data);

              ajax_request.onreadystatechange = function() {
                  if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                      document.getElementById('edit').disabled = false;

                      var response = JSON.parse(ajax_request.responseText);

                      if (response.success != '') {
                          document.getElementById('editform').reset();

                          // document.getElementById('suc').innerHTML = response.success;

                          // setTimeout(function() {

                          //     document.getElementById('suc').innerHTML = '';

                          // }, 5000);

                          document.getElementById('name_error').innerHTML = '';
                          document.getElementById('email_error').innerHTML = '';
                          document.getElementById('phone_error').innerHTML = '';

                          alert(response.success);
                          window.location.href = "empdetails.php";

                      } else {
                          document.getElementById('name_error').innerHTML = response.name_error;
                          document.getElementById('email_error').innerHTML = response.email_error;
                          document.getElementById('phone_error').innerHTML = response.phone_error;

                      }

                  }
              }
          }
      </script>
  </body>

  </html>