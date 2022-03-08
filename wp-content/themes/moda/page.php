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
							<?php get_template_part('modules/module', 'switcher'); ?>
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