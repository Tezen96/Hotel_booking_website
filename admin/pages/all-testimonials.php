<?php 
// session_start();
if( isset($_SESSION['username'] ) ) {


  include_once("./includes/config.php");

$sql = "SELECT * FROM testimonials";

$result = mysqli_query( $conn, $sql );

?>
<table class="table table-striped">
        <tr>
            <th>S.N</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>

<?php
if( mysqli_num_rows( $result ) > 0 ){
    $i = 1;
  while( $row = mysqli_fetch_assoc( $result ) ) {

    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><img src="uploads/<?php echo $row['image']; ?>" height="150px" width="150px" class="img-fluid rounded" alt=""></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td class="d-flex py-5">
            <a href="?page=edit-testimonials&id=<?php echo $row['id']; ?>"><button class=" me-3 btn btn-primary">Edit</button></a>
            <a href="?page=delete-testimonials&id=<?php echo $row['id']; ?>"><button class="btn btn-danger">Delete</button></a>
        </td>
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
