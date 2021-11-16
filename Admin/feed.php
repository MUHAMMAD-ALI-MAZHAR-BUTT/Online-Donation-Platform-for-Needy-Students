

<?php



if (isset($_POST["name"])) {
    sleep(3);

    $connect = new PDO("mysql:host=localhost; dbname=base", "root", "");

    $success = '';

    $name = $_POST["name"];

    $email = $_POST["email"];
    $phone = $_POST["phone"];




    $name_error = '';
    $email_error = '';
    $phone_error = '';



    if (empty($name)) {
        $name_error = 'Name is Required';
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $name_error = 'Name format not correct';
        }
    }

    if (empty($email)) {
        $email_error = 'Email is Required';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = 'Email is invalid';
        }
    }

    if (empty($phone)) {
        $phone_error = 'Subject is Required';
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $phone)) {
            $phone_error = 'Only Letters and White Space Allowed';
        }
    }



    if ($name_error == '' && $email_error == '' && $phone_error == '') {


        $data = array(
            ':name'            =>    $name,
            ':email'        =>    $email,
            ':phone'        =>    $phone,


        );

        $query = "
		INSERT INTO emp 
		(name, email, phone) 
		VALUES (:name, :email, :phone)
		";

        $statement = $connect->prepare($query);

        $statement->execute($data);


        $success =
            "Feedback has been successfully submitted";
    }

    $output = array(
        'success'        =>    $success,
        'name_error'    =>    $name_error,
        'email_error'    =>    $email_error,
        'phone_error'    =>    $phone_error,


    );

    echo json_encode($output);
}

?>

