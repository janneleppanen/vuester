<script type="text/x-template" id="app-header-template">
    <header class="app-header">
        <div class="site-brand">
            <a v-link="{ path: '/' }" ><h1 v-text="app.name"></h1></a>
            <p v-text="app.description"></p>
        </div>
        <menu></menu>
    </header>
</script>