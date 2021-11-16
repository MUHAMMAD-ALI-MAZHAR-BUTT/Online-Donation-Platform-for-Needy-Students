

<?php



if (isset($_POST["name"])) {
    sleep(3);

    $connect = new PDO("mysql:host=localhost; dbname=base", "root", "");

    $success = '';

    $name = $_POST["name"];

    $email = $_POST["email"];
    $subject = $_POST["subject"];

    $message = $_POST["message"];


    $name_error = '';
    $email_error = '';
    $subject_error = '';
    $message_error = '';


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

    if (empty($subject)) {
        $subject_error = 'Subject is Required';
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $subject)) {
            $subject_error = 'Only Letters and White Space Allowed';
        }
    }

    if (empty($message)) {
        $message_error = 'Message is Required Field';
    }

    if ($name_error == '' && $email_error == '' && $subject_error == '' && $message_error == '') {


        $data = array(
            ':name'            =>    $name,
            ':email'        =>    $email,
            ':subject'        =>    $subject,
            ':message'        =>    $message

        );

        $query = "
		INSERT INTO feedback 
		(name, email, subject, message) 
		VALUES (:name, :email, :subject, :message)
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
        'subject_error'    =>    $subject_error,
        'message_error'    =>    $message_error,

    );

    echo json_encode($output);
}

?>

