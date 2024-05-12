<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

// Redirect to login page if user is not logged in
if (strlen($_SESSION['user_id']) == 0) {
    header('location:../login.php');
    exit();
}

if (isset($_POST['update'])) {
    $form_id = $_GET['form_id'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];

    // Get the selected delivery person ID from the form
    $assigned_delivery_person_id = $_POST['delivery_person'];

    // Update order status in users_orders table
    $update_order_sql = "UPDATE users_orders SET status = '$status' WHERE o_id = '$form_id'";
    mysqli_query($db, $update_order_sql);

    // Insert remark into remark table
    $insert_remark_sql = "INSERT INTO remark(frm_id, status, remark) VALUES ('$form_id', '$status', '$remark')";
    mysqli_query($db, $insert_remark_sql);

    // Assign the order to the selected delivery person
    if (!empty($assigned_delivery_person_id)) {
        $assign_order_sql = "UPDATE users_orders SET assigned_delivery_person_id = '$assigned_delivery_person_id' WHERE o_id = '$form_id'";
        mysqli_query($db, $assign_order_sql);
    }

    echo "<script>alert('Order Details Updated Successfully');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Update</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div style="margin-left:50px;">
    <form name="updateticket" id="updatecomplaint" method="post">
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td><b>Form Number</b></td>
                <td><?php echo htmlentities($_GET['form_id']); ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><b>Status</b></td>
                <td>
                    <select name="status" required="required">
                        <option value="">Select Status</option>
                        <option value="in process">On the way</option>
                        <option value="closed">Delivered</option>
                        <option value="rejected">Cancelled</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>Assign Delivery Person</b></td>
                <td>
                    <select name="delivery_person" required="required">
                        <option value="">Select Delivery Person</option>
                        <?php
                        // Fetch all delivery personnel from the database
                        $delivery_person_sql = "SELECT * FROM delivery_persons";
                        $delivery_person_result = mysqli_query($db, $delivery_person_sql);

                        while ($row = mysqli_fetch_assoc($delivery_person_result)) {
                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>Message</b></td>
                <td><textarea name="remark" cols="50" rows="10" required="required"></textarea></td>
            </tr>
            <tr>
                <td><b>Action</b></td>
                <td>
                    <input type="submit" name="update" class="btn btn-primary" value="Submit">
                    <input type="button" name="close" class="btn btn-danger" value="Close this window" onclick="window.close();" />
                </td>
            </tr>
        </table>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
