<?php
$connect = mysqli_connect("localhost", "root", "", "base");
$query = "SELECT * FROM feedback";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Webslesson Tutorial | Datatables Jquery Plugin with Php MySql and Bootstrap</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
</head>

<body>
    <br /><br />
    <div class="container">
        <h3 align="center">Datatables Jquery Plugin with Php MySql and Bootstrap</h3>
        <br />
        <div class="table-responsive">
            <table id="employee_data" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Subject</td>

                    </tr>
                </thead>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '  
                               <tr>  
                                    <td>' . $row["name"] . '</td>  
                                    <td>' . $row["email"] . '</td>  
                                    <td>' . $row["subject"] . '</td>  
                                    
                               </tr>  
                               ';
                    }
                } else {
                ?>
                    <div class="col-xs-12">
                        <div class="alert alert-warning">
                            <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
                        </div>
                    </div>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        $('#employee_data').DataTable();
    });
</script>