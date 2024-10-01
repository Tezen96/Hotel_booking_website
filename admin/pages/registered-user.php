<?php 
// session_start();
if( isset($_SESSION['username'] ) ) {
   

    include_once("./includes/config.php");

$sql = "SELECT * FROM registered_users";

$result = mysqli_query( $conn, $sql );

?>
<table class="table table-striped">
        <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Pincode</th>
            <th>DOB</th>
        </tr>

<?php
if( mysqli_num_rows( $result ) > 0 ){
    $i = 1;
  while( $row = mysqli_fetch_assoc( $result ) ) {

    ?>
    <tr>
        <td><?php echo $i; ?></th>
        <td><?php echo $row['name']; ?></th>
        <td><?php echo $row['email']; ?></th>
        <td><?php echo $row['phone']; ?></th>
        <td><?php echo $row['address']; ?></th>
        <td><?php echo $row['pincode']; ?></th>
        <td><?php echo $row['dob']; ?></th>
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
