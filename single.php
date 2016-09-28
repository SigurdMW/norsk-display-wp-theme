<?php get_header(); ?>
<div class="container">
<div class="row">
	<div class="col-md-12 col-sm-12">
		<h1><?php the_title(); ?></h1>
	
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<p class="post-content"><?php the_content(); ?></p>
	</div>
	<hr style="margin:1em;" />
	<?php comments_template(); ?>
<?php endwhile; else: ?>
	<p>Sorry, no content to display.</p>
<?php endif; ?>
</div><!---/row--->
</div><!---/container-->
<?php get_footer(); ?>
