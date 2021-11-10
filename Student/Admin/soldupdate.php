<?php

include("config.php");


if (isset($_POST['finished'])) {

    $id = $_GET['view_id'];

    $quantity = $_POST['order_quantity'];
    $name = $_POST['order_name'];





    $query = "update recycledproducts set prod_quantity=prod_quantity-$quantity,prod_sold=prod_quantity+$quantity  where prod_name=$name";

    $res = mysqli_query($con, $query);
    if ($res) {
?>
        <script>
            alert("Recycleable item data updated successfully");

            window.location.href = "view_orders.php";
        </script>
    <?php
    } else {

    ?>
        <script>
            alert("customer data NOT updated properly");
        </script>
<?php
    }
}
