<div class="random-page-widget feature-widget widget">

	<!-- random-page - exclude current page, the homepage and the blog -->
	<?php		
	$frontpage_id = get_option('page_on_front');
	$blog_page_id = get_option('page_for_posts');
	$this_page_id = $wp_query->post->ID;
	$exclude_ids = array($frontpage_id, $blog_page_id, $this_page_id);
	$args = array( 'post_type' => 'page', 'post__not_in' => $exclude_ids, 'posts_per_page' => '1', 'order'=> 'ASC', 'orderby' => 'rand', 'post_status' => 'publish');
	$postslist = get_posts( $args );
	foreach ($postslist as $post) :  setup_postdata($post);
	?>					
			
	<a class="random-page-widget-image" href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) {
		the_post_thumbnail('400x300'); 
		} else {
		echo '<img src="';
		echo bloginfo('template_directory'); 
		echo '/images/default-photo.png " alt="" />';
		}
		?>
	</a>
	
	<div class="featured-page-widget-text widget-inner">
		<h3 class="widgettitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<div class="page-summary"><?php the_field('page_summary', $post->ID) ?></div>	
		<p class="has-more-button"><a class="button" href="<?php the_permalink();  ?>">
			<?php do_action('thirty8_readmore_text'); ?>
		</a></p>
	</div>
				                                    

	<?php endforeach; ?>	
	
	<?php wp_reset_postdata(); ?>

</div>

