<?php get_header(); ?> 

<header class="py-5">
    <div class="container px-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xxl-6 text-center">
                <div class="my-5">
                    <div class="col-sm-6 mx-auto d-block">
                        <img alt="404-page" src="<?php echo esc_url(IMAGES . '/image-404.jpg'); ?>" class="img-fluid" />
                    </div>
                    <h1 class="fw-bolder mb-3">Oops! That page can&rsquo;t be found</h1>
                    <p>
                        <?php _e('Sorry, we can’t find the page you are looking for. <br>Please go to', 'modernbusiness'); ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>

<?php get_footer(); ?>
