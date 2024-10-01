<?php 

include_once("includes/config.php");

$id = $_GET['id'];

$sql = "DELETE FROM room WHERE id = $id";

$result = mysqli_query( $conn, $sql );

if( $result ){
    header( "Location: http://localhost/hbwebsite/admin/?page=all-room" );
}