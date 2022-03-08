<div class="section-menu-widget widget list-widget">
	
	<div class="widget-inner">
		
	<?php $widget_title = get_sub_field('widget_title'); ?>
	<?php if(get_sub_field('widget_title')){ ?>
		<h3 class="widgettitle"><?php echo $widget_title; ?></h3>
	<?php } else { ?>
		<h3 class="widgettitle">In This Section</h3>
	<?php } ?>
		
		<ul>
			<?php 
			// use wp_list_pages to display parent and all child pages all generations (a tree with parent)
			$parent_item = get_sub_field('parent_item'); 
			$parents = get_post_ancestors( $parent_item );
			$parent = ($parents) ? $parents[count($parents)-1]: $parent_item;
			$args=array(
			  'child_of' => $parent
			);
			$pages = get_pages($args);  
			if ($pages) {
			  $pageids = array();
			  foreach ($pages as $page) {
			    $pageids[]= $page->ID;
			  }
			
			  $args=array(
			    'title_li' => '',
			    'include' =>  $parent . ',' . implode(",", $pageids)
			  );
			  wp_list_pages($args);
			}
			?>
		</ul>
		
	</div>
	
</div>