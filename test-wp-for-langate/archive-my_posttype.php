<?php
get_header(); 
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'my_posttype', 'posts_per_page' => 9, 'paged' => $paged );
$the_query = new WP_Query( $args ); 
?>

<?php if ( $the_query->have_posts() ): ?>

<div class="container my-5">
<div class="row">

	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<div class="col-lg-4 col-md-6 mb-4">
			<div class="card h-100">
				<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) : ?>
					<img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
				<?php endif; ?>
				</a>
				<div class="card-body">
					<h4 class="card-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h4>
					<p class="card-text"><?php the_excerpt(); ?></p>
				</div>
				<div class="card-footer">
					<small class="text-muted">Published by: <?php the_time('F j, Y'); ?></small>
				</div>
			</div>
		</div>

	<?php endwhile; ?>

	</div>
		<div class="d-flex justify-content-center mb-5">
			<button class="btn btn-primary load-more" data-page="<?php echo $paged; ?>">Load More</button>
		</div>
</div>

<?php wp_reset_postdata(); ?>

<?php else : ?>

<p><?php _e( 'No posts based on your criteria.' ); ?></p>

<?php endif; ?>

<?php
get_footer();
?>