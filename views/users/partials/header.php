<?php require "./database/database.php" ?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- required meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- #favicon -->
    <link rel="shortcut icon" href="/views/assets/images/favicon.png" type="image/x-icon" />
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
    <link rel="stylesheet" href="/views/assets/vendor/bootstrap/css/bootstrap.min.css" />
    <!-- font awesome six css -->
    <link rel="stylesheet" href="/views/assets/vendor/font-awesome/css/all.min.css" />
    <!-- nice select css -->
    <link rel="stylesheet" href="/views/assets/vendor/nice-select/css/nice-select.css" />
    <!-- magnific popup css -->
    <link rel="stylesheet" href="/views/assets/vendor/magnific-popup/css/magnific-popup.css" />
    <!-- slick css -->
    <link rel="stylesheet" href="/views/assets/vendor/slick/css/slick.css" />
    <!-- animate css -->
    <link rel="stylesheet" href="/views/assets/vendor/animate/animate.css" />

    <!-- ==== css dependencies end ==== -->

    <!-- main css -->
    <link rel="stylesheet" href="/views/assets/css/style.css" />

</head>

<body>




<header class="dashboard-header">
        <div class="container">
            <div class="dashboard-header__area">
                <a href="/" class="header-logo">
                    <img src="/views/assets/images/logo.png" alt="Logo" class="logo" />
                </a>
                <div class="dashboard-header__area-content">
                    <a class="button button--effect" href="investment.html">
                        <img src="/views/assets/images/direction.png" alt="Investment" /> New Investments
                    </a>
                    <p><?= $_SESSION['user_name'] ?></p>
                    <div class="notification-area">
                        <a href="javascript:void(0)" class="icon__wrapper notification__icon">
                            <i class="fa-solid fa-bell"></i>
                            <span>03</span>
                        </a>
                        <div class="notification__wrapper">
                            <div class="notification__head">
                                <p class="text-center">3 New</p>
                                <p class="text-center">Notification</p>
                            </div>
                            <div class="notification__single-wrapper">
                                <div class="notification__single">
                                    <a href="javascript:void(0)">
                                        <h6>Welcome to spoment</h6>
                                        <p>We are happy to welcome you to our community spoment.
                                        </p>
                                    </a>
                                    <p class="time">2 hours ago</p>
                                </div>
                                <div class="notification__single">
                                    <a href="javascript:void(0)">
                                        <h6>Welcome to spoment</h6>
                                        <p>We are happy to welcome you to our community spoment.
                                        </p>
                                    </a>
                                    <p class="time">2 hours ago</p>
                                </div>
                            </div>

                            <div class="mark__read">
                                <a href="#">Mark all as read</a>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-language">
                        <select class="select-dashboard-language">
                            <option value="english">En</option>
                            <option value="australia">Aus</option>
                            <option value="germany">GER</option>
                            <option value="argentina">Arg</option>
                        </select>
                    </div>
                    <a href="account.html" class="profile">
                        <img src="/views/assets/images/profile.png" alt="Profile" />
                    </a>
                </div>
            </div>
        </div>
    </header>