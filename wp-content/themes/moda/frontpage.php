<?php
/* 
Template Name: Frontpage 
*/
?>

<?php get_header(); ?>

<div class="object-montage wrap">

<?php if ( have_rows( 'object_montage' ) ) : ?>
	
	<div class="montage-grid">
	
	<?php while ( have_rows( 'object_montage' ) ) : the_row(); ?>

			<div class="montage-object js-height">
				
				<?php if( get_sub_field( 'image_or_text' ) == 'image'){ ?>
				
					<?php $post_object = get_sub_field( 'object_selection' ); ?>
					<?php if ( $post_object ): ?>
					
						<?php $post = $post_object; ?>
						<?php 
							setup_postdata( $post );
							$objectimage = cos_get_field('image');
							$object_title = get_the_title();
						?> 
						
						<a href="<?php the_permalink(); ?>" class="montage-object-link">
						<?php if ( get_sub_field( 'override_image' ) == 1 ) { ?>
							<?php $manual_image = get_sub_field( 'manual_image' ); ?>
							<?php if ( $manual_image ) { ?>
								<?php
									$size = '360x360';
									$montage_image = $manual_image['sizes'][ $size ];
								?>
								<img src="<?php echo $montage_image; ?>" alt="<?php echo $manual_image['alt']; ?>" />
								<div class="montage-object-inner">
									<p class="montage-object-caption"><?php echo $manual_image['caption']; ?></p>
								</div>
							<?php } ?>
						<?php } else { ?>
							    <img src="<?php echo $objectimage; ?>" alt="<?php echo $object_title; ?>" /> 
						<?php } ?>
						</a>
						
					<?php wp_reset_postdata(); ?>
					<?php endif; ?>
					
				<?php } else { ?>
				
					<div class="montage-object-text">
						<div>
							<span class="montage-text-divider"></span>
							<?php the_sub_field( 'text' ); ?> 
						</div>
					</div>
				
				<?php } ?>
				
			</div>
			
		<?php endwhile; ?>

	</div>
<?php else : ?>
	<?php // no items found ?>
<?php endif; ?>

</div>

<div class="clearfix"></div>

<?php if( get_field( 'intro_statement' ) ){ ?>
	<div class="wrap">
		<div class="container">
			<div class="row">
				<h1 class="front-intro-statement"><?php the_field( 'intro_statement' ); ?></h1>
			</div>
		</div>
	</div>
<?php } ?>

<div class="front-modular-wrap wrap">
	<div class="container">
		<div class="modular-row row">
			<?php get_template_part('modules/module', 'switcher'); ?>
		</div>
	</div>
</div>
	
<?php get_footer(); ?>