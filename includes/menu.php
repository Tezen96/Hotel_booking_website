<?php 

include_once("templates/config.php");
if( isset( $_POST['register'] ) ) {
  $name = mysqli_real_escape_string( $conn, $_POST['name'] );
  $email = mysqli_real_escape_string( $conn, $_POST['email'] );
  $phone = mysqli_real_escape_string( $conn, $_POST['phone'] );
  $address = mysqli_real_escape_string( $conn, $_POST['address'] );
  $pincode = mysqli_real_escape_string( $conn, $_POST['pincode'] );
  $dob = mysqli_real_escape_string( $conn, $_POST['dob'] );
  $password = mysqli_real_escape_string( $conn, $_POST['password'] );
  $c_password = mysqli_real_escape_string( $conn, $_POST['c_password'] );

if( $password === $c_password ) {
  $sql = "INSERT INTO registered_users(name, email, phone, address, pincode, dob, password ) VALUES ('{$name}', '{$email}', '{$phone}', '{$address}', '{$pincode}', '{$dob}', '{$password}')";

  $result = mysqli_query( $conn, $sql );
  
  if( $result ) {
    ?>
    <script> alert("Registered Successfully!!!");</script>
    <?php
  } else {
    ?>
    <script> alert("Registered Failed!!!");</script>
    <?php
  }
} else {
  ?>
    <script> alert("Password and confirm password are not matched!!!");</script>
    <?php
}
}
  


if (isset($_POST['login'])) {
  $sql2 = "SELECT * FROM registered_users";
  $result2 = mysqli_query($conn, $sql2);

  if (mysqli_num_rows($result2) > 0) {
      $loginSuccess = false; // Initialize login success as false

      while ($row2 = mysqli_fetch_assoc($result2)) {
          if ($row2['email'] == $_POST['username'] && $row2['password'] == $_POST['password']) {
              session_start();
              $_SESSION['booked_user'] = $_POST['username'];
              $loginSuccess = true;
              break; // Exit the loop once login is successful
          }
      }

      if ($loginSuccess) {
          ?>
          <script>alert("Login successfull!!!");</script>
          <?php
      } else {
          ?>
          <script>alert("Login failed!!!");</script>
          <?php
      }
  } else {
      // No users in the database
      ?>
      <script>alert("No registered users found!!!");</script>
      <?php
  }
}


?>





<nav class="navbar navbar-expand-lg navbar-light bg-primary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="./assets/img/1.jpg" style="width: 70px; height: 70px; border-radius: 50%;" alt="">&nbsp;<span>SG Hotel Booking</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rooms.php">Rooms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="facilitites.php">Facilities</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contactus.php">Contact Us</a>
                </li>
                
                </ul>
                <div>
                  <ul class="login-btns d-flex mt-3">
            <li class="me-3"><button class="login btn btn-secondary">Login</button></li>
            <li><button class=" register btn btn-secondary">Register</button></li>
            </ul>
            </div>
            
    </div>
    </div>
</nav>

<style>
  .login-btns{
    list-style: none;
    }
    .navbar-light .navbar-nav .nav-link{
      color: #fff;
      font-size: 22px;
      margin: 0 20px;
      }
      .navbar-light .navbar-nav .nav-link:hover{
        color: red;
        }
        .navbar .navbar-brand{
          font-size: 30px;
          font-weight: 700;
          color: aqua;
  }
  .navbar .navbar-brand span{
    color: red;
    }
    .register-layer{
      width: 100%;
      height: 90vh;
      background: rgba(0, 0, 0, 0.6);
      position: absolute;
      z-index: 99;
      }
      .register-layer .register-form{
        width: 80%;
        background-color: #fff;
        box-shadow: 0 0 5px 10px gray;
        border-radius: 30px;
        padding: 50px;
        position: relative;
        left: 40px;
        }
        .register-layer i{
          font-size: 30px;
          position: absolute;
          right: 20px;
          top: 10px;
          background-color: #000;
          color: #fff;
          padding: 5px;
          border-radius: 5px;
    cursor: pointer;
  }
  .login-form{
    width: 40%;
    background-color: #fff;
    box-shadow: 0 0 5px 10px gray;
    border-radius: 30px;
    padding: 50px;
    position: relative;
    left: 40px;
    top: 100px;
    }
    </style>



<div id="register-layer" class="register-layer d-none">
  <div class="container-fluid register-form">
    <form action="" method="POST">
      <i id="cancel-register-btn" class="fa-solid fa-xmark cancel-btn"></i>
      <h5 class="text-center text-warning pb-4">Note: Your details must match with your valid ID (Citizenship, PanCard, Driving Licencse etc) that will be required during check-in</h5>
      <div class="row">
        <div class="col-md-6 ps-0 mb-3">
          <label class="form-label">Name</label>
          <input type="text" required name="name" class="form-control shadow-none">
          </div>
          <div class="col-md-6 p-0 mb-3">
            <label class="form-label">Email</label>
            <input type="email" required name="email" class="form-control shadow-none">
            </div>
            <div class="col-md-6 ps-0 mb-3">
      <label class="form-label">Phone Number</label>
      <input type="number" name="phone" required class="form-control shadow-none">
      </div>
      <div class="col-md-12 p-0 mb-3">
      <label class="form-label">Address</label>
      <textarea name="address" required class="form-control shadow-none" rows="1"></textarea>
      </div>
      <div class="col-md-6 ps-0 mb-3">
        <label class="form-label">Pincode</label>
        <input type="number" name="pincode" required class="form-control shadow-none">
        </div>
        <div class="col-md-6 p-0 mb-3">
          <label class="form-label">Date of  Birth</label>
          <input type="date" name="dob" required class="form-control shadow-none">
          </div>
          <div class="col-md-6 ps-0 mb-3">
            <label class="form-label">Password</label>
            <input type="Password" name="password" required class="form-control shadow-none">
            </div>
            <div class="col-md-6 p-0 mb-3">
              <label class="form-label">Confirm Password</label>
              <input type="Password" name="c_password" required class="form-control shadow-none">
              </div>
              <button name="register" class="btn btn-primary">SUBMIT</button>
              </div>
              </form>
              </div>
              </div>
              
              
              
              <div id="login-form" class="register-layer d-none">
                <div class="container-fluid login-form">
                  <form action="" method="POST">
                    <i id="cancel-login-btn" class="fa-solid fa-xmark cancel-btn"></i>
                    
                    
                    <div class="row">
                      <div class=" p-0 mb-3">
                        <label class="form-label">Email</label>
                        <input  name="username" type="email" class="form-control shadow-none">
                        <label class="form-label">Password</label>
      <input name="password" type="Password" class="form-control shadow-none">
      </div>
      
      <button name="login" class="btn btn-primary">SUBMIT</button>
      </div>
      </form>
      </div>
      </div>
      
      
