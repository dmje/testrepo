<?php get_header(); ?>

<div id="main-content" class="wrap">

	<div class="container">

		<div class="row">
	
			<div id="page-content" class="index-listing col-sm-17">
				
				<div class="page-content-inner">
				
				<?php if (have_posts()) : ?>
				
			 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			 	  <?php if (is_category()) { ?>
					<h1 class="page-title"><?php single_cat_title(); ?> <?php _e( "Category", "custom" ); ?></h1>
			 	  <?php } elseif( is_tag() ) { ?>
					<h1 class="page-title"><?php _e( "Tagged with", "custom" ); ?> <?php single_tag_title(); ?></h1>
			 	  <?php } elseif (is_day()) { ?>
					<h1 class="page-title"><?php the_time('F jS Y'); ?> <?php _e( "Archive", "custom" ); ?></h1>
			 	  <?php  } elseif (is_month()) { ?>
					<h1 class="page-title"><?php the_time('F Y'); ?> <?php _e( "Archive", "custom" ); ?></h1>
			 	  <?php } elseif (is_year()) { ?>
					<h1 class="page-title"><?php the_time('Y'); ?> <?php _e( "Archive", "custom" ); ?> </h1>
				  <?php  } elseif (is_author()) { ?>
					<h1 class="page-title"><?php _e( "Author Archive", "custom" ); ?></h1>
			 	  <?php  } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					<h1 class="page-title"><?php _e( "Blog Archives", "custom" ); ?></h1>
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
					
					<?php endif; ?>
					
				</div>
			
			</div>
		
			<?php get_sidebar('posts'); ?>
					
		</div><!-- /row -->
		
	</div><!-- /container -->
		
</div><!-- /main-content -->
		
<?php get_footer(); ?>