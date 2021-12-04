
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
    $category = test_input($_POST["category"]);
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
        if ($category == 'fee') {
            $query1 = "UPDATE balance set available_in_fee=available_in_fee-'$amount',donated_in_fee=donated_in_fee+'$amount' ";
            mysqli_query($con, $query1);
            $success = "Amount Donated Successfully at account number $number, page will reload in 10 seconds";
        } else if ($category == 'health') {
            $query1 = "UPDATE balance set available_in_health=available_in_health-'$amount',donated_in_health=donated_in_health+'$amount' ";
            mysqli_query($con, $query1);
            $success = "Amount Donated Successfully at account number $number, page will reload in 10 seconds";
        } else if ($category == 'category') {
            $query1 = "UPDATE balance set available_in_expense=available_in_expense-'$amount',donated_in_expense=donated_in_expense+'$amount' ";
            mysqli_query($con, $query1);
            $success = "Amount Donated Successfully at account number $number, page will reload in 10 seconds";
        }
    }


    $output = array(
        'success'        =>    $success,
        'amount_error'    =>    $amount_error,


    );

    echo json_encode($output);
}
