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
    
    <?php wp_footer(); ?>
</body>
</html>