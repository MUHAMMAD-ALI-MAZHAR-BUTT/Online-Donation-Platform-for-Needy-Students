<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="col-lg-6">
        <!--role="form" class="php-email-form"-->
        <h3><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Feedback Form</b></h3>
        <br>

        <form id="sample_form">
            <div class="row">
                <div class="col form-group">

                    <input type="text" name="emp_name" class="form-control form_data" id="name" placeholder="Your Name " required>
                    <span id="name_error" class="text-danger"></span>
                </div>
                <div class="col form-group">
                    <input type="email" class="form-control form_data" name="emp_email" id="email" placeholder="email@domain.com" required>
                    <span id="email_error" class="text-danger"></span>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form_data" name="emp_phone" id="phone" placeholder="03XXXXXXXXX" required>
                <span id="phone_error" class="text-danger"></span>
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

                ajax_request.open('POST', 'insertemp.php');

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

    </div>
</div>

</div>
<!-- ./wrapper -->