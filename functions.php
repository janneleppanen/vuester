<?php
require_once( 'inc/class-my-theme.php' );
require_once( 'inc/class-theme-endpoints.php' );

MyTheme::init();
$endpoints = new ThemeEndpoints();

// site.com/wp-json/theme/frontpage
$endpoints->get( 'frontpage', function() {
    $frontpage = get_page( get_option('page_on_front') );
    return $frontpage;
} );

// site.com/wp-json/theme/menus
$endpoints->get( 'menus', function() {
    //return get_registered_nav_menus();
    $menu = wp_get_nav_menu_items( 'main-navigation', array() );

    foreach ( $menu as $menu_item ) {
        $page = get_page( $menu_item->object_id );
        $menu_item->slug = $page->post_name;
    }

    return $menu;
}); 

MyTheme::set_menus( array(
    'main-navigation' => __('Main Navigation')
));