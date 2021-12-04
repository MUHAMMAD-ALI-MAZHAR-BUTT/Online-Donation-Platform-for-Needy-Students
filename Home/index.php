<?php
include('db_connection.php');

$result = $con->query("SELECT img_path from gallery_img");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!--Jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Online Donation Platform for students</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="n.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .Login {
            font-size: 540px;
            border-radius: 18px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .aa:hover {
            font-size: 20px;
            color: white;
        }

        .glow {
            font-size: 45px;
            color: rgb(0, 0, 0);
            text-align: center;
            animation: glow 1s ease-in-out infinite alternate;
        }

        @-webkit-keyframes glow {
            from {
                text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #8e0d9c, 0 0 40px #8e0d9c, 0 0 50px #8e0d9c, 0 0 60px #8e0d9c, 0 0 70px #8e0d9c;
            }

            to {
                text-shadow: 0 0 20px #fff, 0 0 30px #d4cad8, 0 0 40px #d4cad8, 0 0 50px #d4cad8, 0 0 60px #d4cad8, 0 0 70px #d4cad8, 0 0 80px #d4cad8;
            }
        }
    </style>

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">OnlineDonationPlatform@gmail.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+92 03035024309</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="https://www.youtube.com/channel/UCnJKm4bLYdgjt1QMTGItpSA" class="Youtube" target="_blank"><i class="bi bi-youtube"></i></a>
                <a href="#" class="whatsapp"><i class="bi bi-whatsapp" target="_blank"></i></a>
                <a href="https://twitter.com/?lang=en" class="twitter" target="_blank"><i class="bi bi-twitter"></i></a>
                <a href="https://www.facebook.com/" class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram" target="_blank"></i></a>
                <a href="www.linkedin.com/in/muhammad-ali-mazhar-butt-04a33a142" class="linkedin" target="_blank"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo"><img src="assets/img/logo.jpg" alt=""></a>
            <h1 class="logo" id="log"><a href="index.php"><span>SOP</span></a></h1>



            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About Us</a></li>

                    <li><a class="nav-link scrollto" href="#eligible">Eligibility criteria</a></li>
                    <li><a class="nav-link scrollto" href="#news">Latest News</a></li>
                    <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="#faq">F.A.Q</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact us</a></li>
                    <li class="dropdown"><a href="#"><span>Login/Register</span> <i class="bi bi-chevron-down"></i></a>

                        <ul>
                            <li><a href="../Admin/dist/adminn.php">As Admin</a></li>
                            <li><a href="../Employee/login/index1.php">As Employee</a></li>
                            <li><a href="../Donator/index.php">As Donor</a></li>
                            <li><a href="../Student/index.php">As Student</a></li>
                        </ul>

                    </li>




                    <!-- <li><a href="Login_page\aa.php" class="aa"class="btn btn-primary btn-lg active" role="button" target="_blank" aria-pressed="true">Login</a></li>-->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Welcome to <span>Student Opportunity Platform </span></h1>
            <h2>We are an idea, a hope for helping and securing the future of needy students</h2>
            <div class="d-flex">
                <a href="../Student/index.php" class="btn-get-started scrollto">Get Started</a>

            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Featured Services Section ======= -->


        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About</h2>
                    <h3>Find Out More <span>About Us</span></h3>
                    <p>Meet our team.</p>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <h3>Hardworking and enthusiastic</h3>
                        <p class="fst-italic">
                            Our team may deliver best performance under any circumstance.<br>
                        </p>
                        <ul>
                            <li>
                                <i class="bx bx-store-alt"></i>
                                <div>
                                    <h5>In House.</h5>
                                    <p>Our team may show signs of unity by working in their own houses
                            </li>
                            <li>
                                <i class="bx bx-images"></i>
                                <div>
                                    <h5>Co-operative</h5>
                                    <p>Co-operation can prove very helpful for big projects!</p>
                                </div>
                            </li>
                        </ul>
                        <p>
                            If still in doubt, you may book a visit to our company. You may also send an email to sop@org.com for further queries<br>

                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->


        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <?php
                            include 'db_connection.php';
                            $sql = "SELECT count(*) as tot from payment_history where date_comp is not NULL";
                            $query = mysqli_query($con, $sql);
                            $values = mysqli_fetch_assoc($query);
                            $num_rows = $values['tot'];
                            echo '<span data-purecounter-start="0" data-purecounter-end="' . $num_rows . '" data-purecounter-duration="10" class="purecounter"></span>';
                            ?><p>Total students helped</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="bi bi-cash-stack"></i>
                            <?php
                            include 'db_connection.php';
                            $sql = "select * from balance where id=1";
                            $query = mysqli_query($con, $sql);
                            $values = mysqli_fetch_assoc($query);
                            $num_rows = $values['total_in_fee'] + $values['total_in_health'] + $values['total_in_expense'];
                            echo '<span data-purecounter-start="0" data-purecounter-end="' . $num_rows . '" data-purecounter-duration="10" class="purecounter"></span>';
                            ?>

                            <p>Total funds collected in Rupees</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <?php
                            include 'db_connection.php';
                            $sql = "select count(*) as tot from student";
                            $query = mysqli_query($con, $sql);
                            $values = mysqli_fetch_assoc($query);
                            $num_rows = $values['tot'];
                            echo '<span data-purecounter-start="0" data-purecounter-end="' . $num_rows . '" data-purecounter-duration="10" class="purecounter"></span>';
                            ?> <p>Total students registered</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-person-check-fill"></i>
                            <?php
                            include 'db_connection.php';
                            $sql = "select count(*) as tot from donators";
                            $query = mysqli_query($con, $sql);
                            $values = mysqli_fetch_assoc($query);
                            $num_rows = $values['tot'];
                            echo '<span data-purecounter-start="0" data-purecounter-end="' . $num_rows . '" data-purecounter-duration="10" class="purecounter"></span>';
                            ?> <p>Total donors registered</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->



        <!-- ======= Services Section ======= -->

        <!--Eligible-->
        <section id="eligible" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Eligibility Criteria</h2>
                    <br><br>
                    <h3>There are some specific <span>Eligibility Requirements</span> for Students. Candidates that fall
                        under
                        the requirements
                        given below shall be <span>Entertained</span>.</h3>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4><a href="#">Resident</a></h4>
                            <p>Should be resident of Pakistan.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="">Income</a></h4>
                            <p>Monthly income should be less than 50,000</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4><a href="">Score</a></h4>
                            <p>Student's recent academic score should be good e.g 3+ cgpa for university.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4><a href="">Easypaisa</a></h4>
                            <p>Student should have an easypaisa account as money receiving medium
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--Latest new Section -->
        <section id="news" class="news">
            <div class="container" data-aos="fade-up">


                <div class="section-title">
                    <h6>Latest News</h6>
                    <br><br>
                    <h1 class="glow">Check out latest updates on <span>Donation</span></h1>

                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4 col-md-4  " data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box" style="height: 300px;">
                            <!-- <div class="icon"><i class="bx bx-tachometer"></i></div> -->
                            <?php
                            include 'db_connection.php';
                            $cat = "Education";
                            // $selectquery = "select * from latest_news where category=$cat";
                            $selectquery = "select * from latest_news where category='Education/Fee'";
                            $query = mysqli_query($con, $selectquery);

                            $nums = mysqli_num_rows($query);

                            while ($res = mysqli_fetch_array($query)) {
                                $date1 = date('F j, Y, g:i a', strtotime($res['date']));
                            ?>

                                <h4 class="card-title"><span style="  color: #ad1deb;">Updated on </span><?php echo $date1 ?></h4></i>
                                <br>
                                <h4 class="card-title"><?php echo $res['category']; ?></h4>
                                <br><br>
                                <marquee width="100%" direction="left" height="100px">
                                    <?php echo $res['message']; ?>
                                </marquee>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4  " data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box" style="height: 300px;">
                            <!-- <div class="icon"><i class="bx bx-tachometer"></i></div> -->
                            <?php
                            include 'db_connection.php';
                            $cat = "Education";
                            // $selectquery = "select * from latest_news where category=$cat";
                            $selectquery = "select * from latest_news where category='Health'";
                            $query = mysqli_query($con, $selectquery);

                            $nums = mysqli_num_rows($query);

                            while ($res = mysqli_fetch_array($query)) {
                                $date1 = date('F j, Y, g:i a', strtotime($res['date']));
                            ?>

                                <h4 class="card-title"><span style="  color: #ad1deb;">Updated on </span><?php echo $date1 ?></h4></i>
                                <br>
                                <h4 class="card-title"><?php echo $res['category']; ?></h4>
                                <br><br>
                                <marquee width="100%" direction="left" height="100px">
                                    <?php echo $res['message']; ?>
                                </marquee>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4  " data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box" style="height: 300px;">
                            <!-- <div class="icon"><i class="bx bx-tachometer"></i></div> -->
                            <?php
                            include 'db_connection.php';
                            $cat = "Education";
                            // $selectquery = "select * from latest_news where category=$cat";
                            $selectquery = "select * from latest_news where category='Other Expenses'";
                            $query = mysqli_query($con, $selectquery);

                            $nums = mysqli_num_rows($query);

                            while ($res = mysqli_fetch_array($query)) {
                                $date1 = date('F j, Y, g:i a', strtotime($res['date']));
                            ?>

                                <h4 class="card-title"><span style="  color: #ad1deb;">Updated on </span><?php echo $date1 ?></h4></i>
                                <br>
                                <h4 class="card-title"><?php echo $res['category']; ?></h4>
                                <br><br>
                                <marquee width="100%" direction="left" height="100px">
                                    <?php echo $res['message']; ?>
                                </marquee>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>


            </div>
        </section><!-- End Services Section -->

        <section id="gallery">
            <?php
            //index.php
            $connect = mysqli_connect("localhost", "root", "", "base");
            function make_query($connect)
            {
                $query = "SELECT * FROM gallery_img";
                $result = mysqli_query($connect, $query);
                return $result;
            }

            function make_slide_indicators($connect)
            {
                $output = '';
                $count = 0;
                $result = make_query($connect);
                while (mysqli_fetch_array($result)) {
                    if ($count == 0) {
                        $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="' . $count . '" class="active"></li>
   ';
                    } else {
                        $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="' . $count . '"></li>
   ';
                    }
                    $count = $count + 1;
                }
                return $output;
            }

            function make_slides($connect)
            {
                $output = '';
                $count = 0;
                $result = make_query($connect);
                while ($row = mysqli_fetch_array($result)) {
                    if ($count == 0) {
                        $output .= '<div class="carousel-item active">';
                    } else {
                        $output .= '<div class="carousel-item">';
                    }
                    $output .= '
   <img src="' . $row["img_path"] . '" width="100%" height="600px" />

  </div>
  ';
                    $count = $count + 1;
                }
                return $output;
            }

            ?>
            <div class="row justify-content-center mt-2">
                <div class="col-lg-10">

                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <?php echo make_slide_indicators($connect); ?>

                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <?php echo make_slides($connect); ?>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#dynamic_slide_show" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#dynamic_slide_show" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                </div>
            </div>

        </section><!-- End Services Section -->
        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Team</h2>
                    <h3>Our Hardworking <span>Team</span></h3>
                    <p>Meet our hardworking and enthusiastic team
                    </p>
                </div>

                <div class="row">
                    <?php
                    include 'db_connection.php';
                    $selectquery = "select * from emp where emp_leftdate IS NULL";

                    $query = mysqli_query($con, $selectquery);

                    $nums = mysqli_num_rows($query);


                    while ($res = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                            <div class="member">
                                <div class="member-img">
                                    <img src="assets/img/blank.png" class="img-fluid" alt="">
                                    <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4><?php echo $res['emp_name'] ?></h4>
                                    <span>Employee</span>
                                </div>
                            </div>
                        </div>


                    <?php
                    }
                    ?>


                </div>

            </div>
        </section><!-- End Team Section -->


        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>F.A.Q</h2>
                    <h3>Frequently Asked <span>Questions</span></h3>
                    <p>Here are some quick answers to some Frequently asked Questions</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <ul class="faq-list">

                            <li>
                                <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Can a donor donate to more than
                                    one category(health,education,
                                    other expenses)? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                                </div>
                                <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                                    <p>
                                        Yes, donors may donate to any number of available categories.
                                    </p>
                                </div>

                            </li>

                            <li>
                                <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Will the student be notified as
                                    who gave the donation amount, even if they were more than 1? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                                </div>
                                <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                                    <p>
                                        No, our system provides complete discreteness in this regard. The students won't know the donor's
                                        details.
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">What is the minimum amount that
                                    can be donated? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                                    <p>
                                        The donations start from RS 500. There is no upper limit to the amount that has to be donated.
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">As a student, Can i submit
                                    applications for multiple categories at one time?<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                                </div>
                                <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                                    <p>
                                        Unfortunately,no. You will only be able to aplly to one category at any given time.
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">What are the minimum
                                    qualifications to be eligible
                                    for this grant? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                                </div>
                                <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                                    <p>
                                        To be eligible for the study grant, you must have cgpa more than 3(in case you are in
                                        University).Further details
                                        can be found on the Eligibility Criteria Page <a class="nav-link scrollto" href="#eligible" style="color: #8e0d9c;">Click
                                            Here</a>
                                    </p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <h3><span>Contact Us</span></h3>
                    <p>Feel free to contact us</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>Pakistan, Lahore G.T Road University Of Engineering and Technology, CS Department</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>OnlineDonationPlatform@gmail.com</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>+92 03035024309</p>
                        </div>
                    </div>

                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-6 ">

                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=384&amp;hl=en&amp;q=UET,LAHORE&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fnfgo.com/">FNF</a></div>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    width: 100%;
                                    height: 384px;
                                }

                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    width: 100%;
                                    height: 384px;
                                }

                                .gmap_iframe {
                                    height: 384px !important;
                                }
                            </style>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!--role="form" class="php-email-form"-->
                        <h3><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Feedback Form</b></h3>
                        <br>

                        <form id="sample_form">
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
                            <!--    <div class="text-center"><button type="submit" onClick="refreshPage()">Send Message</button></div>-->
                        </form>
                        <script>
                            function save_feedback() {
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
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Pakistan<span>.</span></h3>
                        <p>
                            G. T. Road <br>
                            Staff Houses Engineering University Lahore<br>
                            Lahore, Punjab 39161<br>

                            <strong>Phone:</strong> +92 03035024309<br>
                            <strong>Email:</strong> OnlineDonationPlatform@gmail<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>

                            <li><i class="bx bx-chevron-right"></i> <a href="#news">Latest News</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#gallery">Gallery</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Grant for Student's fees</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Grant for Student's expenses</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Grant for Student's health finances(if any)</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Do follow us on these accounts to stay up to date</p>
                        <div class="social-links mt-3">
                            <a href="https://twitter.com/?lang=en" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="https://www.facebook.com/" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="https://www.facebook.com/" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="https://www.facebook.com/" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="www.linkedin.com/in/muhammad-ali-mazhar-butt-04a33a142" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Online Donation Platform</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>