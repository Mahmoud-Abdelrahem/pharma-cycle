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
                <li><a href="index.php#gallery">Galary Stock</a></li>

            </ul>

        </nav><!-- .navbar -->



        <i class="fa-solid fa-bars-staggered mobile-nav-toggle"></i>
        <div class="login-nav">
            <?php if (isset($_SESSION['users'])) { ?>
                <div class="btns d-flex">
                    <a class="btn-login" href="profile.php">
                        <i class="bi bi-person"></i>
                    </a>
                    <form action="" class="mt-0">
                        <button name="logout" class="btn-login log-out ">
                            <i class="bi bi-box-arrow-in-right"></i>
                        </button>
                    </form>
                </div>
            <?php } else { ?>
                <a class="btn-login" href="../login.php">
                    <i class="bi bi-lock"></i>
                </a>
            <?php } ?>


        </div>

    </div>
</header><!-- End Header -->