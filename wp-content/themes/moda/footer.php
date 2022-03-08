<footer>

	<div class="wrap">
		
		<div class="container">
			
			<div id="main-footer" class="row">
				
				<div id="footer-logos" class="col-sm-8 footer-block">
					<a href="https://www.mdx.ac.uk/" target="_blank">
						<img id="middlesex-uni-logo" src="<?php bloginfo( 'template_directory' ); ?>/images/middlesex-uni-logo.svg" alt="Middlesex University London" />
					</a>
					<img id="designated-collection-logo" src="<?php bloginfo( 'template_directory' ); ?>/images/designated-outstanding-collection.png" alt="Designated Outstanding Collection" />
				</div>
				
				<div id="footer-signup" class="col-sm-8 footer-block">
					
				<?php if( get_theme_mod('thirty8_signupheader_text') != '' ){ ?>
					<h3><?php do_action('thirty8_signupheader_text'); ?></h3>
				<?php } ?>
					
				<?php if( get_theme_mod('thirty8_signup_text') != '' ){ ?>
					<div><?php do_action('thirty8_signup_text'); ?></div><br/>
				<?php } ?>
				
				<?php $form_action = get_theme_mod( 'thirty8_signupaction_text', '' ); ?>
					<form action="<?php if($form_action != ''){ echo $form_action; } ?>" method="get" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate mc-signup" novalidate>
						<div class="signup-form-inner">
							<div class="signup-textfield">
								<input type="email" value="" name="email" class="email" id="mce-EMAIL" placeholder="Your email address" required>
							</div>
							<div class="signup-button">
								<input type="submit" class="button secondary-button" value="Sign up" name="subscribe" id="mc-embedded-subscribe">
							</div>
						</div>
					</form>				
				
				</div>
				
				<div id="footer-social" class="col-sm-6 col-sm-offset-2 footer-block">
					
					<?php if( get_theme_mod('thirty8_social_header') != '' ){ ?>
						<h3><?php do_action('thirty8_social_header'); ?></h3>
					<?php } ?>
					
						<ul class="social-links">
						<?php if( get_theme_mod('thirty8_facebook_link') != '' ){ ?>
							<li><a target="_blank" href="<?php do_action('thirty8_facebook_link'); ?>" title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span>
		</a></li>
						<?php } ?>
						<?php if( get_theme_mod('thirty8_twitter_link') != '' ){ ?>
							<li><a target="_blank" href="<?php do_action('thirty8_twitter_link'); ?>"><i class="fa fa-twitter"></i><span>Twitter</span></a></li>
						<?php } ?>
						<?php if( get_theme_mod('thirty8_googleplus_link') != '' ){ ?>
							<li><a target="_blank" href="<?php do_action('thirty8_googleplus_link'); ?>"><i class="fa fa-google-plus"></i><span>Google+</span></a></li>
						<?php } ?>
						<?php if( get_theme_mod('thirty8_linkedin_link') != '' ){ ?>
							<li><a target="_blank" href="<?php do_action('thirty8_linkedin_link'); ?>"><i class="fa fa-linkedin"></i><span>LinkedIn</span></a></li>
						<?php } ?>
						<?php if( get_theme_mod('thirty8_youtube_link') != '' ){ ?>
							<li><a target="_blank" href="<?php do_action('thirty8_youtube_link'); ?>"><i class="fa fa-youtube"></i><span>YouTube</span></a></li>
						<?php } ?>
						<?php if( get_theme_mod('thirty8_vimeo_link') != '' ){ ?>
							<li><a target="_blank" href="<?php do_action('thirty8_vimeo_link'); ?>"><i class="fa fa-vimeo-square"></i><span>Vimeo</span></a></li>
						<?php } ?>
						<?php if( get_theme_mod('thirty8_instagram_link') != '' ){ ?>
							<li><a target="_blank" href="<?php do_action('thirty8_instagram_link'); ?>"><i class="fa fa-instagram"></i><span>Instagram</span></a></li>
						<?php } ?>
						<?php if( get_theme_mod('thirty8_pinterest_link') != '' ){ ?>
							<li><a target="_blank" href="<?php do_action('thirty8_pinterest_link'); ?>"><i class="fa fa-pinterest"></i><span>Pinterest</span></a></li>
						<?php } ?>
						<?php if( get_theme_mod('thirty8_flickr_link') != '' ){ ?>
							<li><a target="_blank" href="<?php do_action('thirty8_flickr_link'); ?>"><i class="fa fa-flickr"></i><span>Flickr</span></a></li>
						<?php } ?>
					</ul>
					
				</div>
				
			</div>
				
			<div class="clearfix"></div>
			
			<div class="row">
					
				<div id="footer-nav" class="col-sm-16 footer-block">
				
					<nav class="footer-navigation" role="navigation">
						<ul>
						<?php wp_nav_menu( array( 'menu'  => 'footer-navigation', 'theme_location' => 'footer_1', 'menu_id' => 'footer-quick-links', 'container' => '', 'items_wrap' => '%3$s') ); ?>
						</ul>
					</nav>		
					
				</div>	
				
				<div class="col-sm-6 col-sm-offset-2">
					<?php if( get_theme_mod('thirty8_footer_text') != '' ){ ?>
						<p><?php do_action('thirty8_footer_text'); ?></p>
					<?php } ?>
						<p>Site by <a href="https://thirty8.co.uk" target="_blank">Thirty8 Digital</a></p>
				</div>
				
			</div>
		
		</div>
		
	</div>
	
</footer>

<?php wp_footer(); ?>

</body>

</html>