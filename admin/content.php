<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'add-new-room':
?>
            <h4><?php echo $page; ?></h4>
        <?php
            include_once("pages/add-new-room.php");
            break;

        case 'all-room':
        ?>
            <h4><?php echo $page; ?></h4>
        <?php
            include_once("pages/all-room.php");
            break;


        case 'users':
        ?>
            <h4><?php echo $page; ?></h4>
        <?php
            include_once("pages/users.php");
            break;

        case 'edit-room':
        ?>
            <h4><?php echo $page; ?></h4>
        <?php
            include_once("pages/edit-room.php");
            break;

        case 'register-user':
        ?>
            <h4><?php echo $page; ?></h4>
<?php
            include_once("pages/registered-user.php");
            break;

        case 'delete-room':
            include_once("pages/delete-room.php");
            break;

        case 'booked-room':
            include_once("pages/booking-room.php");
            break;

        case 'booked':
            include_once("pages/booked.php");
            break;

        case 'add-testimonials':
            include_once("pages/add-testimonials.php");
            break;

        case 'all-testimonials':
            include_once("pages/all-testimonials.php");
            break;
            
        case 'edit-testimonials':
            include_once("pages/edit-testimonials.php");
            break;

        case 'delete-testimonials':
            include_once("pages/delete-testimonials.php");
            break;


        case 'logout':
            include_once("pages/logout.php");
            break;
    }
}

?>