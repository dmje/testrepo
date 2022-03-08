<div class="signup-widget feature-block widget">
	
	<div class="widget-inner">
		
	<?php $widget_title = get_sub_field('widget_title'); ?>
	<?php if(get_sub_field('widget_title')){ ?>
		<h3 class="widgettitle"><?php echo $widget_title; ?></h3>
	<?php } else { ?>
		<h3 class="widgettitle">Newsletter Signup</h3>
	<?php } ?>	
		
		<?php if( get_theme_mod('thirty8_signup_text') != '' ){ ?>
		<div><p><?php do_action('thirty8_signup_text'); ?></p></div>
		<?php } ?>

		<?php $form_action = get_theme_mod( 'thirty8_signupaction_text', '' ); ?>
		<form action="<?php if($form_action != ''){ echo $form_action; } ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
		
			<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Your email address" required>
			<input type="submit" class="widget-button button" value="Subscribe" name="subscribe" id="mc-embedded-subscribe">
		</form>
		
	</div>

</div>

