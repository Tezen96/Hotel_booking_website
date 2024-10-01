

<?php include_once("includes/header.php");
session_start();
if( isset( $_SESSION['username'] ) ) {
 ?>
 <div class="admin d-flex">
    <div class="menu " style="width: 20%;">
        <ul>
                <h4 class="">Welcome to dashboard</h4>
                <li><a class="text-decoration-none text-light" href="?page=add-new-room">Add New Room</a></li>
                <li><a class="text-decoration-none text-light" href="?page=all-room">All Room</a></li>
                <li><a class="text-decoration-none text-light" href="?page=users">User Enquiry</a></li>
                <li><a class="text-decoration-none text-light" href="?page=register-user">Registered Users</a></li>
                <li><a class="text-decoration-none text-light" href="?page=booked-room">Room Booked</a></li>
                <li><a class="text-decoration-none text-light" href="?page=add-testimonials">Add Testimonials</a></li>
                <li><a class="text-decoration-none text-light" href="?page=logout">Logout</a></li>
            </ul>
    </div>
    <div class="content p-5" style="width: 80%;">
        
        <?php include_once("content.php"); ?>
    </div>
</div>
 <?php
 include_once("includes/footer.php");
} else {
    header("Location: http://localhost/hbwebsite/admin/login.php");
}


?>

