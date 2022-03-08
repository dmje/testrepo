<?php get_header(); ?>

<div id="main-content" class="wrap">

	<div class="container">

		<div class="row">
	
			<div id="page-content" class="index-listing col-sm-16 col-sm-offset-4">
				
				<div class="page-content-inner">
					
					<h1 class="page-title utility-page-title center"><?php printf( __( 'Search Results for: %s', '' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
					
								<?php
									
								$current_url = $_SERVER['REQUEST_URI'];

								$quotedsearch = home_url() . '?s=&quot;' . $s . '&quot;';

								if(preg_match('/"/', $s))
								{
									
								}
								else
								{
								?>

				
								<!--
									<p>You may find you get more exact results by <a href="<?php echo $quotedsearch;?>">encapsulating your search term in quotes</a>.</p>					
								-->
								
								<?php
								
								}
								
								if(isset($_GET['post_type']))
								{
								
									$post_type_filter = $_GET['post_type'];
									
									if($post_type_filter == "object")
									{
										
										$s = get_search_query();
										
										$allresultsurl = home_url() . '?s=' . $s;
										
										
								?>
								
									<p>Displaying collection records only. Show <a href="<?php echo $allresultsurl;?>">all results</a> instead.</p>
								
								<?php
									}
									
								}
								else
								{
								?>									
									
									<p>Displaying all results. Display only <a href="<?php echo $current_url . '&post_type=object'?>">collection related results</a> instead.</p>
									
								<?php
								}
								?>						
				
					<?php if (have_posts()) : ?>
						
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
								
								//echo $post->ID;
	
							$results_details = thirty8_get_item_details($post->ID);
							
							$result_title = $results_details['title'];
							$result_blurb = $results_details['blurb'];
							$result_src = $results_details['image_src'];
							$result_alt = $results_details['image_alt'];
																		
							?>
						
							<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
								
								<div class="col-sm-8">
									<a class="feature-block-image" href="<?php the_permalink(); ?>">
										<img src="<?php echo $result_src;?>" alt="<?php echo $result_alt;?>" />
									</a>
								</div>
								
								<div class="snippet col-sm-16">
																	
									<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( "Permalink to", "custom" ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
																
									<?php if($result_blurb){ ?>
										<div class="page-summary"><?php echo $result_blurb; ?></div>
									<?php } ?>
									
									<p class="snippet-read-more"><a href="<?php the_permalink() ?>">Read More</a><i class="fa fa-angle-right" aria-hidden="true"></i></p>
									
								</div>
							
							</article>
						
						<?php endwhile; ?>
						
					<div class="pagination row">
						<?php if ( function_exists( 'wp_pagenavi' ) ) {  ?>
							<?php wp_pagenavi( array( 'query' => $wp_query ) ); ?>
						<?php } else { ?>
						<div class="alignleft">
							<?php next_posts_link( 'Older Entries'); ?>
						</div>
						<div class="alignright">
							<?php previous_posts_link( 'Newer Entries', $wp_query->max_num_pages ); ?>
						</div>
						<?php } ?>
					</div><!-- /pagination -->
					
					<?php else : ?>
					
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<p class="center">Sorry, nothing found for that search term.</p>
							<?php get_search_form(); ?>
						</article>
				
					<?php endif; ?>
				
				</div>
				
			</div><!-- /content -->
			
		</div><!-- /row -->

	</div><!-- /container -->

</div><!-- /main-content wrap -->
	
<?php get_footer(); ?>