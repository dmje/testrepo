<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>

<div id="main-content" class="wrap">

	<div class="container">

		<div class="row">
	
			<div id="page-content" class="col-sm-24">
				
				<div id="page-content-inner">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							
						<h1 class="page-title"><?php the_title(); ?></h1>
						
						<?php if(get_field('page_intro')){ ?>
							<h2 class="page-intro"><?php the_field('page_intro'); ?></h2>
						<?php } ?>
						
						<?php if(get_field("display_featured_image") == true){
							$image_id = get_post_thumbnail_id($post->ID);	
							$heroimage_url = wp_get_attachment_image_src($image_id,'800-landscape'); 
							$heroimage_url = $heroimage_url[0];
							$alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
							if($image_id){
						?>						
						<div class="lead-image">
							<img src="<?php echo $heroimage_url;?>" alt="<?php echo $alt_text; ?>"/>
						</div>
						<?php }
						} ?>	
						
						
						<div class="modular-row row">
							<?php get_template_part('modules/module', 'switcher'); ?>
						</div>
							
						
					</article>
						
				<?php endwhile; ?>
									
				<?php else : ?>
				
					<p>Sorry, there appears to be nothing on this page.</p>
					
				<?php endif; ?>
				
				</div>
					
			</div>
				
		</div><!-- /row -->
		
	</div><!-- /container -->
		
</div><!-- /main-content -->
	
<?php get_footer(); ?>