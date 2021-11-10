<?php
session_start();

if (!$_SESSION['admin_username']) {

    header("Location: ../index.php");
}

?>

<?php

require_once 'config.php';

if (isset($_GET['delete_id'])) {




    $stmt_delete = $DB_con->prepare('DELETE FROM orderdetails WHERE order_id =:order_id');
    $stmt_delete->bindParam(':order_id', $_GET['delete_id']);
    $stmt_delete->execute();

    header("Location: orderdetails.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste Management System</title>
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />


    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/datatables.min.js"></script>



</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Waste Management System - Administrator Panel</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="index.php"> &nbsp; &nbsp; &nbsp; Home</a></li>
                    <li><a data-toggle="modal" data-target="#uploadModal"> &nbsp; &nbsp; &nbsp; Upload Items</a></li>
                    <li><a href="items.php"> &nbsp; &nbsp; &nbsp; Item Management</a></li>
                    <li><a href="customers.php"> &nbsp; &nbsp; &nbsp; Customer Management</a></li>
                    <li class="active"><a href="orderdetails.php"> &nbsp; &nbsp; &nbsp; Order Details</a></li>
                    <li><a href="../../../Login_page/index.php"> &nbsp; &nbsp; &nbsp; Back to Dashboard</a></li>


                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#"><i class="fa fa-calendar"></i> <?php
                                                                    $Today = date('y:m:d');
                                                                    $new = date('l, F d, Y', strtotime($Today));
                                                                    echo $new; ?></a>

                    </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php extract($_SESSION);
                                                                                                                echo $admin_username; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">


            <div class="alert alert-danger">

                <center>
                    <h3><strong>Order Details Management</strong> </h3>
                </center>

            </div>

            <br />

            <div class="table-responsive">
                <table class="display table table-bordered" id="example" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Date Ordered</th>
                            <th>Customer Name</th>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("config.php");
                        $stmt = $DB_con->prepare('select order_id, order_date,users.user_firstname, users.user_lastname, order_name, order_price, order_quantity, order_total from orderdetails, users where orderdetails.user_id=users.user_id and order_status="Ordered" order by order_date desc');
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);


                        ?>
                                <tr>

                                    <td><?php echo $order_date; ?></td>
                                    <td><?php echo $user_firstname; ?> <?php echo $user_lastname; ?></td>
                                    <td><?php echo $order_name; ?></td>
                                    <td>&#8360; <?php echo $order_price; ?></td>
                                    <td><?php echo $order_quantity; ?></td>
                                    <td>&#8360; <?php echo $order_total; ?></td>

                                    <td>



                                        <a class="btn btn-danger" href="?delete_id=<?php echo $row['order_id']; ?>" title="click for delete" onclick="return confirm('Are you sure to remove this item ordered?')">
                                            <span class='glyphicon glyphicon-trash'></span>
                                            Remove Item Ordered</a>

                                    </td>
                                </tr>

                            <?php
                            }
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                            echo "<br />";
                            echo '<div class="alert alert-default" style="background-color:#033c73;">
                       <p style="color:white;text-align:center;">
                       &copy 2016 Waste Management System| All Rights Reserved |  

						</p>
                        
                    </div>
	</div>';

                            echo "</div>";
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

            </div>
        </div>


    </div>
    </div>




    </div>



    </div>
    <!-- /#wrapper -->


    <!-- Mediul Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
        <div class="modal-dialog modal-md">
            <div style="color:white;background-color:#008CBA" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 style="color:white" class="modal-title" id="myModalLabel">Upload Items</h2>
                </div>
                <div class="modal-body">




                    <form enctype="multipart/form-data" method="post" action="additems.php">
                        <fieldset>

                            <p>Name of Item:</p>
                            <div class="form-group">

                                <input class="form-control" placeholder="Name of Item" name="prod_name" type="text" required>


                            </div>



                            <p>Quantity Available:</p>
                            <div class="form-group">

                                <input class="form-control" placeholder="Quantity Available" name="prod_quantity" type="text" required>


                            </div>


                            <p>Price:</p>
                            <div class="form-group">

                                <input id="priceinput" class="form-control" placeholder="Price" name="prod_price" type="text" required>


                            </div>
                            <p>Item ID:</p>

                            <div class="form-group">
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "test");
                                $s = mysqli_query($con, "select * from recycleableitems");
                                ?>
                                <select name="item_id" class="form-control" required="">
                                    <?php
                                    while ($r = mysqli_fetch_array($s)) {
                                    ?>
                                        <option <?php
                                                ?>><?php echo $r['item_id'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>



                            </div>
                            <p>Choose Image:</p>
                            <div class="form-group">


                                <input class="form-control" type="file" name="item_image" accept="image/*" required />

                            </div>


                        </fieldset>


                </div>
                <div class="modal-footer">

                    <button class="btn btn-success btn-md" name="item_save">Save</button>

                    <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#example').dataTable();
        });
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