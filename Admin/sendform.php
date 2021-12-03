
<?php
include('db_connection.php');
function test_input($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST["name"])) {
    sleep(3);

    $connect = new PDO("mysql:host=localhost; dbname=base", "root", "");

    $success = '';

    $name = test_input($_POST["name"]);
    $balance = test_input($_POST["balance"]);
    $id = test_input($_POST["id"]);
    $total = test_input($_POST["total"]);
    $left = test_input($_POST["left"]);
    $number = test_input($_POST["number"]);
    $amount = test_input($_POST["amount"]);
    // $name_error = '';
    $amount_error = '';


    if ($amount == 0) {
        $amount_error = 'Amount entered cannot be zero';
    } else if ($amount > $balance) {
        $amount_error = 'This much amount is not currently available';
    } else if ($amount > $left) {
        $amount_error = 'Amount you are donating is more than the amount left';
    }
    if ($amount_error == '') {

        $query = "UPDATE payment_history set amount_received=amount_received+'$amount',req_amount=req_amount-'$amount' where id=$id";
        mysqli_query($con, $query);
        $query1 = "UPDATE balance set available=available-'$amount',donated=donated+'$amount' ";
        mysqli_query($con, $query1);
        $success = "Amount Donated Successfully at account number $number, page will reload in 10 seconds";
    }


    $output = array(
        'success'        =>    $success,
        'amount_error'    =>    $amount_error,


    );

    echo json_encode($output);
}
