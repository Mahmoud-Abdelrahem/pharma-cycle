<?php
include "app/config.php";
include "app/functions.php";

$select = "SELECT * FROM stock";
$s = mysqli_query($conn, $select);

if (isset($_POST['send'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $des = mysqli_real_escape_string($conn, $_POST['des']);

    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "./assets/img/stock/" . $image_name;

    if (move_uploaded_file($image_tmp, $location)) {

        $insert = "INSERT INTO stock (name, image, price, description) VALUES ('$name', '$location', '$price', '$des')";
        $result = mysqli_query($conn, $insert);

        if ($result) {
            path('stock.php'); // Redirect after successful insertion
            exit;
        } else {
            echo "Error: " . mysqli_error($conn); // Display SQL error if insertion fails
        }
    } else {
        echo "Error uploading file."; // Display error if file upload fails
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pharma Cycle | Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logo-removebg-preview.png" rel="icon">
    <link href="assets/img/logo-removebg-preview.png" rel="apple-touch-icon">

    <!-- fontaowseme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

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


    <!-- ======= Pre loader ======= -->

    <div id="preloader">
        <img class="preloader" src="assets/img/loaders/heart-loading2.gif" alt="">
    </div><!-- End pre loader -->

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="index.php" style="color: #050505;"> <img src="assets/img/logo-removebg-preview.png" alt=""
                        style="width: 50px;" class=""> <span>Pharma Cycle</span> </a>
            </div>

            <nav id="navbar" class="navbar me-auto">
                <ul class="">
                    <li><a class="active " href="index.php">Home</a></li>
                    <li><a href="index.php#about">About Us</a></li>
                    <li><a href="stock.php">Stock</a></li>
                    <li><a href="index.php#gallery">Galary Stock</a></li>



                </ul>

            </nav><!-- .navbar -->


            <i class="fa-solid fa-bars-staggered mobile-nav-toggle"></i>
            <div class="login-nav">

            <?php if (isset($_SESSION['users'])) {?>
        <a class="btn-login" href="profile.php">
          <i class="bi bi-person"></i>
        </a>
        <a href="logout" class="btn-login log-out">
          <i class="bi bi-box-arrow-in-right"></i>
        </a>
        <?php } else {?>
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
                    <h2>Stock </h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Stock </li>
                    </ol>
                    <div class="action text-center">

                        <!-- Button trigger modal -->
                        
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Add Mediceine
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content custom-modal-bg">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Medicine</h1>
                                        <button type="button" class="btn btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"><i class="bi bi-x"></i></button>
                                    </div>
                                    <div class="modal-body text-start text-light">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Mediceine Name</label>
                                                <input type="text" class="form-control" id="name"
                                                   name="name" placeholder="Medicine Name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Price</label>
                                                <input type="text" class="form-control" id="title"
                                                    name="price"   placeholder="Medicine Price ">
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="tel" class="form-control" id="phone"
                                                    name="phone" placeholder="Order Phone">
                                            </div>
                                            <div class="mb-3">
                                                <label for="about" class="form-label">About Mediceine</label>
                                                <textarea class="form-control" id="about" rows="3"
                                                name="des" placeholder="Description About it"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="image" class="form-label">Mediceine Image</label>
                                                <input type="file" class="form-control" id="image" rows="3"
                                                name="image" ></input>
                                            </div>

                                            <div class="modal-footer">
                                        <button type="button" class="btn btn-dark"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="send" class="btn btn-success">Save changes</button>
                                    </div>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section> <!-- End Breadcrumbs Section -->


        <!-- category-form -->
        <section class="category-form ">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="row">
                        <?php foreach ($s as $data) {?>
                            <div class="col-lg-3 trending-img col-md-6 mt-4">
                                <div class="category-img text-center">
                                    <img src="<?=$data['image']?>" alt="">
                                    <div class="trending-overlay2">
                                        <div class="trending-icon2">

                                        <form action="submit.php" method="post">
                                            <input type="hidden" name="item_id" value="<?=htmlspecialchars($data['id'])?>">
                                            <button name="add" class="btn-a" type="submit">Order Now</button>
                                        </form>

                                        </div>
                                    </div>
                                </div>
                                <div class="trending-text mt-3 text-center ">
                                    <h5><a href="" class="cart-item"><?=$data['name']?></a></h5>
                                    <span class="span2"><?=$data['price']?> EGP</span>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End category-form -->
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h4>Join Us Now</h4>
                        <p>By joining us you can see what is new in our stock</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-12 text-center col-md-12 footer-contact">
                        <img src="assets/img/logo-removebg-preview.png" style="width: 150px;" alt="">
                        <h3 class="">
                        Pharma Cycle

                        </h3>
                        <p class="text-cneter">
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>

                        </p>
                    </div>

                    <div class="col-lg-4 col-md-4 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="index.php#about">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="stock.php">Stock</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="login.php">Login</a></li>

                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-4 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Medical Solutions</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="stock.php">Stock</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Medicine Controlling</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Life Caring</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-4 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Pharma Cycle</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed and Coded by <a href="#">Pharma Cycle</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jQuery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/jQuery/popper.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="./assets/js/main.js"></script>

</body>

</html>