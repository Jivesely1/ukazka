<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package leden2023
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'leden2023' ); ?></a>

        <header id="masthead" class="site-header">
            <!-- ======= Header ======= -->
            <header id="header" class="fixed-top">
                <div class="container d-flex align-items-center justify-content-between">

                    <h1 class="logo"><a href="index.html">DevFolio</a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                    <nav id="navbar" class="navbar">
                        <ul>
                            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                            <li><a class="nav-link scrollto" href="#about">About</a></li>
                            <li><a class="nav-link scrollto" href="#services">Services</a></li>
                            <li><a class="nav-link scrollto " href="#work">Work</a></li>
                            <li><a class="nav-link scrollto " href="#blog">Blog</a></li>
                            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                        </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav><!-- .navbar -->

                </div>
            </header><!-- End Header -->
        </header><!-- #masthead -->