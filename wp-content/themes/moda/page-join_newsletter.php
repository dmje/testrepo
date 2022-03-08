<?php
/*
Template Name: Join our newsletter
*/
?>

<?php get_header(); ?>

<div id="main-content" class="wrap">		

	<div class="container">

		<div class="row">
	
			<div id="page-content" class="col-sm-17">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
						<div class="page-content-inner page-content-inner-first">
							
							<h1 class="page-title"><?php the_title(); ?></h1>
						
						<?php if(get_field('page_intro')){ ?>
							<h2 class="page-intro"><?php the_field('page_intro'); ?></h2>
						<?php } ?>
						
						</div>
						
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('876x360', array( 'class' => 'page-featured-image' )); 
						} ?>
												
						<div class="modular-row row">
							<?php //get_template_part('modules/module', 'switcher'); ?>


							<section class="standard-wysiwyg content-block container">
								
								<div class="row">
									
									<div class="content-block-inner">
								
										<div class="col-sm-24">
											<?php
											
											if(isset($_GET['email'])) 
											{
												$email_insert = strip_tags($_GET['email']);
												
											}
												
											
											// Following code inserts mailerlite form
											// Note that the main header template includes some stuff on this template based on a conditional 
												
											?>
											
											<div class="ml-form-embed"
											
											  data-account="1681892:k4w1o3h3t8"
											
											  data-form="1507244:i2k2a8">
											
											</div>
							
										</div>
									</div>
								</div>
							</section>
														
							<script>
								jQuery(document).ready(function()
								{
									setInterval(function(){
										jQuery('input[type="email"]').val("<?php echo $email_insert;?>");
									}, 100);
								});								
							</script>


						</div>
						
							
					</article>
						
				<?php endwhile; ?>
									
				<?php else : ?>
				
				<div class="page-content-inner">
					<p>Sorry, there appears to be nothing on this page.</p>
				</div>
					
				<?php endif; ?>
					
			</div>
		
			<?php get_sidebar(); ?>
					
		</div><!-- /row -->
		
	</div><!-- /container -->
		
</div><!-- /main-content -->
	
<?php get_footer(); ?>