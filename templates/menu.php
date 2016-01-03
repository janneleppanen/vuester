<script type="text/x-template" id="menu-template">
    <ul class="menu">
        <li class="menu-item" v-for="menuItem in menuItems"><a v-link="{ path: '/'+menuItem.slug }">{{menuItem.title}}</a></li>
    </ul>
</script>