<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!--FAV ICONS --->
	<link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory') ?>/img/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory') ?>/img/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory') ?>/img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory') ?>/img/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory') ?>/img/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory') ?>/img/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory') ?>/img/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory') ?>/img/apple-touch-icon-152x152.png">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory') ?>/img/favicon-196x196.png" sizes="196x196">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory') ?>/img/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory') ?>/img/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory') ?>/img/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory') ?>/img/favicon-32x32.png" sizes="32x32">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php bloginfo('template_directory') ?>/img/mstile-144x144.png">
	<meta name="msapplication-config" content="<?php bloginfo('template_directory') ?>/img/browserconfig.xml">
	
    <!-- Bootstrap -->
    <!--<link href="<?php bloginfo('template_directory') ?>/css/bootstrap.min.css" rel="stylesheet">-->
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
	<?php wp_head(); ?>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php
	if (is_page(50)) {
		echo "<style>.page-title {display:none;}</style>";
	}
	?>
</head>
<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TRPG9J"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TRPG9J');</script>
<!-- End Google Tag Manager -->
    
<div class="nd-page-wrap">
	<div class="container">
		<!-- Static navbar -->
		<div class="navbar navbar-default" role="navigation">
			<div>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<img src="<?php bloginfo('template_directory') ?>/img/black/bars.svg" />
					</button>
					<a class="navbar-brand" href=" <?php echo home_url(); ?> ">
						<img src="<?php bloginfo('template_directory') ?>/img/nd-logo4.JPG" />
						Norsk Display
					</a>
				</div>
				<div class="navbar-collapse collapse">
				<!-- WP SEARCH FORM --->
					<form role="search" class="navbar-form navbar-right" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
						<div class="form-group">
							<input class="form-control" type="search" value="" placeholder="Search entire site" name="s" id="s" results="5" required="required" />
						</div>
						<!--<button class="btn btn-default hidden" type="submit" id="searchsubmit">Search</button>-->
					</form>	<!--- / search form--->
					 <?php
						wp_nav_menu( array(
							'menu'              => 'primary',
							'theme_location'    => 'primary',
							'depth'             => 2,
							'menu_class'        => 'nav navbar-nav',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
						);
					?>
				
				</div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</div>
	</div>