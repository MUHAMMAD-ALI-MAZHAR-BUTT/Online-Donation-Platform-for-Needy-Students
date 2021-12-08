<?php
include('session.php');

?>

<?php
include("config.php");
include("functions.php");
include('db_connection.php');
extract($_SESSION);
$stmt_edit = $DB_con->prepare('SELECT * FROM student WHERE email =:email');
$stmt_edit->execute(array(':email' => $email));
$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
extract($edit_row);

?>

<?php
// include("config.php");
// $stmt_edit = $DB_con->prepare("select sum(order_total) as total from orderdetails where user_id=:user_id and order_status='Ordered'");
// $stmt_edit->execute(array(':user_id' => $user_id));
// $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
// extract($edit_row);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Donation Platform | Student Dashboard</title>
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />


    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/datatables.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#ex').dataTable();
        });
    </script>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 74%);">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Online Donation Platform | Student Dashboard</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 74%);">
                <ul class="nav navbar-nav side-nav" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 74%);">
                    <li><a href="index.php"> &nbsp; <span class='glyphicon glyphicon-home'></span> Home</a></li>
                    <li><a data-toggle="modal" data-target="#app"> &nbsp; <span class='glyphicon glyphicon-list-alt'></span> Apply Now for <?php $date = date('F,Y');
                                                                                                                                            echo $date ?></a></li>
                    <li><a data-toggle="modal" data-target="#set"> &nbsp; <span class='glyphicon glyphicon-envelope'></span> Send Queries</a></li>
                    <li class="active"><a href="responses.php"> &nbsp; <span class='fa fa-file'></span> Query Responses</a></li>
                    <li><a href="notifications.php?id=1"> &nbsp; <span class='fa fa-bell'></span> Notifications</a></li>
                    <li><a href="formsfilled.php"> &nbsp; <span class='glyphicon glyphicon-list-alt'></span> My Forms filled history</a></li>
                    <li><a href="paymenthistory.php"> &nbsp; <span class='fa fa-money'></span> Payment received history</a></li>
                    <li><a data-toggle="modal" data-target="#setAccount"> &nbsp; <span class='fa fa-gear'></span> Account Settings</a></li>
                    <li><a href="logout.php?id=<?php echo $id; ?>"> &nbsp; <span class='glyphicon glyphicon-off'></span> Logout</a></li>


                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell warning"></i>
                            <span class="badge badge-warning navbar-badge"></span><b>Notifications</b>

                            <?php

                            $query = "SELECT * from `stu_notification` where `status` = 'unread' and stu_id='$id' order by `dt` DESC ";
                            if (count(fetchAll($query)) > 0) {
                            ?>
                                <span class="badge badge-warning" style="background-color:#eea236"><?php echo count(fetchAll($query)); ?></span>
                            <?php
                            }
                            ?>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <?php

                            $query = "SELECT * from `stu_notification`  order by `dt` DESC ";
                            if (count(fetchAll($query)) > 0) {
                                $count = 0;
                                foreach (fetchAll($query) as $i) {
                                    if ($count == 7)
                                        break;
                            ?>
                                    <a style="
                         <?php
                                    if ($i['status'] == 'unread') {
                                        echo "font-weight:bold;";
                                    }
                            ?>
                         " class="dropdown-item" href="#" onclick=my();>
                                        <small style="color:indigo"><i><?php echo date('F j, Y, g:i a', strtotime($i['dt'])) ?></i></small><br />
                                        <?php
                                        if ($i['type'] == 's') {
                                            echo "<p style='color:#ad1deb;'>Your application status has been set, Check it</p> ";
                                        }
                                        if ($i['type'] == 'i') {
                                            echo "<p style='color:#ad1deb;'>You have received your interview details</p> ";
                                        }
                                        if ($i['type'] == 'a') {
                                            echo "<p style='color:#ad1deb;'>You have received your full grant amount</p> <hr>";
                                        }
                                        ?>
                                    </a>
                                    <div class="dropdown-divider"></div>
                            <?php
                                    $count = $count + 1;
                                }
                            } else {
                                echo "Notification is empty";
                            }
                            ?>
                            <script>
                                function my() {
                                    location.href = "notifications.php?id=1";
                                }
                            </script>
                        </div>
                    </li>

                    <li class="dropdown messages-dropdown">
                        <a href="#"><i class="fa fa-calendar"></i> <?php
                                                                    $Today = date('y:m:d');
                                                                    $new = date('l, F d, Y', strtotime($Today));
                                                                    echo $new; ?></a>

                    </li>
                    <!-- <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class='glyphicon glyphicon-shopping-cart'></span> Total Price Ordered: &#8360; <?php echo $total; ?> </b></a>

                    </li> -->


                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $name; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a data-toggle="modal" data-target="#setAccount"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- #page wrapper -->
        <div id="page-wrapper">

            <div class="alert alert-success">

                <center>
                    <h3><strong>Query Section</strong> </h3>
                </center>

            </div>

            <br />

            <div class="table-responsive">
                <?php
                $connect = mysqli_connect("localhost", "root", "", "base");
                $query = "SELECT * FROM feedback where email='$email'";
                $result = mysqli_query($connect, $query);
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <table class="display table table-bordered" id="ex" cellspacing="0" width="100%">

                        <thead>
                            <tr>
                                <th>Feedback ID</th>

                                <th>Subject</th>
                                <th>Message</th>
                                <th>Query Date/Time</th>
                                <th>Response</th>




                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("config.php");
                            $stmt = $DB_con->prepare("SELECT * FROM feedback where email='$email' ");
                            $stmt->execute();


                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);

                                $date1 = date('F j, Y, g:i a', strtotime($row['dt']));
                            ?>
                                <tr>
                                    <td><?php echo $row['feedback_id']; ?></td>


                                    <td><?php echo $row['subject']; ?></td>
                                    <td><?php echo $row['message']; ?></td>
                                    <td><?php echo $date1 ?></td>
                                    <td>
                                        <?php
                                        if ($row['status'] == 'false') {
                                        ?>
                                            <p class="text-danger">No response Yet</p>
                                        <?php
                                        } else {
                                        ?>
                                            <?php echo $row['reply']; ?>
                                        <?php
                                        }

                                        ?>

                                    </td>



                                </tr>

                            <?php
                            }
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                            echo "<br />";
                            echo '
	</div>';

                            echo "</div>";
                        } else {
                            ?>


                            <div class="col-xs-12">
                                <div class="alert alert-warning">
                                    <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Query Found so far...
                                </div>
                            </div>
                        <?php
                        }

                        ?>

            </div>
        </div>




        <div class="alert alert-default" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 74%);">
            <p style="color:white;text-align:center;">
                No Copyright. 2020-2021 Online Donation Platform. No rights reserved.

            </p>

        </div>

    </div>

    <!-- /#wrapper -->
    <?php
    include('form.php');
    ?>

    <!-- Mediul Modal -->
    <div class="modal fade" id="setAccount" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
        <div class="modal-dialog modal-sm">
            <div style="color:white;background-color:#ad1deb" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 style="color:white" class="modal-title" id="myModalLabel">Account Settings</h2>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="post" action="settings.php">
                        <fieldset>
                            <p>Name:</p>
                            <div class="form-group">

                                <input class="form-control" placeholder="Name" name="name" type="text" value="<?php echo $name; ?>" readonly>


                            </div>
                            <p>Email:</p>
                            <div class="form-group">

                                <input class="form-control" placeholder="Lastname" name="email" type="email" value="<?php echo $email; ?>" required>


                            </div>

                            <p>Phone:</p>
                            <div class="form-group">

                                <input class="form-control" placeholder="Address" name="phone" type="phone" value="0<?php echo $phone; ?>" required>


                            </div>

                            <p>Password:</p>
                            <div class="form-group">

                                <input class="form-control" placeholder="Password" name="password" id="pass" type="password" value="<?php echo $password; ?>" required>
                            </div>
                            <input type="checkbox" onclick="myFunction()">Show Password
                            <script>
                                function myFunction() {
                                    var x = document.getElementById("pass");
                                    if (x.type === "password") {
                                        x.type = "text";
                                    } else {
                                        x.type = "password";
                                    }
                                }
                            </script>
                            <p>Confirm Password:</p>
                            <div class="form-group">

                                <input class="form-control" placeholder="Password" name="cpassword" id="passs" type="password" value="<?php echo $password; ?>">
                            </div>
                            <input type="checkbox" onclick="myFunc()">Show Password
                            <script>
                                function myFunc() {
                                    var x = document.getElementById("passs");
                                    if (x.type === "password") {
                                        x.type = "text";
                                    } else {
                                        x.type = "password";
                                    }
                                }
                            </script>
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
    <div class="modal fade" id="set" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
        <div class="modal-dialog modal-md">
            <div style="color:white;background-color:#ad1deb" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 style="color:white" class="modal-title" id="myModalLabel">Send your Query</h2>
                </div>
                <div class="modal-body">
                    <form id="sample_form">
                        <fieldset>
                            <p>Name:</p>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control form_data" id="name" value="<?php echo $name; ?>" readonly>

                            </div>
                            <p>Email:</p>
                            <div class="form-group">

                                <input type="email" class="form-control form_data" name="email" id="email" value="<?php echo $email; ?>" readonly>



                            </div>

                            <p>Subject:</p>
                            <div class="form-group">

                                <input type="text" class="form-control form_data" name="subject" id="subject" placeholder="Subject" required>
                                <span id="subject_error" style="color:#EED202"></span>

                            </div>

                            <p>Message:</p>
                            <div class="form-group">

                                <textarea class="form-control form_data" name="message" id="message" rows="5" placeholder="Enter Message" required></textarea>
                                <span id="message_error" style="color:#EED202"></span>
                                <span id="suc" style="color:#00ff00"></span>
                            </div>
                            <div class="form-group">

                                <input class="form-control hide" name="id" type="text" value="<?php echo $id; ?>" required>
                            </div>
                        </fieldset>


                </div>
                <div class="modal-footer">

                    <input class="btn btn-block btn-success btn-md" onclick="save_feedback(); return false;" type="submit" id="submit" name="submit" value="Send Feedback">

                    <button type="button" class="btn btn-block btn-danger btn-md" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function save_feedback() {
            var form_element = document.getElementsByClassName('form_data');

            var form_data = new FormData();

            for (var count = 0; count < form_element.length; count++) {
                form_data.append(form_element[count].name, form_element[count].value);
            }

            document.getElementById('submit').disabled = true;

            var ajax_request = new XMLHttpRequest();

            ajax_request.open('POST', 'settings.php');

            ajax_request.send(form_data);

            ajax_request.onreadystatechange = function() {
                if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                    document.getElementById('submit').disabled = false;

                    var response = JSON.parse(ajax_request.responseText);

                    if (response.success != '') {


                        alert(response.success);
                        location.reload();


                    } else {

                        document.getElementById('subject_error').innerHTML = response.subject_error;
                        document.getElementById("message_error").innerHTML = response.message_error;
                    }



                }
            }
        }
    </script>

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

</body>

</html>