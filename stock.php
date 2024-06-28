<?php
include "app/config.php";
include "app/functions.php";
include 'shared/head.php';
include './shared/header.php';

// Check user authentication and role
auth(2); // Ensure the user is authenticated and has role 1 (admin)

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

// Check if delete button is clicked
if (isset($_POST['delete'])) {
    $delete_id = mysqli_real_escape_string($conn, $_POST['item_id']);
    $delete_query = "DELETE FROM stock WHERE id = '$delete_id'";
    $delete_result = mysqli_query($conn, $delete_query);

    if ($delete_result) {
        // Redirect to current page after deletion
        path('stock.php');
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Check if edit form is submitted
if (isset($_POST['edit'])) {
    $edit_id = mysqli_real_escape_string($conn, $_POST['edit_id']);
    $edit_name = mysqli_real_escape_string($conn, $_POST['edit_name']);
    $edit_price = mysqli_real_escape_string($conn, $_POST['edit_price']);
    $edit_des = mysqli_real_escape_string($conn, $_POST['edit_des']);

    $edit_query = "UPDATE stock SET name = '$edit_name', price = '$edit_price', description = '$edit_des' WHERE id = '$edit_id'";
    $edit_result = mysqli_query($conn, $edit_query);

    if ($edit_result) {
        // Redirect to current page after edit
        path('stock.php');
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!-- ======= Pre loader ======= -->

<div id="preloader">
    <img class="preloader" src="assets/img/loaders/heart-loading2.gif" alt="">
</div><!-- End pre loader -->

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
                    <?php if ($_SESSION['users']['roleId'] == 1): ?>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Medicine
                        </button>
                    <?php endif; ?>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content custom-modal-bg">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Medicine</h1>
                                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                                </div>
                                <div class="modal-body text-start text-light">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Medicine Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Medicine Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Price</label>
                                            <input type="text" class="form-control" id="title" name="price" placeholder="Medicine Price" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="about" class="form-label">About Medicine</label>
                                            <textarea class="form-control" id="about" rows="3" name="des" placeholder="Description About it" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Medicine Image</label>
                                            <input type="file" class="form-control" id="image" rows="3" name="image" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" name="send" class="btn btn-success">Save Changes</button>
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
                        <?php foreach ($s as $data): ?>
                            <div class="col-lg-3 trending-img col-md-6 mt-4">
                                <div class="category-img text-center">
                                    <img src="<?= $data['image'] ?>" alt="">
                                    <div class="trending-overlay2">
                                        <div class="trending-icon2">
                                            <?php if ($_SESSION['users']['roleId'] == 1): ?>
                                                <!-- Delete form -->
                                                <form action="" method="post">
                                                    <input type="hidden" name="item_id" value="<?= htmlspecialchars($data['id']) ?>">
                                                    <button name="delete" class="btn btn-danger btn-sm">Delete</button>
                                                </form>

                                                <!-- Edit Modal Trigger Button -->
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id'] ?>">
                                                    Edit
                                                </button>

                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="editModal<?= $data['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $data['id'] ?>" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel<?= $data['id'] ?>">Edit Medicine</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" enctype="multipart/form-data">
                                                                    <input type="hidden" name="edit_id" value="<?= htmlspecialchars($data['id']) ?>">
                                                                    <div class="mb-3">
                                                                        <label for="edit_name" class="form-label">Medicine Name</label>
                                                                        <input type="text" class="form-control" id="edit_name" name="edit_name" value="<?= htmlspecialchars($data['name']) ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="edit_price" class="form-label">Price</label>
                                                                        <input type="text" class="form-control" id="edit_price" name="edit_price" value="<?= htmlspecialchars($data['price']) ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="edit_des" class="form-label">About Medicine</label>
                                                                        <textarea class="form-control" id="edit_des" rows="3" name="edit_des" required><?= htmlspecialchars($data['description']) ?></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" name="edit" class="btn btn-primary">Save Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="trending-text mt-3 text-center ">
                                    <h5><a href="" class="cart-item"><?= $data['name'] ?></a></h5>
                                    <span class="span2"><?= $data['price'] ?> EGP</span>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
                    <h3 class="">Pharma Cycle</h3>
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

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php
include './shared/script.php';
?>
