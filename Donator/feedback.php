<?php
session_start();
if (!$_SESSION['username']) {

    $actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    echo "<script>window.open('./LoginSystem/index.php?continue=$actual_link','_self')</script>";
}
?>
<?php
include("config.php");
extract($_SESSION);
$stmt_edit = $DB_con->prepare('SELECT * FROM donators WHERE username =:username');
$stmt_edit->execute(array(':username' => $username));
$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
extract($edit_row);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donator Dashboard</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        h4 {
            color: blue;
        }

        h4:hover {
            color: rgb(255, 0, 0);
        }

        h2 {
            text-align: center;
            font-size: 50px;
        }

        label:hover {
            color: rgb(43, 255, 0);
            font-size: 20px;
            ;
        }

        label {
            font-size: 18px;
            color: rgb(0, 60, 255);
        }

        h4 {
            text-align: center;
            font-size: 50px;
        }

        .button3 {
            background-color: #ff1302;
            font-size: 20px;
            color: rgb(209, 255, 5);
        }

        /* Red */
    </style>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Donator</a>
            </div>
            <div style="color: rgb(238, 255, 0);
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><b>Online Donation System for Needy Students

                    <b />&nbsp; <a href="./LoginSystem/logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>


                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Donate<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <!--
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                        -->
                            <li>
                                <a href="#">Categories<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="feecreditcard/index.php">Fee</a>
                                    </li>
                                    <li>
                                        <a href="healthcreditcard/index.php">Health</a>
                                    </li>
                                    <li>
                                        <a href="expensescreditcard/index.php">Study Expenses</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Donation History<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <!--
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                        -->
                            <li>
                                <a href="#">Categories<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="fee.php">Fee</a>
                                    </li>
                                    <li>
                                        <a href="health.php">Health</a>
                                    </li>
                                    <li>
                                        <a href="expenses.php">Study Expenses</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="AccountSetting.php"><i class="fa fa-edit fa-3x"></i>Account Setting</a>
                    </li>

                    <li>
                        <a href="blank.php"><i class="fa fa-square-o fa-3x"></i>About us</a>
                    </li>
                    <li>
                        <a href="feedback.php" class="active-menu"><i class="fa fa-desktop fa-3x"></i> Feedback</a>
                    </li>
                </ul>

            </div>

        </nav>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="background-image: url(1.jpg);">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Feedback</h2>
                        <h4>Your Feedback is really important for us. </h4>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <br><br><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-info btn-lg " data-toggle="modal" data-target="#myModal">Click here for Feedback</button>


                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content ">
                            <div class="modal-header ">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Feedback</h4>
                            </div>
                            <div class="modal-body">

                                <form action="pro.php" method="POST">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="a" value="<?php echo $username; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="b" aria-describedby="emailHelp" value="<?php echo $email; ?>" readonly>
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>

                                    <div class="form-group">
                                        <label>Enter Subject : </label>
                                        <input type="text" class="form-control" name="c" required placeholder="Enter Subject">
                                    </div>
                                    <div class="form-group">
                                        <label>Enter your Feedback : </label>
                                        <textarea type="text" class="form-control" name="d" rows="5" required placeholder="Enter Message"></textarea>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-primary">Send Feedback</button>
                                </form>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default button3" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>



            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>

</html>