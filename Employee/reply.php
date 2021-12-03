<?php
session_start();
if (!$_SESSION['emp_email']) {

    echo "<script>window.open('./login/index1.php','_self')</script>";
}
?>


<?php
include("config.php");
extract($_SESSION);
$stmt_edit = $DB_con->prepare('SELECT * FROM emp WHERE emp_email =:emp_email');
$stmt_edit->execute(array(':emp_email' => $emp_email));
$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
extract($edit_row);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Notify </title>

    <!-- bootstrap cdn link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    /* custom css styling */
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

    html,
    body {
        background: #ad1deb !important;
    }

    ::selection {
        color: #fff;
        background: #ad1deb !important;
    }

    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: 'Poppins', sans-serif;
    }

    .container .mail-form {
        background: #fff;
        padding: 25px 35px;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
            0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .container form .form-control {
        height: 43px;
        font-size: 15px;
    }

    .container .mail-form form .form-group .button {
        font-size: 17px !important;
    }

    .container form .textarea {
        height: 100px;
        resize: none;
    }

    .container .mail-form h2 {
        font-size: 30px;
        font-weight: 600;
    }

    .container .mail-form p {
        font-size: 14px;
    }
</style>

<body>
    <?php
    include 'db_connection.php';

    $ids = $_GET['id'];

    $showquery = "select * from student where id={$ids}";

    $showdata = mysqli_query($dbcon, $showquery);

    $arrdata = mysqli_fetch_array($showdata);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">
                <h2 class="text-center">Notify <?php echo $arrdata['name']; ?> for Interview</h2>

                <!-- starting php code -->

                <!-- end of php code -->
                <form id="sample_form">
                    <div class="form-group">
                        <input class="form-control form_data" name="stu_id" id="stu_id" type="hidden" value="<?php echo $arrdata['id'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input class="form-control form_data" name="emp_id" id="emp_id" type="hidden" value="<?php echo $emp_id ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input class="form-control form_data" name="emp_name" id="emp_name" type="hidden" value="<?php echo $emp_name ?>" readonly>
                    </div>
                    <label> Message </label>
                    <div class="form-group">
                        <textarea class="form-control form_data" name="message" id="message" rows="5" placeholder="Enter Message for <?php echo $arrdata['name']; ?>" required></textarea>
                        <span id="message_error" class="text-danger"></span>

                    </div>
                    <label> Location</label>
                    <div class="form-group">
                        <textarea class="form-control form_data" name="venue" id="venue" rows="5" placeholder="Give Location" required></textarea>
                        <span id="venue_error" class="text-danger"></span>

                    </div>
                    <label> Date and Time</label>
                    <div class="form-group">
                        <input type="datetime-local" class="form-control form_data" id="date1" name="date1" min="2021-12-25T12:00:00" max="2022-12-25T12:00:00" value="2021-12-25T12:00:00" required>

                        <span id="suc" class="text-success"></span>
                    </div>
                    <div class="text-center group" id="fed">
                        <input class="form-control button btn-primary" onclick="save(); return false;" style="background-color: #ad1deb; border: #ad1deb; " type="submit" id="submit" name="submit" value="Send ">
                    </div>
                </form>
                <!-- <form id="sample_form1">
                    <div class="row">
                        <div class="col form-group">

                            <input type="text" name="name" class="form-control form_data" id="name" placeholder="Your Name " required>
                            <span id="name_error" class="text-danger"></span>
                        </div>
                        <div class="col form-group">
                            <input type="email" class="form-control form_data" name="email" id="email" placeholder="Your Email" required>
                            <span id="email_error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form_data" name="subject" id="subject" placeholder="Subject" required>
                        <span id="subject_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control form_data" name="message" id="message" rows="5" placeholder="Enter Message" required></textarea>
                        <span id="message_error" class="text-danger"></span>
                        <span id="suc" class="text-success"></span>
                    </div>
                    <br>
                    <div class="text-center group" id="fed">
                        <input class="btn btn-primary" onclick="save_feedback(); return false;" style="background-color: #ad1deb; border: #ad1deb; " type="submit" id="submit" name="submit" value="Send Feedback">

                    </div>
                  <div class="text-center"><button type="submit" onClick="refreshPage()">Send Message</button></div>-->
                </form>
                <script>
                    function save() {
                        var form_element = document.getElementsByClassName('form_data');

                        var form_data = new FormData();

                        for (var count = 0; count < form_element.length; count++) {
                            form_data.append(form_element[count].name, form_element[count].value);
                        }

                        document.getElementById('submit').disabled = true;

                        var ajax_request = new XMLHttpRequest();

                        ajax_request.open('POST', 'feed.php');

                        ajax_request.send(form_data);

                        ajax_request.onreadystatechange = function() {
                            if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                                document.getElementById('submit').disabled = false;

                                var response = JSON.parse(ajax_request.responseText);

                                if (response.success != '') {
                                    document.getElementById('sample_form').reset();

                                    document.getElementById('suc').innerHTML = response.success;

                                    setTimeout(function() {

                                        document.getElementById('suc').innerHTML = '';
                                        window.history.back();
                                    }, 5000);

                                    document.getElementById('message_error').innerHTML = '';

                                    document.getElementById('venue_error').innerHTML = '';
                                    // document.getElementById('date_error').innerHTML = '';



                                } else {
                                    document.getElementById('venue_error').innerHTML = response.venue_error;
                                    // document.getElementById('date_error').innerHTML = response.date_error;
                                    document.getElementById("message_error").innerHTML = response.message_error;
                                }
                            }
                        }
                    }

                    function save_feedback() {
                        var form_element = document.getElementsByClassName('form_data');

                        var form_data = new FormData();

                        for (var count = 0; count < form_element.length; count++) {
                            form_data.append(form_element[count].name, form_element[count].value);
                        }

                        document.getElementById('submit').disabled = true;

                        var ajax_request = new XMLHttpRequest();

                        ajax_request.open('POST', 'feed1.php');

                        ajax_request.send(form_data);

                        ajax_request.onreadystatechange = function() {
                            if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                                document.getElementById('submit').disabled = false;

                                var response = JSON.parse(ajax_request.responseText);

                                if (response.success != '') {
                                    document.getElementById('sample_form1').reset();

                                    document.getElementById('suc').innerHTML = response.success;

                                    setTimeout(function() {

                                        document.getElementById('suc').innerHTML = '';
                                        window.history.back();
                                    }, 5000);

                                    document.getElementById('name_error').innerHTML = '';

                                    document.getElementById('email_error').innerHTML = '';
                                    document.getElementById('subject_error').innerHTML = '';
                                    document.getElementById('message_error').innerHTML = '';


                                } else {
                                    document.getElementById('name_error').innerHTML = response.name_error;
                                    document.getElementById('email_error').innerHTML = response.email_error;
                                    document.getElementById('subject_error').innerHTML = response.subject_error;
                                    document.getElementById("message_error").innerHTML = response.message_error;
                                }



                            }
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</body>

</html>