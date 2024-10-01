<?php

session_start();
if (isset($_SESSION['booked_user'])) {
    include_once("templates/config.php"); // Assuming this file includes the database connection
    include_once("includes/header.php");
    include_once("includes/menu.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Check if the room is already booked by the user
        $checkSql = "SELECT * FROM booked_users WHERE username = '{$_SESSION['booked_user']}' AND id = $id";
        $checkResult = mysqli_query($conn, $checkSql);

        if ($checkResult && mysqli_num_rows($checkResult) == 0) {
            // Fetch the room details
            $sql = "SELECT * FROM room WHERE id = $id";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $data = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }

                // Insert the room details into the booked_users table
                $sql2 = "INSERT INTO booked_users(username, id, name, description, facilities, features, price, status, action) VALUES('{$_SESSION['booked_user']}', $id, '{$data[0]['name']}', '{$data[0]['description']}', '{$data[0]['facilities']}', '{$data[0]['features']}', '{$data[0]['price']}', '{$data[0]['status']}', '0')";
                $result2 = mysqli_query($conn, $sql2);

                $sql3 = "UPDATE TABLE room SET availability = '0'";
                mysqli_query( $conn, $sql3 );

                $sql3 = "UPDATE room SET availability = 0 WHERE id = $id AND availability = 1";

                if (!$result2) {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "No room found with the given ID.";
            }
        } else {
            if ($checkResult) {
                $data = [];
                while ($row = mysqli_fetch_assoc($checkResult)) {
                    $data[] = $row;
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }

        if (!empty($data)) {
            // Display the booked room details
            ?>
            <table class="table table-striped">
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Facilities</th>
                    <!-- <th>Features</th> -->
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($data as $index => $booked) : ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $booked['name']; ?></td>
                        <td><?php echo $booked['description']; ?></td>
                        <td><?php echo $booked['facilities']; ?></td>
                        <!-- <td><?php echo $booked['features']; ?></td> -->
                        <td><?php echo $booked['price']; ?></td>
                        <td><?php echo $booked['status'] == 1 ? "Booked" : "Pending..."; ?></td>
                        <td><?php 
                                if ($booked['action'] == 0) {
                                    ?>
                                    <a href="?id=<?php echo $id; ?>&cancel_id=<?php echo $booked['id']; ?>">Cancel</a>
                                    <?php
                                } else if( $booked['action'] == 2 ) {
                                    ?>
                                    <a href="?id=<?php echo $id; ?>&rebook_id=<?php echo $booked['id']; ?>">Re-Book your room</a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="?id=<?php echo $id; ?>&rebook_id=<?php echo $booked['id']; ?>">Pending your request for cancel...</a>
                                    <?php
                                }
                        ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php
        } else {
            echo "No booked room found.";
        }

        // Handle cancel or rebook actions
        if (isset($_GET['cancel_id'])) {
            $cancel_id = $_GET['cancel_id'];
            $updateSql = "UPDATE booked_users SET action = 1 WHERE id = $cancel_id";
            if (mysqli_query($conn, $updateSql)) {
                ?>
                <script>
                    alert("Cancelled Successfully!!!");
                    window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id; ?>";
                </script>
                <?php
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }

        if (isset($_GET['rebook_id'])) {
            $rebook_id = $_GET['rebook_id'];
            $updateSql = "UPDATE booked_users SET action = 0 WHERE id = $rebook_id";
            if (mysqli_query($conn, $updateSql)) {
                ?>
                <script>
                    alert("Rebooked Successfully!!!");
                    window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id; ?>";
                </script>
                <?php
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }

        include_once("includes/footer.php");
    } else {
        ?>
        <script>
            alert("Please first Login to book the room");
            window.history.back();
        </script>
        <?php
    }
} else {
    ?>
    <script>
        alert("Please first Login to book the room");
        window.history.back();
    </script>
    <?php
}
?>
