<?php
/* Template Name: Find Display page */
session_start();
?>
<?php get_header(); ?>
<?php
if (isset($_POST['submit'])) {
    $_SESSION['readdistance'] = $_POST['readdistance'];
    $_SESSION['environment'] = $_POST['environment'];
    $_SESSION['moisture'] = $_POST['moisture']; 
    wp_redirect('http://www.norskdisplay.com/contact/');
} else { ?>
    <div class="container">	
        <div class="row">
            <p>Something went wrong. Please <a href="<?php echo  home_url(); ?>" title="home">go to the home page</a> and try again.</p>
    
        </div>
    </div><!-- /container -->
<?php } ?>

<?php get_footer(); ?>