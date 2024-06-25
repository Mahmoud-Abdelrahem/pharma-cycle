<?php

include "app/config.php";
include "app/functions.php";
include './shared/login_head.php';

$emailErorr = [];

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $select = "SELECT * FROM users where email = '$email' and password = '$pass'";
  $s = mysqli_query($conn, $select);
  $row = mysqli_fetch_assoc($s);
  $numRows = mysqli_num_rows($s);

  if ($email == "" || $pass == "") {
    $emailErorr[] = "Email Or Password Can Not Be Empty";
  }
  if ($numRows == 1) {
    $_SESSION['users'] = [
      "email" => $email,
      "id" => $row['id'],
      'roleId' => $row['role']
    ];

    path("index.php");
  } else {
    $emailErorr[] = 'Wrong password or email';
  }
}

?>



<!-- LOADER -->
<div id="preloader">
  <img class="preloader" src="assets/img/loaders/heart-loading2.gif" alt="">
</div>
<!-- END LOADER -->

<div class="d-lg-flex half">
  <div class="bg order-1 order-md-2 mobile-hidden"><img src="assets/img/login-img.png" class="img" alt="login"></div>

  <!-- form login here -->
  <div class="contents order-2 order-md-1 login">

    <div class="container">
      <div class="row mobile-row align-items-center justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="text-center mb-3"> <img src="assets/img/logo-removebg-preview.png" style="width: 100px;" alt="">
          </div>
          <h3 class="login-text"> <strong><span id="element"></span></strong></h3>
          <form action="#" method="post" class="mt-4">
            <div class="form-group first">
              <label for="username">Email :</label>
              <input type="text" name="email" class="form-control input" placeholder="info@example.com" id="username">
            </div>
            <div class="form-group last mb-3">
              <label for="password">Password :</label>
              <input type="password" name="pass" class="form-control input" placeholder="password" id="password">
            </div>

            <?php if (!empty($emailErorr)): ?>
              <div class="alert alert-danger mt-3">
                <ul>
                  <?php foreach ($emailErorr as $error): ?>
                    <li><?= $error ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>

            <div class="d-flex mb-2 align-items-center">
              <span class="me-auto"><a href="#" class="forgot-pass">Forgot Password ?</a></span>
            </div>
            <div class="group-btn">
              <button class="link btn-block btn-success sign-in" name="login">Sign In</button>
              <div class="text-center my-3 or"> <span>OR</span> </div>
              <div class="row mt-3">
                <div class="col-md-6 col-sm-6">
                  <a href="register.php" class="link link-sign-up btn-block btn-dark dark-btn">Sign Up</a>
                </div>
                <div class="col-md-6 col-sm-6">
                  <a href="index.php" class="link link-home btn-block btn-dark">Home</a>
                </div>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- end form -->

  <div class="bg order-1 order-md-2 main-hidden"><img src="assets/img/login-img.png" alt=""></div>

</div>



<script src="./assets/vendor/jQuery/jquery-3.3.1.min.js"></script>
<script src="./assets/vendor/jQuery/popper.min.js"></script>
<script src="assets/vendor/typed/typed.umd.js"></script>
<script src="./assets/js/auth.js"></script>
</body>

</html>