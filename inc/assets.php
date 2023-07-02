<?php

/**
 * Enqueue scripts and styles.
 */
function leden2023_scripts_scripts() {

	//Style custom
	wp_enqueue_style( 'bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css', array(), _S_VERSION);
	wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), _S_VERSION);
	wp_enqueue_style( 'glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css', array(), _S_VERSION);
	wp_enqueue_style( 'swiper-bundle', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', array(), _S_VERSION);
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION);
	//Style template

	//JS template
	wp_enqueue_script( 'leden2023_scripts-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	//JS custom
	wp_enqueue_script( 'bootstrap-bundle-js', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'purecounter', get_template_directory_uri() . '/assets/vendor/purecounter/purecounter_vanilla.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'glightbox-js', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'typed', get_template_directory_uri() . '/assets/vendor/typed.js/typed.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'php-email-form', get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );

	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'leden2023_scripts_scripts' );

?>