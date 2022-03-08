<?php 
	$FeaturedPage = get_sub_field("featured_page_selection");
	$FeaturedPageID = $FeaturedPage->ID; 	
		
	$FeaturedPageTitle = get_the_title($FeaturedPageID);			

	$FeaturedPageLink = get_permalink($FeaturedPageID);
	$FeaturedPageBlurb = get_field('page_summary',$FeaturedPageID);

	$FeaturedPageImgID = get_post_thumbnail_id($FeaturedPageID);
	$FeaturedPageImgURL = wp_get_attachment_image_src($FeaturedPageImgID,'460');
	$FeaturedPageImgURL = $FeaturedPageImgURL[0];
	$FeaturedPageImgALT = get_post_meta($FeaturedPageImgID , '_wp_attachment_image_alt', true);
	
?>

<div class="featured-page-widget <?php if( get_sub_field('alternate_colour') ){ echo 'alternate-color'; } ?> feature-widget widget">
	
	<a class="featured-page-widget-image" href="<?php echo $FeaturedPageLink; ?>"><img class="content-block-featured-image" src="<?php echo $FeaturedPageImgURL; ?>" alt="<?php echo $FeaturedPageImgALT; ?>" /></a>
	
	<div class="featured-page-widget-text widget-inner">
		<h3 class="widgettitle"><a href="<?php echo $FeaturedPageLink; ?>"><?php echo $FeaturedPageTitle; ?></a></h3>
		<div class="page-summary"><?php echo $FeaturedPageBlurb;?></div>
		<p class="has-more-button"><a class="button" href="<?php echo $FeaturedPageLink; ?>">
			<?php do_action('thirty8_readmore_text'); ?>
		</a></p>
	</div>
	
</div>