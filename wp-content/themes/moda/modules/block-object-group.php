<?php

	if(get_sub_field('group_type') == 'quickrepeater')
	{
?>

<section class="repeater-featured content-block feature-block-container container">

	<div class="row">

	<?php

		$rows = get_sub_field('featured_items');
		
		$count = 0;
		$count_col = 0;
		$i = 0;
		
		if($rows)
		{
		
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
				
			foreach($rows as $row)
			{
			    
			    $i++;
			    $linkedpage_url = "";
			    $linkedpage_id = "";
			    $linkedpage_title = "";
			    $linkedpage_blurb = "";
			    $attachment_id = "";
			    $imagesrc = "";
			    $imagealt = "";
			    $show_twitter = "";
			    				    
				    // grab content from the selected page / post

					$linkedpage_url = $row['linked_page'];
					$linkedpage_id = url_to_postid($linkedpage_url);
					
					// get all the details for this ID from functions.php
									
					$linkedpage_details = thirty8_get_item_details($linkedpage_id);
					
					$linkedpage_title = $linkedpage_details['title'];
					$linkedpage_blurb = $linkedpage_details['blurb'];
					$imagesrc = $linkedpage_details['image_src'];
					$imagealt = $linkedpage_details['image_alt'];
													
	?>
		
		<div class="feature-block col-sm-<?php echo $count_col;?>">
			<div class="feature-block-image-container">
				<a class="feature-block-image" href="<?php echo $linkedpage_url; ?>"><img class="content-block-featured-image" src="<?php echo $imagesrc; ?>" alt="<?php echo $imagealt;?>" /></a>
			</div>
			<div class="feature-block-text">
				<h3 class="feature-block-item"><a href="<?php echo $linkedpage_url; ?>"><?php echo $linkedpage_title; ?></a></h3>
				<div class="feature-blurb feature-block-item"><?php echo $linkedpage_blurb; ?></div>
				<!--
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
				-->
				
			</div>			
		</div>
		
		
	<?php
		
			}
			
		}
		
	?>
		
		
		
	</div>
	
	
</section>






<?php



	}
	
	
	
	
?>