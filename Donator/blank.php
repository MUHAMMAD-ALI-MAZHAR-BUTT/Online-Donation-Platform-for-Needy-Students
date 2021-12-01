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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        hr {
            display: block;
            height: 1px;
            border: 0;
            border-top: 3px solid #2c03fc;
            margin: 1em 0;
            padding: 0;
        }

        .team_member {
            background: rgba(199, 201, 209, .09);
            padding-bottom: 50px;
            overflow: hidden;
        }

        .single_team_content {
            padding: 45px;
            margin-top: 60px;
        }

        .single_team_content h1 {
            font-size: 50px;
            font-weight: 600;
            line-height: 60px;
        }

        .single_team_content p {}

        .our-team {
            margin-bottom: 30px;
            box-shadow: 0 10px 40px -10px rgba(0, 64, 128, .09);
        }

        .our-team .team_img {
            position: relative;
            overflow: hidden;
        }

        .our-team .team_img:after {
            content: "";
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.2);
            position: absolute;
            bottom: -100%;
            left: 0;
            transition: all 0.3s ease 0s;
        }

        h1:hover {
            color: rgb(4, 0, 255);
        }

        p:hover {
            color: rgb(38, 0, 255);
        }

        .our-team:hover .team_img:after {
            bottom: 0;
        }

        .our-team img {
            width: 100%;
            height: auto;
        }

        .our-team .social {
            padding: 0 0 18px 0;
            margin: 0;
            list-style: none;
            position: absolute;
            top: -100%;
            right: 10px;
            background: #ffaa17;
            border-radius: 0 0 20px 20px;
            z-index: 1;
            transition: all 0.3s ease 0s;
        }

        .our-team:hover .social {
            top: 0;
        }

        .our-team .social li a {
            display: block;
            padding: 15px;
            font-size: 15px;
            color: #232434;
        }

        .our-team:hover .social li a:hover {
            color: #fff;
        }

        .our-team .team-content {
            padding: 20px 0;
            background: #fff;
        }

        .our-team .title {
            font-size: 18px;
            font-weight: bold;
            color: #ffaa17;
            text-transform: capitalize;
            margin: 0 0 20px;
            position: relative;
        }

        .our-team .title:before {
            content: "";
            width: 25px;
            height: 1px;
            background: #ffaa17;
            position: absolute;
            bottom: -10px;
            right: 50%;
            margin-right: 9px;
            transition-duration: 0.25s;
        }

        .our-team .title:after {
            content: "";
            width: 25px;
            height: 1px;
            background: #ffaa17;
            position: absolute;
            bottom: -10px;
            left: 50%;
            margin-left: 9px;
            transition-duration: 0.25s;
        }

        .our-team:hover .title:before,
        .our-team:hover .title:after {
            width: 50px;
        }

        .our-team .post {
            display: inline-block;
            font-size: 15px;
            text-transform: capitalize;
        }

        .our-team .post:before {
            content: "";
            display: block;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #ffaa17;
            margin: 0 auto;
            position: relative;
            top: -13px;
        }

        @media only screen and (max-width: 990px) {
            .our-team {
                margin-bottom: 30px;
            }
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
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Online Donation System for Needy Students &nbsp; <a href="../LoginSystem/logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
                        <a class="active-menu" href="blank.php"><i class="fa fa-square-o fa-3x"></i>About us</a>
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

                <!-- /. ROW  -->
                <section id="team " class="team_member section-padding ">
                    <div class="container ">
                        <div class="section-title text-center ">
                            <h1><b>Meet our Founders</b></h1>
                            <p><b>Do good and good will come to you.</b></p>
                        </div>
                        <div class="row text-center ">
                            <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp " data-wow-duration="1s " data-wow-delay="0.1s " data-wow-offset="0 ">
                                <div class="our-team ">
                                    <div class="team_img ">
                                        <img src="assets/12.jpeg " alt="team-image ">
                                        <ul class="social ">
                                            <li><a href="# "><i class="fa fa-facebook "></i></a></li>
                                            <li><a href="https://twitter.com/?lang=en "><i class="fa fa-twitter "></i></a></li>
                                            <li><a href="www.linkedin.com/in/muhammad-ali-mazhar-butt-04a33a142 "><i class="fa fa-linkedin "></i></a></li>
                                            <li><a href="https://www.instagram.com/ "><i class="fa fa-instagram "></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="team-content ">
                                        <h3 class="title "><b>M.A.M.B</b></h3>
                                        <span class="post "><b>Founder</b></span>
                                    </div>
                                </div>
                            </div>
                            <!--- END COL -->
                            <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp " data-wow-duration="1s " data-wow-delay="0.2s " data-wow-offset="0 ">
                                <div class="our-team ">
                                    <div class="team_img ">
                                        <img src="assets/abd.jpg " alt="team-image ">
                                        <ul class="social ">
                                            <li><a href="https://www.facebook.com/login/ "><i class="fa fa-facebook "></i></a></li>
                                            <li><a href="https://twitter.com/?lang=en "><i class="fa fa-twitter "></i></a></li>
                                            <li><a href="www.linkedin.com/in/muhammad-ali-mazhar-butt-04a33a142 "><i class="fa fa-linkedin "></i></a></li>
                                            <li><a href="https://www.instagram.com/ "><i class="fa fa-instagram "></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="team-content ">
                                        <h3 class="title "><b>Abdullah Rasheed</b></h3>
                                        <span class="post "><b>CEO</b></span>
                                    </div>
                                </div>
                            </div>
                            <!--- END COL -->
                            <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp " data-wow-duration="1s " data-wow-delay="0.3s " data-wow-offset="0 ">
                                <div class="our-team ">
                                    <div class="team_img ">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png " alt="team-image ">
                                        <ul class="social ">
                                            <li><a href="https://www.facebook.com/login/ "><i class="fa fa-facebook "></i></a></li>
                                            <li><a href="https://twitter.com/?lang=en "><i class="fa fa-twitter "></i></a></li>
                                            <li><a href="www.linkedin.com/in/muhammad-ali-mazhar-butt-04a33a142 "><i class="fa fa-linkedin "></i></a></li>
                                            <li><a href="https://www.instagram.com/ "><i class="fa fa-instagram "></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="team-content ">
                                        <h3 class="title "><b>Abdulrahman</b></h3>
                                        <span class="post "><b>Developer</b></span>
                                    </div>
                                </div>
                            </div>
                            <!--- END COL -->



                        </div>
                        <!--- END ROW -->
                    </div>
                    <!--- END CONTAINER -->
                </section>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js "></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js "></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js "></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js "></script>


</body>

</html>