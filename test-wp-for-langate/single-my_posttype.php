<?php
get_header(); 
?>


<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <?php if ( has_post_thumbnail() ) : ?>
                <img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <?php endif; ?>
            <p class="text-muted mt-5">
            Published by: <?php the_time('F j, Y'); ?> в <?php the_time('g:i a'); ?>
            </p>
            <h1 class="mb-3"><?php the_title(); ?></h1>
            <div class="mb-5"><?php the_content(); ?></div>
        </div>
    </div>
</div>


<?php
get_footer();
?>