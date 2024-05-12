<?php
include("../connection/connect.php");
session_start();

if(isset($_POST['send_to_delivery'])) {
    $order_id = $_POST['order_id'];

    // Update order status to 'in process'
    $update_query = "UPDATE users_orders SET status = 'in process' WHERE o_id = '$order_id'";
    mysqli_query($db, $update_query);

    // Here you would typically assign the order to a delivery person or system
    // You can add further logic for assigning delivery personnel or tracking systems

    echo "<script>alert('Order sent to delivery successfully.');</script>";
    echo "<script>window.location.href = 'all_orders.php';</script>";
}
?>
