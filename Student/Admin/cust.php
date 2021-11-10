<?php
include 'connection.php';
$output = '';
if (isset($_POST["excel_export"])) {
    $sql = "select * from userview";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) > 0) {
        $output .= '
        <table class="table" bordered="1">
            <tr>

							<th>Cust. ID</th>
							<th>Cust. Name</th>
							<th>Email</th>
							<th>Address</th>
            </tr>
        ';
        while ($row = mysqli_fetch_array($res)) {
            $output .= '
                          <tr>
                <td>' . $row["user_id"] . '</td>
                <td>' . $row["user_firstname"] . "" . $row["user_lastname"] . '</td>
                <td>' . $row["user_email"] . '</td>
                <td>' . $row["user_address"] . '</td>
              </tr>
            ';
        }
        $output .= '</table>';
        header("Content-Type:application/xls");
        header("Content-Disposition:attachment;filename=Customer List.xls");
        echo $output;
    }
}
