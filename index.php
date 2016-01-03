<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <?php wp_head(); ?>
</head>
<body>
    <div id="app">
        <app-header :app="app"></app-header>
        
        <div class="container">
             <router-view></router-view> 
        </div>
    </div>

    <?php MyTheme::add_templates(); ?>
    
    <script type="text/x-template" id="menu-template">
        <ul class="menu">
            <li class="menu-item" v-for="menuItem in menuItems"><a v-link="{ path: '/'+menuItem.slug }">{{menuItem.title}}</a></li>
        </ul>
    </script>

    <script type="text/x-template" id="app-header-template">
        <header class="app-header">
            <div class="site-brand">
                <a v-link="{ path: '/' }" ><h1 v-text="app.name"></h1></a>
                <p v-text="app.description"></p>
            </div>
            <menu></menu>
        </header>
    </script>

     <script type="text/x-template" id="app-content-template">
        <div class="app-content" transition="expand" >
            <article v-for="page in pages">
                <h2>{{page.title.rendered}}</h2>
                <div class="content" v-html="page.content.rendered"></div>
            </article>
        </div>
    </script>

     <script type="text/x-template" id="app-footer-template">
        <footer class="app-footer">
            
        </footer>
    </script>

    <?php wp_footer(); ?>
</body>
</html>