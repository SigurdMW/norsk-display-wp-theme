<?php
/*
Template Name: Other Products page
*/
?>

<?php get_header(); ?>

<div class="container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>

		<?php endwhile; else: ?>
			<p><?php _e(' '); ?></p>
		<?php endif; ?>

<div class="product-container">
	<div class="row">
		<div class="col-md-12">

				<?php
					query_posts(array('showposts' => 999,'post_parent'    => 52, 'post_type' => 'page','orderby'=>'menu_order','order'=>'asc'), 'page_template', 'page-singleproducts.php');

				while (have_posts()) { the_post(); 
            $menu_o = $wpdb->get_var( "SELECT menu_order FROM $wpdb->posts WHERE ID=" . $post->ID  );
            if( $menu_o >= 1000 ){ ?>
					<!--- Do whatever you want to do for every page... --->
					<div class="col-md-4 col-sm-6 col-xs-12">
					<a href="<?php the_permalink() ?>">
						<div class="col-md-12 col-xs-12 col-sm-12 nd-product-box">
							<?php the_post_thumbnail('full'); ?>
							<h2 class="text-center"><?php the_title(); ?></h2>
							<hr />
							
<?php 
$milm = get_post_meta($post->ID, 'milm', true);
$ledlcd = get_post_meta($post->ID, 'LEDLCD', true);
$num = get_post_meta($post->ID, 'num', true);
if(!empty($milm) && !empty($ledlcd) && !empty($num)){ ?>
<p class="text-center text-muted">
	<?php echo $milm; ?>  |  
	<?php echo $ledlcd; ?>  |  
	<?php echo $num; ?>
</p>
<?php } ?>
							<p><?php $key="desc"; echo get_post_meta($post->ID, $key, true); ?></p>
							<p class="text-right nd-product-box-left">More info <img src="<?php bloginfo('template_directory') ?>/img/black/arrow-circle-right.svg"></p>
						</div>
					</a>
				</div>
					
				<?php }}

				wp_reset_query();  // Restore global post data
				
				?>
		</div>
	</div>
</div><!---/product-container-->
</div><!---/container-->
<?php get_footer(); ?>