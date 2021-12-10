<div class="content-wrapper">


    <div class="table-wrapper" style="background-color: #6e72fc;
  background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 104%); color:white; ">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-8 " style="text-align: center;">
                    <h2 style="font-family: sans-serif; padding-top:1%; padding-bottom:1%"><b> All notifications</b></h2>

                    <!-- -->
                </div>


            </div>

        </div>


    </div>

    <div class="container" style="padding-top:1%">
        <div class="row">

            <!-- /.col -->

            <?php
            $conn = mysqli_connect("localhost", "root", "");
            mysqli_select_db($conn, "base");

            $start = 0;
            $limit = 6;

            if (!empty($_GET)) {
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $start = ($id - 1) * $limit;
                }
            } else {
                $id = 1;
                $start = ($id - 1) * $limit;
            }

            $query = mysqli_query($conn, "select * from notifications order by `date` DESC LIMIT $start, $limit");

            while ($query2 = mysqli_fetch_array($query)) {

                $date = date('F j, Y, g:i a', strtotime($query2['date']));
                if ($query2['status'] == "read") {
                    echo "<div id='he' class='col-md-4'>
        
               <div class='card card-success'>
                    <div class='card-header'>
                    <h3 class='card-title'>" . $query2['name'] . " (" . $query2['type'] . ")</h3>
                     
                    </div>
          <div class='card-body'>
                            " . $query2['message'] . "
          </div>
            <div class='card-body'>
                            <hr>Dated :<u>
                               " . $date . "</u>
                        </div>
          </div>
        </div>";
                } else {
                    echo "<div id='he' class='col-md-4'>
        
               <div class='card card-warning'>
                    <div class='card-header'>
                    <h3 class='card-title' style='color:white'>" . $query2['name'] . " (" . $query2['type'] . ")</h3>
                       <div class=card-tools>
                                <a href='r.php?idd=" . $query2['id'] . "' type='button' name='edit'> <i class='fa fa-check' style='color:white'></i> </a>
                            </div>
                    </div>
          <div class='card-body'>
                            " . $query2['message'] . "
          </div>
            <div class='card-body'>
                            <hr>Dated :<u>
                               " . $date . "</u>
                        </div>
          </div>
        </div>";
                }
            }

            echo "<div class='container'>";

            $rows = mysqli_num_rows(mysqli_query($conn, "select * from notifications"));
            $total = ceil($rows / $limit);
            // echo "<br /><ul class='pager'>";
            // if ($id > 1) {
            //     echo "<li><a style='color:white;background-color : #ad1deb' href='?id=" . ($id - 1) . "'>Previous Page</a><li>";
            // }
            // if ($id != $total) {
            //     echo "<li><a style='color:white;background-color : #ad1deb' href='?id=" . ($id + 1) . "' class='pager'>Next Page</a></li>";
            // }
            // echo "</ul>";


            echo "<ul class='pagination justify-content-center'>";
            if ($id > 1) {
                echo "<li class='page-item'><a style='color:#ad1deb ' class='page-link' href='?id=" . ($id - 1) . "'>Previous Page</a><li>";
            }
            for ($i = 1; $i <= $total; $i++) {
                if ($i == $id) {
                    echo "<li class='page-item active'><a style='background-color:#ad1deb; border-color:#ad1deb' class='page-link' >" . $i . "</a></li>";
                } else {
                    echo "<li class='page-item'><a style='color:#ad1deb; ' class='page-link' href='?id=" . $i . "'>" . $i . "</a></li>";
                }
            }
            if ($id != $total) {
                echo "<li class='page-item'><a style='color:#ad1deb;' class='page-link' href='?id=" . ($id + 1) . "' class='pager'>Next Page</a></li>";
            }
            echo "</ul>";
            echo "</div>";
            ?>

        </div>

    </div>
</div>
<script>
    $(document).ready(function() {
        $('#priceinput').keypress(function(event) {
            return isNumber(event, this)
        });
    });

    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
</script>
<scrip src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
    </script>


    <!-- ./wrapper -->