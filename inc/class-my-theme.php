<?php 

class MyTheme {

    protected static $menus = array();    

    public static function init() {
        add_theme_support( 'title-tag' );

        add_action( 'wp_enqueue_scripts', array( __CLASS__, 'add_assets'));
        add_action( 'after_setup_theme',  array( __CLASS__, 'after_theme_setup'), 5);
    }

    public static function add_assets() {
        wp_enqueue_script( 'vue', 'http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.12/vue.min.js', array(), 1.0, true );
        wp_enqueue_script( 'vue-resource', 'https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.5.1/vue-resource.js', array('vue'), 1.0, true );
        wp_enqueue_script( 'vue-router', 'https://cdnjs.cloudflare.com/ajax/libs/vue-router/0.7.7/vue-router.js', array('vue'), 1.0, true );
        wp_enqueue_script( 'main', get_template_directory_uri() . '/js/build.js', array('vue', 'vue-resource', 'vue-router'), 1.0, true );
        
        wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css');
        wp_enqueue_style( 'theme-styles', get_template_directory_uri() . '/css/build.css');
    }

    public static function after_theme_setup() {
        remove_action( 'wp_head', 'rsd_link' );
        remove_action( 'wp_head', 'wp_generator' );
        remove_action( 'wp_head', 'index_rel_link' );
        remove_action( 'wp_head', 'wlwmanifest_link' );
        remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
        remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
        remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );

        register_nav_menus( self::$menus );
    }

    public static function set_menus( $menus ) {
        self::$menus = array_merge( self::$menus, $menus );
    }

    public static function add_templates() {
        foreach ( glob( __DIR__ . "/../templates/*.php" ) as $template ) {
            require_once( $template );
        }
    }

}