<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1 class="page-title"><?php the_title(); ?></h1>
			<p><?php the_tags(); ?></p>
			<?php the_content(); ?>

		<?php endwhile; else: ?>
			<p><?php _e(' '); ?></p>
		<?php endif; ?>

		</div>
	</div>
</div>
<?php get_footer(); ?>