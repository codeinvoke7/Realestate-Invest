<?php
require "./database/database.php";
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- required meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <base href="/">
    <!-- #favicon -->
    <link rel="shortcut icon" href="views/assets/images/favicon.png" type="image/x-icon" />
    <!-- #title -->
    <title>Revest &dash; Real Estate Investment For Everyone</title>
    <!-- #keywords -->
    <meta name="keywords" content="Real Estate, Investment, Properties, Rent" />
    <!-- #description -->
    <meta name="description" content="Real Estate Investment For Everyone" />
    <!-- #author -->
    <meta name="author" content="Pixelaxis" />

    <!-- ==== css dependencies start ==== -->

    <!-- bootstrap five css -->
    <link rel="stylesheet" href="views/assets/vendor/bootstrap/css/bootstrap.min.css" />
    <!-- font awesome six css -->
    <link rel="stylesheet" href="views/../assets/vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- nice select css -->
    <link rel="stylesheet" href="views/assets/vendor/nice-select/css/nice-select.css" />
    <!-- magnific popup css -->
    <link rel="stylesheet" href="views/assets/vendor/magnific-popup/css/magnific-popup.css" />
    <!-- slick css -->
    <link rel="stylesheet" href="views/assets/vendor/slick/css/slick.css" />
    <!-- animate css -->
    <link rel="stylesheet" href="views/assets/vendor/animate/animate.css" />

    <!-- ==== css dependencies end ==== -->

    <!-- main css -->
    <link rel="stylesheet" href="views/assets/css/style.css" />

    

</head>

<body>

<header class="header">
        <nav class="navbar navbar-expand-xl">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="views/assets/images/logo.png" alt="Logo" class="logo" />
                </a>
                <div class="navbar__out order-2 order-xl-3">
                    <?php 
                    if (isset($_SESSION['user_name'])) {
                        ?>
                        <div class="nav__group__btn">
                        <a href="users/dashboard" class="button button--effect d-none d-sm-block"> Dashboard <i
                                class="fa-solid fa-arrow-right-long"></i> </a>
                    </div>
                    <?php
                    }else{
                        ?>
                    <div class="nav__group__btn">
                        <a href="login" class="log d-none d-sm-block"> Log In </a>
                        <a href="registration" class="button button--effect d-none d-sm-block"> Join Now <i
                                class="fa-solid fa-arrow-right-long"></i> </a>
                    </div>
                    <?php
                    }
                    ?>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNav"
                        aria-controls="primaryNav" aria-expanded="false" aria-label="Toggle Primary Nav">
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse order-3 order-xl-2" id="primaryNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarHomeDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Home
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarHomeDropdown">
                                <li><a class="dropdown-item" href="/">Home</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarPropertyDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Properties
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarPropertyDropdown">
                                <li><a class="dropdown-item" href="properties">Properties</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="list-your-property.html">List your property</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.html">Contact</a>
                        </li>
                        <?php 
                    if (isset($_SESSION['user_name'])) {
                        ?>
                        <li class="nav-item d-block d-sm-none">
                            <a href="users/dashboard" class="button button--effect button--last">Dashboard <i
                                    class="fa-solid fa-arrow-right-long"></i></a>
                        </li>
                        <?php
                    }else{
                        ?>
                        <li class="nav-item d-block d-sm-none">
                            <a href="login" class="nav-link">Log In</a>
                        </li>
                        <li class="nav-item d-block d-sm-none">
                            <a href="registration" class="button button--effect button--last">Join Now <i
                                    class="fa-solid fa-arrow-right-long"></i></a>
                        </li>
                        <?php
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>