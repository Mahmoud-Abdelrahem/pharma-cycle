<?php
include "app/config.php";


if (isset($_SESSION['users'])) {
    $id = $_SESSION['users']['id'];
    $select = "SELECT * FROM users where id = $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile Page</title>
    <meta name="description" content>
    <meta name="keywords" content>

    <!-- Favicons -->
    <link href="assets/img/logo-removebg-preview.png" rel="icon">
    <link href="assets/img/logo-removebg-preview.png" rel="apple-touch-icon">

    <!-- icon fontawoseme -->
    <link href="assets/css/font-icon/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!--  Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <div id="preloader">
        <img class="preloader" src="assets/img/loaders/heart-loading2.gif" alt>
    </div>


    <!-- ======= Header ======= -->
    <header class="fixed-top d-flex align-items-center" id="header">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="index.php" style="color: #050505;"> <img class src="assets/img/logo-removebg-preview.png" alt
                        style="width: 50px;"> <span class="header-title-main">Pharma Cycle</span> </a>
            </div>

            <nav class="navbar me-auto" id="navbar">
                <ul class="">
                    <li><a class="active " href="index.php">Home</a></li>
                    <li><a href="index.php#about">About Us</a></li>
                    <li><a href="stock.php">Stock</a></li>
                    <li><a href="#gallery">Galary Stock</a></li>



                </ul>

            </nav><!-- .navbar -->



            <i class="fa-solid fa-bars-staggered mobile-nav-toggle"></i>
            <div class="login-nav">
            <?php if (isset($_SESSION['users'])) {?>
       
        <a href="logout" class="btn-login log-out">
          <i class="bi bi-box-arrow-in-right"></i>
        </a>
        <?php }else{?>
        <a class="btn-login" href="login.php">
          <i class="bi bi-lock"></i>
        </a>
        <?php }?>
            </div>

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2><strong>Profile</strong></h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li><strong>Profile</strong></li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->
        <div class="container mt-5 py-5">
            <div class="card profile-card">
                <div class="card-header text-center bg-success text-white">
                    <img src="assets/img/details-1.png" alt="Profile Picture"
                        class="rounded-circle profile-picture mb-3">
                    <h1 class="profile-name mb-0"><?= $row['username'] ?></h1>
                    <p class="profile-title">Pharmaceutical Specialist</p>
                </div>
                <div class="card-body bg-body-tertiary">
                    <div class="profile-section mb-4">
                        <h2>About Me</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lacinia velit quis dolor
                            pulvinar, ac bibendum mi lacinia.</p>
                    </div>

                    <div class="profile-section">
                        <h2>Contact</h2>
                        <p>Email: <?= $row['email'] ?></p>
                        <p>Phone: <?= $row['phone'] ?></p>
                    </div>
                    <div class="row justify-content-center m-0 p-0">
                        <div class="action col-md-4">
                            <button class="btn text-light btn-login" data-bs-toggle="modal"
                                data-bs-target="#profileModel">Edit Profile <i class="bi bi-upload"></i></button>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="edit-profile">
            <div class="modal fade" id="profileModel" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content custom-modal-bg">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Profile</h1>
                            <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="bi bi-x"></i></button>
                        </div>
                        <div class="modal-body text-start text-light">
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">User Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="John Doe">
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="title"
                                        placeholder="pharma@gmail.com">
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="(123) 456-7890">
                                </div>
                                <div class="mb-3">
                                    <label for="about" class="form-label">About Me</label>
                                    <textarea class="form-control" id="about" rows="3"
                                        placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lacinia velit quis dolor pulvinar, ac bibendum mi lacinia."></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description" placeholder="Backend Developer">
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-success">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jQuery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/jQuery/popper.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>
