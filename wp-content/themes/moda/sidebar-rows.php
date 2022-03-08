
<?php if( have_rows('sidebar_block') ):

	while ( have_rows('sidebar_block') ) : the_row(); ?>

		<?php get_template_part('sidebar','blocks'); ?>

	<?php endwhile; ?>
	
<?php endif; ?>
		
