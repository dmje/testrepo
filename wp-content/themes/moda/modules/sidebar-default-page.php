<div class="widget">
	
	<div class="widget-inner">

		<h3 class="widgettitle">Latest News</h3>
		
			<ul>
			<?php		
			$args = array( 'post_type' => 'post', 'posts_per_page' => '3', 'order'=> 'DESC', 'orderby' => 'date', 'post_status' => 'publish');
			$postslist = get_posts( $args );
			foreach ($postslist as $post) :  setup_postdata($post); 										
			?>													
				<li>
				<a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
				</li>			                                    
		
			<?php endforeach; ?>	
			</ul>
		
		<?php wp_reset_query(); ?>

	</div>
	
</div>