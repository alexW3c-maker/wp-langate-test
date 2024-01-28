<?php
//Connecting scripts and styles
function enqueue_scripts() {
    wp_register_script( 'load-more', get_template_directory_uri().'/js/main.js', array(), '1.0.0', true );
    wp_localize_script( 'load-more', 'script_vars', array(
         'ajax_url' => admin_url( 'admin-ajax.php' )
     ));
    wp_enqueue_script( 'load-more' );
 }
 add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

 
function css_styles() {
	wp_enqueue_style( 'css-style', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'css_styles' );


//Connecting the required features of the theme
function my_theme_setup() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'editor-styles' );
}
add_action( 'after_setup_theme', 'my_theme_setup' );


//Creating a custom post type
function create_posttype() {
 
    register_post_type( 'my_posttype',
        array(
            'labels' => array(
                'name' => __( 'My Custom Post Type' ),
                'singular_name' => __( 'My Custom Post' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'my_posttype'),
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
            'show_in_rest' => true,
            'taxonomies' => array( 'category', 'post_tag' ),
        )
    );
}
add_action( 'init', 'create_posttype' );


//Menu registration
function register_my_menu() {
    register_nav_menu('top_menu',__( 'Top Menu' ));
}
add_action( 'init', 'register_my_menu' );


//Post loading script
function load_posts() {
$paged = $_POST['page'] + 1;
$args = array('post_type' => 'my_posttype', 'posts_per_page' => 9, 'paged' => $paged);
$the_query = new WP_Query($args);

    if ($the_query->have_posts()): 
        while ($the_query->have_posts()): $the_query->the_post();

            echo '<div class="col-lg-4 col-md-6 mb-4">';
            echo '<div class="card h-100">';
            
            echo '<a href="' . get_permalink() . '">';
            if ( has_post_thumbnail() ) {
                echo '<img class="card-img-top" src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '">';
            }
            echo '</a>';
            
            echo '<div class="card-body">';
            echo '<h4 class="card-title">';
            echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
            echo '</h4>';
            echo '<p class="card-text">' . get_the_excerpt() . '</p>';
            echo '</div>';
            
            echo '<div class="card-footer">';
            echo '<small class="text-muted">Published by: ' . get_the_time('F j, Y') . '</small>';
            echo '</div>';

            echo '</div>';
            echo '</div>';
            echo '</div>';

        endwhile;
    endif;
    wp_die();
}
add_action('wp_ajax_load_posts', 'load_posts');
add_action('wp_ajax_nopriv_load_posts', 'load_posts');
