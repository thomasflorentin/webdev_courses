<?php
add_action( 'after_setup_theme', 'wpcourses_setup' );
function wpcourses_setup() {
    load_theme_textdomain( 'wpcourses', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form' ) );
    global $content_width;
    if ( ! isset( $content_width ) ) { $content_width = 1920; }
    register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'wpcourses' ) ) );
}


add_action( 'wp_enqueue_scripts', 'wpcourses_load_scripts' );
function wpcourses_load_scripts() {

    wp_register_style(
        'wpcourses-style',
        get_template_directory_uri() . '/main.css', 
        array(), 
        '1.0'
    );

    wp_enqueue_style( 'wpcourses-style');
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script( 
        'wpcourses-scripts', 
        get_template_directory_uri() . '/assets/js/script.js', 
        array('array'), 
        '1.0', 
        true 
    );

}


add_action( 'wp_footer', 'wpcourses_footer_scripts' );
function wpcourses_footer_scripts() {
    ?>
    <script>
        jQuery(document).ready(function ($) {
            var deviceAgent = navigator.userAgent.toLowerCase();
            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
                $("html").addClass("ios");
                $("html").addClass("mobile");
            }
            if (navigator.userAgent.search("MSIE") >= 0) {
                $("html").addClass("ie");
            }
            else if (navigator.userAgent.search("Chrome") >= 0) {
                $("html").addClass("chrome");
            }
            else if (navigator.userAgent.search("Firefox") >= 0) {
                $("html").addClass("firefox");
            }
            else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                $("html").addClass("safari");
            }
            else if (navigator.userAgent.search("Opera") >= 0) {
                $("html").addClass("opera");
            }
        });
    </script>
    <?php
}

add_filter( 'document_title_separator', 'wpcourses_document_title_separator' );
function wpcourses_document_title_separator( $sep ) {
    $sep = '|';
    return $sep;
}

add_filter( 'the_title', 'wpcourses_title' );
function wpcourses_title( $title ) {
    if ( $title == '' ) {
        return '...';
    } else {
        return $title;
    }
}

add_filter( 'the_content_more_link', 'wpcourses_read_more_link' );
function wpcourses_read_more_link() {
    if ( ! is_admin() ) {
        return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
    }
}

add_filter( 'excerpt_more', 'wpcourses_excerpt_read_more_link' );
function wpcourses_excerpt_read_more_link( $more ) {
    if ( ! is_admin() ) {
        global $post;
        return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
    }
}

add_filter( 'intermediate_image_sizes_advanced', 'wpcourses_image_insert_override' );
function wpcourses_image_insert_override( $sizes ) {
    unset( $sizes['medium_large'] );
    return $sizes;
}

add_action( 'widgets_init', 'wpcourses_widgets_init' );
function wpcourses_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Sidebar Widget Area', 'wpcourses' ),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}

add_action( 'wp_head', 'wpcourses_pingback_header' );
function wpcourses_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}

add_action( 'comment_form_before', 'wpcourses_enqueue_comment_reply_script' );
function wpcourses_enqueue_comment_reply_script() {
    if ( get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function wpcourses_custom_pings( $comment ) {
?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'wpcourses_comment_count', 0 );
function wpcourses_comment_count( $count ) {
    if ( ! is_admin() ) {
        global $id;
        $get_comments = get_comments( 'status=approve&post_id=' . $id );
        $comments_by_type = separate_comments( $get_comments );
        return count( $comments_by_type['comment'] );
    } else {
        return $count;
    }
}



// FRONT


// Add ACCORDEON Shortcode

function accordeon_shortcode( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'titre' => 'Le titre de l\'accordéon ici',
		),
		$atts
	);
	$titre = $atts['titre'];

    $return_string = '<div class="entry-accordeon close">'; 

   	$return_string .= '<div class="accordeon-title"><h3 class="h_3 btn-inline">'.$titre.'</h3></div>';
   	$return_string .= '<div class="accordeon-content">'; 

   	$return_string .= $content; 
   	$return_string .= '</div>'; 
  
   $return_string .= '</div>'; 

   return $return_string;


}
add_shortcode( 'accordeon', 'accordeon_shortcode' );