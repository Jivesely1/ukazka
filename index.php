<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package leden2023
 */

get_header();
?>

<!-- one-page-template -->
<div id="home">
    <?php include 'page-home.php'; ?>
</div>
<div id="about">
    <?php include 'page-about.php'; ?>
</div>
<div id="services">
    <?php include 'page-services.php'; ?>
</div>
<div id="work">
    <?php include 'page-work.php'; ?>
</div>
<div id="blog">
    <?php include 'page-blog.php'; ?>
</div>
<div id="contact">
    <?php include 'page-contact.php'; ?>
</div>

<?php

get_footer();