<style>
    .register-layer{
        background: #000;
        width: 100%;
        padding: 193px 0;
    }
    .register-layer .container{
        background: #fff;
        width: 20%;
        margin: auto;
        padding: 50px;
        border-radius: 30px;
        /* line-height: 60px; */
    }
    .register-layer .container input{
        width: 100%;
        padding: 10px;
        margin-bottom: 40px;
        border-radius: 10px;
        border: none;
        background-color: gray;
    }
    .register-layer .container button{
        background: blue;
        padding: 15px 30px;
        color: #fff;
        border: none;
        border-radius: 20px;
        
    }
    h2{
        text-align: center;
    }
</style>

<?php 

if( isset($_POST['login'] ) ) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if( $username === 'sagar@gmail.com' && $password === '1234' ) {
        session_start();
        $_SESSION['username'] = $username;

        header("Location: http://localhost/hbwebsite/admin/");
    } else {
        ?>
        <script>alert("Please enter correct username and password");</script>
        <?php
    }
}


?>

<div id="login-form" class="register-layer d-none">
    <div class="container">
        <form action="" method="POST">
            <i id="cancel-login-btn" class="fa-solid fa-xmark cancel-btn"></i>


            <div class="row">
                <h2>Please Login</h2>
                <div class=" p-0 mb-3">
                    <label class="form-label">Email:</label>
                    <input name="username" type="email" class="form-control shadow-none"><br>
                    <label class="form-label">Password:</label>
                    <input name="password" type="Password" class="form-control shadow-none">
                </div>

                <button name="login" class=" btn btn-primary">LOGIN</button>
            </div>
        </form>
    </div>
</div>