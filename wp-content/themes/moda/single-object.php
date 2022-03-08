<?php get_header(); ?>

<div id="main-content" class="wrap">
	<div class="container">
		<div class="row">
			<div id="page-content" class="col-sm-24">					
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php
					$fields = get_post_meta(get_the_ID());
					$objectimage = cos_get_field('image');
					$object_title = get_the_title();
					$objectimage = GetResizedImageURL(cos_get_field('image'),460);
				?>
				<article class="object" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="object__header">
						<h1 class="object__title"><?php echo $object_title; ?></h1>
						
						
						<?php
						
						if(isset($_GET['display'])) 
						{
							// display all fields
							echo '<div style="text-align:left; font-size:12px; line-height:80%;">';
							echo '<pre>';
							print_r($fields);
							echo '</pre>';  
							echo '</div>';
						} 			
													
						?>
						
						<!--Hiding type link for now

						<?php 
							if(cos_get_field('type')) :
								$objectType = cos_get_field('type');
								$objectTypeURL = '';

								switch ($objectType) {
									case 'Design':
										$objectTypeURL = 'design';
										break;
									case 'book':
										$objectTypeURL = 'books';
										break;
									case 'ephemera':
										$objectTypeURL = 'ephemera';
										break;
									case 'textile':
									case 'Textile':
										$objectTypeURL = 'textiles';
										break;
									case 'wallpaper':
										$objectTypeURL = 'wallpaper';
										break;
								}
						?>
						<p class="object__type">Type: <a href="<?php echo home_url();?>/object/?type=<?php echo $objectTypeURL; ?>"><?php cos_the_field('type'); ?></a></p>											
						<?php endif; ?>

						-->

					</header>

					<?php 
					if ( cos_get_field('allImages') ):
						$galleryImages = cos_get_field('allImages');
						$galleryImages = explode("|||", $galleryImages);
						$primaryImage = reset($galleryImages);
					endif;
					?>

					<div class="object__content-wrap">
						<div class="object__gallery">
							
							<div class="object__gallery-inner">

								<div class="object__gallery-image">
			
									<?php if ( cos_get_field('allImages') ): ?>
									<a href="<?php echo str_replace('_thumb', '_web', $primaryImage); ?>" class="swipebox" title="<?php echo $object_title; ?>">
										<img src="<?php echo str_replace('_thumb', '_web', $primaryImage); ?>">
									</a>
									<?php else: ?>
									<a href="<?php echo cos_get_field('image'); ?>" class="swipebox" title="<?php echo $object_title; ?>">
										<img src="<?php echo cos_get_field('image'); ?>" style="margin-bottom: 4rem;">
									</a>
									<?php endif; ?>
						
								</div>

								<?php if ( cos_get_field('allImages') ): ?>
								<div class="object__gallery-thumbs">
									<?php $counter = 0; foreach($galleryImages as $galleryImage): ?>
										<a href="<?php echo str_replace('_thumb', '_web', $galleryImage); ?>" class="swipebox" title="<?php echo $object_title; ?>">
											<img src="<?php echo $galleryImage; ?>">
										</a>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>

							</div>

						</div>
					
						<div class="object__sidebar">
							<?php if(cos_get_field('briefDescription')){?>
								<h3 class="object__info-title"><?php echo cos_get_remapped_field_name('briefDescription'); ?></h3>
								<p class="object__info-description"><?php cos_the_field('briefDescription');?></p>
							<?php } ?>

							<?php if(cos_get_field('date')){?>
								<h3 class="object__info-title"><?php echo cos_get_remapped_field_name('date'); ?></h3>
								<p class="object__info-description"><?php cos_the_field('date');?></p>
							<?php } ?>

							<?php if(cos_get_field('code')){?>
								<h3 class="object__info-title"><?php echo cos_get_remapped_field_name('code'); ?></h3>
								<p class="object__info-description"><?php cos_the_field('code');?></p>
							<?php } ?>

							<?php if(cos_get_field('extent')){?>
								<h3 class="object__info-title"><?php echo cos_get_remapped_field_name('extent'); ?></h3>
								<p class="object__info-description"><?php cos_the_field('extent');?></p>
							<?php } ?>

							<?php if(cos_get_field('level')){?>
								<h3 class="object__info-title"><?php echo cos_get_remapped_field_name('level'); ?></h3>
								<p class="object__info-description"><?php cos_the_field('level');?></p>
							<?php } ?>


							<?php if(cos_get_field('dimensions')){?>
								<h3 class="object__info-title"><?php echo cos_get_remapped_field_name('dimensions'); ?></h3>
								<p class="object__info-description"><?php echo str_replace('|||', '<br />', cos_get_field('dimensions'));?></p>
							<?php } ?>

							<?php if(cos_get_field('organisation')){?>
								<h3 class="object__info-title"><?php echo cos_get_remapped_field_name('organisation'); ?></h3>
								<p class="object__info-description"><?php echo str_replace('|||', '<br />', cos_get_field('organisation'));?></p>
							<?php } ?>

							<?php if(cos_get_field('fieldCollectionDate')){?>
								<h3 class="object__info-title"><?php echo cos_get_remapped_field_name('fieldCollectionDate'); ?></h3>
								<p class="object__info-description"><?php cos_the_field('fieldCollectionDate');?></p>
							<?php } ?>
							
							
								<?php
								
								// Moved this out into a function
								$web_caption = GetObjectWebCaption($post->ID);								
																	
								?>
							

								<?php if($web_caption){?>

								<div class="object__accordion">
									<h3 class="object__info-title object__accordion-header">More details <span class="object__accordion-arrow"></span></h3>
									<div class="object__reveal">
									<p class="object__info-description">
										<?php echo $web_caption;?>
									</p>
									</div>
								</div>


								<?php /*
								<!--Temporary fix while reveal isn't working-->
								
								<h3 class="object__info-title object__accordion-header">More details</h3>
								<p class="object__info-description">
									<?php echo $object_description;?>
								</p>
								
								<!--// Temporary fix-->
								*/ ?>
								
								
								<?php } ?>


							<a href="#comments">View comments for this object</a>

							<?php 
								$uniqueID = cos_get_field('uniqueID');
								if (strpos($uniqueID, 'ARC') !== false) {
									// Set Citation for Archive records
									$citationValue = get_the_title() . '. ' . cos_get_field('code') .  '. Museum of Domestic Design & Architecture, Middlesex University. Accessed ' . date('F d, Y') . '. ' . get_permalink();
								} else {
									// Set Citation for Objects
									$citeDescription = '';
									if(cos_get_field('briefDescription')) {
										// Check if string ends with full stop
										if (substr(cos_get_field('briefDescription'), -1) == '.') {
											$citeDescription = cos_get_field('briefDescription');
										} else {
											$citeDescription = cos_get_field('briefDescription') . '.';
										}
									}
									$citationValue = $citeDescription . ' ' . cos_get_field('name') . '. Museum of Domestic Design & Architecture, Middlesex University. Accessed ' . date('F d, Y') . '. ' . get_permalink();
								}
							?>

							<div class="object__cite-wrapper">
								<h3 class="object__info-title">Cite this page</h3>
								<div class="object__cite">
									<input type="text" class="object__cite-input" id="cite-input" value="<?php echo htmlentities($citationValue); ?>"><button class="object__cite-btn" id="cite-btn"><img src="<?php echo get_template_directory_uri(); ?>/images/clipboard.svg"></button>
								</div>
							</div>

							<?php $site_url = site_url(); ?>
							<?php $share_url = urlencode($site_url); ?>

							<ul class="share-buttons">
								<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/white/Facebook.png"></a></li>
								<li><a href="https://twitter.com/intent/tweet?source=<?php echo $share_url; ?>&text=:%20<?php echo $share_url; ?>" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/white/Twitter.png"></a></li>
								<li><a href="http://pinterest.com/pin/create/button/?url=<?php echo $share_url; ?>&description=" target="_blank" title="Pin it" onclick="window.open('http://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&description=' +  encodeURIComponent(document.title)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/white/Pinterest.png"></a></li>
								<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&title=&summary=&source=<?php echo $share_url; ?>" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/white/LinkedIn.png"></a></li>
								<li><a href="mailto:?subject=&body=:%20<?php echo $share_url; ?>" target="_blank" title="Email" onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/white/Email.png"></a></li>
							</ul>

						</div>
					</div>
				</article>

				<div class="related-objects">
					
					<?php //get_template_part('modules/module', 'switcher'); ?>


<h2>Related Objects</h2>

<?php

$currentID = get_the_ID();
$objects = new WP_Query( array(
	'post_type' => 'object',
	'posts_per_page' => 3,
	'meta_key' => 'type',
	'meta_value' => cos_get_field('type'),
	'meta_compare' => '=',	
	'post__not_in' => array($currentID),
//	'orderby' => 'rand',
));
	



	
?>

<?php while ( $objects->have_posts() ) : $objects->the_post(); ?>


<?php

$object_image = GetResizedImageURL(cos_get_field('image',$post->ID),400);	
$object_name = get_the_title();		
$object_link = get_the_permalink();

$object_details = thirty8_get_item_details($post->ID);							
$object_blurb = $object_details['blurb'];


/*
echo the_title();
echo '<br/>';
echo $object_image;
echo '<br/>';
echo $object_link;

echo '<hr/>';	
*/
	
?>

<div class="feature-block col-sm-8">
				
	<div class="feature-block-image-container">
		<a class="feature-block-image" href="<?php echo $object_link;?>">
			<img class="content-block-featured-image" src="<?php echo $object_image;?>" alt="Image of <?php echo $object_name;?>">
		</a>
	</div>
	<div class="feature-block-text" style="height: 363px;">
		<h3 class="feature-block-item">
			<a href="<?php echo $object_link;?>"><?php echo $object_name;?></a>
		</h3>
		<div class="feature-blurb feature-block-item"><?php echo $object_blurb;?></div>
		<p class="more-link-container">
			<a class="more-link button feature-block-item" href="<?php echo $object_link;?>">Read More</a>
		</p>
	</div>
</div>


<?php endwhile; wp_reset_query(); ?>

					
					
					
					

<!--					
					<h2>Related objects</h2>

					<?php
					$currentID = get_the_ID();
					$objects = new WP_Query( array(
						'post_type' => 'object',
						'posts_per_page' => 4,
						'meta_key' => 'type',
						'meta_value' => cos_get_field('type'),
						'meta_compare' => '=',	
						'post__not_in' => array($currentID),
					));
					?>
					<ul class="related-objects-list">
					<?php while ( $objects->have_posts() ) : $objects->the_post(); ?>
						<?php $object_image = GetResizedImageURL(cos_get_field('image'),400);	 ?>
						<li class="related-objects-list__item">
							<a href="<?php the_permalink(); ?>" class="related-objects-list__link">
								<img src="<?php echo $object_image; ?>" alt="<?php echo $wp_title; ?>" class="related-objects-list__img" />
							</a>
						</li>
					<?php endwhile; wp_reset_query(); ?>
					</ul>
					
-->					
					
					
				</div>

				<div class="object-comments" id="comments">
					<h2>Comments</h2>
					<?php comments_template('', true); ?>
				</div>

				<?php endwhile; else: ?>
					<p>Sorry, nothing found!</p>
				<?php endif; ?>
			</div>
		</div><!-- /row -->
	</div><!-- /container -->
</div><!-- /main-content -->
	
<?php get_footer(); ?>
