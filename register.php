<?php
include "app/config.php";
include "app/functions.php";

$emailError = [];
$name = "";
$email = "";
$phone = null;

if (isset($_POST['signup'])) {

    $name = filterValidation($_POST['name']);
    $email = filterValidation($_POST['email']);
    $phone = $_POST['phone'];
    $pass = filterValidation($_POST['pass']);
    $confirmPass = filterValidation($_POST['confirm']);

    $select = "SELECT * FROM users ";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);

    if ($email == "" || $pass == "" || $phone == '' || $name == '' || $confirmPass == "") {
        $emailErorr[] = "Email Or Password Can Not Be Empty";
    } else if (stringValidation($name, 4)) {
        $emailErorr[] = "please enter valid name more than 4 characters";
    } else if ($pass != $confirmPass) {
        $emailErorr[] = "Password and Confirm Password do not match";
    } else if (stringValidation($pass, 8)) {
        $emailErorr[] = "Password must be more than 8 characters";
    }
    foreach ($s as $data) {
        if ($data['email'] == $email) {
            $emailErorr[] = "Email is not available";
        }
    }

    if (empty($emailErorr) && empty($emailErorr2)) {
        $random_code = time();
        $_SESSION['registerd'] = [
            "target_email" => $email,
            "code" => $random_code,
            "name" => $name,
            "phone" => $phone,
            "pass" => $pass,
            "confirm_pass" => $confirmPass,
        ];
        $insert = " INSERT INTO users VALUES (null , '$name' , '$email' , '$phone' , '$pass' , $confirmPass , 2 , "assets/uploads/img/prof.jpg")";
        $i = mysqli_query($conn, $insert);
        path('login.php');

    }
}

?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/img/logo.jpeg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min4.css">

    <!-- Style -->
    <link rel="stylesheet" href="assets/css/auth.css">

    <title>Login</title>
</head>

<body>

    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="assets/img/loaders/heart-loading2.gif" alt="">
    </div>
    <!-- END LOADER -->

    <div class="d-lg-flex half">
        <div class="bg order-2 order-md-2  mobile-hidden"><img src="assets/img/Sign up-bro.png" class="img register-img mt-5"
                alt="login">
        </div>

        <!-- form reg here -->
        <div class="contents order-1 order-md-1 register-login">
            <div class="container">
                <div class="row mobile-row register-row align-items-center justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="text-center mb-3"> <img src="assets/img/logo-removebg-preview.png"
                                style="width: 100px;" alt="">
                        </div>
                        <h3 class="login-text"> <strong><span id="element"></span></strong></h3>
                        <form action="#" method="post" class="mt-4">
                            <div class="form-group first">
                                <label for="username">Username :</label>
                                <input type="text" class="form-control input" placeholder="Username" name="name"
                                    id="username">
                            </div>

                            <div class="form-group first">
                                <label for="username">Email :</label>
                                <input type="text" class="form-control input" placeholder="info@gmail.com"
                                name="email"  id="username">
                            </div>
                            <div class="form-group first">
                                <label for="username">Phone :</label>
                                <input type="text" name="phone" class="form-control input" placeholder="Enter Your Phone" id="username">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password :</label>
                                <input type="password" name="pass" class="form-control input" placeholder="password" id="password">
                            </div>

                            <div class="form-group last mb-3">
                                <label for="password">Confirm Password :</label>
                                <input type="password" name="confirm" class="form-control input" placeholder="Confirm password" id="password">
                            </div>


                            <?php if (!empty($emailErorr)): ?>
                                <div class="alert alert-danger mt-3">
                                    <ul>
                                        <?php foreach ($emailErorr as $error): ?>
                                            <li><?=$error?></li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            <?php endif;?>


                            
                            <div class="group-btn mb-5">
                                <button class="link btn-block btn-success sign-in" name="signup">Sign Up</button>
                                <div class="text-center my-3 or"> <span>OR</span> </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <a href="login.php" class="link link-sign-up btn-block btn-primary">Sign In</a>
                                    </div>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end form -->


        <div class="bg order-1 order-md-2  main-hidden"><img src="assets/img/Sign up-bro.png" alt=""></div>

    </div>



    <script src="./assets/vendor/jQuery/jquery-3.3.1.min.js"></script>
    <script src="./assets/vendor/jQuery/popper.min.js"></script>
    <script src="assets/vendor/typed/typed.umd.js"></script>
    <script src="./assets/js/auth.js"></script>
</body>

</html>
