<?php get_header(); ?>

<div id="main-content" class="wrap">

	<div class="container">

		<div class="row">
	
			<div id="page-content" class="index-listing col-sm-17">
				
				<div class="page-content-inner">
				
					<h1 class="page-title"><?php do_action('thirty8_blogheader_text'); ?></h1>
					
						<?php if( get_theme_mod('thirty8_blogintro_text') != '' ){ ?>
						<h2 class="archive-description"><?php do_action('thirty8_blogintro_text'); ?></h2>
						<?php } ?>
						
						<?php while ( have_posts() ) : the_post(); ?>
						
							<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
								
								<div class="col-sm-8">
									<a class="feature-block-image" href="<?php the_permalink(); ?>">
									<?php if ( has_post_thumbnail() ) { ?>
										<?php the_post_thumbnail('800x600'); ?>
									<?php } else { ?>
										<?php if(get_theme_mod('thirty8_default_image_thumbnail')){ ?>
											<img src="<?php echo get_theme_mod('thirty8_default_image_thumbnail'); ?>" alt="<?php the_title(); ?>" />
										<?php } else { ?>
											<img src="<?php echo get_template_directory_uri(); ?>/images/default-photo.png" alt="<?php the_title(); ?>" />
										<?php } ?>
									<?php } ?>
									</a>
								</div>
								
								<div class="snippet col-sm-16">
								
									<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( "Permalink to", "custom" ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
																
									<?php if(get_field('page_intro')){ ?>
										<div class="page-summary"><?php the_field('page_summary'); ?></div>
									<?php } else { ?>
										<?php the_excerpt(); ?>
									<?php } ?>
									
									<p class="snippet-read-more"><a href="<?php the_permalink() ?>">Read More</a><i class="fa fa-angle-right" aria-hidden="true"></i></p>
									
								</div>
							
							</article>
				
						<?php endwhile; ?>
						
						<div class="pagination row">
							<?php if ( function_exists( 'wp_pagenavi' ) ) {  ?>
					  			<?php wp_pagenavi(  ); ?>
							<?php } else { ?>
							<div class="alignleft">
								<?php next_posts_link( 'Older Entries'); ?>
							</div>
							<div class="alignright">
								<?php previous_posts_link( 'Newer Entries' ); ?>
							</div>
						<?php } ?>
						</div><!-- /pagination -->
					
				</div>	
				  
			</div>				 
	
		<?php get_sidebar('posts'); ?>
					
		</div><!-- /row -->
		
	</div><!-- /container -->
		
</div><!-- /main-content -->
		
<?php get_footer(); ?>