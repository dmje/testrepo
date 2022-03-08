<?php get_header(); ?>

<div id="main-content" class="wrap">

	<div class="container">

		<div class="row">
	
			<div id="page-content" class="col-sm-24 index">
				
				<?php if (have_posts()) : ?>
				
					<?php

						$display_type = '';
						$display_text = ' all records';
						
						
						if(isset($_GET['type']))
						{
							$display_type = $_GET['type'];							
						}
												

						switch ($display_type) 
						{
							
						    case 'books':
						    
						    	$type_value = 'book';
						    	$display_text = ' books';
						    
						    break;
						    
						    case 'design':
						    
						    	$type_value = 'design';
						    	$display_text = ' designs';
						    
						    break;						    
						    							
						    case 'ephemera':
						    
						    	$type_value = 'ephemera';
						    	$display_text = ' ephemera';
						    
						    break;
						    
						    case 'textiles':
						    
						    	$type_value = 'textile';
						    	$display_text = ' textiles';
						    
						    break;		
						    
						    case 'wallpaper':
						    
						    	$type_value = 'wallpaper';
						    	$display_text = ' wallpapers';
						    
						    break;							    				    
						       
							default:
						        
						}		
						
						
$display_mode = '';

						if (isset($_GET['display'])) 
						{
							$display_mode = $_GET['display'];
							
							if($display_mode == 'archive')
							{
								// Just get archive records
								
								$custom_query_args=array(
								   'post_type'=>'object',
								   'posts_per_page' => 48,
								   'meta_key' => 'UniqueID',
								   'meta_value' => 'ARC',
								   'meta_compare' => 'LIKE',					   
								   'paged' => get_query_var('paged')
								);	
								
								$display_text = ' archive records only';
															
							}
							else
							{
								// Just get object records
								
								$custom_query_args=array(
								   'post_type'=>'object',
								   'posts_per_page' => 48,
								   'meta_key' => 'UniqueID',
								   'meta_value' => 'ARC',
								   'meta_compare' => 'NOT LIKE',					   
								   'paged' => get_query_var('paged')
								);		
								
								$display_text = ' object records only';						
							}
							
						} 
						else
						{
							
							if($display_type)
							{
								// a 'type' has been specified
								
								$custom_query_args=array(
								   'post_type'=>'object',
								   'posts_per_page' => 48,
								   'meta_key' => 'type',
								   'meta_value' => $type_value,
								   'meta_compare' => '=',						   
								   'paged' => get_query_var('paged')
								);	
						
														
							}
							else
							{
								// Get all records
								
								$custom_query_args=array(
								   'post_type'=>'object',
								   'posts_per_page' => 48,
								   'paged' => get_query_var('paged')
								);	
								
								$display_text = ' all records';							

							}
						
						}
												
						
						$custom_query = new WP_Query( $custom_query_args );	
	
					?>				
				
					<div class="row">
						<div class="col-sm-12">
							<h1>Catalogue: <?php echo $display_text;?></h1>
						</div>
						<div class="col-sm-12">
							<ul class="grid-toggle">
								<li><a class="grid-toggle-four" href="#"><svg width="22px" height="16px" viewBox="0 0 22 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	<g id="grid-4">
	    <rect id="Rectangle-6" x="18" y="12" width="4" height="4"></rect>
	    <rect id="Rectangle-6" x="12" y="12" width="4" height="4"></rect>
	    <rect id="Rectangle-6" x="6" y="12" width="4" height="4"></rect>
	    <rect id="Rectangle-6" x="0" y="12" width="4" height="4"></rect>
	    <rect id="Rectangle-6" x="18" y="6" width="4" height="4"></rect>
	    <rect id="Rectangle-6" x="12" y="6" width="4" height="4"></rect>
	    <rect id="Rectangle-6" x="6" y="6" width="4" height="4"></rect>
	    <rect id="Rectangle-6" x="0" y="6" width="4" height="4"></rect>
	    <rect id="Rectangle-6" x="18" y="0" width="4" height="4"></rect>
	    <rect id="Rectangle-6" x="12" y="0" width="4" height="4"></rect>
	    <rect id="Rectangle-6" x="6" y="0" width="4" height="4"></rect>
	    <rect id="Rectangle-6" x="0" y="0" width="4" height="4"></rect>
	</g>
</svg></a></li>
								<li><a class="grid-toggle-three" href="#"><svg width="25px" height="16px" viewBox="0 0 25 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="grid-3">
        <rect id="Rectangle-5" x="18" y="9" width="7" height="7"></rect>
        <rect id="Rectangle-5" x="9" y="9" width="7" height="7"></rect>
        <rect id="Rectangle-5" x="0" y="9" width="7" height="7"></rect>
        <rect id="Rectangle-5" x="18" y="0" width="7" height="7"></rect>
        <rect id="Rectangle-5" x="9" y="0" width="7" height="7"></rect>
        <rect id="Rectangle-5" x="0" y="0" width="7" height="7"></rect>
    </g>
</svg></a></li>
								<li><a class="grid-toggle-two" href="#"><svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<g id="grid-2">
    <rect id="Rectangle-4-Copy" x="10" y="10" width="8" height="8"></rect>
    <rect id="Rectangle-4" x="0" y="10" width="8" height="8"></rect>
    <rect id="Rectangle-4-Copy" x="10" y="0" width="8" height="8"></rect>
    <rect id="Rectangle-4" x="0" y="0" width="8" height="8"></rect>
</g>
</svg></a></li>
							</ul>
						</div>
					</div>
										
					<?php if( get_theme_mod('thirty8_objectarchive_text') != '' ){ ?>
					<p class="archive-description"><?php do_action('thirty8_objectarchive_text'); ?></p>
					<?php } ?>
										
					<p>
					
						<a href="<?php echo home_url();?>/object">Show all records</a>
						|
						<a href="?display=archive">Show archive records only</a>
						|
						<a href="?display=object">Show object records only</a>
					
					</p>
					
					<p>
						
						Objects by type: 
					
						<a href="<?php echo home_url();?>/object/page/1?type=books">Books</a>
						|
						<a href="<?php echo home_url();?>/object/page/1?type=design">Design</a>
						|						
						<a href="<?php echo home_url();?>/object/page/1?type=ephemera">Ephemera</a>
						|						
						<a href="<?php echo home_url();?>/object/page/1?type=textiles">Textiles</a>
						|						
						<a href="<?php echo home_url();?>/object/page/1?type=wallpaper">Wallpaper</a>					
					</p>													
					
					<hr />					
					

						
					<?php 
						$i = 0; 
						$gc = '';
						
						if (isset($_GET['gc'])) {
							$gc = $_GET['gc'];
						} else {
							$gc = '6';
						}
					?>
					<div class="grid-objects row"> 
						
						<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
						<?php $i++; ?>
						<?php 
							
							$wp_title = get_the_title();	
							//$object_image = cos_get_field('image');	
							
							// GetResizedImageURL(url,width,height,options)										
							$object_image = GetResizedImageURL(cos_get_field('image'),400);												
							$object_thumb = cos_get_field('thumbnail');	
							$object_classes = array('grid-object', 'col-sm-'.$gc);
						?>
						<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class($object_classes); ?>>
							<!-- the next div had the js-height on it -->
							<div class="grid-object-inner">
								<img src="<?php echo $object_image; ?>" alt="<?php echo $wp_title; ?>" />
							</div>
						</a>
						
						<?php if( ( (!isset($_GET['gc'])) ) && (($i%4) == 0) ){ ?><div class="clearfix bueno"></div><?php } ?>
						
					<?php endwhile; endif; ?>
					
					</div>
				
					<div class="pagination">
						<?php if ( function_exists( 'wp_pagenavi' ) ) {  ?>
				  			<?php wp_pagenavi( array( 'query' => $custom_query ) ); ?>
						<?php } else { ?>
						<div class="alignleft">
							<?php next_posts_link( 'Previous Object Set'); ?>
						</div>
						<div class="alignright">
							<?php previous_posts_link( 'Next Object Set' ); ?>
						</div>
						<?php } ?>
					</div><!-- /pagination -->
			
			</div>
					
		</div><!-- /row -->
		
	</div><!-- /container -->
		
</div><!-- /main-content -->
		
<?php get_footer(); ?>
