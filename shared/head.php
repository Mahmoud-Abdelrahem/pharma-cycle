<?php
session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    path('login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pharma Cycle | Home</title>
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