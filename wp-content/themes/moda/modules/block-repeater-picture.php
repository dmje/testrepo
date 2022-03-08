<section class="repeater-picturebox content-block feature-block-container container">

	<div class="row">
	
		<?php if(get_sub_field('section_title')){ ?>
			<h2 class="section-title col-sm-24"><?php the_sub_field('section_title'); ?></h2>
		<?php } ?>

		<?php
		
		$rows = get_sub_field('featured_items');
		
		$count = 0;
		$count_col = 0;
		
		if($rows)
		{
		
			$count = count(get_sub_field('featured_items'));
			
			if($count == 2)
			{ 
				$count_col = 12;
			} 
			elseif($count == 3)
			{ 
				$count_col = 8;
			}  
			elseif($count == 4)
			{ 
				$count_col = 6;
			} 	

			if($count > 5)
			{
				// default to 3 col
				$count_col = 8;
			}			
				
				
		    foreach($rows as $row)
		    {
			    
			    $linkedpage_url = "";
			    $linkedpage_id = "";
			    $linkedpage_title = "";
			    $linkedpage_blurb = "";
			    $attachment_id = "";
			    $imagesrc = "";
			    $imagealt = "";
			    
			    
		
				if($row['derive_content'] == true){	// grab content from the selected page / post
				
					$size = "600x450";	
				
					// Featured item
					
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
				
				else{ 
				
					$size = "600x450";		
					
					$linkedpage_url = $row['linked_page'];	
					$linkedpage_title = $row['header'];
					
					$attachment_id = $row['image'];
					$imagesrc = wp_get_attachment_image_src( $attachment_id, $size );
					$imagesrc = $imagesrc[0];
					$imagealt = get_post_meta($attachment_id , '_wp_attachment_image_alt', true);		
				
				}
			
			?>

			<div class="picture-block col-sm-<?php echo $count_col;?>">
				<a class="picture-block-image" href="<?php echo $linkedpage_url; ?>">
					<img class="content-block-featured-image" src="<?php echo $imagesrc; ?>" alt="<?php echo $imagealt;?>" />
					<h3><?php echo $linkedpage_title; ?></h3>
				</a>
			</div>
			
			<?php
		
		                                          
		    }
		
		}    
		
		?>      

	</div>

</section>