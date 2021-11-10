
<?php
include("db_conection.php");
if (isset($_POST['order_save'])) {
    $user_id = $_POST['user_id'];
    $order_name = $_POST['order_name'];
    $order_price = $_POST['order_price'];
    $order_quantity = $_POST['order_quantity'];
    $order_total = $order_price * $order_quantity;
    $order_status = 'Pending';



    $s = "select prod_quantity as total from recycledproducts where prod_name='$order_name'";
    $q = mysqli_query($dbcon, $s);
    $values = mysqli_fetch_assoc($q);
    $num_rows = $values['total'];
    echo '<h3 style="color:white">' . $num_rows . ' Pieces</h3>';
    if ($num_rows > 0) {
        $save_order_details = "insert into orderdetails (user_id,order_name,order_price,order_quantity,order_total,order_status,order_date) VALUE ('$user_id','$order_name','$order_price','$order_quantity','$order_total','$order_status',CURDATE())";
        mysqli_query($dbcon, $save_order_details);

        $update_quantity = "update recycledproducts set prod_quantity=prod_quantity-$order_quantity, prod_sold=prod_sold+$order_quantity WHERE prod_name='" . $order_name . "'";
        mysqli_query($dbcon, $update_quantity);

        echo "<script>alert('Item successfully added to cart!')</script>";
        echo "<script>window.open('shop.php?id=1','_self')</script>";
    } else {
        $u = "update recycledproducts set prod_quantity=0 WHERE prod_name=$order_name";
        mysqli_query($dbcon, $u);

        echo "<script>alert('Sorry,This item is Out of stock!')</script>";
        echo "<script>window.open('shop.php?id=1','_self')</script>";
    }
}

?>
