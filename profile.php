<?php

include "app/config.php";
include "app/functions.php";
include 'shared/head.php';
include './shared/header.php';

if (isset($_SESSION['users'])) {
    $id = $_SESSION['users']['id'];
    $select = "SELECT * FROM users where id = $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
}

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $profile_img = $_FILES['profile_img'];

    // Validation
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (!preg_match('/^[0-9]{11}$/', $phone)) {
        $errors[] = "Phone must be 10 digits.";
    }

    // Profile image validation
    if ($profile_img['error'] == UPLOAD_ERR_OK) {
        $img_name = basename($profile_img['name']);
        $img_tmp = $profile_img['tmp_name'];
        $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($img_ext, $allowed_ext)) {
            $errors[] = "Invalid image format. Only JPG, JPEG, PNG, and GIF are allowed.";
        } else {
            $new_img_name = "profile_" . $id . "." . $img_ext;
            $img_path = "assets/img/profile/" . $new_img_name;
        }
    }

    // If no errors, proceed with updating the profile
    if (empty($errors)) {
        $update = "UPDATE users SET username='$username', email='$email', phone='$phone' , profile_img='$img_path' WHERE id='$id'";

        $result = mysqli_query($conn, $update);
        if ($result) {
            if (isset($img_path)) {
                // Delete the old profile image
                if (!empty($row['profile_img']) && file_exists($row['profile_img'])) {
                    unlink($row['profile_img']);
                }
                // Move the new image to the correct directory
                move_uploaded_file($img_tmp, $img_path);
            }
            $success = "Profile updated successfully.";
            // Refresh user data
            $select = "SELECT * FROM users where id = $id";
            $s = mysqli_query($conn, $select);
            $row = mysqli_fetch_assoc($s);
        } else {
            $errors[] = "Failed to update profile. Please try again.";
        }
    }
}

auth(2);
?>

<div id="preloader">
    <img class="preloader" src="assets/img/loaders/heart-loading2.gif" alt>
</div>

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

    <div class="container  py-5">
        <div class="card profile-card">
            <div class="card-header text-center bg-success text-white">
                <img src="<?= htmlspecialchars($row['profile_img']) ?>" alt="Profile Picture"
                    class="rounded-circle profile-picture mb-3">
                <h1 class="profile-name mb-0"><?= htmlspecialchars($row['username']) ?></h1>
            </div>
            <div class="card-body bg-body-tertiary">
                <div class="profile-section">
                    <h2>Contact</h2>
                    <p>Email: <?= htmlspecialchars($row['email']) ?></p>
                    <p>Phone: <?= htmlspecialchars($row['phone']) ?></p>
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
        <div class="modal fade" id="profileModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content custom-modal-bg">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Profile</h1>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="bi bi-x"></i></button>
                    </div>
                    <div class="modal-body text-start text-light">
                        <form method="post" enctype="multipart/form-data" id="updateProfileForm">
                            <?php if (!empty($errors)): ?>
                                <div class="alert alert-danger">
                                    <?php foreach ($errors as $error): ?>
                                        <p><?= htmlspecialchars($error) ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($success): ?>
                                <div class="alert alert-success">
                                    <p><?= htmlspecialchars($success) ?></p>
                                </div>
                            <?php endif; ?>

                            <div class="mb-3">
                                <label for="name" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="name" name="username"
                                    value="<?= htmlspecialchars($row['username']) ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?= htmlspecialchars($row['email']) ?>">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    value="<?= htmlspecialchars($row['phone']) ?>">
                            </div>
                            <div class="mb-3">
                                <label for="profile_img" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" id="profile_img" name="profile_img"
                                    accept="image/*">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php

include './shared/script.php';

?>