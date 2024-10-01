<?php 
include_once("includes/config.php");
// Check if 'id' is set in the URL and update the status
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $updateSql = "UPDATE booked_users SET status = 1 WHERE id = $id";
    if (mysqli_query($conn, $updateSql)) {
        header("Location: http://localhost/hbwebsite/admin/?page=booked-room");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

if( isset( $_GET['cancel_by_user_id'] ) ) {
    $id = $_GET['cancel_by_user_id'];
    $updateSql = "UPDATE booked_users SET action = 2 WHERE id = $id";
    if (mysqli_query($conn, $updateSql)) {
        header("Location: http://localhost/hbwebsite/admin/?page=booked-room");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

