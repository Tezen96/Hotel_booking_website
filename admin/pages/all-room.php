<?php 
// session_start();
if( isset($_SESSION['username'] ) ) {


  include_once("./includes/config.php");

$sql = "SELECT * FROM room";

$result = mysqli_query( $conn, $sql );

?>
<table class="table table-striped">
        <tr>
            <th>S.N</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Facilities</th>
            <!-- <th>Features</th> -->
            <th>Price</th>
            <th>Availability</th>
            <th>Actions</th>
        </tr>

<?php
if( mysqli_num_rows( $result ) > 0 ){
    $i = 1;
  while( $row = mysqli_fetch_assoc( $result ) ) {

    ?>
    <tr>
        <th><?php echo $i; ?></th>
        <th><img src="uploads/<?php echo $row['image']; ?>" height="150px" width="150px" class="img-fluid rounded" alt=""></th>
        <th><?php echo $row['name']; ?></th>
        <th><?php echo $row['description']; ?></th>
        <th><?php echo $row['facilities']; ?></th>
        <!-- <th><?php echo $row['features']; ?></th> -->
        <th><?php echo $row['price']; ?></th>
        <th><?php 
        if( $row['availability'] == 1 ) {
          echo "Available";
        } else {
          echo "Not Available";
        }

        ?></th>
        <th class="d-flex py-5">
            <a href="?page=edit-room&id=<?php echo $row['id']; ?>"><button class=" me-3 btn btn-primary">Edit</button></a>
            <a href="?page=delete-room&id=<?php echo $row['id']; ?>"><button class="btn btn-danger">Delete</button></a>
        </th>
    </tr>
    <?php
    $i++;
  }
}
?>
</table>
<?php
} else {
  header("Location: http://localhost/hbwebsite/admin/login.php");
}
