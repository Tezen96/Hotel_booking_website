<?php 


$servername = "localhost";
$username = "root";
$password = "";
$db_name = "hotel";

$conn = mysqli_connect( $servername, $username, $password, $db_name );

if( $conn ) {
    return $conn;
} else {
    echo "Connection is failed!!!";
}


?>