<?php
/**
 * Azimeng functions and definitions
 *
 * @package Azimeng
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}

if ( ! function_exists( 'azimeng_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function azimeng_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Azimeng, use a find and replace
         * to change 'azimeng' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'azimeng', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        //add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'azimeng' ),
        ) );

        // Enable support for Post Formats.
        add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

        // Setup the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'azimeng_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Enable support for HTML5 markup.
        add_theme_support( 'html5', array(
            'comment-list',
            'search-form',
            'comment-form',
            'gallery',
        ) );
    }
endif; // azimeng_setup
add_action( 'after_setup_theme', 'azimeng_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function azimeng_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'azimeng' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'azimeng_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function azimeng_scripts() {
    wp_enqueue_style( 'azimeng-style', get_stylesheet_uri() );

    wp_enqueue_script( 'azimeng-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'azimeng-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'azimeng_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*
 * =============withparadox2
 */
function disable_bg_wpse_97248() {
    remove_theme_support( 'custom-background' );
}
add_action('after_setup_theme','disable_bg_wpse_97248',100);

function azimeng_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
        <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php endif; ?>
        <div class="comment-author vcard">
        <?php printf(__('<span>%s</span>'), get_comment_author_link()) ?>
<span  class="comment-meta commentmetadata">
<?php
    /* translators: 1: date, 2: time */
    printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></span><?php edit_comment_link(__('(Edit)'),'  ','' );
?>
        </div>


<?php if ($comment->comment_approved == '0') : ?>
        <span class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></span>
        <br />
<?php endif; ?>

        <?php comment_text() ?>

        <?php if ( 'div' != $args['style'] ) : ?>
        </div>
        <?php endif; ?>
<?php
}
