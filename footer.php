<?php $homeUrl = get_home_url(); ?>
</body>
<footer>
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">

            </div>
        </div>
    </div>
</footer>
<?php include('script-manager.php')?>
<?php is_front_page() ? "" : wp_footer()?>
</html>