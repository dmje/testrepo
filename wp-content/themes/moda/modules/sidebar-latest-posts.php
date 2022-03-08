<div class="latest-posts-widget widget list-widget">
	
	<div class="widget-inner">
		
	<?php $widget_title = get_sub_field('widget_title'); ?>
	<?php if(get_sub_field('widget_title')){ ?>
		<h3 class="widgettitle"><?php echo $widget_title; ?></h3>
	<?php } else { ?>
		<h3 class="widgettitle">Latest Posts</h3>
	<?php } ?>
	
		<ul>
		<?php $numberposts = get_sub_field('number_of_posts');
			if ($numberposts == 0){	$numberposts = 3; }	
			$args = array( 'numberposts' => $numberposts, 'post_status' => 'publish' );
			$recent_posts = wp_get_recent_posts( $args );
			foreach( $recent_posts as $recent ){
				echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
			}
		?>
		</ul>

	</div>
	
</div>