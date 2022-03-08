<div class="general-links-widget widget list-widget">

	<div class="widget-inner">
		
		<?php $widget_title = get_sub_field('widget_title'); ?>
		<?php if(get_sub_field('widget_title')){ ?>
		<h3 class="widgettitle"><?php echo $widget_title; ?></h3>
		<?php } else { ?>
			<h3 class="widgettitle">Links</h3>
		<?php } ?>

		<?php if( have_rows('link') ): ?>
		<ul>
		<?php while ( have_rows('link') ) : the_row(); ?>
		
			<?php $link_title = get_sub_field('link_title'); ?>
			<?php $link_url = get_sub_field('link_url'); ?>
			<li><a href="<?php echo $link_url; ?>" target="_blank"><?php echo $link_title; ?></a></li>
			
		<?php endwhile; ?>
		</ul>
		<?php else :
		endif;
		?>
		
	</div>

</div>