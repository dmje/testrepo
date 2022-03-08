<?php 
	while(has_sub_field("layout")): 	
?>

	<?php if(get_row_layout() == "standard_wysiwyg"):  ?>
											
		<?php include "block-wysiwyg.php"; ?>
		
	<?php elseif(get_row_layout() == "block_2col_wysiwyg"):  ?>
	
		<?php include "block-2col-wysiwyg.php"; ?>
		
	<?php elseif(get_row_layout() == "block_3col_wysiwyg"):  ?>
	
		<?php include "block-3col-wysiwyg.php"; ?>		
		
	<?php elseif(get_row_layout() == "newsletter_signup_block"): ?>
	
		<?php include "block-signup.php"; ?>					

	<?php elseif(get_row_layout() == "html_snippet"): ?>
	
		<?php include "block-html-snippet.php"; ?>	
		
	<?php elseif(get_row_layout() == "repeater_feature_block"): ?>
	
		<?php include "block-repeater-feature.php"; ?>		
		
	<?php elseif(get_row_layout() == "repeater_picture_block"): ?>
	
		<?php include "block-repeater-picture.php"; ?>	
		
	<?php elseif(get_row_layout() == "modal_block"): ?>
	
		<?php include "block-modal.php"; ?>					

	<?php elseif(get_row_layout() == "object_group"): ?>
	
		<?php include "block-object-group.php"; ?>		
	
	
	
	
	<?php 
		//------------ Newsletter blocks -------------------		
	?>
	
	<?php elseif(get_row_layout() == "newsletter_wysiwyg"):  ?>
	
		<?php include "newsletter-wysiwyg.php"; ?>

	<?php elseif(get_row_layout() == "newsletter_snippet"):  ?>
	
		<?php include "newsletter-snippet.php"; ?>

	<?php endif; ?>
	

<?php endwhile; ?>	
