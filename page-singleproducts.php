<?php
/*
Template Name: Single product
*/
?>

<?php get_header(); ?>


<style>
    .nd-feature-image img {
        display:block;
        margin:0 auto;
        max-width:368px;
        width:100%;
    }
</style>

    
<div class="jumbotron" style="margin-top:0 !important;box-shadow:inset 0 5px 8px rgba(0,0,0,.4);">
    <div class="row">
		<div class="col-md-12 nd-feature-image">
            <?php the_post_thumbnail('full'); ?>
             <h1 class="page-title text-center"><?php the_title(); ?></h1>
            <!--<p class="text-center"><span><a href="#description">Description</a></span> | <span><a href="#pictures">Pictures</a></span> | <span><a href="#technical">Technical description</a></span></p>-->
        </div>
    </div>
</div>

<?php 
/*
#
#   THE CONTENT
#
*/
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="display-description" style="padding:3em 0 1em;">
                <h3 id="description">Description</h2>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <p class="post-content"><?php the_content(); ?></p>
                <?php endwhile; else: ?>
                <?php endif; ?>
            </div> 
        </div>
    </div>
    
   
<!--
#
# TECHNICAL DETAILS
#
-->

 <?php 
//row 1
$post_id = get_the_ID();
$array_tech_meta = get_post_meta( $post_id, 'technical-data', false ); 
//Row1
$row_1_cell_1 = $array_tech_meta[0][0];
$row_1_cell_2 = $array_tech_meta[0][1];

//row2
$row_2_cell_1 = $array_tech_meta[0][2];
$row_2_cell_2 = $array_tech_meta[0][3];

//row3
$row_3_cell_1 = $array_tech_meta[0][4];
$row_3_cell_2 = $array_tech_meta[0][5];

//row4
$row_4_cell_1 = $array_tech_meta[0][6];
$row_4_cell_2 = $array_tech_meta[0][7];

//row5
$row_5_cell_1 = $array_tech_meta[0][8];
$row_5_cell_2 = $array_tech_meta[0][9];

//row6
$row_6_cell_1 = $array_tech_meta[0][10];
$row_6_cell_2 = $array_tech_meta[0][11];
?>
    
    <div class="row">
        <div class="col-md-12">
            <div class="nd-collapse-section">
                <a data-toggle="collapse" class="nd-collapse-trigger accordion-toggle" href="#technicaldetails" aria-expanded="false" aria-controls="technicaldetails">
                    <div class="nd-collapse-trigger-content">Technical data</div>
                </a>
                <div class="collapse display-technical nd-collapse-content" id="technicaldetails">
                    <div class="nd-css-table">
                        <div class="nd-css-row">
                            <div class="nd-css-cell">
                                <?php echo $row_1_cell_1; ?>
                            </div>
                             <div class="nd-css-cell">
                                <?php echo $row_1_cell_2; ?>
                            </div>
                        </div>
                         <div class="nd-css-row">
                            <div class="nd-css-cell">
                               <?php echo $row_2_cell_1; ?>
                            </div>
                             <div class="nd-css-cell">
                                <?php echo $row_2_cell_2; ?>
                            </div>
                        </div>
                         <div class="nd-css-row">
                            <div class="nd-css-cell">
                                <?php echo $row_3_cell_1; ?>
                            </div>
                             <div class="nd-css-cell">
                                <?php echo $row_3_cell_2; ?>
                            </div>
                        </div>
                        <div class="nd-css-row">
                            <div class="nd-css-cell">
                                <?php echo $row_4_cell_1; ?>
                            </div>
                             <div class="nd-css-cell">
                                <?php echo $row_4_cell_2; ?>
                            </div>
                        </div>
                        <div class="nd-css-row">
                            <div class="nd-css-cell">
                                <?php echo $row_5_cell_1; ?>
                            </div>
                             <div class="nd-css-cell">
                                <?php echo $row_5_cell_2; ?>
                            </div>
                        </div>
                         <div class="nd-css-row">
                            <div class="nd-css-cell">
                                <?php echo $row_6_cell_1; ?>
                            </div>
                             <div class="nd-css-cell">
                               <?php echo $row_6_cell_2; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
/*
#
#   OPTIONS
#
*/
?>
     <div class="row">
        <div class="col-md-12">
             <div class="nd-collapse-section">
                <a data-toggle="collapse" class="nd-collapse-trigger accordion-toggle" href="#options" aria-expanded="false" aria-controls="options">
                    <div class="nd-collapse-trigger-content">Additional options</div>
                </a>
                <div class="collapse display-options nd-collapse-content" id="options">
                    <div class="options-section">
                       <?php echo get_post_meta($post_id,'options-meta',true); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php
/*
#
#   LINKS & PICTURES
#
*/
?>
    
    <?php $array_pic_meta = get_post_meta( $post_id, 'pictures-meta', false ); 
    //Row1
    $link1 = $array_pic_meta[0][0];
    $link1_desc = $array_pic_meta[0][1];
    
    //row2
    $link2 = $array_pic_meta[0][2];
    $link2_desc = $array_pic_meta[0][3];

    //row3
    $link3 = $array_pic_meta[0][4];
    $link3_desc = $array_pic_meta[0][5];

    //row4
    $link4 = $array_pic_meta[0][6];
    $link4_desc = $array_pic_meta[0][7];

    //row5
    $link5 = $array_pic_meta[0][8];
    $link5_desc = $array_pic_meta[0][9];

    //row6
    $link6 = $array_pic_meta[0][10];
    $link6_desc = $array_pic_meta[0][11];
    ?>
    
  <div class="row">
        <div class="col-md-12">
             <div class="nd-collapse-section">
                <a data-toggle="collapse" class="nd-collapse-trigger accordion-toggle" href="#links" aria-expanded="false" aria-controls="links">
                    <div class="nd-collapse-trigger-content">Links & pictures</div>
                </a>
                <div class="collapse display-technical nd-collapse-content" id="links">
                    <div class="links-section">
                        <div class="row">
                            <div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-3">
                                <img src="<?php echo $link1; ?>" style="width:100%;">
                            </div>
                            <div class="col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-9">
                                <p><?php echo $link1_desc; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-3">
                                <img src="<?php echo $link2; ?>" style="width:100%;">
                            </div>
                            <div class="col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-9">
                                <p><?php echo $link2_desc; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-3">
                                <img src="<?php echo $link3; ?>" style="width:100%;">
                            </div>
                            <div class="col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-9">                                
                                <p><?php echo $link3_desc; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-3">
                                <img src="<?php echo $link4; ?>" style="width:100%;">
                            </div>
                            <div class="col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-9">
                                <p><?php echo $link4_desc; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div><!---/container-->
<?php get_footer(); ?>