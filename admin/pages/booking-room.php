<?php
include_once("includes/config.php");



$sql = "SELECT * FROM booked_users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
?>

<table class="table table-striped">
    <tr>
        <th>S.N</th>
        <th>Username</th>
        <th>Name</th>
        <th>Description</th>
        <th>Facilities</th>
        <!-- <th>Features</th> -->
        <th>Price</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php
    $i = 1; // Initialize the counter outside the loop
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['facilities']; ?></td>
        <!-- <td><?php echo $row['features']; ?></td> -->
        <td><?php echo $row['price']; ?></td>
        <td>
            <?php 
            if ($row['status'] == 0) {
                ?>
                <a href="?page=booked&id=<?php echo $row['id']; ?>">Pending</a>
                <?php
            } else {
                echo "Booked";
            }
            ?>
        </td>
        
        <td>
        <?php 
            if ($row['action'] == 1) {
                ?>
                <a href="?page=booked&cancel_by_user_id=<?php echo $row['id']; ?>">Requested for Cancel</a>
                <?php
            } else if( $row['action'] == 2 ){
                echo "Cancelled";
            } else {
                echo "booked";
            }
            ?>
        </td>
    </tr>
    <?php
    $i++; // Increment the counter inside the loop
    }
    ?>
</table>

<?php
} else {
    echo "No records found.";
}
?>
