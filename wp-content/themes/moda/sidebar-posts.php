<div id="sidebar" class="widget-area col-sm-7" role="complementary">

	<div id="sidebar-inner">

		<?php 		
			$archive_sidebar = get_theme_mod('thirty8_archive_sidebar'); 
			$single_sidebar = get_theme_mod('thirty8_single_sidebar'); 
		?>

		<?php if(is_archive() || is_home()){ 
			$post_object = $archive_sidebar;
		} elseif(is_singular()){
			$post_object = $single_sidebar;
		}
		
		$post = $post_object;
		
		setup_postdata( $post ); 
		$post_id = $post;
		
		if( have_rows('sidebar_block', $post_id) ):
		
			while ( have_rows('sidebar_block', $post_id) ) : the_row(); ?>
			
			<?php get_template_part('sidebar','blocks'); ?>
		
		<?php endwhile; ?>
			
		<?php endif; ?>			
			
		<?php wp_reset_postdata(); ?>
								
	</div>

</div>


