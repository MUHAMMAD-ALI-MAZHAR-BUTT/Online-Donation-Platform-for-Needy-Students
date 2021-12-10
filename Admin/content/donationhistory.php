<div class="content-wrapper">

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
                <div class="col-sm-8 " style="text-align: center;">
                    <h2 style="font-family: sans-serif; padding-top:1%; padding-bottom:1%"><b> Donation Record</b></h2>

                    <!-- -->
                </div>


            </div>
        </div>
        <?php
        include('db_connection.php');
        $selectquery = "select * from donation_record";
        $res = mysqli_query($con, $selectquery);
        if (mysqli_num_rows($res) == 0) {
        ?>
            <div class="container">
                <div class="row justify-content-centre">
                    <div class="col-lg-6 col-md-6">
                        <h2 class="text-center p-1">Record is Empty So far...
                        </h2>
                    </div>
                </div>

            </div>
        <?php
        } else {
        ?>
            <table class=" table table-striped table-hover">
                <thead>
                    <tr>

                        <th>Id</th>
                        <th>Donator Id</th>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Date and Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include 'db_connection.php';
                    $conn = mysqli_connect("localhost", "root", "");
                    mysqli_select_db($conn, "base");
                    $start = 0;
                    $limit = 10;

                    if (!empty($_GET)) {
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $start = ($id - 1) * $limit;
                        }
                    } else {
                        $id = 1;
                        $start = ($id - 1) * $limit;
                    }

                    $selectquery = "select * from donation_record LIMIT $start, $limit";

                    $query = mysqli_query($con, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {
                        // $date = date('F j, Y', strtotime($res['create_datetime']));
                        $date1 = date('F j, Y, g:i a', strtotime($res['datetime']));
                    ?>

                        <tr>

                            <td><?php echo $res['id']; ?></td>
                            <td><?php echo $res['donator_id']; ?></td>
                            <td><?php echo $res['category']; ?></td>
                            <td><?php echo $res['amount']; ?></td>
                            <td><?php echo $date1 ?></td>



                            <td>

                                <a href="#" data-toggle="modal" data-target="#view-history" data-id="<?php echo $res['id']; ?>" id="donordetail">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-list" style="color:#ad1deb" data-toggle="tooltip" title="Details"></i></a>

                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
                <div id="view-history" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title">
                                    <i class="glyphicon glyphicon-user"></i> Donor Detail
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                            </div>
                            <div class="modal-body">

                                <div id="modal-loader" style="display: none; text-align: center;">
                                    <img src="ajax-loader.gif">
                                </div>
                                <!-- content will be load here -->
                                <div id="dynamic-content"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div><!-- /.modal -->
                <script>
                    $(document).ready(function() {

                        $(document).on('click', '#donordetail', function(e) {

                            e.preventDefault();

                            var uid = $(this).data('id'); // it will get id of clicked row

                            $('#dynamic-content').html(''); // leave it blank before ajax call
                            $('#modal-loader').show(); // load ajax loader

                            $.ajax({
                                    url: 'donor.php',
                                    type: 'POST',
                                    data: 'Id=' + uid,
                                    dataType: 'html'
                                })
                                .done(function(data) {
                                    console.log(data);
                                    $('#dynamic-content').html('');
                                    $('#dynamic-content').html(data); // load response 
                                    $('#modal-loader').hide(); // hide ajax loader	
                                })
                                .fail(function() {
                                    $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                                    $('#modal-loader').hide();
                                });

                        });

                    });
                </script>
            </table>
        <?php
            echo "<br><div class='container'>";

            $rows = mysqli_num_rows(mysqli_query($conn, "select * from donation_record"));
            $total = ceil($rows / $limit);
            // echo "<br /><ul class='pager'>";
            // if ($id > 1) {
            //     echo "<li><a style='color:white;background-color : #ad1deb' href='?id=" . ($id - 1) . "'>Previous Page</a><li>";
            // }
            // if ($id != $total) {
            //     echo "<li><a style='color:white;background-color : #ad1deb' href='?id=" . ($id + 1) . "' class='pager'>Next Page</a></li>";
            // }
            // echo "</ul>";


            echo "<ul class='pagination justify-content-center'>";
            if ($id > 1) {
                echo "<li class='page-item'><a style='color:#ad1deb ' class='page-link' href='?id=" . ($id - 1) . "'>Previous Page</a><li>";
            }
            for ($i = 1; $i <= $total; $i++) {
                if ($i == $id) {
                    echo "<li class='page-item active'><a style='background-color:#ad1deb; border-color:#ad1deb' class='page-link' >" . $i . "</a></li>";
                } else {
                    echo "<li class='page-item'><a style='color:#ad1deb; ' class='page-link' href='?id=" . $i . "'>" . $i . "</a></li>";
                }
            }
            if ($id != $total) {
                echo "<li class='page-item'><a style='color:#ad1deb;' class='page-link' href='?id=" . ($id + 1) . "' class='pager'>Next Page</a></li>";
            }
            echo "</ul>";
            echo "</div>";
        }

        ?>


    </div>


</div>



<?php include('./content/footer.php'); ?>

<div id="addpickerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addform">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" onclick="location.reload();" class=" close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group ">
                        <label>Employee Name</label>
                        <input type="text" name="emp_name" id="emp_name" class="form-control form_data" placeholder="Name">
                        <span id="name_error" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label>Employee Phone</label>
                        <input type="text" name="emp_phone" id="emp_phone" class="form-control form_data" placeholder="03XXXXXXXXX">
                        <span id="phone_error" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label>Employee Email</label>
                        <input type="email" name="emp_email" id="emp_email" class="form-control form_data" placeholder="email@domain.com">
                        <span id="email_error" class="text-danger"></span>
                        <span id="suc" class="text-success"></span>

                    </div>
                    <div class="modal-footer">
                        <input type="button" onclick="location.reload(); return false;" class="btn btn-default" data-dismiss="modal" value="Cancel">

                        <input onclick="save_emp(); return false;" type="submit" name="submit" id="submit" class="btn btn-success" value="Add">
                    </div>
            </form>
        </div>
    </div>
</div>
<script>
    function save_emp() {
        var form_element = document.getElementsByClassName('form_data');

        var form_data = new FormData();

        for (var count = 0; count < form_element.length; count++) {
            form_data.append(form_element[count].name, form_element[count].value);
        }

        document.getElementById('submit').disabled = true;

        var ajax_request = new XMLHttpRequest();

        ajax_request.open('POST', 'insertemp.php');

        ajax_request.send(form_data);

        ajax_request.onreadystatechange = function() {
            if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                document.getElementById('submit').disabled = false;

                var response = JSON.parse(ajax_request.responseText);

                if (response.success != '') {
                    document.getElementById('addform').reset();

                    document.getElementById('suc').innerHTML = response.success;

                    setTimeout(function() {

                        document.getElementById('suc').innerHTML = '';
                        $('#addpickerModal').modal('hide');

                        location.reload();

                    }, 5000);

                    document.getElementById('name_error').innerHTML = '';

                    document.getElementById('email_error').innerHTML = '';
                    document.getElementById('phone_error').innerHTML = '';



                } else {
                    document.getElementById('name_error').innerHTML = response.name_error;
                    document.getElementById('email_error').innerHTML = response.email_error;
                    document.getElementById('phone_error').innerHTML = response.phone_error;

                }



            }
        }
    }
</script>