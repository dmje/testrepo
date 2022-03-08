<div class="news-categories-widget widget list-widget">
	
	<div class="widget-inner">
		
	<?php $widget_title = get_sub_field('widget_title'); ?>
	<?php if(get_sub_field('widget_title')){ ?>
		<h3 class="widgettitle"><?php echo $widget_title; ?></h3>
	<?php } else { ?>
		<h3 class="widgettitle">Categories</h3>
	<?php } ?>
		
		<ul>
		<?php
				 
			$args = array(
				'hide_empty'			 => 0,
				'title_li'           => ''
		    );
		    wp_list_categories( $args ); 
		    
		?> 
		</ul>
	
	</div>

</div>