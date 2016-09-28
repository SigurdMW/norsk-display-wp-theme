<?php get_header(); ?>

  <!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
			<img src="<?php bloginfo('template_directory') ?>/img/last1-small.jpg" />
			<div class="container">
				<div class="carousel-caption">
					<h1><small>Made for</small> tough <small>envirionments</small></h1>
				</div>
			</div>
        </div>
        <div class="item">
          <img src="<?php bloginfo('template_directory') ?>/img/last2-small.jpg" />
          <div class="container">
				<div class="carousel-caption">
					<h1><small>Made to</small> last</h1>
				</div>
			</div>
        </div>
        <div class="item">
			<img src="<?php bloginfo('template_directory') ?>/img/car1.jpg" />
				<div class="container">
					<div class="carousel-caption">
					<h1>Perfect for the office</h1>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev"><img class="carousel-svg-icon-left" src="<?php bloginfo('template_directory') ?>/img/white/chevron-left.svg"></a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next"><img class="carousel-svg-icon-right" src="<?php bloginfo('template_directory') ?>/img/white/chevron-right.svg"></a>
    </div><!-- /.carousel -->

<!-- 2nd row -->
<div class="jumbotron">
	<div class="container text-center">
		<h1>Norsk Display has been delivering high quality displays for over 20 years
		</h1>
		<a href="<?php echo home_url(); ?>/products/">
			<button class="btn btn-success" title="Learn more">Learn more about our products</button>
		</a>
	</div>
</div>	
	
<!--- 3rd row --->
<div class="container">

<div class="row">
	<div class="col-md-6 nd-front-page">
			
				<h2>Find your display</h2>
				<p>Finding the right product can be a pain in the ass. Trust us, we know. Feel free to use this interactive guide to find the right display for your needs</p>
				<button class="btn btn-ghost" data-toggle="modal" data-target="#myModal" title="Find display now!">Find display now</button>
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

<!-- MODAL POPUP DISPLAY GUIDE -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">

            <!-- multistep form -->
			<!--------- vudere denne i stedet http://www.jquery-steps.com/Examples --->

				<form id="msform" action="<?php echo home_url(); ?>/email-form/" method="post">
					<!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
					<!-- progressbar -->
					<div class="ms-form-static-header">	
							<h1>
								Find your display
							</h1>
						<ul id="ms-progressbar">
							<li class="ms-active"><span class="hidden-xs">Viewing distance</span></li>
							<li><span class="hidden-xs">Physical environment</span></li>
							<li><span class="hidden-xs">Moisture levels</span></li>
						</ul>
					</div>
					<!-- fieldsets -->
					<fieldset>
						<h3>Viewing distance</h3>
						<p>Please select the maximum reading distance for the display:</p>
						<div class="ms-radio">  
							<input id="ms-10m" type="radio" name="readdistance" value="1" checked>  
							<label for="ms-10m">Maximum 10m</label>  
							<br />
							<input id="ms-25m" type="radio" name="readdistance" value="2">  
							<label for="ms-25m">Maximum 25m</label> 
							<br />
							<input id="ms-35m" type="radio" name="readdistance" value="3">  
							<label for="ms-35m">Maximum 35m</label>	
							<br />
							<input id="ms-50m" type="radio" name="readdistance" value="4">  
							<label for="ms-50m">Maximum 50m</label>	
							<br />
							<input id="ms-long" type="radio" name="readdistance" value="5">  
							<label for="ms-long">Longer than 50m</label>	
							
						</div>  
						<div class="panel-group" id="accordion">
						  <div class="panel panel-default">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOneStep1">
							<div class="panel-heading">
							  <h5>
									<img src="<?php bloginfo('template_directory') ?>/img/black/info-circle.svg" class="msform-info-svg"> info	
							  </h5>
							</div>
								</a>
							<div id="collapseOneStep1" class="panel-collapse collapse">
							  <div class="panel-body">
								Some readouts have a low resolution and large display area. In such cases a MINIMUM reading distance should be considered. We advocate a quick glance at the display should suffice to grasp the message. You may judge this differently in your application depending on use.
							  </div>
							</div>
						  </div>
						  </div>
						<input type="button" name="ms-next" class="ms-next action-button" value="Next" />
						<button type="button" class="ms-close action-button" data-dismiss="modal">Close</button>
					</fieldset>
					<fieldset>
						<h3>Physical environment</h3>
						<p>Please select the physical environment the display will be used in:</p>
						<div class="ms-radio">  
							<input id="indoor" type="radio" name="environment" value="1" checked>  
							<label for="indoor">Indoor</label>  
							<br />
							<input id="outdoor" type="radio" name="environment" value="2">
							<label for="outdoor">Outdoor</label> 			
						</div>  
						<div class="panel-group" id="accordion">
						  <div class="panel panel-default">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOneStep2">
							<div class="panel-heading">
							  <h5>
									<img src="<?php bloginfo('template_directory') ?>/img/black/info-circle.svg" class="msform-info-svg"> info	
							  </h5>
							</div>
								</a>
							<div id="collapseOneStep2" class="panel-collapse collapse">
							  <div class="panel-body">
								Normally, outdoor installations are exposed to wider temperature ranges, large variations of ambient lighting and uncontrolled moisture levels. For outdoor use, the display must be designed for these challenges to serve you best.
							  </div>
							</div>
						  </div>
						  </div>
						
						<input type="button" name="ms-previous" class="ms-previous action-button" value="Previous" />
						<input type="button" name="ms-next" class="ms-next action-button" value="Next" />
						<button type="button" class="ms-close action-button" data-dismiss="modal">Close</button>
					</fieldset>
					<fieldset>
						<h3>Moisture levels</h3>
						<p>Please select the moisture level the display will be exposed to:</p>
						<div class="ms-radio">  
							<input id="wet" type="radio" name="moisture" value="1" checked>  
							<label for="wet">Wet</label>  
							<br />
							<input id="dry" type="radio" name="moisture" value="2">  
							<label for="dry">Dry</label> 			
						</div>  
						<div class="panel-group" id="accordion">
						  <div class="panel panel-default">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOneStep3">
							<div class="panel-heading">
							  <h5>
									<img src="<?php bloginfo('template_directory') ?>/img/black/info-circle.svg" class="msform-info-svg"> info	
							  </h5>
							</div>
								</a>
							<div id="collapseOneStep3" class="panel-collapse collapse">
							  <div class="panel-body">
								Even when indoors, some industries inevitable need to wash down or steam floor/walls and equipment. In such cases you need to have the right protection for your electronics, which we will provide.
							  </div>
							</div>
						  </div>
						  </div>
						<input type="button" name="ms-previous" class="ms-previous action-button" value="Previous" />
						<input type="submit" name="submit" id="submit" class="submit action-button" value="Submit" />
						 <button type="button" class="ms-close action-button" data-dismiss="modal">Close</button>
					</fieldset>

				</form>

	
      </div> <!-- /.modal-dialog -->
    </div><!-- /.modal -->

<?php get_footer(); ?>