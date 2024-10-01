<?php
  include_once("includes/header.php");
    include_once("includes/menu.php");
    ?>
<!------ Include the above in your HEAD tag ---------->
<?php 

include_once("./templates/config.php");





if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
   
    $sql = "INSERT INTO users(name, email, phone, messaage) VALUES( '{$name}', '{$email}', '{$phone}', '{$message}')";

    $result = mysqli_query( $conn, $sql );

    if( $result ) {
        ?>
        <script>alert("Message submit successfully!!!")</script>
        <?php
    } else {
        ?>
        <script>alert("Message submit failed!!!")</script>
        <?php
    }


    
}
?>
<div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form method="post">
                <h3>Contact Us</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <input type="text" required name="name" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group mb-2">
                            <input type="email" required name="email" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group mb-2">
                            <input type="number" required name="phone" class="form-control" placeholder="Your Phone Number *" value="" />
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="message" required class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                            <button name="submit" class="btn btn-primary py-2 px-5 text-uppercase fs-5">Submit</button>
                        </div>
                </div>
            </form>
</div>

<style>

body{
    background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
}
.contact-form{
    background: #fff;
    margin-top: 10%;
    margin-bottom: 5%;
    width: 70%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: -3%;
    transform: rotate(29deg);
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: #0062cc;
}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
}

</style>


<div class="reach py-5" style="background: #EAEAEA;">
    <div class="container py-5">
        <h2 class="text-center py-4">Reach Us</h2>
        <div class="row">
        <div class="col-8 bg-light text-center py-5 border-rounded">
            <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14130.927050714707!2d85.32951860188965!3d27.69468421903351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199a06c2eaf9%3A0xc5670a9173e161de!2sNew%20Baneshwor%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1716451744163!5m2!1sen!2snp" width=800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>


        <div class="col-3 mx-3  text-left px-3 py-5 border-rounded">
            <div class="bg-light px-3 py-3">
            <h4>Call Us</h4>
            

            <div class="d-flex">
            
            <i class=" pt-1 pe-2 fa-solid fa-phone" aria-hidden="true"></i><p>+977-9865765116</p>
            </div>
            <div class="d-flex">
            
            <i class=" pt-1 pe-2 fa-solid fa-phone" aria-hidden="true"></i><p>+977-9865745786</p>
            </div>
            <div class="d-flex">
            
            <i class=" pt-1 pe-2 fa-solid fa-envelope" aria-hidden="true"></i><p>sagarbista@gmail.com</p>
            </div>
            <div class="d-flex">
            
            <i class="fa-solid fa-address-book me-2"></i><p>Baneshwor, Kathmandu, Nepal</p>
            </div>
            </div>
            

            <!--Follow us section-->
      
            <div class="bg-light px-3 py-3">
            <a href ="#" class="d-inline-block mb-3">
                <span class="badge bg-light text-dark fs-6 p-2">
                <i class="fa-brands fa-instagram me-1"> Instagram</i>
                </span>
                </a>
                <br>
                <a href ="https://www.facebook.com/profile.php?id=61556267917387" target="_blank" class="d-inline-block mb-3">
                <span class="badge bg-light text-dark fs-6 p-2">
                <i class="fa-brands fa-facebook me-1"> Facebook</i>
                </span>
                </a>
                <br>
                <a href ="#" class="d-inline-block mb-3">
                <span class="badge bg-light text-dark fs-6 p-2">
                <i class="fa-brands fa-twitter me-1"> Twitter</i>
            </span>
                
            </a>
        </div>
        </div>
    </div>
</div>






<?php
  include_once("includes/footer.php");
    ?>