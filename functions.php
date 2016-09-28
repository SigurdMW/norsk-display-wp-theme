<?php	
	//getting the bootstrap nav to work in wordpress
	require_once('wp_bootstrap_navwalker.php');
	
	register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Norsk Display' ),
	) );
	
	//add thumbnails for pages and posts
	add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
	
	//load jquery in footer
	if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
		function my_jquery_enqueue() {
		   wp_deregister_script('jquery');
		   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-latest.min.js", true, null, true);
		   wp_enqueue_script('jquery');
	};
	
	//change look of the_excerpt
	function new_excerpt_more( $more ) {
	return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
	//changing excerpt length
	function custom_excerpt_length( $length ) {
	return 20;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/* --  remove heigh and width om images wp-- */
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}



//is single-page-template

$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
  // check for a template type
      if ($template_file == 'page-singleproducts.php') {

    /* add text field in admin area for technical details */
    add_action( 'admin_menu', 'my_create_technical_meta_box' );
    add_action( 'save_post', 'my_save_technical_meta_box', 10, 2 );



    function my_create_technical_meta_box() { 
        add_meta_box( 'technical-meta-box', 'Technical data', 'my_technical_meta_box', 'page', 'normal', 'high' );
    }

    function my_technical_meta_box( $object, $box ) { ?>
        <p>
            <?php 
            $meta_array_value = get_post_meta( $object->ID, 'technical-data', false ); 
            $row1_cell1 = $meta_array_value[0][0];
            $row1_cell2 = $meta_array_value[0][1];
            $row2_cell1 = $meta_array_value[0][2];
            $row2_cell2 = $meta_array_value[0][3];
            $row3_cell1 = $meta_array_value[0][4];
            $row3_cell2 = $meta_array_value[0][5];
            $row4_cell1 = $meta_array_value[0][6];
            $row4_cell2 = $meta_array_value[0][7];
            $row5_cell1 = $meta_array_value[0][8];
            $row5_cell2 = $meta_array_value[0][9];
            $row6_cell1 = $meta_array_value[0][10];
            $row6_cell2 = $meta_array_value[0][11];
            ?>
            <table>
                <tr>
                    <td><label for="technical-row1-cell1">Label row1:</label><input type="text" name="technical-row1-cell1" id="technical-row1-cell1" value="<?php echo wp_specialchars($row1_cell1,1); ?>"></td>
                    <td><label for="technical-row1-cell2">Text row1:</label><textarea name="technical-row1-cell2" id="technical-row1-cell2"><?php echo wp_specialchars($row1_cell2,1); ?></textarea></td>
                </tr>
                 <tr>
                    <td><label for="technical-row2-cell1">Label row2:</label><input type="text" name="technical-row2-cell1" id="technical-row2-cell1" value="<?php echo wp_specialchars( $row2_cell1, 1 ); ?>"></td>
                    <td><label for="technical-row2-cell2">Text row2:</label><textarea name="technical-row2-cell2" id="technical-row2-cell2"><?php echo wp_specialchars( $row2_cell2, 1 ); ?></textarea></td>
                </tr>
                 <tr>
                    <td><label for="technical-row3-cell1">Label row3:</label><input type="text" name="technical-row3-cell1" id="technical-row3-cell1" value="<?php echo wp_specialchars( $row3_cell1, 1 ); ?>"></td>
                    <td><label for="technical-row3-cell2">Text row3:</label><textarea name="technical-row3-cell2" id="technical-row3-cell2"><?php echo wp_specialchars( $row3_cell2, 1 ); ?></textarea></td>
                </tr>
                 <tr>
                    <td><label for="technical-row4-cell1">Label row4:</label><input type="text" name="technical-row4-cell1" id="technical-row4-cell1" value="<?php echo wp_specialchars( $row4_cell1, 1 ); ?>"></td>
                    <td><label for="technical-row4-cell2">Text row4:</label><textarea name="technical-row4-cell2" id="technical-row4-cell2"><?php echo wp_specialchars( $row4_cell2, 1 ); ?></textarea></td>
                </tr>
                 <tr>
                    <td><label for="technical-row5-cell1">Label row5:</label><input type="text" name="technical-row5-cell1" id="technical-row5-cell1" value="<?php echo wp_specialchars( $row5_cell1, 1 ); ?>"></td>
                    <td><label for="technical-row5-cell2">Text row5:</label><textarea name="technical-row5-cell2" id="technical-row5-cell2"><?php echo wp_specialchars( $row5_cell2, 1 ); ?></textarea></td>
                </tr>
                 <tr>
                    <td><label for="technical-row6-cell1">Label row6:</label><input type="text" name="technical-row6-cell1" id="technical-row6-cell1" value="<?php echo wp_specialchars( $row6_cell1, 1 ); ?>"></td>
                    <td><label for="technical-row6-cell2">Text row6:</label><textarea name="technical-row6-cell2" id="technical-row6-cell2"><?php echo wp_specialchars( $row6_cell2, 1 ); ?></textarea></td>
                </tr>
            </table>
            <input type="hidden" name="technical_my_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
        </p>
    <?php }

    function my_save_technical_meta_box( $post_id, $post ) {

        if ( !wp_verify_nonce( $_POST['technical_my_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
            return $post_id;

        if ( !current_user_can( 'edit_post', $post_id ) )
            return $post_id;

        $meta_value = get_post_meta( $post_id, 'technical-data', false );
        $row1_cell1 = stripslashes($_POST['technical-row1-cell1']);
        $row1_cell2 = stripslashes($_POST['technical-row1-cell2']);
        $row2_cell1 = stripslashes($_POST['technical-row2-cell1']);
        $row2_cell2 = stripslashes($_POST['technical-row2-cell2']);
        $row3_cell1 = stripslashes($_POST['technical-row3-cell1']);
        $row3_cell2 = stripslashes($_POST['technical-row3-cell2']);
        $row4_cell1 = stripslashes($_POST['technical-row4-cell1']);
        $row4_cell2 = stripslashes($_POST['technical-row4-cell2']);
        $row5_cell1 = stripslashes($_POST['technical-row5-cell1']);
        $row5_cell2 = stripslashes($_POST['technical-row5-cell2']);
        $row6_cell1 = stripslashes($_POST['technical-row6-cell1']);
        $row6_cell2 = stripslashes($_POST['technical-row6-cell2']);

        $new_meta_value = array($row1_cell1,$row1_cell2,$row2_cell1,$row2_cell2,$row3_cell1,$row3_cell2,$row4_cell1,$row4_cell2,$row5_cell1,$row5_cell2,$row6_cell1,$row6_cell2);

        $difference = array_diff($meta_value,$new_meta_value);

        if ( !empty($new_meta_value) && empty($meta_value) )
            add_post_meta( $post_id, 'technical-data', $new_meta_value, true );

        elseif ( !empty($new_meta_value) && !empty($difference))
            update_post_meta( $post_id, 'technical-data', $new_meta_value );

        elseif ( empty($new_meta_value) && !empty($meta_value) )
            delete_post_meta( $post_id, 'technical-data', $meta_value );
    }





    /* add text field in admin area for options */
    add_action( 'admin_menu', 'my_create_options_meta_box' );
    add_action( 'save_post', 'my_save_options_meta_box', 10, 2 );

    function my_create_options_meta_box() { 
        add_meta_box( 'options-meta-box', 'Options meta', 'my_options_meta_box', 'page', 'normal', 'high' );
    }

    function my_options_meta_box( $object, $box ) { ?>
        <p>
            <label for="options-section">Options for this product:</label>
            <br />
            <textarea name="options-section" id="options-section" cols="60" rows="10" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( get_post_meta( $object->ID, 'options-meta', true ), 1 ); ?></textarea>
            <input type="hidden" name="options_my_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
        </p>
    <?php }

    function my_save_options_meta_box( $post_id, $post ) {

        if ( !wp_verify_nonce( $_POST['options_my_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
            return $post_id;

        if ( !current_user_can( 'edit_post', $post_id ) )
            return $post_id;

        $meta_value = get_post_meta( $post_id, 'options-meta', true );
        $new_meta_value = stripslashes( $_POST['options-section'] );

        if ( $new_meta_value && '' == $meta_value )
            add_post_meta( $post_id, 'options-meta', $new_meta_value, true );

        elseif ( $new_meta_value != $meta_value )
            update_post_meta( $post_id, 'options-meta', $new_meta_value );

        elseif ( '' == $new_meta_value && $meta_value )
            delete_post_meta( $post_id, 'options-meta', $meta_value );
    }






    /* add text field in admin area for pictures */
    add_action( 'admin_menu', 'my_create_pictures_meta_box' );
    add_action( 'save_post', 'my_save_pictures_meta_box', 10, 2 );

    function my_create_pictures_meta_box() { 
        add_meta_box( 'pictures-meta-box', 'Pictures & links', 'my_pictures_meta_box', 'page', 'normal', 'high' );
    }

    function my_pictures_meta_box( $object, $box ) { ?>
        <p>
            <?php 
            $meta_array_value = get_post_meta( $object->ID, 'pictures-meta', false ); 
            $row1_cell1 = $meta_array_value[0][0];
            $row1_cell2 = $meta_array_value[0][1];
            $row2_cell1 = $meta_array_value[0][2];
            $row2_cell2 = $meta_array_value[0][3];
            $row3_cell1 = $meta_array_value[0][4];
            $row3_cell2 = $meta_array_value[0][5];
            $row4_cell1 = $meta_array_value[0][6];
            $row4_cell2 = $meta_array_value[0][7];
            $row5_cell1 = $meta_array_value[0][8];
            $row5_cell2 = $meta_array_value[0][9];
            $row6_cell1 = $meta_array_value[0][10];
            $row6_cell2 = $meta_array_value[0][11];
            ?>
            <table>
                <tr>
                    <td><label for="pictures-row1-cell1">Picture link:</label><input type="text" name="pictures-row1-cell1" id="pictures-row1-cell1" value="<?php echo wp_specialchars($row1_cell1,1); ?>"></td>
                    <td><label for="pictures-row1-cell2">Picture text:</label><textarea name="pictures-row1-cell2" id="pictures-row1-cell2"><?php echo wp_specialchars($row1_cell2,1); ?></textarea></td>
                </tr>
                 <tr>
                    <td><label for="pictures-row2-cell1">Picture link:</label><input type="text" name="pictures-row2-cell1" id="pictures-row2-cell1" value="<?php echo wp_specialchars( $row2_cell1, 1 ); ?>"></td>
                    <td><label for="pictures-row2-cell2">Picture text:</label><textarea name="pictures-row2-cell2" id="pictures-row2-cell2"><?php echo wp_specialchars( $row2_cell2, 1 ); ?></textarea></td>
                </tr>
                 <tr>
                    <td><label for="pictures-row3-cell1">Picture link:</label><input type="text" name="pictures-row3-cell1" id="pictures-row3-cell1" value="<?php echo wp_specialchars( $row3_cell1, 1 ); ?>"></td>
                    <td><label for="pictures-row3-cell2">Picture text:</label><textarea name="pictures-row3-cell2" id="pictures-row3-cell2"><?php echo wp_specialchars( $row3_cell2, 1 ); ?></textarea></td>
                </tr>
                 <tr>
                    <td><label for="pictures-row4-cell1">Picture link:</label><input type="text" name="pictures-row4-cell1" id="pictures-row4-cell1" value="<?php echo wp_specialchars( $row4_cell1, 1 ); ?>"></td>
                    <td><label for="pictures-row4-cell2">Picture text:</label><textarea name="pictures-row4-cell2" id="pictures-row4-cell2"><?php echo wp_specialchars( $row4_cell2, 1 ); ?></textarea></td>
                </tr>
                 <tr>
                    <td><label for="pictures-row5-cell1">Picture link:</label><input type="text" name="pictures-row5-cell1" id="pictures-row5-cell1" value="<?php echo wp_specialchars( $row5_cell1, 1 ); ?>"></td>
                    <td><label for="pictures-row5-cell2">Picture text:</label><textarea name="pictures-row5-cell2" id="pictures-row5-cell2"><?php echo wp_specialchars( $row5_cell2, 1 ); ?></textarea></td>
                </tr>
                 <tr>
                    <td><label for="pictures-row6-cell1">Picture link:</label><input type="text" name="pictures-row6-cell1" id="pictures-row6-cell1" value="<?php echo wp_specialchars( $row6_cell1, 1 ); ?>"></td>
                    <td><label for="pictures-row6-cell2">Picture text:</label><textarea name="pictures-row6-cell2" id="pictures-row6-cell2"><?php echo wp_specialchars( $row6_cell2, 1 ); ?></textarea></td>
                </tr>
            </table>
            <input type="hidden" name="pictures_my_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
        </p>
    <?php }

    function my_save_pictures_meta_box( $post_id, $post ) {

        if ( !wp_verify_nonce( $_POST['pictures_my_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
            return $post_id;

        if ( !current_user_can( 'edit_post', $post_id ) )
            return $post_id;

        $meta_value = get_post_meta( $post_id, 'pictures-meta', false );
        $row1_cell1 = stripslashes($_POST['pictures-row1-cell1']);
        $row1_cell2 = stripslashes($_POST['pictures-row1-cell2']);
        $row2_cell1 = stripslashes($_POST['pictures-row2-cell1']);
        $row2_cell2 = stripslashes($_POST['pictures-row2-cell2']);
        $row3_cell1 = stripslashes($_POST['pictures-row3-cell1']);
        $row3_cell2 = stripslashes($_POST['pictures-row3-cell2']);
        $row4_cell1 = stripslashes($_POST['pictures-row4-cell1']);
        $row4_cell2 = stripslashes($_POST['pictures-row4-cell2']);
        $row5_cell1 = stripslashes($_POST['pictures-row5-cell1']);
        $row5_cell2 = stripslashes($_POST['pictures-row5-cell2']);
        $row6_cell1 = stripslashes($_POST['pictures-row6-cell1']);
        $row6_cell2 = stripslashes($_POST['pictures-row6-cell2']);

        $new_meta_value = array($row1_cell1,$row1_cell2,$row2_cell1,$row2_cell2,$row3_cell1,$row3_cell2,$row4_cell1,$row4_cell2,$row5_cell1,$row5_cell2,$row6_cell1,$row6_cell2);

        $difference = array_diff($meta_value,$new_meta_value);

        if ( !empty($new_meta_value) && empty($meta_value) )
            add_post_meta( $post_id, 'pictures-meta', $new_meta_value, true );

        elseif ( !empty($new_meta_value) && !empty($difference))
            update_post_meta( $post_id, 'pictures-meta', $new_meta_value );

        elseif ( empty($new_meta_value) && !empty($meta_value) )
            delete_post_meta( $post_id, 'pictures-meta', $meta_value );
    }
}
//end single page template


//is single-page-template

$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
  // check for a template type
      if ($template_file == 'page-contact.php') {
          
            /* add text field in admin area for content to the right */
            add_action( 'admin_menu', 'create_contact_meta_box' );
            add_action( 'save_post', 'save_contact_meta_box', 10, 2 );

            function create_contact_meta_box() { 
                add_meta_box( 'contact-meta-box', 'Contact additional content', 'create_contact_meta_box_2', 'page', 'normal', 'high' );
            }

            function create_contact_meta_box_2( $object, $box ) { ?>
                <p>
                    <label for="contact-text-box">Additional content for contact-page:</label>
                    <br />
                    <textarea name="contact-additional-content" id="contact-text-box" cols="60" rows="10" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( get_post_meta( $object->ID, 'contact-meta-box', true ), 1 ); ?></textarea>
                    <input type="hidden" name="create_contact_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
                </p>
            <?php }

            function save_contact_meta_box( $post_id, $post ) {

                if ( !wp_verify_nonce( $_POST['create_contact_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
                    return $post_id;

                if ( !current_user_can( 'edit_post', $post_id ) )
                    return $post_id;

                $meta_value = get_post_meta( $post_id, 'contact-meta-box', true );
                $new_meta_value = stripslashes( $_POST['contact-additional-content'] );

                if ( $new_meta_value && '' == $meta_value )
                    add_post_meta( $post_id, 'contact-meta-box', $new_meta_value, true );

                elseif ( $new_meta_value != $meta_value )
                    update_post_meta( $post_id, 'contact-meta-box', $new_meta_value );

                elseif ( '' == $new_meta_value && $meta_value )
                    delete_post_meta( $post_id, 'contact-meta-box', $meta_value );
            }
      } //end is single-page-template
//is single-page-template



$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
  // check for a template type
      if ($template_file == 'page-frontpage.php') {
          
            /* add text field in admin area for content to the right */
            add_action( 'admin_menu', 'create_front_page_content_box_1' );
            add_action( 'save_post', 'save_front_page_content_box_1', 10, 2 );

            function create_front_page_content_box_1() { 
                add_meta_box( 'fp-meta-box-1', 'Frontpage text box', 'create_front_page_content_box_1_2', 'page', 'normal', 'high' );
            }

            function create_front_page_content_box_1_2( $object, $box ) { ?>
                <p>
                    <label for="fp-text-box-1">Frontpage text box content:</label>
                    <br />
                    <textarea name="fp-content-box-1" id="fp-text-box-1" cols="60" rows="10" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( get_post_meta( $object->ID, 'fp-meta-box-1', true ), 1 ); ?></textarea>
                    <input type="hidden" name="create_fp_content_box_1_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
                </p>
            <?php }

            function save_front_page_content_box_1( $post_id, $post ) {

                if ( !wp_verify_nonce( $_POST['create_fp_content_box_1_meta_box_nonce'], plugin_basename( __FILE__ ) ) )
                    return $post_id;

                if ( !current_user_can( 'edit_post', $post_id ) )
                    return $post_id;

                $meta_value = get_post_meta( $post_id, 'fp-meta-box-1', true );
                $new_meta_value = stripslashes( $_POST['fp-content-box-1'] );

                if ( $new_meta_value && '' == $meta_value )
                    add_post_meta( $post_id, 'fp-meta-box-1', $new_meta_value, true );

                elseif ( $new_meta_value != $meta_value )
                    update_post_meta( $post_id, 'fp-meta-box-1', $new_meta_value );

                elseif ( '' == $new_meta_value && $meta_value )
                    delete_post_meta( $post_id, 'fp-meta-box-1', $meta_value );
            }
          
          /*
          #
          #  TEXT FOR GRAY AREA
          #
          */
          
           /* add text field in admin area for content to the right */
            add_action( 'admin_menu', 'create_front_page_featured_text' );
            add_action( 'save_post', 'save_front_page_featured_text', 10, 2 );

            function create_front_page_featured_text() { 
                add_meta_box( 'fp-featured-text', 'Frontpage statement text', 'create_front_page_featured_text_action', 'page', 'normal', 'high' );
            }

            function create_front_page_featured_text_action( $object, $box ) { ?>
                <p>
                    <label for="fp-featured-content">Front page statement:</label>
                    <br />
                    <textarea name="fp-featured-content" id="fp-featured-content" cols="60" rows="10" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( get_post_meta( $object->ID, 'fp-featured-text', true ), 1 ); ?></textarea>
                    <input type="hidden" name="create_fp_featured_text_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
                </p>
            <?php }

            function save_front_page_featured_text( $post_id, $post ) {

                if ( !wp_verify_nonce( $_POST['create_fp_featured_text_nonce'], plugin_basename( __FILE__ ) ) )
                    return $post_id;

                if ( !current_user_can( 'edit_post', $post_id ) )
                    return $post_id;

                $meta_value = get_post_meta( $post_id, 'fp-featured-text', true );
                $new_meta_value = stripslashes( $_POST['fp-featured-content'] );

                if ( $new_meta_value && '' == $meta_value )
                    add_post_meta( $post_id, 'fp-featured-text', $new_meta_value, true );

                elseif ( $new_meta_value != $meta_value )
                    update_post_meta( $post_id, 'fp-featured-text', $new_meta_value );

                elseif ( '' == $new_meta_value && $meta_value )
                    delete_post_meta( $post_id, 'fp-featured-text', $meta_value );
            }
          
          /*
          #
          # Choose image by URL and text on slide
        #
        */
          
    /* add text field in admin area for pictures */
    add_action( 'admin_menu', 'my_create_fp_slider_meta_box' );
    add_action( 'save_post', 'my_save_fp_slider_meta_box', 10, 2 );

    function my_create_fp_slider_meta_box() { 
        add_meta_box( 'fp-slider-meta-box', 'Slider pictues and text', 'fp_slider_meta_box', 'page', 'normal', 'high' );
    }

    function fp_slider_meta_box( $object, $box ) { ?>
        <p>
            <?php 
            $meta_array_value = get_post_meta( $object->ID, 'fp-slider-meta-box', false ); 
            $row1_cell1 = $meta_array_value[0][0];
            $row1_cell2 = $meta_array_value[0][1];
            $row2_cell1 = $meta_array_value[0][2];
            $row2_cell2 = $meta_array_value[0][3];
            $row3_cell1 = $meta_array_value[0][4];
            $row3_cell2 = $meta_array_value[0][5];
            ?>
            <table>
                <tr>
                    <td><label for="pictures-row1-cell1">Slide 1 URL:</label><input type="text" name="pictures-row1-cell1" id="pictures-row1-cell1" value="<?php echo wp_specialchars($row1_cell1,1); ?>"></td>
                    <td><label for="pictures-row1-cell2">Slide 1 text:</label><textarea name="pictures-row1-cell2" id="pictures-row1-cell2"><?php echo wp_specialchars($row1_cell2,1); ?></textarea></td>
                </tr>
                 <tr>
                    <td><label for="pictures-row2-cell1">Slide 2 URL:</label><input type="text" name="pictures-row2-cell1" id="pictures-row2-cell1" value="<?php echo wp_specialchars( $row2_cell1, 1 ); ?>"></td>
                    <td><label for="pictures-row2-cell2">Slide 2 text:</label><textarea name="pictures-row2-cell2" id="pictures-row2-cell2"><?php echo wp_specialchars( $row2_cell2, 1 ); ?></textarea></td>
                </tr>
                 <tr>
                    <td><label for="pictures-row3-cell1">Slide 3 URL:</label><input type="text" name="pictures-row3-cell1" id="pictures-row3-cell1" value="<?php echo wp_specialchars( $row3_cell1, 1 ); ?>"></td>
                    <td><label for="pictures-row3-cell2">Slide 3 text:</label><textarea name="pictures-row3-cell2" id="pictures-row3-cell2"><?php echo wp_specialchars( $row3_cell2, 1 ); ?></textarea></td>
                </tr>
            </table>
            <input type="hidden" name="fp_slider_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
        </p>
    <?php }

    function my_save_fp_slider_meta_box( $post_id, $post ) {

        if ( !wp_verify_nonce( $_POST['fp_slider_nonce'], plugin_basename( __FILE__ ) ) )
            return $post_id;

        if ( !current_user_can( 'edit_post', $post_id ) )
            return $post_id;

        $meta_value = get_post_meta( $post_id, 'fp-slider-meta-box', false );
        $row1_cell1 = stripslashes($_POST['pictures-row1-cell1']);
        $row1_cell2 = stripslashes($_POST['pictures-row1-cell2']);
        $row2_cell1 = stripslashes($_POST['pictures-row2-cell1']);
        $row2_cell2 = stripslashes($_POST['pictures-row2-cell2']);
        $row3_cell1 = stripslashes($_POST['pictures-row3-cell1']);
        $row3_cell2 = stripslashes($_POST['pictures-row3-cell2']);

        $new_meta_value = array($row1_cell1,$row1_cell2,$row2_cell1,$row2_cell2,$row3_cell1,$row3_cell2);

        $difference = array_diff($meta_value,$new_meta_value);

        if ( !empty($new_meta_value) && empty($meta_value) )
            add_post_meta( $post_id, 'fp-slider-meta-box', $new_meta_value, true );

        elseif ( !empty($new_meta_value) && !empty($difference))
            update_post_meta( $post_id, 'fp-slider-meta-box', $new_meta_value );

        elseif ( empty($new_meta_value) && !empty($meta_value) )
            delete_post_meta( $post_id, 'fp-slider-meta-box', $meta_value );
    }
          
      } //end is single-page-template
?>