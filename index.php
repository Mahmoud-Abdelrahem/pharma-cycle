<?php

include "app/config.php";
include "app/functions.php";
include 'shared/head.php';
include './shared/header.php';

$select = "SELECT * FROM galary";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);

?>

<div id="preloader">
  <img class="preloader" src="assets/img/loaders/heart-loading2.gif" alt>
</div>

<!-- ======= Hero Section ======= -->
<section class="d-flex align-items-center" id="hero">

  <div class="container">
    <div class="row mobile-hero">
      <div
        class="col-lg-6 col-md-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1"
        data-aos="fade-up">
        <div>
          <h1>Pharma Cycle</h1>
          <h2>You Can buy , add and navigate to your Medicine</h2>
          <a class="download-btn" href="#about"><i class="bx bx-alarm"></i> Get Strated</a>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img"
        data-aos="fade-up">
        <img class="img-fluid img-hero" src="assets/img/home-main.png" alt>
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">

  <section class="about-us" id="about">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>About Us</h2>

      </div>

      <div class="row mobile-about">
        <div class="col-lg-6 col-md-6 mt-5">
          <h3 class="about-text"><strong>Pharma Cycle</strong></h3>
          <p>
          <div class="text-p d-flex">
            <span><i class="bi bi-check about-icon"></i></span>
            Pharma Cycle aims to be a reliable source of medical information, helping users make informed decisions
            about their health and treatment options.
          </div>
          </p><br>
          <p>
          <div class="text-p d-flex">
            <span><i class="bi bi-check about-icon"></i></span>
            providing comprehensive information about various aspects of Pharmaceuticals and healthcare. The site
            typically covers a range of topics including drug information
          </div>
          </p>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="about-img">
            <img src="assets/img/about-us/undraw_svg_2.svg" alt>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= Gallery Section ======= -->
  <section class="gallery" id="gallery">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Pharma Cycle Stock</h2>
        <p>
          You Can See the Latest Medicine in Our Stock , Join us Now and Have a Wonderfull Round in our Stock
        </p>
      </div>

    </div>

    <div class="container-fluid" data-aos="fade-up">
      <div class="gallery-slider swiper">
        <div class="swiper-wrapper">

          <?php foreach ($s as $data) { ?>

            <div class="swiper-slide"><a class="gallery-lightbox" data-gall="gallery-carousel"
                href="<?= $data['image'] ?>"><img class="img-fluid" src="<?= $data['image'] ?>" alt></a>
            </div>
          <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Gallery Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-newsletter">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h4>Join Us Now</h4>
          <p>By joining us you can see what is new in our stock</p>
          <form action="login.php" method="post">
            <input name="email" type="email"><input type="submit" value="Subscribe">
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-top">
    <div class="container">
      <div class="row justify-content-center">

        <div class="col-lg-12 text-center col-md-12 footer-contact">
          <img src="assets/img/logo-removebg-preview.png" alt style="width: 150px;">
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
            <a class="twitter" href="#"><i class="bx bxl-twitter"></i></a>
            <a class="facebook" href="#"><i class="bx bxl-facebook"></i></a>
            <a class="instagram" href="#"><i class="bx bxl-instagram"></i></a>
            <a class="google-plus" href="#"><i class="bx bxl-skype"></i></a>
            <a class="linkedin" href="#"><i class="bx bxl-linkedin"></i></a>
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


<a class="back-to-top d-flex align-items-center justify-content-center" href="#"><i
    class="bi bi-arrow-up-short"></i></a>



<?php
include './shared/script.php';
?>