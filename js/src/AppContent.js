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