<?php
include "app/config.php";
include "app/functions.php";
include 'shared/head.php';
include './shared/header.php';

if (!isset($_GET['edit'])) {
    path('stock.php'); // Redirect if no ID is provided
    exit;
}

$id = $_GET['edit'];
$select = "SELECT * FROM stock WHERE id='$id'";
$result = mysqli_query($conn, $select);
$data = mysqli_fetch_assoc($result);
$old_img = $data['image'];

if (!$data) {
    path('stock.php');
    exit;
}

if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $des = mysqli_real_escape_string($conn, $_POST['des']);

    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "./assets/img/stock/" . $image_name;

    if ($image_name) {
        move_uploaded_file($image_tmp, $location);
        unlink("$old_img" ) ;
    } else {
        $location = $data['image'];
    }

    $update = "UPDATE stock SET name='$name', image='$location', price='$price', description='$des' WHERE id='$id'";
    $result = mysqli_query($conn, $update);

    if ($result) {
        path('stock.php'); // Redirect after successful update
        exit;
    } else {
        echo "Error: " . mysqli_error($conn); // Display SQL error if update fails
    }
}

auth();
?>

<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Edit Medicine</h2>
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="stock.php">Stock</a></li>
                    <li>Edit Medicine</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <!-- ======= Edit Form Section ======= -->
    <section class="category-form ">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-8 col-md-12">
                    <div class="form-wrap">
                        <h3 class="text-center mb-4">Edit Medicine</h3>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Medicine Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="<?= $data['name'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="<?= $data['price'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="des" class="form-label">Description</label>
                                <textarea class="form-control" id="des" rows="3" name="des"
                                    required><?= $data['description'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Medicine Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <img src="<?= $data['image'] ?>" alt="Current Image" class="mt-3" style="width: 100px;">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="update" class="btn btn-success">Update Medicine</button>
                                <a href="stock.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Edit Form Section -->

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
                    <p class="text-center">
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
<?php
include './shared/script.php';
?>