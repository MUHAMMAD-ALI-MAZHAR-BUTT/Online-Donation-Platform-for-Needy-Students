<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reply </title>

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

    $showquery = "select * from feedback where feedback_id={$ids}";

    $showdata = mysqli_query($con, $showquery);

    $arrdata = mysqli_fetch_array($showdata);

    $recipient = "";
    //if user click the send button
    if (isset($_POST['send'])) {
        $ids = $_GET['id'];
        //access user entered data
        $recipient = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $sender = "From: abdullahrasheed937@gmail.com";

        if (empty($recipient) || empty($subject) || empty($message)) {
    ?>
            <!-- display an alert message if one of them field is empty -->
            <div class="alert alert-danger text-center">
                <?php echo "All inputs are required!" ?>
            </div>
    <?php
        } else {
            // PHP function to send mail
            if (mail($recipient, $subject, $message, $sender)) {
                $showquery = "UPDATE feedback SET status='true' ,reply='$message' where feedback_id=$ids";

                $showdata = mysqli_query($con, $showquery);
                echo "<script>alert('Feedback Reply Sent Successfully to $recipient')</script>";
                echo "<script>window.open('feedbacks.php','_self')</script>";
            } else {
                echo "<script>alert('An error occured while sending message')</script>";
                echo "<script>window.open('feedbacks.php','_self')</script>";
            }
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">
                <h2 class="text-center">Reply Feedback</h2>

                <!-- starting php code -->

                <!-- end of php code -->
                <form action="" method="POST">
                    <div class="form-group">
                        <input class="form-control" name="email" type="email" value="<?php echo $arrdata['email']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="subject" type="text" value="<?php echo $arrdata['subject']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="5" class="form-control textarea" name="message" placeholder="Reply.."></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control button btn-primary" style="background-color: #ad1deb; border:#ad1deb" type="submit" name="send" value="Send Reply" placeholder="Subject">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>