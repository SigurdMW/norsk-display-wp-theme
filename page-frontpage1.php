<?php
/*
    Template Name: Front page1
*/?>
<?php get_header(); ?>

  <!-- Carousel
    ================================================== -->

    <?php 
    $post_id = get_the_ID();
    $array_pic_meta = get_post_meta( $post_id, 'fp-slider-meta-box', false ); 

    
    //Row1
    $link1 = $array_pic_meta[0][0];
    $link1_desc = $array_pic_meta[0][1];
    
    //row2
    $link2 = $array_pic_meta[0][2];
    $link2_desc = $array_pic_meta[0][3];

    //row3
    $link3 = $array_pic_meta[0][4];
    $link3_desc = $array_pic_meta[0][5];


    $slider_test = get_post_meta( $post_id, 'frontpage-slider-test', true ); 

?>

<div class="nd-new-frontpage-container">
   
  <?php 
    // TEST TO NEW SLIDER
    $slider_array = explode(";",$slider_test);
    
    $cnt = 0;
    echo '<ul class="slideshow">';
    while($cnt < count($slider_array)){
      if($cnt==0){
        echo '<li class="slide showing" style="background-image:url('.$slider_array[$cnt].');"></li>';
      } else {
        echo '<li class="slide" style="background-image:url('.$slider_array[$cnt].');"></li>';
      }
      $cnt++;
    }
    echo "</ul>";
  ?>
	
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-5 white-box">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; else: ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div><!--/nd-new-frontpage-container-->


<!-- 2nd row -->
<?php $post_id = get_the_ID();echo get_post_meta( $post_id, 'fp-featured-text', true );  ?>


<!--- 3rd row --->
<div class="container">

<div class="row">
  <div class="col-md-6 nd-front-page">
			
				<?php $post_id = get_the_ID();echo get_post_meta( $post_id, 'fp-meta-box-1', true );  ?>
	</div>
	
	<div class="col-md-6 nd-front-page">
		<?php
			query_posts(array('showposts' => 1));
				while (have_posts()) { the_post(); ?>
					<!--- Do whatever you want to do for every page... --->
					<h2>Latest update from the blog</h2>
					<?php remove_filter ('the_title', 'wpautop'); ?>
					<?php remove_filter ('the_excerpt', 'wpautop'); ?>
					<p><b><?php the_title(); ?>:</b> <?php the_excerpt(__('(...)')); ?></p>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<button class="btn btn-ghost">Read more</button>
					</a>
							
					
				<?php }

				wp_reset_query();  // Restore global post data
				
				?>
	</div>
	
</div>


<div class="row">
	<div class="col-md-6 nd-front-page">
		
		<?php
			query_posts(array('orderby' => 'rand', 'showposts' => 1,'post_parent'    => 52, 'post_type' => 'page'), 'page_template', 'page-singleproducts.php');
				while (have_posts()) { the_post(); ?>
					<!--- Do whatever you want to do for every page... --->
					<h2>Featured product</h2>
					<b>Now showing <?php the_title(); ?></b>
					<p><?php the_excerpt(__('(...)')); ?>
					</p>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<button class="btn btn-ghost">Read more</button>
					</a>
	</div>
	<div class="col-md-6 nd-front-page">
		<img src="<?php
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
			$url = $thumb['0'];
			echo $url;
		?>" class="nd-front-thumbnail" title="<?php the_title(); ?> display">
		<?php }
				wp_reset_query();  // Restore global post data	
		?>
	</div>
</div>

</div><!---/container-->


<script>
var slides = document.querySelectorAll('.slideshow .slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide,7000);

function nextSlide() {
    slides[currentSlide].className = 'slide';
    currentSlide = (currentSlide+1)%slides.length;
    slides[currentSlide].className = 'slide showing';
}
</script>

<?php get_footer(); ?>