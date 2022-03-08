<?php get_header(); ?>

<div id="main-content"  class="wrap">

	<div class="container">

		<div class="row">
	
			<div id="page-content" class="col-sm-24">
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							
							<!-- why <p><a href="javascript:history.back(-1)">< back</a></p> -->
							
							<div id="object-main" class="row">
																
								<div id="object-main-inner">
								
									<?php
										$fields = get_post_meta(get_the_ID());
										$objectimage = cos_get_field('image');
										$object_title = get_the_title();
										
										/*
										if(strpos($object_title,'|||'))
										{
											// Pipes in title - tidy it up
											// This version grabs the bit after the \\\
											
											$object_title = $array = explode('|||',$object_title);
											$object_title = $array[1];
											
											//.. or
											//$object_title = str_replace('|||', ': <br />', $object_title);
										}
										*/
																				
										// GetResizedImageURL(url,width,height,options)										
										$objectimage = GetResizedImageURL(cos_get_field('image'),460);
																														
									?>
	
									<div id="object-main-image" class="js-height col-sm-15">
										<div id="object-main-image-inner">
											<img src="<?php echo $objectimage; ?>" alt="<?php echo $object_title; ?>" /> 
										</div>
									</div>
									
									<div id="object-main-meta" class="js-height col-sm-9">
										
										<div id="object-main-meta-inner">
											
											<?php $meta = get_post_meta( get_the_ID() ); ?>
											
											<?php 
												
												$object_style = get_post_meta( get_the_ID(), 'style' );
												
												//echo 'style = ';
												
												
												//var_dump($object_style);
												
											?>
																						
											<dl>
												
											<?php if($object_title){ ?>
												<h1><?php echo str_replace('|||', '<br/>', $object_title);?></h1>								
											<?php }?>										
		
											<?php if(cos_get_field('objectNumber')){ ?>
												<dt><?php echo cos_get_remapped_field_name('objectNumber'); ?></dt>
												<dd><?php cos_the_field('objectNumber');?></dd>															
											<?php }?>
											
											<?php if(cos_get_field('creator')){ ?>
												<dt>Creator</dt>
												<dd><?php echo str_replace('|||', '<br/>', cos_get_field('creator'));?></dd>														
											<?php }?>											
											
											<?php if(cos_get_field('briefDescription')){?>
												<dt><?php echo cos_get_remapped_field_name('briefDescription'); ?></dt>
												<dd><?php cos_the_field('briefDescription');?></dd>															
											<?php }?>
											
											<?php if(cos_get_field('objectName')){?>
												<dt><?php echo cos_get_remapped_field_name('objectName'); ?></dt>
												<dd><?php cos_the_field('objectName');?></dd>															
											<?php }?>
											
											<?php if(cos_get_field('collectionCategory')){?>
												<dt><?php echo cos_get_remapped_field_name('collectionCategory'); ?></dt>
												<dd><?php cos_the_field('collectionCategory');?></dd>													
											<?php }?>
											
											<?php if(cos_get_field('contentConcept')){?>
												<dt><?php echo cos_get_remapped_field_name('contentConcept'); ?></dt>
												<dd><?php cos_the_field('contentConcept');?></dd>														
											<?php }?>									
											
											<?php if(cos_get_field('comment')){?>
												<dt><?php echo cos_get_remapped_field_name('comment'); ?></dt>
												<dd><?php cos_the_field('comment');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('dimensions')){?>
												<dt><?php echo cos_get_remapped_field_name('dimensions'); ?></dt>
												<dd><?php echo str_replace('|||', '<br />', cos_get_field('dimensions'));?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('materials_and_techniques')){?>
												<dt><?php echo cos_get_remapped_field_name('materials_and_techniques'); ?></dt>
												<dd><?php cos_the_field('materials_and_techniques');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('objectProductionDate')){?>
												<dt><?php echo cos_get_remapped_field_name('objectProductionDate'); ?></dt>
												<dd><?php cos_the_field('objectProductionDate');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('dateEarliestSingleYear')){?>
												<dt><?php echo cos_get_remapped_field_name('dateEarliestSingleYear'); ?></dt>
												<dd><?php cos_the_field('dateEarliestSingleYear');?></dd>														
											<?php }?>	
											
											<?php if(cos_get_field('dateLatestSingleYear')){?>
												<dt><?php echo cos_get_remapped_field_name('dateLatestSingleYear'); ?></dt>
												<dd><?php cos_the_field('dateLatestSingleYear');?></dd>														
											<?php }?>		
											
											<?php if(cos_get_field('organisation')){?>
												<dt><?php echo cos_get_remapped_field_name('organisation'); ?></dt>
												<dd><?php echo str_replace('|||', '<br/>', cos_get_field('organisation'));?></dd>					
											<?php }?>							
											
											<?php if(cos_get_field('objectProductionOrganisationRole')){?>
												<dt><?php echo cos_get_remapped_field_name('objectProductionOrganisationRole'); ?></dt>
												<dd><?php cos_the_field('objectProductionOrganisationRole');?></dd>														
											<?php }?>	
											
											<?php if(cos_get_field('objectProductionPeople')){?>
												<dt><?php echo cos_get_remapped_field_name('objectProductionPeople'); ?></dt>
												<dd><?php cos_the_field('objectProductionPeople');?></dd>														
											<?php }?>	
											
											<?php if(cos_get_field('objectProductionPeopleRole')){?>
												<dt><?php echo cos_get_remapped_field_name('objectProductionPeopleRole'); ?></dt>
												<dd><?php cos_the_field('objectProductionPeopleRole');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('person')){?>
												<dt><?php echo cos_get_remapped_field_name('person'); ?></dt>
												<dd><?php echo str_replace('|||', '<br />', cos_get_field('person'));?></dd>			
											<?php }?>
											
											<?php if(cos_get_field('objectProductionPersonRole')){?>
												<dt><?php echo cos_get_remapped_field_name('objectProductionPersonRole'); ?></dt>
												<dd><?php cos_the_field('objectProductionPersonRole');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('technique')){?>
												<dt><?php echo cos_get_remapped_field_name('technique'); ?></dt>
												<dd><?php cos_the_field('technique');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('fieldCollectionDate')){?>
												<dt><?php echo cos_get_remapped_field_name('fieldCollectionDate'); ?></dt>	
												<dd><?php echo str_replace('|||', '<br />', cos_get_field('fieldCollectionDate'));?></dd>													
											<?php }?>
											
											<?php if(cos_get_field('fieldCollectionMethod')){?>
												<dt><?php echo cos_get_remapped_field_name('fieldCollectionMethod'); ?></dt>
												<dd><?php cos_the_field('fieldCollectionMethod');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('fieldCollectionNote')){?>
												<dt><?php echo cos_get_remapped_field_name('fieldCollectionNote'); ?></dt>
												<dd><?php cos_the_field('fieldCollectionNote');?></dd>														
											<?php }?>								
											
											<?php if(cos_get_field('fieldCollectionNumber')){?>
												<dt><?php echo cos_get_remapped_field_name('fieldCollectionNumber'); ?></dt>
												<dd><?php cos_the_field('fieldCollectionNumber');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('fieldCollectionPlace')){?>
												<dt><?php echo cos_get_remapped_field_name('fieldCollectionPlace'); ?></dt>
												<dd><?php cos_the_field('fieldCollectionPlace');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('fieldCollector')){?>
												<dt><?php echo cos_get_remapped_field_name('fieldCollector'); ?></dt>
												<dd><?php cos_the_field('fieldCollector');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('fieldColEventName')){?>
												<dt><?php echo cos_get_remapped_field_name('fieldColEventName'); ?></dt>
												<dd><?php cos_the_field('fieldColEventName');?></dd>														
											<?php }?>
																					

											<?php if(cos_get_field('labelText')){?>
												<dt>Label Text</dt>
												<dd><?php echo str_replace('|||', '<br />', cos_get_field('labelText'));?></dd>
																										
											<?php }?>

											
											<!--
											<?php if(cos_get_field('caption')){?>
												<dt><?php echo cos_get_remapped_field_name('caption'); ?></dt>
												<dd><?php echo str_replace('|||', '', cos_get_field('caption'));?></dd>														
											<?php }?>
											-->
											
											<?php if(cos_get_field('date')){?>
												<dt><?php echo cos_get_remapped_field_name('date'); ?></dt>
												<dd><?php cos_the_field('date');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('code')){?>
												<dt><?php echo cos_get_remapped_field_name('code'); ?></dt>
												<dd><?php cos_the_field('code');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('extent')){?>
												<dt><?php echo cos_get_remapped_field_name('extent'); ?></dt>
												<dd><?php cos_the_field('extent');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('level')){?>
												<dt><?php echo cos_get_remapped_field_name('level'); ?></dt>
												<dd><?php cos_the_field('level');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('repository')){?>
												<dt><?php echo cos_get_remapped_field_name('repository'); ?></dt>
												<dd><?php cos_the_field('repository');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('type')){?>
												<dt><?php echo cos_get_remapped_field_name('type'); ?></dt>
												<dd><?php cos_the_field('type');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('scope')){?>
												<dt><?php echo cos_get_remapped_field_name('scope'); ?></dt>
												<dd><?php cos_the_field('scope');?></dd>														
											<?php }?>
											
											<?php if(cos_get_field('name')){?>
												<dt><?php echo cos_get_remapped_field_name('name'); ?></dt>
												<dd><?php cos_the_field('name');?></dd>														
											<?php } ?>
		
											</dl>	
											
											<?php $site_url = site_url(); ?>
											<?php $share_url = urlencode($site_url); ?>
											
											<ul class="share-buttons">
											  <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/white/Facebook.png"></a></li>
											  <li><a href="https://twitter.com/intent/tweet?source=<?php echo $share_url; ?>&text=:%20<?php echo $share_url; ?>" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/white/Twitter.png"></a></li>
											  <li><a href="https://plus.google.com/share?url=<?php echo $share_url; ?>" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/white/Google+.png"></a></li>
											  <li><a href="http://pinterest.com/pin/create/button/?url=<?php echo $share_url; ?>&description=" target="_blank" title="Pin it" onclick="window.open('http://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&description=' +  encodeURIComponent(document.title)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/white/Pinterest.png"></a></li>
											  <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&title=&summary=&source=<?php echo $share_url; ?>" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/white/LinkedIn.png"></a></li>
											  <li><a href="mailto:?subject=&body=:%20<?php echo $share_url; ?>" target="_blank" title="Email" onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/white/Email.png"></a></li>
											</ul>
								
											
										</div>
																	
									</div>
								
								</div>
								
							</div>
															    
						</article>
						        
					<?php endwhile; else: ?>
					
					<p>Sorry, nothing found!</p>
			
					<?php endif; ?>
					
			</div>
					
		</div><!-- /row -->
		
	</div><!-- /container -->
		
</div><!-- /main-content -->
	
<?php get_footer(); ?>



