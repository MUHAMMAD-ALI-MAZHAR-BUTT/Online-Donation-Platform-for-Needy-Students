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
    <title>Donator</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->

    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="index.php"><?php echo $_SESSION['username']; ?></a>
            </div>
            <div style="color: yellow;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <b>Donation Platform for Needy Students &nbsp;&nbsp;&nbsp;&nbsp;</b> <?php echo date('Y-m-d'); ?>

                </b>&nbsp; <a href="./LoginSystem/logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
                        <a href="#" class="active"><i class="fa fa-sitemap fa-3x"></i>Donation History<span class="fa arrow"></span></a>
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
                                <a href="#" class="active-menu">Categories<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="fee.php">Fee</a>
                                    </li>
                                    <li>
                                        <a href="health.php">Health</a>
                                    </li>
                                    <li>
                                        <a href="expenses.php " class=" active-menu">Study Expenses</a>
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
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <style>
                            h2 {
                                text-align: "center";
                            }
                        </style>
                        <h2><b> &nbsp; &nbsp; &nbsp; &nbsp; Donation History of Expense Category</b></h2>


                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <marquee width="100%" direction="right" height="17px" onmousedown="this.stop();" class="bb" onmouseup="this.start();">
                                    <strong style="font-weight: bold;color:blue">
                                        &#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;
                                        &#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;
                                        This is the history of your donation for Expense category.
                                        &#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;
                                        &#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;
                                    </strong>
                                </marquee>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Holder Name</th>
                                                <th>Card No</th>
                                                <th>Cvc</th>
                                                <th>Amount</th>
                                                <th>Date/Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $db = "base";
                                            // Create connection
                                            $conn = new mysqli($servername, $username, $password, $db);
                                            // Check connection
                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }
                                            $d = $_SESSION['username'];
                                            $sql = "SELECT * FROM donation_record inner join donators on donation_record.donator_id=donators.id where donators.id='$id' and category='expense'";
                                            $result = $conn->query($sql);
                                            //mdo


                                            //kmdjmewo

                                            if ($result->num_rows > 0) {

                                                while ($row = $result->fetch_assoc()) {
                                                    $date = date('F j, Y, g:i a', strtotime($row['datetime']));
                                            ?>
                                                    <tr class="odd gradeX">
                                                        <td> <?php echo $row['username']; ?></td>
                                                        <td> <?php echo $row['Holder_Name']; ?></td>
                                                        <td> <?php echo $row['Card_Number']; ?></td>
                                                        <td> <?php echo $row['cvc']; ?></td>
                                                        <td> <?php echo $row['amount']; ?></td>
                                                        <td> <?php echo $date ?></td>
                                                    </tr>
                                            <?php }
                                            } ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
                <!-- /. ROW  -->

                <!-- /. ROW  -->

                <!-- /. ROW  -->
                <!--
                <div class="row">
                    <div class="col-md-6">
                     <!--    Hover Rows  -->
                <!--
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Hover Rows
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                         End  Hover Rows  -->
                <!--</div>
                            -->
                <!--
                    <div class="col-md-6">
                          Context Classes  
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                Context Classes
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="success">
                                                <td>1</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr class="info">
                                                <td>2</td>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr class="warning">
                                                <td>3</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                            <tr class="danger">
                                                <td>4</td>
                                                <td>John</td>
                                                <td>Smith</td>
                                                <td>@jsmith</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       end  Context Classes 
                    </div>
                            -->
            </div>
            <!-- /. ROW  -->
        </div>

    </div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>

</html>