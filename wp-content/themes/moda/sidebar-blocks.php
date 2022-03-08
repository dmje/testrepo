<?php if(get_row_layout() == "subpage_listing"): ?>

	<?php include "modules/sidebar-subpage-listing.php"; ?>

<?php elseif(get_row_layout() == "section_menu"): ?>

	<?php include "modules/sidebar-section-menu.php"; ?>
		
<?php elseif(get_row_layout() == "latest_posts"): ?>

	<?php include "modules/sidebar-latest-posts.php"; ?>	
	
<?php elseif(get_row_layout() == "featured_page"): ?>	
	
	<?php include "modules/sidebar-featured-page.php"; ?>	
				  
<?php elseif(get_row_layout() == "related_links"): ?>

	<?php include "modules/sidebar-related-links.php"; ?>
	
<?php elseif(get_row_layout() == "general_links"): ?>

	<?php include "modules/sidebar-general-links.php"; ?>
	
<?php elseif(get_row_layout() == "news_categories"): ?>

	<?php include "modules/sidebar-categories.php"; ?> 
	
<?php elseif(get_row_layout() == "latest_tweets"): ?>

	<?php include "modules/sidebar-latest-tweets.php"; ?> 		
	
<?php elseif(get_row_layout() == "random_page"): ?>

	<?php include "modules/sidebar-random-page.php"; ?> 
	
<?php elseif(get_row_layout() == "newsletter_signup"): ?>

	<?php include "modules/sidebar-signup.php"; ?> 
	
<?php elseif(get_row_layout() == "social_sharing"): ?>

	<?php include "modules/sidebar-share.php"; ?> 
	
<?php elseif(get_row_layout() == "sidebar_search"): ?>

	<?php include "modules/sidebar-searchbox.php"; ?> 

<?php endif; ?>