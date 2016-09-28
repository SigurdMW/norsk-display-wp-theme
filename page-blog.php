<?php
/*
Template Name: Blog page
*/
?>

<?php get_header(); ?>


<div class="container blog-page">
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
	
	<div class="row">
		<?php $the_query = new WP_Query( 'showposts=999' ); ?>
			<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
				<div class="col-md-12">
					<a href="<?php the_permalink() ?>"><h2><?php the_title(); ?></h2></a>
					<p><i><?php the_time('d M Y'); ?> by <?php the_author(); ?></i></p>
					<p><?php the_excerpt(__('(…)')); ?></p>
				</div>
			<?php endwhile;?>
		<div class="col-md-12">
			<?php previous_post_link(); ?>
		</div>
	</div>
	
</div><!--/container-->
<?php get_footer(); ?>