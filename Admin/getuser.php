<?php

require_once 'dbconfig.php';
include('db_connection.php');
if (isset($_REQUEST['id'])) {

	$id = intval($_REQUEST['id']);
	$query = "SELECT * FROM tbl_members WHERE user_id=:id";
	$stmt = $DBcon->prepare($query);
	$stmt->execute(array(':id' => $id));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	extract($row);

?>

	<div class="table-responsive">

		<table class="table table-striped table-bordered">
			<tr>
				<th>First Name</th>
				<td><?php echo $first_name; ?></td>
			</tr>
			<tr>
				<th>Last Name</th>
				<td><?php echo $last_name; ?></td>
			</tr>
			<tr>
				<th>Email ID</th>
				<td><?php echo $email; ?></td>
			</tr>
			<tr>
				<th>Position</th>
				<td><?php echo $position; ?></td>
			</tr>
			<tr>
				<th>Office</th>
				<td><?php echo $office; ?></td>
			</tr>
		</table>

	</div>

<?php
}
if (isset($_REQUEST['form_id'])) {

	$id = intval($_REQUEST['form_id']);
	$query = "SELECT * FROM forms inner join student on forms.student_id=student.id inner join emp on forms.emp_id=emp.emp_id
	inner join city on forms.city_id=city.city_id  WHERE forms.form_id=$id";
	$stmt = $DBcon->prepare($query);
	$stmt->execute(array(':form_id' => $id));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	extract($row);

?>

	<div class="table-responsive">

		<table class="table table-striped table-bordered">
			<tr>
				<th>Student Id</th>
				<td><?php echo $row['student_id']; ?></td>
			</tr>
			<tr>
				<th>Student Name</th>
				<td><?php echo $row['name']; ?></td>
			</tr>
			<tr>
				<th>Student Email</th>
				<td><?php echo $row['email']; ?></td>
			</tr>
			<tr>
				<th>Student Phone</th>
				<td><?php echo $row['phone']; ?></td>
			</tr>
			<tr>
				<th>CNIC</th>
				<td><?php echo $row['cnic']; ?></td>
			</tr>
			<tr>
				<?php
				$date = date('F j, Y', strtotime($row['dob']));
				?>
				<th>Date of Birth</th>
				<td><?php echo $date ?></td>
			</tr>
			<tr>
				<th>Age</th>
				<td><?php echo $row['age']; ?></td>
			</tr>

			<tr>
				<th>Employee Associated</th>
				<td><?php echo $row['emp_name']; ?></td>
			</tr>
			<tr>
				<th>Employee ID</th>
				<td><?php echo $row['emp_id']; ?></td>
			</tr>
			<tr>
				<th>Father Name</th>
				<td><?php echo $row['father']; ?></td>
			</tr>
			<tr>
				<th>Father Occupation</th>
				<td><?php echo $row['occupation']; ?></td>
			</tr>
			<tr>
				<th>Monthly income</th>
				<td><?php echo $row['Monthly_income']; ?></td>
			</tr>
			<tr>
				<th>City/District</th>
				<td><?php echo $row['city_name']; ?></td>
			</tr>
			<tr>
				<th>Study Level</th>
				<td><?php echo $row['study_level']; ?></td>
			</tr>
			<tr>
				<th>Category Chosen</th>
				<td><?php echo $row['category']; ?></td>
			</tr>
			<tr>
				<th>Institute Name</th>
				<td><?php echo $row['institute_name']; ?></td>
			</tr>
			<tr>
				<th>Amount required</th>
				<td><?php echo $row['amount_required']; ?></td>
			</tr>
			<tr>
				<th>Message</th>
				<td><?php echo $row['message']; ?></td>
			</tr>
			<!-- <tr>
				<th>Last Name</th>
				<td><?php echo $last_name; ?></td>
			</tr>
			<tr>
				<th>Email ID</th>
				<td><?php echo $email; ?></td>
			</tr>
			<tr>
				<th>Position</th>
				<td><?php echo $position; ?></td>
			</tr>
			<tr>
				<th>Office</th>
				<td><?php echo $office; ?></td>
			</tr> -->
		</table>

	</div>

<?php
}
if (isset($_REQUEST['idd'])) {

	$id = intval($_REQUEST['idd']);
	$query = "SELECT * FROM payment_history inner join forms on payment_history.form_id=forms.form_id inner join student on payment_history.student_id=student.id
	  WHERE payment_history.Id=$id";
	$s = mysqli_query($con, $query);
	$row = mysqli_fetch_array($s);

?>
	<!-- <form method="POST" action="sendform.php"> -->
	<form id="sample_form">
		<div class="table-responsive">

			<table class="table table-bordered table-responsive" style='width:100%'>

				<tr>
					<td><label class="control-label">Current Balance in Platform Account</label></td>
					<?php
					include 'db_connection.php';
					$s = "SELECT * from payment_history where Id='$id'";
					$q = mysqli_query($con, $s);
					$v = mysqli_fetch_assoc($q);
					if ($v['Category'] == 'fee') {
						$sql = "select available_in_fee as tot from balance where id=1";
						$query = mysqli_query($con, $sql);
						$values = mysqli_fetch_assoc($query);
						$num_rows = $values['tot'];
					?> <td><input class="form-control form_data" type="text" name="balance" id="balance" value="<?php echo $num_rows; ?>" readonly /></td>
					<?php
					} else if ($v['Category'] == 'health') {
						$sql = "select available_in_health as tot from balance where id=1";
						$query = mysqli_query($con, $sql);
						$values = mysqli_fetch_assoc($query);
						$num_rows = $values['tot'];
					?> <td><input class="form-control form_data" type="text" name="balance" id="balance" value="<?php echo $num_rows; ?>" readonly /></td>
					<?php
					} else if ($v['Category'] == 'expense') {
						$sql = "select available_in_expense as tot from balance where id=1";
						$query = mysqli_query($con, $sql);
						$values = mysqli_fetch_assoc($query);
						$num_rows = $values['tot'];
					?>
						<td><input class="form-control form_data" type="text" name="balance" id="balance" value="<?php echo $num_rows; ?>" readonly /></td>
					<?php
					}
					?>
				</tr>
				<input class="form-control form_data" value="<?php echo $id ?>" name="id" id="id" type="hidden" readonly>
				<input class="form-control form_data" value="<?php echo $row['form_id'] ?>" name="idd" id="idd" type="hidden" readonly>
				<input class="form-control form_data" value="<?php echo $row['category'] ?>" name="category" id="category" type="hidden" readonly>

				<tr>
					<td><label class="control-label">Student Name</label></td>
					<td><input class="form-control form_data" type="text" name="name" id="name" value="<?php echo $row['name']; ?>" readonly /></td>
				</tr>
				<tr>
					<td><label class="control-label">EasyPaisa Account number</label></td>
					<td><input class="form-control form_data" type="text" name="number" id="number" value="<?php echo $row['easypaisa_acc']; ?>" readonly /></td>
				</tr>
				<tr>
					<td><label class="control-label">Total Amount Required</label></td>
					<td><input class="form-control form_data" type="text" name="total" id="total" value="<?php echo $row['req_amount'] + $row['amount_received']; ?> " readonly /></td>
				</tr>
				<tr>
					<td><label class="control-label">Amount left</label></td>
					<td><input class="form-control form_data" type="text" name="left" id="left" value="<?php echo $row['req_amount']; ?>" readonly /></td>
				</tr>

				<tr>
					<td><label class="control-label">Donate </label></td>
					<td><input class="form-control form_data" type="text" placeholder="Enter Amount" name="amount" id="amount" value="0" onkeypress="return isNumber(event)" onpaste="return false" required />
					</td>
				</tr>

			</table>
			<td>
				<div class="text-center group" id="fed">
					<button type="submit" onclick="save_feedback(); return false;" name="submit" id="submit" class="btn btn-success" style="  display: block;width: 100%;border: none;padding: 14px 28px;font-size: 16px;  cursor: pointer;  text-align: center;">
						<span class="fas fa-donate"></span> Donate
					</button>
				</div>
			</td>
			<span id="amount_error" class="text-danger" style="margin-left: 10%;font-size:x-large"></span>
			<span id="suc" class="text-success" style="margin-left: 10%;font-size:large"></span>
		</div>
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

			ajax_request.open('POST', 'sendform.php');

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
							$('#view-modal').modal('hide');
							location.reload();

						}, 10000);
						document.getElementById('amount_error').innerHTML = '';


					} else {
						// document.getElementById('name_error').innerHTML = response.name_error;
						document.getElementById('amount_error').innerHTML = response.amount_error;

					}



				}
			}
		}
	</script>
<?php
}
