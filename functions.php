<?php

// Declaration of theme supported features
function simple_boostrap_theme_support() {
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ));
    add_theme_support('post-formats', array(   // support certain post formats
        'link',
    ));
    add_theme_support('post-thumbnails');      // wp thumbnails (sizes handled in functions.php)
    set_post_thumbnail_size(125, 125, true);   // default thumb size
    add_theme_support('automatic-feed-links'); // rss thingy
    add_theme_support('title-tag');
    register_nav_menus(array(                  // wp3+ menus
        'main_nav'    => __('Main Menu', 'simple-bootstrap-panopticdev'),
        'button_nav'  => __('Main Menu Buttons', 'simple-bootstrap-panopticdev'),
        'footer_nav'  => __('Footer Menu', 'simple-bootstrap-panopticdev'),
        'social_nav'  => __('Social Menu', 'simple-bootstrap-panopticdev'),
        'contact_nav' => __('Contact Sidebar Menu', 'simple-bootstrap-panopticdev'),
    ));
    add_image_size( 'simple_boostrap_featured', 1140, 1140 * (9 / 21), true);
    add_image_size( 'Medium-Large', 512, 512, false);
    load_theme_textdomain( 'simple-bootstrap-panopticdev', get_template_directory() . '/languages' );
}
add_action('after_setup_theme','simple_boostrap_theme_support');

function simple_boostrap_add_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'medium-large' => __( 'Medium-Large' ),
    ));
}
add_filter( 'image_size_names_choose', 'simple_boostrap_add_custom_image_sizes');

function simple_bootstrap_theme_scripts() { 
    // For child themes
    wp_register_style( 'wpbs-style', get_stylesheet_directory_uri() . '/style.css', array(), null, 'all' );
    wp_enqueue_style( 'wpbs-style' );
    wp_register_script( 'bower-libs', 
        get_template_directory_uri() . '/app.min.js', 
        array('jquery'), 
        null );
    wp_enqueue_script('bower-libs');
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'simple_bootstrap_theme_scripts' );

function simple_bootstrap_load_fonts() {
    wp_register_style('simple_bootstrap_googleFonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700');
    wp_enqueue_style('simple_bootstrap_googleFonts');
}

add_action('wp_print_styles', 'simple_bootstrap_load_fonts');

// Set content width
if ( ! isset( $content_width ) )
    $content_width = 750;

// Sidebar and Footer declaration
function simple_boostrap_register_sidebars() {
    register_sidebar(array(
        'id' => 'sidebar-right',
        'name' => __('Right Sidebar', 'simple-bootstrap-panopticdev'),
        'description' => __('A right-hand sidebar for the default post format.', 'simple-bootstrap-panopticdev'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
    	'id' => 'sidebar-left',
    	'name' => __('Left Sidebar', 'simple-bootstrap-panopticdev'),
      'description' => __('A left-hand sidebar for the default post format.', 'simple-bootstrap-panopticdev'),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
      'id' => 'footer1',
      'name' => __('Footer', 'simple-bootstrap-panopticdev'),
      'description' => __('Content for the top part of the footer area in the default and full-page post formats. The Social Menu is already included as the last widget for this area. Each additional widget is afforded a 1/3 of the available width on the desktop version.', 'simple-bootstrap-panopticdev'),
      'before_widget' => '<div id="%1$s" class="widget col-xs-12 col-sm-6 col-md-4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
    	'id' => 'contact-aside',
    	'name' => __('Contact Sidebar', 'simple-bootstrap-panopticdev'),
    	'description' => __('Used only in the \'Contact Sidebar\' post format. The Contact Sidebar Menu is already included as the first widget for this area.', 'simple-bootstrap-panopticdev'),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));    
}
add_action( 'widgets_init', 'simple_boostrap_register_sidebars' );

// Menu output mods
class simple_bootstrap_Bootstrap_walker extends Walker_Nav_Menu {

    function start_el(&$output, $object, $depth = 0, $args = Array(), $current_object_id = 0) {

        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $dropdown = $args->has_children && $depth == 0;

        $class_names = $value = '';

        // If the item has children, add the dropdown class for bootstrap
        if ( $dropdown ) {
            $class_names = "dropdown ";
        }

        $classes = empty( $object->classes ) ? array() : (array) $object->classes;

        $class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
        $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

        if ( $dropdown ) {
            $attributes = ' href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"';
        } else {
            $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
            $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
            $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
            $attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before .apply_filters( 'the_title', $object->title, $object->ID );
        $item_output .= $args->link_after;

        // if the item has children add the caret just before closing the anchor tag
        if ( $dropdown ) {
            $item_output .= ' <b class="caret"></b>';
        }
        $item_output .= '</a>';

        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
    } // end start_el function
    
    function start_lvl(&$output, $depth = 0, $args = Array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class='dropdown-menu' role='menu'>\n";
    }
    
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}

class simple_bootstrap_Bootstrap_dl_walker extends Walker_Nav_Menu {

    function start_el(&$output, $object, $depth = 0, $args = Array(), $current_object_id = 0) {

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        
        $classes = empty( $object->classes ) ? array() : (array) $object->classes;
        $classes[] = 'menu-item-' . $object->ID;
        
        /**
         * Filter the CSS class(es) applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
         * @param object $item    The current menu item.
         * @param array  $args    An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth   Depth of menu item. Used for padding.
         */
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        
        /**
         * Filter the ID applied to a menu item's list item element.
         *
         * @since 3.0.1
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param object $item    The current menu item.
         * @param array  $args    An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth   Depth of menu item. Used for padding.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $object->ID, $object, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $atts = array();
        $atts['title']  = ! empty( $object->attr_title ) ? $object->attr_title : '';
        $atts['target'] = ! empty( $object->target )     ? $object->target     : '';
        $atts['rel']    = ! empty( $object->xfn )        ? $object->xfn        : '';
        $atts['href']   = ! empty( $object->url )        ? $object->url        : '';
        
        $output .= $indent . '<dt>' . $object->description .":</dt>\n";
        $output .= $indent . '<dd' . $id . $class_names .'>';
        
        /**
         * Filter the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $title  Title attribute.
         *     @type string $target Target attribute.
         *     @type string $rel    The rel attribute.
         *     @type string $href   The href attribute.
         * }
         * @param object $item  The current menu item.
         * @param array  $args  An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth Depth of menu item. Used for padding.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $object, $args, $depth );
        
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                        $attributes .= ' ' . $attr . '="' . $value . '"';
                }
        }
        
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        /** This filter is documented in wp-includes/post-template.php */
        $item_output .= $args->link_before . apply_filters( 'the_title', $object->title, $object->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        /**
         * Filter a menu item's starting output.
         *
         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
         * no filter for modifying the opening and closing `<li>` for a menu item.
         *
         * @since 3.0.0
         *
         * @param string $item_output The menu item's starting HTML output.
         * @param object $item        Menu item data object.
         * @param int    $depth       Depth of menu item. Used for padding.
         * @param array  $args        An array of {@see wp_nav_menu()} arguments.
         */
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );

    } // end start_el function
    
    function end_el(&$output, $item, $depth = 0, $args = Array()) {
        $output .= "</dd>\n";
    }
    
    function start_lvl(&$output, $depth = 0, $args = Array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<dl class='dl-horizontal' role='menu'>\n";
    }
    
    function end_lvl(&$output, $depth = 0, $args = Array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</dl>\n";
    }
}

// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
function simple_bootstrap_add_active_class($classes, $item) {
    if( in_array('current-menu-item', $classes) ) {
        $classes[] = "active";
    }
  
    return $classes;
}
add_filter('nav_menu_css_class', 'simple_bootstrap_add_active_class', 10, 2 );

// display the main menu bootstrap-style
// this menu is limited to 2 levels (that's a bootstrap limitation)
function simple_bootstrap_display_main_menu() {
    wp_nav_menu(
        array( 
            'theme_location' => 'main_nav', /* where in the theme it's assigned */
            'menu' => 'main_nav', /* menu name */
            'menu_class' => 'nav navbar-nav',
            'menu_id' => 'simple-bootstrap-main-nav',
            'container' => false, /* container class */
            'depth' => 2,
            'walker' => new simple_bootstrap_Bootstrap_walker(),
        )
    );
}

function simple_bootstrap_display_action_button_menu() {
    wp_nav_menu(
        array( 
            'theme_location' => 'button_nav', /* where in the theme it's assigned */
            'menu' => 'button_nav', /* menu name */
            'menu_class' => 'nav navbar-nav navbar-right',
            'menu_id' => 'simple-bootstrap-button-nav',
            'container' => false, /* container class */
            'depth' => 1
        )
    );
}

function simple_bootstrap_display_footer_menu() {
    wp_nav_menu(
        array( 
            'theme_location' => 'footer_nav', /* where in the theme it's assigned */
            'menu' => 'footer_nav', /* menu name */
            'menu_class' => 'list-inline navbar-right',
            'menu_id' => 'simple-bootstrap-footer-nav',
            'container' => false, /* container class */
            'depth' => 1
        )
    );
}

function simple_bootstrap_display_social_menu() {
    wp_nav_menu(
        array( 
            'theme_location' => 'social_nav', /* where in the theme it's assigned */
            'menu' => 'social_nav', /* menu name */
            'menu_class' => 'dl-horizontal',
            'menu_id' => 'simple-bootstrap-social-nav',
            'container' => false, /* container class */
            'depth' => 1,
            'walker' => new simple_bootstrap_Bootstrap_dl_walker(),
            'items_wrap' => '<dl role="menu" id="%1$s" class="%2$s">%3$s</dl>'
        )
    );
}

function simple_bootstrap_display_contact_aside_menu() {
    wp_nav_menu(
        array( 
            'theme_location' => 'contact_nav', /* where in the theme it's assigned */
            'menu' => 'contact_nav', /* menu name */
            'menu_class' => 'dl-horizontal',
            'menu_id' => 'simple-bootstrap-contact-nav',
            'container' => false, /* container class */
            'depth' => 1,
            'walker' => new simple_bootstrap_Bootstrap_dl_walker(),
            'items_wrap' => '<dl role="menu" id="%1$s" class="%2$s">%3$s</dl>'
        )
    );
}

/*
  A function used in multiple places to generate the metadata of a post.
*/
function simple_bootstrap_display_post_meta() {
?>

    <ul class="meta text-muted list-inline">
        <li>
            <?php if (!has_post_format('link')) : ?>
            <a href="<?php the_permalink() ?>">
            <?php endif ?>
                <span class="glyphicon glyphicon-time"></span>
                <?php the_date(); ?>
            <?php if (!has_post_format('link')) : ?>
            </a>
            <?php endif ?>
        </li>
        <li>
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
                <span class="glyphicon glyphicon-user"></span>
                <?php if (!has_post_format('link')) : ?>
                <?php the_author(); ?>
                <?php endif ?>
            </a>
        </li>
        <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
        <li>
            <?php
                $sp = '<span class="glyphicon glyphicon-comment"></span> ';
                comments_popup_link($sp . __( 'Leave a comment', "default"), $sp . __( '1 Comment', "default"), $sp . __( '% Comments', "default"));
            ?>
        </li>
        <?php endif; ?>
        <?php edit_post_link(__( 'Edit', "default"), '<li><span class="glyphicon glyphicon-pencil"></span> ', '</li>'); ?>
    </ul>

<?php
}

function simple_boostrap_page_navi() {
    global $wp_query;

    ?>

    <?php if (get_next_posts_link() || get_previous_posts_link()) { ?>
        <nav class="section">
            <ul class="pager pager-unspaced">
                <li class="previous"><?php next_posts_link('<span class="glyphicon glyphicon-chevron-left"></span> ' . __('Older posts', "default")); ?></li>
                <li class="next"><?php previous_posts_link(__('Newer posts', "default") . ' <span class="glyphicon glyphicon-chevron-right"></span>'); ?></li>
            </ul>
        </nav>
    <?php } ?>

    <?php
}

function simple_boostrap_the_link_url() {
    $has_url = get_url_in_content( get_the_content() );
    echo $has_url ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

function simple_boostrap_display_post($args = []) {
    $multiple_on_page  = isset($args['multiple_on_page']) ? $args['multiple_on_page'] : false;
    $show_meta         = isset($args['show_meta']) ? $args['show_meta'] : true;
    
    $extra_classes = ($multiple_on_page) ? "section multiple-results" : "section";
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class($extra_classes); ?> role="article">
        
        <header>
            
            <div class="article-header">
                <?php if ($multiple_on_page) : ?>
                <h2 class="h1">
                    <?php if (has_post_format('link')) : ?>
                    <a href="<?php simple_boostrap_the_link_url() ?>" title="<?php the_title_attribute(); ?>" target="_blank"><?php the_title(); ?></a>
                    <?php else: ?>
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                    <?php endif ?>
                <?php else: ?>
                <h1>
                    <?php if (has_post_format('link')) : ?>
                    <a href="<?php simple_boostrap_the_link_url() ?>" title="<?php the_title_attribute(); ?>" target="_blank"><?php the_title(); ?></a>
                    <?php else: ?>
                    <?php the_title(); ?>
                    <?php endif ?>
                </h1>
                <?php endif ?>
            </div>

            <?php if (has_post_thumbnail()) { ?>
            <div class="featured-image">
                <?php if ($multiple_on_page) : ?>
                    <?php if (has_post_format('link')) : ?>
                    <a href="<?php simple_boostrap_the_link_url() ?>" title="<?php the_title_attribute(); ?>" target="_blank"><?php the_post_thumbnail('simple_boostrap_featured'); ?></a>
                    <?php else: ?>
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('simple_boostrap_featured'); ?></a>
                    <?php endif ?>
                <?php else: ?>
                <?php the_post_thumbnail('simple_boostrap_featured'); ?>
                <?php endif ?>
            </div>
            <?php } ?>

            <?php if ($show_meta) : ?>
            <?php simple_bootstrap_display_post_meta() ?>
            <?php endif ?>
        
        </header>
    
        <section class="post_content">
            <?php
            if ($multiple_on_page && !has_post_format('link')) {
                the_excerpt();
            } else {
                the_content();
                wp_link_pages();
            }
            ?>
        </section>
        
        <footer>
            <?php the_tags('<p class="tags">', ' ', '</p>'); ?>
        </footer>
    
    </article>

<?php }

function simple_boostrap_main_classes() {
    $nbr_sidebars = (is_active_sidebar('sidebar-left') ? 1 : 0) + (is_active_sidebar('sidebar-right') ? 1 : 0);
    $classes = "";
    if ($nbr_sidebars == 0) {
        $classes .= "col-sm-8 col-md-push-2";
    } else if ($nbr_sidebars == 1) {
        $classes .= "col-md-8";
    } else {
        $classes .= "col-md-6";
    }
    if (is_active_sidebar( 'sidebar-left' )) {
        $classes .= " col-md-push-".($nbr_sidebars == 2 ? 3 : 4);
    }
    echo $classes;
}

function simple_boostrap_sidebar_left_classes() {
    $nbr_sidebars = (is_active_sidebar('sidebar-left') ? 1 : 0) + (is_active_sidebar('sidebar-right') ? 1 : 0);
    echo 'col-md-'.($nbr_sidebars == 2 ? 3 : 4).' col-md-pull-'.($nbr_sidebars == 2 ? 6 : 8);
}

function simple_boostrap_sidebar_right_classes() {
    $nbr_sidebars = (is_active_sidebar('sidebar-left') ? 1 : 0) + (is_active_sidebar('sidebar-right') ? 1 : 0);
    echo 'col-md-'.($nbr_sidebars == 2 ? 3 : 4);
}
