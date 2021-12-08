   <div class="modal fade" id="app" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">

       <div class="modal-dialog modal-md">
           <div class="modal-content">
               <?php
                $d = date('m');

                include("config.php");
                include("db_connection.php");
                $query = "SELECT * FROM forms where student_id='$id'";
                $s = mysqli_query($dbcon, $query);
                $nums = mysqli_num_rows($s);
                if ($nums == 0) {
                ?>
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <?php

                        $date = date('F, Y');

                        ?>
                       <h2 class="modal-title" id="myModalLabel">Fill Form for <?php echo $date ?></h2>
                   </div>
                   <div class="modal-body">
                       <form id="addform">
                           <fieldset>
                               <style>
                                   .required:after {
                                       content: " *";
                                       color: red;

                                   }
                               </style>
                               <p class="required">Name :</p>
                               <div class="form-group">
                                   <input class="form-control form_data" value="<?php echo $name ?>" name="name" id="name" type="text" readonly>
                                   <input class="form-control form_data" value="<?php echo $id ?>" name="idd" id="idd" type="hidden" readonly>

                               </div>
                               <p class="required">Father Name:</p>
                               <div class="form-group">
                                   <input class="form-control form_data" placeholder="" name="father" id="father" type="text" required>
                                   <span id="father_error" class="text-danger"></span>
                               </div>
                               <p class="required">CNIC:</p>
                               <div class="form-group">

                                   <input class="form-control form_data" placeholder="" name="cnic" id="cnic" type="text" required>
                                   <span id="cnic_error" class="text-danger"></span>

                               </div>
                               <p class="required">DOB:</p>
                               <div class="form-group">

                                   <input class="form-control form_data" placeholder="" name="dob" id="dob" type="date" min="1990-01-01" max="2010-01-01" value="2010-01-01" required>
                                   <span id="dob_error" class="text-danger"></span>

                               </div>
                               <p class="required">Father Occupation details:</p>
                               <div class="form-group">

                                   <input class="form-control form_data" placeholder="" name="occupation" id="occupation" type="text" required>
                                   <span id="occ_error" class="text-danger"></span>

                               </div>
                               <p class="required">Monthly Income (In Rupees):</p>
                               <div class="form-group">

                                   <input class="form-control form_data" placeholder="" name="Monthly_income" id="Monthly_income" type="text" required>
                                   <span id="income_error" class="text-danger"></span>

                               </div>
                               <p class="required">Study Level:</p>
                               <div class="form-group">

                                   <select name="study_level" id="study_level" class="form-control form_data" required="">
                                       <option hidden>Select</option>
                                       <option>secondary</option>
                                       <option>undergrad</option>
                                       <option>postgrad</option>

                                   </select>
                                   <span id="level_error" class="text-danger"></span>

                               </div>
                               <p class="required">Institute Name:</p>
                               <div class="form-group">

                                   <input class="form-control form_data" placeholder="" name="institute_name" id="institute_name" type="text" required>
                                   <span id="i_error" class="text-danger"></span>

                               </div>
                               <p class="required">Message:</p>
                               <div class="form-group">

                                   <textarea class="form-control form_data" placeholder="" rows="5" name="message1" id="message1" type="text" required></textarea>
                                   <span id="message1_error" class="text-danger"></span>

                               </div>
                               <p class="required">Select City/District:</p>

                               <div class="form-group">
                                   <?php
                                    $con = mysqli_connect("localhost", "root", "", "base");
                                    $s = mysqli_query($con, "select * from city");
                                    ?>

                                   <select name="city" id="city" class="form-control form_data" required>
                                       <option hidden>Select</option>
                                       <?php
                                        while ($r = mysqli_fetch_array($s)) {
                                        ?>
                                           <option <?php
                                                    ?>><?php echo $r['city_name'] ?></option>
                                       <?php
                                        }
                                        ?>
                                   </select>
                                   <span id="city_error" class="text-danger"></span>
                               </div>
                               <p class="required">Select Category of Grant:</p>
                               <div class="form-group">

                                   <select name="category" id="category" class="form-control form_data" required="">
                                       <option hidden>Select</option>
                                       <option>fee</option>
                                       <option>expense</option>
                                       <option>health</option>

                                   </select>
                                   <span id="category_error" class="text-danger"></span>
                               </div>
                               <p class="required">Amount required (In Rupees):</p>
                               <div class="form-group">

                                   <input class="form-control form_data" placeholder="" name="amount_required" id="amount_required" type="text" required></input>
                                   <span id="amount_error" class="text-danger"></span>

                               </div>
                               <p class="required">Your easypaisa account number:</p>
                               <div class="form-group">

                                   <input class="form-control form_data" placeholder="" name="easypaisa_acc" id="easypaisa_acc" type="text" required></input>
                                   <span id="acc_error" class="text-danger"></span>
                                   <span id="suc" class="text-success" style="font-size:large"></span>
                               </div>
                           </fieldset>
                   </div>
                   <div class="modal-footer">

                       <button class="btn btn-success btn-md" onclick="save_form(); return false;" type="submit" name="sub" id="sub">Submit</button>

                       <button type="button" class="btn btn-danger btn-md" onclick="location.reload(); return false;" data-dismiss="modal">Cancel</button>

                       </form>
                   </div>
                   <script>
                       function save_form() {
                           var form_element = document.getElementsByClassName('form_data');

                           var form_data = new FormData();

                           for (var count = 0; count < form_element.length; count++) {
                               form_data.append(form_element[count].name, form_element[count].value);
                           }

                           document.getElementById('sub').disabled = true;

                           var ajax_request = new XMLHttpRequest();

                           ajax_request.open('POST', 'sendform.php');

                           ajax_request.send(form_data);

                           ajax_request.onreadystatechange = function() {
                               if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                                   document.getElementById('sub').disabled = false;

                                   var response = JSON.parse(ajax_request.responseText);

                                   if (response.success != '') {
                                       document.getElementById('addform').reset();

                                       document.getElementById('suc').innerHTML = response.success;

                                       setTimeout(function() {

                                           document.getElementById('suc').innerHTML = '';
                                           $('#app').modal('hide');

                                           location.reload();

                                       }, 5000);
                                       document.getElementById('father_error').innerHTML = '';
                                       document.getElementById('cnic_error').innerHTML = '';
                                       // document.getElementById('dob_error').innerHTML = '';
                                       document.getElementById('occ_error').innerHTML = '';
                                       document.getElementById('income_error').innerHTML = '';
                                       document.getElementById('message1_error').innerHTML = '';
                                       document.getElementById('i_error').innerHTML = '';
                                       document.getElementById('amount_error').innerHTML = '';
                                       document.getElementById('level_error').innerHTML = '';
                                       document.getElementById('city_error').innerHTML = '';
                                       document.getElementById('category_error').innerHTML = '';
                                       document.getElementById('acc_error').innerHTML = '';

                                   } else {

                                       document.getElementById('father_error').innerHTML = response.father_error;
                                       document.getElementById('cnic_error').innerHTML = response.cnic_error;
                                       // document.getElementById('dob_error').innerHTML = response.dob_error;
                                       document.getElementById('occ_error').innerHTML = response.occ_error;
                                       document.getElementById('income_error').innerHTML = response.income_error;
                                       document.getElementById('message1_error').innerHTML = response.message1_error;
                                       document.getElementById('i_error').innerHTML = response.i_error;
                                       document.getElementById('amount_error').innerHTML = response.amount_error;
                                       document.getElementById('level_error').innerHTML = response.level_error;
                                       document.getElementById('city_error').innerHTML = response.city_error;
                                       document.getElementById('category_error').innerHTML = response.category_error;
                                       document.getElementById('acc_error').innerHTML = response.acc_error;
                                   }



                               }
                           }
                       }
                   </script>
                   <?php
                } else {
                    $stmt = $DB_con->prepare("SELECT * FROM forms where student_id='$id'");
                    $stmt->execute();


                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);

                        $dd = date('m', strtotime($row['date_filled']));
                    ?>
                       <?php
                        if (date('m') == date('m', strtotime($row['date_filled']))) {
                        ?>
                           <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <?php
                                $date = date('F, Y');
                                ?>
                               <h2 class="modal-title" id="myModalLabel">You have already applied for <?php echo $date ?></h2>
                           </div>
                       <?php
                        } else if ($row['status'] == 'pending') {
                        ?>
                           <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <?php

                                $date = date('F, Y');

                                ?>
                               <h2 class="modal-title" id="myModalLabel">Your previous form status is still pending, cannot apply for another one</h2>
                           </div>
                       <?php
                        } else if ($d != $dd & $row['status'] != 'pending') {
                        ?>
                           <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <?php

                                $date = date('F, Y');

                                ?>
                               <h2 class="modal-title" id="myModalLabel">Fill Form for <?php echo $date ?></h2>
                           </div>
                           <div class="modal-body">
                               <form id="addform">
                                   <fieldset>
                                       <style>
                                           .required:after {
                                               content: " *";
                                               color: red;

                                           }
                                       </style>
                                       <p class="required">Name :</p>
                                       <div class="form-group">
                                           <input class="form-control form_data" value="<?php echo $name ?>" name="name" id="name" type="text" readonly>
                                           <input class="form-control form_data" value="<?php echo $id ?>" name="idd" id="idd" type="hidden" readonly>

                                       </div>
                                       <?php
                                        include('db_connection.php');
                                        $query = "SELECT * from forms inner join city on forms.city_id=city.city_id where student_id='$id' order by form_id desc ";
                                        $qu = mysqli_query($dbcon, $query);
                                        if (mysqli_num_rows($qu) > 0) {
                                            $res = mysqli_fetch_array($qu);
                                        ?>
                                           <p class="required">Father Name:</p>
                                           <div class="form-group">
                                               <input class="form-control form_data" value="<?php echo $res['father'] ?>" name="father" id="father" type="text" required>
                                               <span id="father_error" class="text-danger"></span>
                                           </div>
                                           <p class="required">CNIC:</p>
                                           <div class="form-group">

                                               <input class="form-control form_data" value="<?php echo $res['cnic'] ?>" name="cnic" id="cnic" type="text" required>
                                               <span id="cnic_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">DOB:</p>
                                           <div class="form-group">

                                               <input class="form-control form_data" value="<?php echo $res['dob'] ?>" name="dob" id="dob" type="date" min="1990-01-01" max="2010-01-01" value="2010-01-01" required>
                                               <span id="dob_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">Father Occupation details:</p>
                                           <div class="form-group">

                                               <input class="form-control form_data" value="<?php echo $res['occupation'] ?>" name="occupation" id="occupation" type="text" required>
                                               <span id="occ_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">Monthly Income (In Rupees):</p>
                                           <div class="form-group">

                                               <input class="form-control form_data" placeholder="" name="Monthly_income" id="Monthly_income" type="text" required>
                                               <span id="income_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">Study Level:</p>
                                           <div class="form-group">

                                               <select name="study_level" id="study_level" class="form-control form_data" required="">
                                                   <option hidden><?php echo $res['study_level'] ?></option>
                                                   <option>secondary</option>
                                                   <option>undergrad</option>
                                                   <option>postgrad</option>

                                               </select>
                                               <span id="level_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">Institute Name:</p>
                                           <div class="form-group">

                                               <input class="form-control form_data" value="<?php echo $res['institute_name'] ?>" name="institute_name" id="institute_name" type="text" required>
                                               <span id="i_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">Message:</p>
                                           <div class="form-group">

                                               <textarea class="form-control form_data" placeholder="" rows="5" name="message1" id="message1" type="text" required></textarea>
                                               <span id="message1_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">Select City/District:</p>

                                           <div class="form-group">
                                               <?php
                                                $con = mysqli_connect("localhost", "root", "", "base");
                                                $s = mysqli_query($con, "select * from city");
                                                ?>

                                               <select name="city" id="city" class="form-control form_data" required>
                                                   <option hidden><?php echo $res['city_name'] ?></option>
                                                   <?php
                                                    while ($r = mysqli_fetch_array($s)) {
                                                    ?>
                                                       <option <?php
                                                                ?>><?php echo $r['city_name'] ?></option>
                                                   <?php
                                                    }
                                                    ?>
                                               </select>
                                               <span id="city_error" class="text-danger"></span>
                                           </div>
                                           <p class="required">Select Category of Grant:</p>
                                           <div class="form-group">

                                               <select name="category" id="category" class="form-control form_data" required="">
                                                   <option hidden><?php echo $res['category'] ?></option>
                                                   <option>fee</option>
                                                   <option>expense</option>
                                                   <option>health</option>

                                               </select>
                                               <span id="category_error" class="text-danger"></span>
                                           </div>
                                           <p class="required">Amount required (In Rupees):</p>
                                           <div class="form-group">

                                               <input class="form-control form_data" placeholder="" name="amount_required" id="amount_required" type="text" required></input>
                                               <span id="amount_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">Your easypaisa account number:</p>
                                           <div class="form-group">

                                               <input class="form-control form_data" value="0<?php echo $res['easypaisa_acc'] ?>" name="easypaisa_acc" id="easypaisa_acc" type="text" required></input>
                                               <span id="acc_error" class="text-danger"></span>
                                               <span id="suc" class="text-success" style="font-size:large"></span>
                                           </div>
                                       <?php
                                        } else {
                                        ?>
                                           <p class="required">Father Name:</p>
                                           <div class="form-group">
                                               <input class="form-control form_data" placeholder="" name="father" id="father" type="text" required>
                                               <span id="father_error" class="text-danger"></span>
                                           </div>
                                           <p class="required">CNIC:</p>
                                           <div class="form-group">

                                               <input class="form-control form_data" placeholder="" name="cnic" id="cnic" type="text" required>
                                               <span id="cnic_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">DOB:</p>
                                           <div class="form-group">

                                               <input class="form-control form_data" placeholder="" name="dob" id="dob" type="date" min="1990-01-01" max="2010-01-01" value="2010-01-01" required>
                                               <span id="dob_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">Father Occupation details:</p>
                                           <div class="form-group">

                                               <input class="form-control form_data" placeholder="" name="occupation" id="occupation" type="text" required>
                                               <span id="occ_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">Monthly Income (In Rupees):</p>
                                           <div class="form-group">

                                               <input class="form-control form_data" placeholder="" name="Monthly_income" id="Monthly_income" type="text" required>
                                               <span id="income_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">Study Level:</p>
                                           <div class="form-group">

                                               <select name="study_level" id="study_level" class="form-control form_data" required="">
                                                   <option hidden>Select</option>
                                                   <option>secondary</option>
                                                   <option>undergrad</option>
                                                   <option>postgrad</option>

                                               </select>
                                               <span id="level_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">Institute Name:</p>
                                           <div class="form-group">

                                               <input class="form-control form_data" placeholder="" name="institute_name" id="institute_name" type="text" required>
                                               <span id="i_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">Message:</p>
                                           <div class="form-group">

                                               <textarea class="form-control form_data" placeholder="" rows="5" name="message1" id="message1" type="text" required></textarea>
                                               <span id="message1_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">Select City/District:</p>

                                           <div class="form-group">
                                               <?php
                                                $con = mysqli_connect("localhost", "root", "", "base");
                                                $s = mysqli_query($con, "select * from city");
                                                ?>

                                               <select name="city" id="city" class="form-control form_data" required>
                                                   <option hidden>Select</option>
                                                   <?php
                                                    while ($r = mysqli_fetch_array($s)) {
                                                    ?>
                                                       <option <?php
                                                                ?>><?php echo $r['city_name'] ?></option>
                                                   <?php
                                                    }
                                                    ?>
                                               </select>
                                               <span id="city_error" class="text-danger"></span>
                                           </div>
                                           <p class="required">Select Category of Grant:</p>
                                           <div class="form-group">

                                               <select name="category" id="category" class="form-control form_data" required="">
                                                   <option hidden>Select</option>
                                                   <option>fee</option>
                                                   <option>expense</option>
                                                   <option>health</option>

                                               </select>
                                               <span id="category_error" class="text-danger"></span>
                                           </div>
                                           <p class="required">Amount required (In Rupees):</p>
                                           <div class="form-group">

                                               <input class="form-control form_data" placeholder="" name="amount_required" id="amount_required" type="text" required></input>
                                               <span id="amount_error" class="text-danger"></span>

                                           </div>
                                           <p class="required">Your easypaisa account number:</p>
                                           <div class="form-group">

                                               <input class="form-control form_data" placeholder="" name="easypaisa_acc" id="easypaisa_acc" type="text" required></input>
                                               <span id="acc_error" class="text-danger"></span>
                                               <span id="suc" class="text-success" style="font-size:large"></span>
                                           </div>
                                       <?php
                                        }
                                        ?>


                                   </fieldset>
                           </div>
                           <div class="modal-footer">

                               <button class="btn btn-success btn-md" onclick="save_form(); return false;" type="submit" name="sub" id="sub">Submit</button>

                               <button type="button" class="btn btn-danger btn-md" onclick="location.reload(); return false;" data-dismiss="modal">Cancel</button>

                               </form>
                           </div>
                           <script>
                               function save_form() {
                                   var form_element = document.getElementsByClassName('form_data');

                                   var form_data = new FormData();

                                   for (var count = 0; count < form_element.length; count++) {
                                       form_data.append(form_element[count].name, form_element[count].value);
                                   }

                                   document.getElementById('sub').disabled = true;

                                   var ajax_request = new XMLHttpRequest();

                                   ajax_request.open('POST', 'sendform.php');

                                   ajax_request.send(form_data);

                                   ajax_request.onreadystatechange = function() {
                                       if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                                           document.getElementById('sub').disabled = false;

                                           var response = JSON.parse(ajax_request.responseText);

                                           if (response.success != '') {
                                               document.getElementById('addform').reset();

                                               document.getElementById('suc').innerHTML = response.success;

                                               setTimeout(function() {

                                                   document.getElementById('suc').innerHTML = '';
                                                   $('#app').modal('hide');

                                                   location.reload();

                                               }, 5000);
                                               document.getElementById('father_error').innerHTML = '';
                                               document.getElementById('cnic_error').innerHTML = '';
                                               // document.getElementById('dob_error').innerHTML = '';
                                               document.getElementById('occ_error').innerHTML = '';
                                               document.getElementById('income_error').innerHTML = '';
                                               document.getElementById('message1_error').innerHTML = '';
                                               document.getElementById('i_error').innerHTML = '';
                                               document.getElementById('amount_error').innerHTML = '';
                                               document.getElementById('level_error').innerHTML = '';
                                               document.getElementById('city_error').innerHTML = '';
                                               document.getElementById('category_error').innerHTML = '';
                                               document.getElementById('acc_error').innerHTML = '';

                                           } else {

                                               document.getElementById('father_error').innerHTML = response.father_error;
                                               document.getElementById('cnic_error').innerHTML = response.cnic_error;
                                               // document.getElementById('dob_error').innerHTML = response.dob_error;
                                               document.getElementById('occ_error').innerHTML = response.occ_error;
                                               document.getElementById('income_error').innerHTML = response.income_error;
                                               document.getElementById('message1_error').innerHTML = response.message1_error;
                                               document.getElementById('i_error').innerHTML = response.i_error;
                                               document.getElementById('amount_error').innerHTML = response.amount_error;
                                               document.getElementById('level_error').innerHTML = response.level_error;
                                               document.getElementById('city_error').innerHTML = response.city_error;
                                               document.getElementById('category_error').innerHTML = response.category_error;
                                               document.getElementById('acc_error').innerHTML = response.acc_error;
                                           }



                                       }
                                   }
                               }
                           </script>
               <?php
                        }
                    }
                }
                ?>

           </div>
       </div>
   </div>