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