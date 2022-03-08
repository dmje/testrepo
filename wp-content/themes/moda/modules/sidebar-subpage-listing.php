<?php
	// jump out of the existing Sidebar's ID
	wp_reset_postdata();
	$cur_id = get_the_ID(); 

  	$SubPageDisplayOptions = get_sub_field("subpage_display_options");
	$DisplayCurrent = get_sub_field("display_current_page");
	
	$TheDepth = 0;
	$SectionTitle = get_the_title($post->post_parent);

	
	switch($SubPageDisplayOptions){
			case 1:	// show children of this page_attributes_meta_box()
			
				if($DisplayCurrent == 1){
					$args = "sort_column=menu_order&title_li=&child_of=" . $post->ID . "&echo=0&depth=" . $TheDepth;
				}
				else{
					$args = "sort_column=menu_order&title_li=&child_of=" . $post->ID. "&exclude=" . $post->ID . "&echo=0&depth=" . $TheDepth;			
				}								
				
				$SectionTitle = get_the_title($post->post_parent);			
				
				break;
			
			case 2:	// show siblings of this page
			
				$TheDepth = 1;
				
				if($DisplayCurrent == 1){
					$args = "sort_column=menu_order&title_li=&child_of=" . $post->post_parent . "&echo=0&depth=" . $TheDepth;
				}
				else{
					$args = "sort_column=menu_order&title_li=&child_of=" . $post->post_parent . "&exclude=" . $post->ID . "&echo=0&depth=" . $TheDepth;	
				}	
				
				$SectionTitle = get_the_title($post->post_parent);
				
				break;
				
			default:
				
				$TheDepth = 1;
				$SectionTitle = get_the_title($post->post_parent);
				$args = "sort_column=menu_order&title_li=&child_of=" . $post->ID . "&exclude=" . $post->ID . "&echo=0&depth=" . $TheDepth;
			
				break;

		}	
				
	$children = wp_list_pages($args);
	
	if($children){

?>

<div class="subpage-listing-widget widget list-widget">

	<div class="widget-inner">
		
		<h3 class="widgettitle">In This Section</h3>
	
		<ul class="menu-sub">
			<?php echo $children; ?>
		</ul>
		
	</div>
	
</div>
	
<?php } ?>

<!-- now jump back into the existing Sidebar's ID to get any more widgets/rows. Postdata is again reset at the end of sidebar.php -->
<?php $post_object = get_field('choose_sidebar');  
	$post = $post_object;
	setup_postdata( $post ); 
?>