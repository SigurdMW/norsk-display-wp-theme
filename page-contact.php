<?php
/*
Template Name: Contact page
*/
session_start();
?> 

<?php get_header(); ?>

<?php
$display_guide_flag = false;
	if ( !empty($_SESSION['readdistance'])) {
        if( is_numeric($_SESSION['readdistance']) && is_numeric($_SESSION['environment']) && is_numeric($_SESSION['moisture'])){
            $readingdist = $_SESSION['readdistance'];
            $environment = $_SESSION['environment'];
            $moisture = $_SESSION['moisture'];
            $display_guide_flag = true;
        }
        
        if($readingdist == 1){
            $readingdist = "Maximum 10m";
        } elseif($readingdist == 2){
            $readingdist = "Maximum 25m";
        } elseif($readingdist == 3){
            $readingdist = "Maximum 35m";
        } elseif($readingdist == 4){
            $readingdist = "Maximum 50m";
        } elseif($readingdist == 5){
            $readingdist = "Longer than 50m";
        }
        
        if($environment == 1){
            $environment = "Indoor";
        } elseif($environment == 2){
            $environment = "Outdoor";
        }
        
        if($moisture == 1){
            $moisture = "Wet";
        } elseif($moisture == 2){
            $moisture = "Dry";
        }
	}
?>

<div class="container">
<div class="row">
<div class="col-md-12">
	<!-- script for changing the look on the reCaptcha --->
	<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'white',
    lang : 'en'
 };
 </script>
 
 <?php if (empty($readingdist) || empty($environment) || empty($moisture)) { ?>
		<style>
			.nd-display-output {display:none;}
		</style>
<?php } ?>

<?php //KOPY OF MAIL SUCCES FOR NOW
//send server mail to NorskDisplay
// define variables and set to empty values
$custnameErr = $custemailErr = $custmessageErr = "";
$custname = $custemail = $custmessage = "";
$FORMOKC = TRUE; //this is a flag used for sending mail if form ++ RECAPCHA!!! is correctly filled out

if (isset($_POST['submit'])) {
	if (empty($_POST["custname"])) {
		$custnameErr = "Name is required";
		$FORMOKC = FALSE;
	} else {
		$custname = test_input($_POST["custname"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]{2,50}$/",$custname)) {
			$custnameErr = "Only letters and white space allowed. Name must be minimum 2 characters.";
			$FORMOKC = FALSE;
		}
   }
  
	if (empty($_POST["custemail"])) {
		$custemailErr = "Email is required";
		$FORMOKC = FALSE;
	} else {
		$custemail = test_input($_POST["custemail"]);
		// check if e-mail address syntax is valid
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$custemail)) {
			$custemailErr = "Invalid email format";
			$FORMOKC = FALSE;
		}
	}
	
	if (empty($_POST["custmessage"])) {
		$custmessageErr = "Message is required";
		$FORMOKC = FALSE;
	} else {
		$custmessage = test_input($_POST["custmessage"]);
		// check if e-mail address syntax is valid
		if (!preg_match("/[a-zA-Z0-9\.\,\(\)@#!?]{2,50}$/i",$custmessage)) {
			$custmessageErr = "Please only use regular characters in this field (A-Z is allowed along with numbers and regular symbols).";
			$FORMOKC = FALSE;
		}
	}
    
    if (empty($_POST["nd-view-dist"])){
        $readingdist = $_SESSION['readdistance'];
    } else {
        $readingdist = sanitize_text_field($_POST["nd-view-dist"]);
    }
    if (empty($_POST["nd-environment"])){
        $environment = $_SESSION['environment'];
    } else {
        $environment = sanitize_text_field($_POST["nd-environment"]);
    }
    if (empty($_POST["nd-moisture"])){
         $moisture = $_SESSION['moisture'];
    } else {
        $moisture = sanitize_text_field($_POST["nd-moisture"]);
    }
        
        
	    if($FORMOKC) { //if $FORMOK = true, it means it has not been changed because of missing/wrongful user input. mail can be sent.
     
        // check reCAPTCHA information
        require_once('recaptchalib.php');
         
        $privatekey = "6Ld9BvQSAAAAACDehbT0VTR199Lmx7oEFWA7XsjP";
        $resp = recaptcha_check_answer ($privatekey,
                                    $_SERVER["REMOTE_ADDR"],
                                    $_POST["recaptcha_challenge_field"],
                                    $_POST["recaptcha_response_field"]);
         
        // if CAPTCHA is correctly entered!                        
        if ($resp->is_valid) { //if capcha code is valid, send email.
            $from = 'From: My Contact Form';
            $to = 'contactdisplayform@gmail.com';//
            $subject = "Request from $custname";
            
            // differentiate between guide customers and non-guide customers
            if( $display_guide_flag ){
                $body = "From: $custname\n E-Mail: $custemail\n Message: $custmessage\n Reading distance: $readingdist\n Environment: $environment \n Moisture: $moisture \n\n E-mail sent from norskdisplay.com contact form";
            } else {
                $body = "From: $custname\n E-Mail: $custemail\n Message: $custmessage \n\n E-mail sent from norskdisplay.com contact form";
            }
                if (mail ($to, $subject, $body, $from)) { ?>
                    <div class="alert alert-success nd-fadein nd-user-message">
                        <button type="button" class="nd-closemsg-button" data-dismiss="alert" aria-hidden="true">
                            <img src="<?php bloginfo('template_directory') ?>/img/times-success.svg" title="close">
                        </button>
                        <img src="<?php bloginfo('template_directory') ?>/img/check-circle-success.svg" class="nd-success-icon hidden-xs" title="success">
                        <p>
                        Message was sent successfully!
                        </p>
                    </div>
                <?php } else { ?>
                        <div class="alert alert-danger nd-wiggle nd-user-message">
                            <button type="button" class="nd-closemsg-button" data-dismiss="alert" aria-hidden="true">
                                <img src="<?php bloginfo('template_directory') ?>/img/times-danger.svg" title="close">
                            </button>
                            <img src="<?php bloginfo('template_directory') ?>/img/warning-danger.svg" class="nd-success-icon hidden-xs" title="alert-message">
                            <p>
                            Sorry, we were unable to send your request. Try again, please?<br />
                            If you experience repeated problems, please contact <a href="mailto:sales@norskdisplay.com" title="send us mail">sales@norskdisplay.com</a>.
                            </p>
                        </div>		
                <?php	}
                } else { // CAPTCHA entries are incorrect ?>
                    <div class="alert alert-danger nd-wiggle nd-user-message">
                        <button type="button" class="nd-closemsg-button" data-dismiss="alert" aria-hidden="true">
                                <img src="<?php bloginfo('template_directory') ?>/img/times-danger.svg" title="close">
                        </button>
                        <img src="<?php bloginfo('template_directory') ?>/img/warning-danger.svg" class="nd-success-icon hidden-xs" title="alert-message">
                        <p>
                        Seems like there is something wrong with the reCapcha-code. Please review and submit again.
                        </p>
                    </div>
                <?php }
    }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

</div><!--- /col-12 -->
</div><!--- /row for php messages --->


	<div class="row">
		<div class="col-md-12">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1 class="page-title"><?php the_title(); ?></h1>
			<?php the_content(); ?>

		<?php endwhile; else: ?>
			<p><?php _e(' '); ?></p>
		<?php endif; ?>

		</div>
	</div>

    <?php if($display_guide_flag){ ?>
        <div class="alert alert-info"><b>Thanks for completing our display-guide!</b><br>We want to help you in the best possible way. Please fill out the contact form below so we may find the solution that fits your needs. We will personally contact you within 3 working days.</div>
    <?php } ?>

	
	<div class="row">
        <div class="col-md-6 col-md-push-6">
		  <?php $post_id = get_the_ID();echo get_post_meta( $post_id, 'contact-meta-box', true );  ?>
		</div>
        
		<div class="col-md-6 col-md-pull-6">
		
		<!-- thanks to http://www.kirupa.com/html5/adding_reCAPTCHA_to_a_contact_form.htm -->
			<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST" role="form">
				<fieldset class="form-group">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="form-divider">
								<label for="custname">Name <span class="nd-required">*</span></label>
								<input class="form-control" placeholder="Name" name="custname" id="custname" type="text" value="<?php echo htmlspecialchars($custname);?>">
								<div class="form-error-req"><?php echo $custnameErr;?></div>
							</div>
							<div class="form-divider">
								<label for="custemail">E-Mail <span class="nd-required">*</span></label>
								<input class="form-control" placeholder="E-mail" name="custemail" id="custemail" type="text" value="<?php echo htmlspecialchars($custemail);?>">
								<div class="form-error-req"><?php echo $custemailErr;?></div>
							</div>   
							 
                            <label class="nd-display-output">Reading distance</label>
							<input class="nd-display-output form-control" value="<?php echo $readingdist; ?>" name="nd-view-dist">
                            <label class="nd-display-output">Environment</label>
							<input class="nd-display-output form-control" value="<?php echo $environment; ?>" name="nd-environment">
							<label class="nd-display-output">Moisture</label>
                            <input class="nd-display-output form-control" value="<?php echo $moisture; ?>" name="nd-moisture">
					
						<label for="custmessage">Message <span class="nd-required">*</span></label>
						<textarea class="form-control" name="custmessage" class="form-control" rows="4" id="custmessage" placeholder="Message goes here"><?php echo htmlspecialchars($custmessage);?></textarea>
						<div class="form-error-req"><?php echo $custmessageErr;?></div>
					
						<div class="nd-recaptcha-area">
							<p>Please prove that you are a human:</p>
							<?php
							  require_once('recaptchalib.php');
							  $publickey = "6Ld9BvQSAAAAAH4fe5U6YKXk8h2k946dQIhOAHWA";
							  echo recaptcha_get_html($publickey);
							?>
						</div>
					
						<br/>
						<button class="btn btn-success btn-lg" name="submit" type="submit" value="Submit">Send mail</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		
	</div>
	
</div><!--/container-->
<?php get_footer(); ?>