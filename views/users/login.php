<?php
session_start();
$errors = $_SESSION['errors'] ?? array();
$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : array();
// unset($_SESSION['errors']);
unset($_SESSION['form_data']);
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
    <link rel="stylesheet" href="views/assets/vendor/font-awesome/css/all.min.css" />
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
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
            <?php

            if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
                unset($_SESSION['registration_success']);
            ?>

            <script>
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Registration Successful',
            text: 'Check your email for verification link',
            showConfirmButton: false,
            timer: 4000,
            toast: true,
            })
            </script>
            <?php
            }

            if (isset($_SESSION['not_verified']) && $_SESSION['not_verified']) {
                unset($_SESSION['not_verified']);
            ?>

            <script>
            Swal.fire({
            icon: 'error',
            title: 'Login error',
            text: 'Please check your inbox and verify your email to proceed',
            showConfirmButton: false,
            timer: 4000,
            })
            </script>
            <?php
            }

            if (isset($_SESSION['verified']) && $_SESSION['verified']) {
                unset($_SESSION['verified']);
            ?>

            <script>
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Successfully Verified',
            text: 'Proceed to login to dashboard',
            showConfirmButton: false,
            timer: 4000,
            toast: true,
            })
            </script>
            <?php
            }

            if (isset($_SESSION['passupdated']) && $_SESSION['passupdated']) {
                unset($_SESSION['passupdated']);
            ?>

            <script>
            Swal.fire({
            icon: 'success',
            title: 'Successfully Updated Password',
            text: 'Proceed to login to dashboard',
            showConfirmButton: false,
            timer: 4000,
            })
            </script>
            <?php
            }
            ?>

    <div class="wrapper bg__img" data-background="views/./assets/images/registration-bg.png">
        <!-- ==== header start ==== -->
        <header class="header header--secondary">
            <nav class="navbar navbar-expand-xl">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img src="views/assets/images/logo.png" alt="Logo" class="logo" />
                    </a>
                    <div class="navbar__out order-2 order-xl-3">
                        <div class="nav__group__btn">
                            <a href="login" class="log d-none d-sm-block"> Log In </a>
                            <a href="registration" class="button button--effect d-none d-sm-block"> Join Now <i
                                    class="fa-solid fa-arrow-right-long"></i> </a>
                        </div>
                        <button class="navbar-toggler d-block d-sm-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#primaryNav" aria-controls="primaryNav" aria-expanded="false"
                            aria-label="Toggle Primary Nav">
                            <span class="icon-bar top-bar"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse order-3 order-xl-2" id="primaryNav">
                        <ul class="navbar-nav">
                            <li class="nav-item d-block d-sm-none">
                                <a href="login" class="nav-link">Log In</a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a href="registration" class="button button--effect button--last">Join Now <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- ==== #header end ==== -->

        <!-- ==== registration section start ==== -->
        <section class="registration clear__top">
            <div class="container">
                <div class="registration__area">
                    <h4 class="neutral-top">Log in</h4>
                    <p>Don't have an account? <a href="registration">Register here.</a></p>
                    <?php if (!empty($errors['login'])) echo '<p style="color:red">' . $errors['login'] . '</p>'; ?>
                    <form action="controller/AuthController.php" method="post" name="login__form" class="form__login">
                        <div class="input input--secondary">
                            <label for="loginMail">Email*</label>
                            <input type="email" name="email" id="loginMail" placeholder="Enter your email"
                                required="required" value="<?= isset($form_data['email']) ? $form_data['email'] : '' ?>"/>
                                <?php if (!empty($errors['email'])) echo '<p style="color:red">' . $errors['email'] . '</p>'; ?>
                        </div>
                        <div class="input input--secondary">
                            <label for="loginPass">Password*</label>
                            <input type="password" name="password" id="loginPass" placeholder="Password"
                                required="required" />
                                <?php if (!empty($errors['pass'])) echo '<p style="color:red">' . $errors['pass'] . '</p>'; ?>
                        </div>
                        <div class="checkbox login__checkbox">
                            <label>
                                <input type="checkbox" id="remeberPass" name="remeber__pass" value="remember" />
                                <span class="checkmark"></span>
                                Remember Me
                            </label>
                            <a href="reset-password">Forget Password</a>
                        </div>
                        <div class="input__button">
                            <button type="submit" name="login" class="button button--effect">Login</button>
                        </div>
                    </form>
                    <?php
                // Clear the session variable
                unset($_SESSION['errors']);
                ?>
                </div>
            </div>
        </section>
        <!-- ==== #registration section end ==== -->

        <!-- Scroll To Top -->
        <a href="javascript:void(0)" class="scrollToTop">
            <i class="fa-solid fa-angles-up"></i>
        </a>

    </div>

    <!-- ==== js dependencies start ==== -->

    <!-- jquery -->
    <script src="views/assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <!-- bootstrap five js -->
    <script src="views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- nice select js -->
    <script src="views/assets/vendor/nice-select/js/jquery.nice-select.min.js"></script>
    <!-- magnific popup js -->
    <script src="views/assets/vendor/magnific-popup/js/jquery.magnific-popup.min.js"></script>
    <!-- slick js -->
    <script src="views/assets/vendor/slick/js/slick.js"></script>
    <!-- shuffle js -->
    <script src="views/assets/vendor/shuffle/shuffle.min.js"></script>
    <!-- jquery downcount timer -->
    <script src="views/assets/vendor/downcount/jquery.downCount.js"></script>
    <!-- waypoints js -->
    <script src="views/assets/vendor/waypoints-js/jquery.waypoints.min.js"></script>
    <!-- counter up js -->
    <script src="views/assets/vendor/counter-js/jquery.counterup.min.js"></script>
    <!-- apex chart js -->
    <script src="views/assets/vendor/apex-chart/apexcharts.min.js"></script>
    <!-- wow js -->
    <script src="views/assets/vendor/wow/wow.min.js"></script>

    <!-- ==== js dependencies end ==== -->

    <!-- plugin js -->
    <script src="views/assets/js/plugin.js"></script>
    <!-- main js -->
    <script src="views/assets/js/main.js"></script>

</body>

</html>