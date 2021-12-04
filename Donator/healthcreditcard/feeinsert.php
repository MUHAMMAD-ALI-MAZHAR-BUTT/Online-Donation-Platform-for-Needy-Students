<?php
session_start();
if (!$_SESSION['username']) {

    echo "<script>window.open('./LoginSystem/index.php','_self')</script>";
}
?>
<?php
include("config.php");
include("db.php");
extract($_SESSION);
$stmt_edit = $DB_con->prepare('SELECT * FROM donators WHERE username =:username');
$stmt_edit->execute(array(':username' => $username));
$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
extract($edit_row);

?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "base";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
$a = $_REQUEST['a'];
$b = $_REQUEST['b'];
$c = $_REQUEST['c'];
$d = $_REQUEST['d'];
$e = $_REQUEST['e'];
$f = $_REQUEST['f'];
$dd = date('Y-m-d');
$cc = date('Y-m-d H:i:s');
//Create a DateTime object using the original
//datetime string.
$datee = new DateTime($cc);

//Print out the 12 hour time using the format method.
$time = $datee->format('h:ia');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_SESSION['username'];

$sql = "INSERT INTO donation_record (datetime,category,donator_id,Holder_Name,Card_Number,Card_Expiry_Month,Expiry_Year,cvc,amount)
VALUES (CURRENT_TIMESTAMP,'health', '$id', '$a','$b','$c','$d','$e','$f')";
$query1 = "INSERT INTO `notifications` (`name`,`email`, `type`, `message`, `status`, `date`,`type1`) VALUES ('$name'
            , '$email', 'donor','Donor $name has donated $f rupees on the Platform in Health Category', 'unread', CURRENT_TIMESTAMP,'donation')";
mysqli_query($con, $query1);
$query2 = "UPDATE donators set total_donated=total_donated+$f,health_donated=health_donated+$f,no_of_times=no_of_times+1 where id='$id'";
mysqli_query($con, $query2);
$query3 = "UPDATE balance set total_in_health=total_in_health+$f,available_in_health=available_in_health+$f where id=1";
mysqli_query($con, $query3);
if ($conn->query($sql) === TRUE) {
?>
    <html>

    <head>
        <title><?php echo $_SESSION['username']; ?></title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap');

            html,
            body {
                font-family: 'Raleway', sans-serif;
            }

            .thankyou-page ._header {
                /* background: blue;*/
                padding: 100px 30px;
                text-align: center;
                color: #fee028;

            }

            .thankyou-page ._header .logo {
                max-width: 200px;
                margin: 0 auto 50px;
            }

            .thankyou-page ._header .logo img {
                width: 100%;
            }

            .thankyou-page ._header h1 {
                font-size: 65px;
                font-weight: 800;
                color: yellow;
                margin: 0;
            }

            .thankyou-page ._body {
                margin: -70px 0 30px;
            }

            .thankyou-page ._body ._box {
                margin: auto;
                max-width: 80%;
                padding: 50px;
                background: white;
                border-radius: 3px;
                box-shadow: 0 0 35px rgba(10, 10, 10, 0.12);
                -moz-box-shadow: 0 0 35px rgba(10, 10, 10, 0.12);
                -webkit-box-shadow: 0 0 35px rgba(10, 10, 10, 0.12);
            }

            strong:hover {
                color: greenyellow;
            }

            .thankyou-page ._body ._box h2 {
                font-size: 32px;
                font-weight: 600;
                color: blue;
            }

            .thankyou-page ._footer {
                text-align: center;
                padding: 50px 30px;
            }

            .thankyou-page ._footer .btn {
                background: #4ab74a;
                color: white;
                border: 0;
                font-size: 14px;
                font-weight: 600;
                border-radius: 0;
                letter-spacing: 0.8px;
                padding: 20px 33px;
                text-transform: uppercase;
            }
        </style>
        <!------ Include the above in your HEAD tag ---------->
    </head>
    <div class="thankyou-page">
        <div class="_header" style="background-image: url('1.jpg');">

            <!--
       <div class="logo"> 
            <img src="https://codexcourier.com/images/banner-logo.png" alt="">
        </div>
-->
            <h1>Thank You!</h1>

        </div>
        <div class="_body">
            <div class="_box" style="background-color:#fee028">

                <h2>
                    <strong>You have successfully donated

    </html><?php echo "$f"; ?> <html> Rupees

    </html><?php echo "$dd" ?> <html>&#128512;

    </strong> <br>
    Your donation will be used for Needy Students Health Category.
    </h2>

    </div>
    </div>

    <div class="_footer">
        <p>Having trouble? <a href="../feedback.php">Contact us</a> </p>
        <a class="btn" href="../index.php">Back to homepage</a>
    </div>
    <marquee width="100%" direction="right" height="17px" onmousedown="this.stop();" class="bb" onmouseup="this.start();">
        <strong style="font-weight: bold;color:blue">
            &#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;
            &#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;
            You are doing great . Thank you for your contribution.
            &#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;
            &#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;&#x2B50;
        </strong>
    </marquee>

    </div>
    <!--
<iframe src="https://giphy.com/embed/SY2hQpAMLnuxtgLT5C"
       width="200" align="right" height="300" frameBorder="0" class="giphy-embed"></p>
-->

    </html>
<?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>