  <?php
    $connect = mysqli_connect("localhost", "root", "", "base");
    if (!empty($_POST)) {
        $output = '';
        $msg = '';
        $message = mysqli_real_escape_string($connect, $_POST["message"]);

        if ($_POST["id"] != '') {
            $query = "  
           UPDATE latest_news   
           SET message='$message',   
           date=CURRENT_DATE();   
           WHERE id='" . $_POST["id"] . "'";
            $msg = 'Message Updated';
        } else {

            $msg = 'Fail Updation';
        }
        // if (mysqli_query($connect, $query)) {
        //     $output .= '<label class="text-success">' . $message . '</label>';
        //     $select_query = "SELECT * FROM tbl_employee ORDER BY id DESC";
        //     $result = mysqli_query($connect, $select_query);
        //     $output .= '  
        //         <table class="table table-bordered">  
        //              <tr>  
        //                   <th width="70%">Employee Name</th>  
        //                   <th width="15%">Edit</th>  
        //                   <th width="15%">View</th>  
        //              </tr>  
        //    ';
        //     while ($row = mysqli_fetch_array($result)) {
        //         $output .= '  
        //              <tr>  
        //                   <td>' . $row["name"] . '</td>  
        //                   <td><input type="button" name="edit" value="Edit" id="' . $row["id"] . '" class="btn btn-info btn-xs edit_data" /></td>  
        //                   <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
        //              </tr>  
        //         ';
        //     }
        //     $output .= '</table>';
        // }
        echo $msg;
    }
    ?>