<?php

class ThemeEndpoints {

    protected static $routes = [];

    public function __construct() {
        add_action( 'rest_api_init', array( __CLASS__, 'add_routes' ), 10, array('args' => 'yeah!') );
    }

    public function get( $route, $func ) {
        self::$routes[] = array(
            'route' => $route,
            'function' => $func,
            'method' => 'GET'
        );
    }

    public function post( $route, $func ) {
        self::$routes[] = array(
            'route' => $route,
            'function' => $func,
            'method' => 'POST'
        );
    }

    public function add_routes() {
        foreach ( self::$routes as $route ) {
            register_rest_route( 'theme/', $route['route'], array(
                'methods' => $route['method'],
                'callback' => $route['function']
            ) );
        }
    }

}