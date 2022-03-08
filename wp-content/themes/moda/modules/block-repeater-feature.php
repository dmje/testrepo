<section class="repeater-featured content-block feature-block-container container">

	<div class="row">
	
		<?php if(get_sub_field('section_title')){ ?>
			<h2 class="section-title col-sm-24"><?php the_sub_field('section_title'); ?></h2>
		<?php } ?>
		
		<?php
		
		$rows = get_sub_field('featured_items');
		
		$count = 0;
		$count_col = 0;
		$i = 0;
		
		if($rows){
		
			$count = count(get_sub_field('featured_items'));
			
			if($count == 1){
				$count_col = 24;
			} elseif($count == 2){ 
				$count_col = 12;
			} elseif($count == 3) { 
				$count_col = 8;
			} elseif($count == 4) { 
				$count_col = 6;
			} 
			
			if($count >= 5){
				// default to 3 col
				$count_col = 8;
			}			
				
			foreach($rows as $row){			
			    
			    $i++;
			    			    
			    $linkedpage_url = "";
			    $linkedpage_id = "";
			    $linkedpage_title = "";
			    $linkedpage_blurb = "";
			    $attachment_id = "";
			    $imagesrc = "";
			    $imagealt = "";
			    $show_twitter = "";
			    
			    if($row['derive_content'] == true)
			    {	
				    				    
				    // grab content from the selected page / post

					$linkedpage_url = $row['linked_page'];									
					
					$linkedpage_id = url_to_postid($linkedpage_url);
					
					// get all the details for this ID from functions.php
									
					$linkedpage_details = thirty8_get_item_details($linkedpage_id);
					
					$linkedpage_title = $linkedpage_details['title'];
					$linkedpage_blurb = $linkedpage_details['blurb'];
					$imagesrc = $linkedpage_details['image_src'];
					$imagealt = $linkedpage_details['image_alt'];
											
				} 
				elseif( $row['show_twitter_block'] == 1 ) {
					
					$show_twitter = "showing_twitter";
					// just leave above variables blank except show_twitter, we don't need them this time around
					
				} else { 
				
					$size = "650x400";		
					
					if($row['use_freeform_url_for_link']){
						$linkedpage_url = $row['link_url'];
					} else {
						$linkedpage_url = $row['linked_page'];	
					}
					
					$linkedpage_title = $row['header'];
					$linkedpage_blurb = $row['text'];
					
					$attachment_id = $row['image'];
					$imagesrc = wp_get_attachment_image_src( $attachment_id, $size );
					$imagesrc = $imagesrc[0];
					$imagealt = get_post_meta($attachment_id , '_wp_attachment_image_alt', true);		
				
				}
			
			?>
			
			<div class="feature-block col-sm-<?php echo $count_col;?>">
				
				<?php if ($show_twitter != ''){ ?>
					
					<a class="twitter-timeline" data-height="458" data-link-color="#cc0033" href="https://twitter.com/MoDAMuseum?ref_src=twsrc%5Etfw">Tweets by MoDAMuseum</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					
				<?php } else { ?>
				
					<div class="feature-block-image-container">
						<a class="feature-block-image" href="<?php echo $linkedpage_url; ?>"><img class="content-block-featured-image" src="<?php echo $imagesrc; ?>" alt="<?php echo $imagealt;?>" /></a>
					</div>
					<div class="feature-block-text">
						<h3 class="feature-block-item"><a href="<?php echo $linkedpage_url; ?>"><?php echo $linkedpage_title; ?></a></h3>
						<div class="feature-blurb feature-block-item"><?php echo $linkedpage_blurb; ?></div>
						<p class="more-link-container">
							<a class="more-link button feature-block-item" href="<?php echo $linkedpage_url; ?>">
							<?php 
								
								if($row['link_text']){
									echo $row['link_text'];
								} else {
									do_action('thirty8_readmore_text'); 
								}
								
							?>
					    	</a>
						</p>
					</div>
				
				<?php } ?>
				
				<?php
				
					// debug info if needed
				
					// print_r($linkedpage_details['fullinfo']);
					
				?>
				
							
			</div>
			
			<?php if((($i%4) == 0) && ($count_col == 6 )){ echo '<div class="clearfix"></div>'; } ?> 
			<?php if((($i%3) == 0) && ($count_col == 8 )){ echo '<div class="clearfix"></div>'; } ?> 
			<?php if((($i%2) == 0) && ($count_col == 12 )){ echo '<div class="clearfix"></div>'; } ?> 
			
			<?php
		
		                                          
		    }
		
		}    
		
		?>      

	</div>

</section>