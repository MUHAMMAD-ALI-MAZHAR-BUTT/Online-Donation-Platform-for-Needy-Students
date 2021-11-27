<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Passing Value to Modal using jQuery</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <div style="height:50px;"></div>
        <div class="well">
            <center>
                <h2>Passing Values to Modal using jQuery</h2>
            </center>
            <div style="height:10px;"></div>
            <table width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "sample");
                    $query = mysqli_query($conn, "select * from `user`");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <!-- <td><span id="firstname<?php echo $row['userid']; ?>"><?php echo $row['firstname']; ?></span></td>
                            <td><span id="lastname<?php echo $row['userid']; ?>"><?php echo $row['lastname']; ?></span></td>
                            <td><span id="address<?php echo $row['userid']; ?>"><?php echo $row['address']; ?></span></td> -->
                            <td><button type="button" class="btn btn-success edit" value="<?php echo $row['userid']; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
        include('db_connection.php');
        ?>
        <script>
            $(document).ready(function() {
                $(document).on('click', '.edit', function() {
                    var id = $(this).val();

                    alert("<?php echo $id ?>");
                    var first = $('#firstname' + id).text();
                    var last = $('#lastname' + id).text();
                    var address = $('#address' + id).text();

                    $('#edit').modal('show');
                    $('#efirstname').val(first);
                    $('#elastname').val(last);
                    $('#eaddress').val(address);
                });
            });
        </script>

        <!-- Edit Modal-->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center>
                            <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                        </center>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group input-group">
                                <span class="input-group-addon" style="width:150px;">Firstname:</span>
                                <input type="text" style="width:350px;" class="form-control" id="efirstname">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon" style="width:150px;">Lastname:</span>
                                <input type="text" style="width:350px;" class="form-control" id="elastname">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon" style="width:150px;">Address:</span>
                                <input type="text" style="width:350px;" class="form-control" id="eaddress">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </i> Update</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->
</body>

</html>