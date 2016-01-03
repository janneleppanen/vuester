(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
var Config = {};

var Menu       = require('./src/Menu.js');
var AppContent = require('./src/AppContent.js');
var AppHeader  = require('./src/AppHeader.js');

var What = Vue.extend({})

var router = new VueRouter({
    app: false 
});

router.afterEach(function (transition) {
    // ...
});

router.map({
    '/': {
        component: AppContent
    },
    '/:slug': {
        component: AppContent
    }
});

router.start({
    el: '#app',
    data: {
        app: {
            name: ''
        }        
    },
    ready: function() {
        this.$http.get('/wp-json/theme/frontpage/').then(function (response) {
            Config.frontpage = response.data;

            if (this.$route.params = {}) {
                router.go(Config.frontpage.post_name);
            }

        }, function (response) {});
    }
}, '#app');

},{"./src/AppContent.js":2,"./src/AppHeader.js":3,"./src/Menu.js":4}],2:[function(require,module,exports){
var AppContent = Vue.component('app-content', {
    template: '#app-content-template',
    props: {
        pages: []
    },
    ready: function() {
        var slug = this.$route.params.slug;

        this.$http.get('/wp-json/wp/v2/pages?filter[name]=' + slug).then(function (response) {
            this.$set('pages', response.data);
        }, function (response) {});    
    },
    route: {
        canReuse: false
    }
});

module.exports = AppContent;
},{}],3:[function(require,module,exports){
var AppHeader = Vue.component('app-header', {
    template: '#app-header-template',
    props: {
        app: Object
    },
    data: {},
    methods: {},
    ready: function() {
        this.$http.get('/wp-json').then(function (response) {
            this.$set('app', response.data);
        }, function (response) {});        
    }
});

module.exports = AppHeader;
},{}],4:[function(require,module,exports){
var Menu = Vue.component('menu', {
    template: '#menu-template',
    props: {
        menuItems: []
    },
    ready: function() {
        this.$http.get('/wp-json/theme/menus').then(function (response) {
            this.$set('menuItems', response.data);
        }, function (response) {});
    }
});

module.exports = Menu;
},{}]},{},[1]);
