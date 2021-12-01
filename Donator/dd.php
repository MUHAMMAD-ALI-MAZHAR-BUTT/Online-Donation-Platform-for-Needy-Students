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
        label {
            font-size: 20px;
            color: blue;
        }

        h4:hover {
            color: rgb(255, 4, 4);
        }

        h2:hover {
            color: rgb(50, 4, 255);
        }

        a:hover {
            color: rgb(33, 255, 4);
        }

        h2 {
            text-align: center;
            font-size: 50px;
            color: #fc0303;
        }
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
            <div style="color: yellow;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">
                <?php echo $_SESSION['username']; ?>&nbsp;Donation System for Needy Students &nbsp;
                <a href="./LoginSystem/logout.php" class="btn btn-danger square-btn-adjust">Logout</a>
            </div>
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
                        <a class="active-menu" href="AccountSetting.php"><i class="fa fa-edit fa-3x"></i>Account Setting</a>
                    </li>

                    <li>
                        <a href="blank.php"><i class="fa fa-square-o fa-3x"></i>About us</a>
                    </li>
                    <li>
                        <a href="feedback.php"><i class="fa fa-desktop fa-3x"></i> Feedback</a>
                    </li>
                </ul>

            </div>

        </nav>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="background-image: url(2.jpg);">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align: center;"><strong>Account Setting</strong></h2>
                        <h4 style="text-align: center;color:blue;">Hello
                            <?php echo $_SESSION['username']; ?>
                            <strong> Welcome to Donator's Dashboard </strong></h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <h2><strong>Your Account Information has been successfully Updated</strong></h2>
                <br><br><br><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="AccountSetting.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="text-align: center;" ;>Click Here to change Account Setting</a>
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