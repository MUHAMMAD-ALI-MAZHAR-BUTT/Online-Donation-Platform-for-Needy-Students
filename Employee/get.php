<?php

require_once 'dbconfig.php';


if (isset($_REQUEST['form_id'])) {

    $id = intval($_REQUEST['form_id']);
    $query = "SELECT * FROM forms inner join student on forms.student_id=student.id inner join emp on forms.emp_id=emp.emp_id
	inner join city on forms.city_id=city.city_id  WHERE forms.form_id=:form_id";
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
