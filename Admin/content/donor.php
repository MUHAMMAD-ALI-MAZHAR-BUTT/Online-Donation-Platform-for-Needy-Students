<?php

require_once 'dbconfig.php';

if (isset($_REQUEST['id'])) {

    $id = intval($_REQUEST['id']);



?>

    <?php
    include('db_connection.php');
    $select = "select * from donators where id=$id";
    $res = mysqli_query($con, $select);
    if (mysqli_num_rows($res) == 0) {
    ?>
        <div class="container">
            <div class="row justify-content-centre">
                <div class="col-lg-6 col-md-6">
                    <h2 class="text-center p-1">Empty
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
                    <th>Donor Name</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Date and Time</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include 'db_connection.php';
                $selectquery = "select * from donation_record inner join donators on donation_record.donator_id=donators.id where donation_record.donator_id='$id'";

                $query = mysqli_query($con, $selectquery);

                $nums = mysqli_num_rows($query);

                while ($res = mysqli_fetch_array($query)) {

                    $date1 = date('F j, Y, g:i a', strtotime($res['datetime']));


                ?>

                    <tr>
                        <td><?php echo $res['id']; ?></td>
                        <td><?php echo $res['username']; ?></td>
                        <td><?php echo $res['category']; ?></td>
                        <td><?php echo $res['amount']; ?></td>
                        <td><?php echo $date1 ?></td>
                    </tr>

                <?php
                }
                ?>


            </tbody>
        </table>
    <?php
    }

    ?>


<?php
}
if (isset($_REQUEST['Id'])) {

    $id = intval($_REQUEST['Id']);
    $query = "SELECT * FROM donation_record inner join donators on donation_record.donator_id=donators.id where donation_record.id='$id'";
    $stmt = $DBcon->prepare($query);
    $stmt->execute(array(':Id' => $id));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);

?>

    <div class="table-responsive">

        <table class="table table-striped table-bordered">
            <tr>
                <th>Donor Id</th>
                <td><?php echo $row['donator_id']; ?></td>
            </tr>
            <tr>
                <th>Donor Name</th>
                <td><?php echo $row['username']; ?></td>
            </tr>
            <tr>
                <th>Donor Email</th>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
                <th>Category in which donated</th>
                <td><?php echo $row['category']; ?></td>
            </tr>
            <tr>
                <th>Amount Donated</th>
                <td><?php echo $row['amount']; ?></td>
            </tr>
            <tr>
                <?php
                $date1 = date('F j, Y, g:i a', strtotime($row['datetime']));
                ?>
                <th>Date and Time of donation</th>
                <td><?php echo $date1 ?></td>
            </tr>


            <tr>
                <th>Overall donation in total</th>
                <td><?php echo $row['total_donated']; ?></td>
            </tr>
            <tr>
                <th>Overall donation in fees</th>
                <td><?php echo $row['fee_donated']; ?></td>
            </tr>
            <tr>
                <th>Overall donation in health</th>
                <td><?php echo $row['health_donated']; ?></td>
            </tr>
            <tr>
                <th>Overall donation in expense</th>
                <td><?php echo $row['expense_donated']; ?></td>
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
