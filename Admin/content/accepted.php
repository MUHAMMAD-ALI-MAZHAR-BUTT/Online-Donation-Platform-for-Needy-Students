<div class="content-wrapper">

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row" style="  background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
                <div class="col-sm-8 " style="text-align: center;">
                    <h2 style="font-family: sans-serif; padding-top:1%; padding-bottom:1%"><b> Accepted Students Lists</b></h2>

                    <!-- -->
                </div>


            </div>
        </div>
        <?php
        include('db_connection.php');
        $selectquery = "select * from list_students where status='completed' or status='accepted'";
        $res = mysqli_query($con, $selectquery);
        if (mysqli_num_rows($res) == 0) {
        ?>
            <div class="container">
                <div class="row justify-content-centre">
                    <div class="col-lg-6 col-md-6">
                        <h2 class="text-center p-1">Empty so far
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
                        <th>Student Id</th>
                        <th>Status</th>
                        <th>Date of acceptance</th>
                        <th>Date of completion</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include 'db_connection.php';
                    $selectquery = "select * from list_students where status='completed' or status='accepted'";

                    $query = mysqli_query($con, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {
                        $date = date('F j, Y', strtotime($res['date_of_accept']));
                        $date1 = date('F j, Y, g:i a', strtotime($res['date_of_complete']));
                    ?>

                        <tr>

                            <td><?php echo $res['id']; ?></td>
                            <td><?php echo $res['student_id']; ?></td>
                            <td><?php echo $res['status']; ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $date1 ?></td>



                            <td>

                                <a href="itemlist1.php?id=<?php echo $res['item_id']; ?>" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-list" style="color:#ad1deb" data-toggle="tooltip" title="Details"></i></a>

                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
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