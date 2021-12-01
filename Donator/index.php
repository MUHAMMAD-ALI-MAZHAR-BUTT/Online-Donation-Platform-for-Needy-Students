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
font-size: 16px;">Online Donation System for Needy Students &nbsp; <a href="./LoginSystem/logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>


                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
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
                        <a href="feedback.php"><i class="fa fa-desktop fa-3x"></i> Feedback</a>
                    </li>
                    <li>
                        <a href="blank.php"><i class="fa fa-square-o fa-3x"></i>About us</a>
                    </li>
                </ul>

            </div>

        </nav>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="background-image: url(2.jpg);">
            <div id="page-inner" style="background-image: url(2.jpg);">

                <!--Slider -->
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="assets/1.png" alt="Donation System">
                            <div class="carousel-caption">
                                <h3>Donation System</h3>
                                <p>We are thankful to you for your interest in our Platform</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/7.jpg" alt="Donation Platform">
                        </div>
                        <div class="item">
                            <img src="assets/3.jpg" alt="Donation System">
                            <div class="carousel-caption">
                                <h3>Donate Money for Needy Students</h3>
                                <p>Education is the power</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/4.jpg" alt="Donation System">
                            <div class="carousel-caption">
                                <h3>Donation Platform</h3>
                                <p>Donate Money!</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/5.png" alt="Donation Platform">
                            <div class="carousel-caption">
                                <h3>Donate Money</h3>
                                <p>Thank you for you interest</p>
                            </div>
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <!--Slider end-->



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