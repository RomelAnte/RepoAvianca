<?php

require get_stylesheet_directory() . '/customizer/customizer.php';

add_action( 'after_setup_theme', 'travel_hub_after_setup_theme' );
function travel_hub_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "responsive-embeds" );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'travel-hub-featured-image', 2000, 1200, true );
    add_image_size( 'travel-hub-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff'
    ) );

    add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

    add_editor_style( array( 'assets/css/editor-style.css') );
}

/**
 * Register widget area.
 */
function travel_hub_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'travel-hub' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'travel-hub' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'travel-hub' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'travel-hub' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'travel-hub' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'travel-hub' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'travel-hub' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'travel-hub' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'travel-hub' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'travel-hub' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'travel-hub' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'travel-hub' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'travel-hub' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'travel-hub' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'travel_hub_widgets_init' );

// enqueue styles for child theme
function travel_hub_enqueue_styles() {

    // Bootstrap
    wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

    // Theme block stylesheet.
    wp_enqueue_style( 'travel-hub-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'travel-hub-child-style' ), '1.0' );

    // enqueue parent styles
    wp_enqueue_style('adventure-travelling-style', get_template_directory_uri() .'/style.css');

    // enqueue child styles
    wp_enqueue_style('adventure-travelling-child-style', get_stylesheet_directory_uri() .'/style.css', array('adventure-travelling-style'));

    require get_theme_file_path( '/tp-theme-color.php' );
    wp_add_inline_style( 'adventure-travelling-child-style',$adventure_travelling_tp_theme_css );

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );

    $adventure_travelling_heading_font_family = get_theme_mod('adventure_travelling_heading_font_family', '');

    $adventure_travelling_tp_theme_css = '
        h1{
            font-family: '.esc_html($adventure_travelling_heading_font_family).'!important;
        }
        h2{
            font-family: '.esc_html($adventure_travelling_heading_font_family).'!important;
        }
        h3{
            font-family: '.esc_html($adventure_travelling_heading_font_family).'!important;
        }
        h4{
            font-family: '.esc_html($adventure_travelling_heading_font_family).'!important;
        }
        h5{
            font-family: '.esc_html($adventure_travelling_heading_font_family).'!important;
        }
        h6,#travel-offer h6{
            font-family: '.esc_html($adventure_travelling_heading_font_family).'!important;
        }
        
        
    ';
    wp_add_inline_style('adventure-travelling-child-style', $adventure_travelling_tp_theme_css);
}
add_action('wp_enqueue_scripts', 'travel_hub_enqueue_styles');

function travel_hub_admin_scripts() {
    // Backend CSS
    wp_enqueue_style( 'travel-hub-backend-css', get_theme_file_uri( '/assets/css/customizer.css' ) );
}
add_action( 'admin_enqueue_scripts', 'travel_hub_admin_scripts' );

function travel_hub_header_style() {
    if ( get_header_image() ) :
    $travel_hub_custom_header = "
        .headerbox{
            background-image:url('".esc_url(get_header_image())."')!important;
            background-position: center top !important;
            background-size: cover !important;
        }";
        wp_add_inline_style( 'travel-hub-child-style', $travel_hub_custom_header );
    endif;
}
add_action( 'wp_enqueue_scripts', 'travel_hub_header_style' );

// offer Meta
function travel_hub_bn_custom_meta_offer() {
    add_meta_box( 'bn_meta', __( 'Trip Offer Meta Feilds', 'travel-hub' ), 'travel_hub_meta_callback_trip_offer', 'post', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'travel_hub_bn_custom_meta_offer');
}

function travel_hub_meta_callback_trip_offer( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'travel_hub_offer_trip_meta_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    $travel_hub_trip_amount = get_post_meta( $post->ID, 'travel_hub_trip_amount', true );
    $travel_hub_trip_days = get_post_meta( $post->ID, 'travel_hub_trip_days', true );
    ?>
    <div id="testimonials_custom_stuff">
        <table id="list">
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Package Amount', 'travel-hub' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="travel_hub_trip_amount" id="travel_hub_trip_amount" value="<?php echo esc_attr($travel_hub_trip_amount); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Package Days', 'travel-hub' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="travel_hub_trip_days" id="travel_hub_trip_days" value="<?php echo esc_attr($travel_hub_trip_days); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}

/* Saves the custom meta input */
function travel_hub_bn_metadesig_save( $post_id ) {
    if (!isset($_POST['travel_hub_offer_trip_meta_nonce']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['travel_hub_offer_trip_meta_nonce']) ), basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save Trip Amount
    if( isset( $_POST[ 'travel_hub_trip_amount' ] ) ) {
        update_post_meta( $post_id, 'travel_hub_trip_amount', strip_tags( wp_unslash( $_POST[ 'travel_hub_trip_amount' ]) ) );
    }
    // Save Trip Days
    if( isset( $_POST[ 'travel_hub_trip_days' ] ) ) {
        update_post_meta( $post_id, 'travel_hub_trip_days', strip_tags( wp_unslash( $_POST[ 'travel_hub_trip_days' ]) ) );
    }
}
add_action( 'save_post', 'travel_hub_bn_metadesig_save' );

require get_theme_file_path( '/customizer/controls/customize-control-toggle.php' );

define('TRAVEL_HUB_CREDIT',__('https://www.themespride.com/themes/free-travel-wordpress-theme/','travel-hub') );
if ( ! function_exists( 'travel_hub_credit' ) ) {
    function travel_hub_credit(){
        echo "<a href=".esc_url(TRAVEL_HUB_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('adventure_travelling_footer_text',__('Travel WordPress Theme','travel-hub')))."</a>";
    }
}

if ( ! defined( 'ADVENTURE_TRAVELLING_FREE_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_FREE_THEME_URL', 'https://www.themespride.com/themes/free-travel-wordpress-theme/' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_DOCS_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/travel-hub-lite/' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_RATE_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_RATE_THEME_URL', 'https://wordpress.org/support/theme/travel-hub/reviews/#new-post' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_CHANGELOG_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_CHANGELOG_THEME_URL', get_stylesheet_directory() . '/readme.txt' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_SUPPORT_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/travel-hub/' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_DOCS_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_DOCS_URL', 'https://www.themespride.com/demo/docs/travel-hub-lite/' );
}
