<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Search results</h1>
			<p>Showing results for "<?php the_search_query() ?></i>".</p>
		</div>
	</div>

<!--------------- loop for search results ---------------------->

<div class="row">
 <?php if (have_posts()) : ?>	
<?php while (have_posts()) : the_post(); ?>
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
		<a href="<?php the_permalink() ?>">
		
		<!--- relevant search --->
		<?php
	$title 	= get_the_title();
	$keys= explode(" ",$s);
	$title 	= preg_replace('/('.implode('|', $keys) .')/iu',
		'<strong class="search-excerpt">\0</strong>',
		$title);
?>
		
			<h3><?php echo $title; ?></h3>
		</a>
			<p><?php the_excerpt(); ?>

	</div>
	
<?php endwhile; ?>

<!--- if no results was found --->

<?php else : ?>
	<div class="col-md-12">
		<h3>Nothing found</h3>
		<p><?php _e("Sorry, but we couldn't find what you were looking for. Please try changing your search."); ?></p>
		<?php get_search_form(); ?> 
	</div>
<?php endif; ?>
</div><!--- /row --->
</div><!--- /container --->

<?php get_footer(); ?>