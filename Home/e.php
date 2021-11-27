<!-- <?php
        // echo floor((time() - strtotime("2000-10-9")) / (60 * 60 * 24 * 365));

        // $my = '2010-05-12';
        // echo date('m', strtotime($my));


        // $cnic = '35202-9836610-1';


        // $cnic_pattern = '/[0-9]{5}[-][0-9]{7}[-][0-9]/';



        // if (!preg_match($cnic_pattern, $cnic)) {
        //     echo 'Phone Number is not in valid format, follow 03XXXXXXXXX format';
        // } else {
        //     echo 'true';
        // }
        ?> -->

<?php
// if ($_GET['continue'] == '') {
//     echo "NULL";
// } else {
//     echo "dfd";
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">

    </style>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>

    <div class="container">

        <?php
        if (isset($_POST['submit'])) {
            $total = "1000";

            $count = $_POST['count'];
            $to = ($count / $total) * 100;
        }
        ?>

        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-warning" style="width: <?php echo $to; ?>%"></div>
        </div>

        <form method="post" action="#">
            <input type="number" name="count">
            <input type="submit" name="submit">
        </form>
</body>

</html>
<?php
$con = mysqli_connect("localhost", "root", "", "base");
$qry = "SELECT * FROM balance";
$result = mysqli_query($con, $qry);
$row = mysqli_fetch_array($result);

$total =  $row['*'];
$to = ($total / 1000) * 100;

?>


<p style="font-size: 1.7vw">Total:<?php echo $total; ?></p>
<div class="container1">
    <div class="progress progress-striped active">
        <div class="progress-bar progress-bar-warning" style="width: <?php echo $to; ?>%"></div>
    </div>
</div>