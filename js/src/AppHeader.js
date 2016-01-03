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