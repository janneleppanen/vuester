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
