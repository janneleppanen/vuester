<script type="text/x-template" id="app-content-template">
    <div class="app-content" transition="expand" >
        <article v-for="page in pages">
            <h2>{{page.title.rendered}}</h2>
            <div class="content" v-html="page.content.rendered"></div>
        </article>
    </div>
</script>