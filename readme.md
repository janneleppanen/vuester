# Vuester
Vuester is an idea for WordPress themes powered by [Vue.js](http://vuejs.org/). Check out [a demo](http://vuester.janneleppanen.com).

## Requirements
- [WordPress REST API (Version 2)](https://wordpress.org/plugins/rest-api/)

## How to install
Clone this theme to themes folder and run npm install.

## MyTheme Class
### Add atomatically all files under template directory
```
MyTheme::add_templates();
```
### Set menus
```
MyTheme::set_menus( array(
    'main-navigation' => __('Main Navigation')
));
```

## Theme Endpoints Class
### Define custom endpoints
```
$endpoints = new ThemeEndpoints();

// site.com/wp-json/theme/custom
$endpoints->get( 'custom', function() {
    return {
        'message': 'this is a custom endpoint'
    };
} );
```

## Notes
[WP API Menus plugin](https://wordpress.org/plugins/wp-api-menus/) don't work with [WordPress REST API (Version 2)](https://wordpress.org/plugins/rest-api/).