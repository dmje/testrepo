<?php
/*
Template Name: Web Caption Listing
*/
?>

<?php



$custom_query_args=array(
   'post_type'=>'object',
   'posts_per_page' => 100,
   // these metas give just archive records
   //'meta_key' => 'UniqueID',
   //'meta_value' => 'ARC',
   //'meta_compare' => 'LIKE',					      
   'paged' => get_query_var('paged')
);	

$custom_query = new WP_Query( $custom_query_args );	

?>

<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

<div style="border:1px solid #cccccc;padding:20px;margin:10px;">
	
	<h3><a target="_blank" href="<?php the_permalink();?>"><?php the_title();?></a></h3>
	
	<?php 
	
	$web_caption = GetObjectWebCaption($post->ID);
	
	echo '<h4>Raw labelText</h4>';
	echo cos_get_field('labelText');
		
	echo '<hr/>';
	
	echo '<h4>Web Caption</h4>';
	
	echo $web_caption

	/*
	
	echo '<pre>';
	print_r( $label_text );
	echo '</pre>';
	
	foreach($label_text as $thing){
		
		echo '<p><strong>RAW = </strong>' . $thing . '</p>';
				
		if(strpos($thing, 'Web Caption:') !== false){
			$web_caption = $thing;
			$web_caption = str_replace('Web Caption:', '', $web_caption);
		}
		
	}
	
	if($web_caption){
		echo '<p><strong>Web Caption = </strong>' . $web_caption . '</p>';
	}
	
	*/
	
	
	?>
	
</div>


<?php endwhile;?>

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
