<div id="sidebar" class="widget-area col-sm-7" role="complementary">

	<?php
	
		if ( is_user_logged_in() ) 
		{
			//include "modules/sidebar-draftcontentstatus.php";
			
			// Check to see if the draft content plugin is installed, and include sidebar if so
			
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			
			if ( is_plugin_active( 'thirty8-draftcontent/thirty8-draftcontent.php' ) ) 
			{
				$pluginsidebarpath = ABSPATH . "wp-content/plugins/thirty8-draftcontent/draftcontent-sidebar.php";
				include($pluginsidebarpath);	
			} 
			     	
		} 	
		
	?>

	<div id="sidebar-inner">
				
		<?php $selected = (get_field('sidebar_selection')); 
			
			switch($selected){
				
				case 'existing' :
				
					global $post;
					$post_object = get_field('choose_sidebar');  
					$post = $post_object;
					setup_postdata( $post ); 
					$post_id = $post->ID;
					
					if( have_rows('sidebar_block', $post_id) ):
			
		    			while ( have_rows('sidebar_block', $post_id) ) : the_row(); ?>
		    			
						<?php get_template_part('sidebar','blocks'); ?>
					
					<?php endwhile; ?>
					
				<?php endif; ?>			
					
				<?php wp_reset_postdata();
					
					break;
					
				case 'custom' :
				
					get_template_part('sidebar', 'rows');
					
					break;
					
				// nothing has been selected for the page - show a hardcoded default sidebar
				case '' :
				
					get_template_part('sidebar', 'default-page');
										
					break;
			}
			
		?>
		
	</div>

</div>