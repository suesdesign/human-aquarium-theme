<?php
/*
*** Human Aquarium 1.0 ***
*/

/**
* Enqueue scripts and styles
*/
function humanaquarium_css_styles() {
	wp_enqueue_style( 'humanaquarium', get_template_directory_uri() . '/assets/css/styles.css', array(),'','screen' );
}

add_action( 'wp_enqueue_scripts', 'humanaquarium_css_styles' );

function humanaquarium_theme_js() {

	wp_enqueue_script( 'humanaquarium_themejs', get_template_directory_uri() . '/assets/js/humanaquarium_themejs.js', array('jquery'), '', true );
}

add_action( 'wp_enqueue_scripts',  'humanaquarium_theme_js' );

/*load Google fonts*/

function load_fonts() {
	wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Libre+Franklin');
	wp_enqueue_style( 'googleFonts');
}

add_action('wp_print_styles', 'load_fonts');

/**
* Sidebars
*/

function humanaquarium_widgets_init() {

// Register widgetized areas

	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'humanaquarium' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );

	register_sidebar(array(
		'name'          => __( 'Footer', 'humanaquarium' ),
		'id'            => 'footer',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	) );
}

add_action( 'widgets_init', 'humanaquarium_widgets_init' );

/**
* Custom menu
*/

add_theme_support( 'menus' );

function register_humanaquarium_menu() {
	register_nav_menu('main_navigation',__( 'Main Navigation' ));
}

add_action( 'init', 'register_humanaquarium_menu' );

/**
*Featured image in post excerpt
*/

add_theme_support( 'post-thumbnails' );

/**
* Comments
*/

add_theme_support( 'html5', array(
	'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
) );


if ( ! function_exists( 'humanaquarium_comment_nav' ) ) :
/**
* Display navigation to next/previous comments when applicable.
*
* Based on Twenty Fifteen 1.0
*/
function humanaquarium_comment_nav() {
// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'humanaquarium' ); ?></h2>
		<div class="nav-links">
	<?php
		if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'humanaquarium' ) ) ) :
		printf( '<div class="nav-previous">%s</div>', $prev_link );
		endif;

		if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'humanaquarium' ) ) ) :
		printf( '<div class="nav-next">%s</div>', $next_link );
		endif;
	?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
<?php
endif;

}
endif;

/**
* Add WooCommerce Support
*/


function custom_theme_setup() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

// Remove WooCommerce theme wrappers

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Add own wrappers

add_action('woocommerce_before_main_content', 'humanaquarium_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'humanaquarium_wrapper_end', 10);

function humanaquarium_wrapper_start() {
  echo '<main id="maincontent" class="column2" role="main">';
}

function humanaquarium_wrapper_end() {
  echo '</main>';
}