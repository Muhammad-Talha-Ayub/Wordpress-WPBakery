<?php get_header(); ?>
<section class="py-5">
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h1 class="fw-bolder">Our Work</h1>
            <p class="lead fw-normal text-muted mb-0">Company portfolio</p>
        </div>
        <div class="row gx-5">
        <?php 
            // Debugging: Check if the query returns posts
            $pod_query = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => 4)); 
            if ($pod_query->have_posts()) : 
                echo 'Found portfolio posts'; // Add this line for debugging
                while ($pod_query->have_posts()) : $pod_query->the_post(); 
        ?>
            <div class="col-lg-6">
                <div class="position-relative mb-5">
                    <?php 
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'portfolio-thumb'); 
                    if ($image_url) : ?>
                        <img class="img-fluid rounded-3 mb-3" src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" />
                    <?php else : ?>
                        <img class="img-fluid rounded-3 mb-3" src="https://dummyimage.com/600x400/343a40/6c757d" alt="Dummy Image" />
                    <?php endif; ?>
                    <a class="h3 fw-bolder text-decoration-none link-dark stretched-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>
            </div>
        <?php 
                endwhile; 
                wp_reset_postdata(); 
            else :
                echo 'No portfolio posts found'; // Add this line for debugging
            endif; 
        ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
