
<?php
include('db_connection.php');
function test_input($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["father"])) {
    sleep(3);
    $connect = new PDO("mysql:host=localhost; dbname=base", "root", "");
    $pattern = '/[0-9]{5}[-][0-9]{7}[-][0-9]{1}/';
    $pattern1 = '/^((?:00|\+)92)?(0?3(?:[0-46]\d|55)\d{7})$/';

    $success = '';

    // $emp_name = $_POST["emp_name"];
    // $emp_email = $_POST["emp_email"];
    // $emp_phone = $_POST["emp_phone"];

    $name = test_input($_POST["name"]);
    $id = test_input($_POST["idd"]);
    $father = test_input($_POST["father"]);
    $cnic = test_input($_POST["cnic"]);
    $Monthly_income = test_input($_POST["Monthly_income"]);
    $occupation = test_input($_POST["occupation"]);
    $institute_name = test_input($_POST["institute_name"]);
    $dob = date('Y-m-d', strtotime($_POST['dob']));
    $message1 = test_input($_POST["message1"]);
    $city = test_input($_POST["city"]);
    $category = test_input($_POST["category"]);
    $amount_required = test_input($_POST["amount_required"]);
    $study_level = test_input($_POST["study_level"]);
    $easypaisa_acc = test_input($_POST["easypaisa_acc"]);

    $father_error = '';
    $cnic_error = '';
    $occ_error = '';
    $income_error = '';
    $message1_error = '';
    $i_error = '';
    $amount_error = '';
    $level_error = '';
    $city_error = '';
    $category_error = '';
    $acc_error = '';

    if (empty($easypaisa_acc)) {
        $acc_error = 'Easypaisa account number required';
    } else {
        if (!preg_match($pattern1, $easypaisa_acc)) {
            $acc_error = 'Account format not valid';
        }
    }
    if ($study_level == 'Select') {
        $level_error = 'Select your study level';
    }
    if ($city == 'Select') {
        $city_error = 'Select your city/district';
    }
    if ($category == 'Select') {
        $category_error = 'Select your category';
    }
    if (empty($father)) {
        $father_error = 'Father Name is Required';
    } else {

        if (!preg_match("/^[a-zA-Z-' ]*$/", $father)) {
            $father_error = 'Name format not correct';
        }
    }
    if (empty($Monthly_income)) {
        $income_error = 'Income field should not be empty';
    } else if ($Monthly_income < 100 | $Monthly_income > 1000000000) {
        $income_error = 'Improper income given';
    } else {

        if (!preg_match("/^[0-9]*$/", $Monthly_income)) {
            $income_error = 'Only Numbers allowed';
        }
    }
    if (empty($amount_required)) {
        $amount_error = 'This field should not be empty';
    } else if ($amount_required < 1000 | $amount_required > 1000000) {
        $amount_error = 'Improper range given';
    } else {

        if (!preg_match("/^[0-9]*$/", $amount_required)) {
            $amount_error = 'Only Numbers allowed';
        }
    }
    if (empty($occupation)) {
        $occ_error = 'Field should not be empty';
    } else if (strlen($occupation) < 2) {
        $occ_error = 'Input correct occupation';
    }
    if (empty($institute_name)) {
        $i_error = 'This Field should not be empty';
    } else if (strlen($institute_name) < 6) {
        $i_error = 'Data length is too less, elaborate';
    }
    if (empty($message1)) {
        $message1_error = 'Messageee Field should not be empty';
    } else if (strlen($message1) < 20) {
        $message1_error = 'Message is less, elaborate yourself and need';
    }
    // if (empty($emp_email)) {
    //     $email_error = 'Email is Required';
    // } else {
    //     if (!filter_var($emp_email, FILTER_VALIDATE_EMAIL)) {
    //         $email_error = 'Email format is not correct.';
    //     }
    // }
    // $query = "SELECT * FROM emp where emp_phone='$emp_phone'";
    // $qu = mysqli_query(
    //     $con,
    //     $query
    // );

    // if (mysqli_num_rows($qu) != 0) {
    //     $phone_error = 'This Phone number already exists';
    // }
    // $query = "SELECT * FROM emp where emp_email='$emp_email'";
    // $qu = mysqli_query(
    //     $con,
    //     $query
    // );

    // if (mysqli_num_rows($qu) != 0) {
    //     $email_error = 'This email already exists';
    // }
    if (empty($cnic)) {
        $cnic_error = 'CNIC Number is Required';
    } else {
        if (!preg_match($pattern, $cnic)) {
            $cnic_error = 'CNIC is not in valid format, follow XXXXX-XXXXXXX-X format';
        }
    }




    if (
        $father_error == '' && $cnic_error == '' && $income_error == '' && $occ_error == '' && $i_error == '' && $message1_error == '' && $amount_error == ''
        && $level_error == '' &&
        $category_error == '' && $city_error ==
        '' && $acc_error == ''
    ) {


        include("config.php");
        $stmt = $DB_con->prepare("SELECT * FROM city where city_name='$city' ");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $city_id = $row['city_id'];
        }
        $age = floor((time() - strtotime($dob)) / (60 * 60 * 24 * 365));
        $sql1 = "UPDATE student set no_of_forms=no_of_forms+1,cnic='$cnic',dob='$dob',age='$age' where id='$id'";
        if (mysqli_query($dbcon, $sql1)) {

            include("config.php");
            $stmt = $DB_con->prepare("SELECT emp_id FROM emp AS T WHERE emp_leftdate IS NULL ORDER BY RAND() LIMIT 1");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $emp_id = $row['emp_id'];
            }

            $current_date = date('Y-m-d');
            $query = "
            INSERT INTO forms 
            (student_id, emp_id, date_filled,category,amount_required,cnic,dob,age,study_level,message,institute_name,father,occupation,Monthly_income,city_id,easypaisa_acc) 
            VALUES ('$id', '$emp_id', '$current_date','$category','$amount_required','$cnic','$dob','$age','$study_level','$message1',
            '$institute_name','$father','$occupation','$Monthly_income','$city_id','$easypaisa_acc')
             ";
            // $query = "
            // INSERT INTO forms 
            // (student_id,emp_id,city_id) 
            // VALUES ('$id', '$emp_id','$city_id')
            //  ";
            if (mysqli_query($dbcon, $query)) {
                $success = 'Form submitted Successfully';
            } else {
                $success = 'Fs';
            }
        } else {
            $success = "For";
        }





        // $statement = $connect->prepare($query);
    }

    $output = array(

        'success'        =>    $success,
        'father_error'    =>    $father_error,
        'income_error'    =>    $income_error,
        'occ_error'    =>    $occ_error,
        'cnic_error'    =>    $cnic_error,
        'message1_error'    =>    $message1_error,
        'i_error'    =>    $i_error,
        'amount_error'    =>    $amount_error,
        'level_error'    =>    $level_error,
        'city_error'    =>    $city_error,
        'category_error'    =>    $category_error,
        'acc_error'    =>    $acc_error,

    );

    echo json_encode($output);
}

?>