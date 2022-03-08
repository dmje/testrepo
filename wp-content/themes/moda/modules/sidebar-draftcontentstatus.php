<?php

$draftstatus = get_field("draft_status");

$bgcolor = "#f5f5f5";
$statustext = "";


$richtextcount = 0;
$attachmentcount = 0;


switch($draftstatus)
{

	case "":
	
		$bgcolor = "#CC0000";
		$statustext = "No content submitted yet";
	
	break;
	
	case "none":
	
		$bgcolor = "#CC0000";
		$statustext = "No content submitted yet";
	
	break;	
	
	case "awaitingsignoff":
	
		$bgcolor = "#FFB56C";
		$statustext = "Awaiting sign-off";
	

	break;	
	
	case "signedoff":
	
		$bgcolor = "#80CC80";
		$statustext = "Signed off";

	break;			

	case "draft":
	
		$bgcolor = "#FFB56C";
		$statustext = "Draft";
	

	break;	

	case "complete":
	
		$bgcolor = "#E6FAFF";
		$statustext = "Complete";
	

	break;	

}
	
?>

<div style="padding:10px; margin-bottom:20px; border:2px dashed <?php echo $bgcolor;?>;">

<h3>Submitted content</h3>

<?php 

	If ($statustext)
	{
		echo "<p><strong>Status: </strong>" . $statustext . "</p>";
	}	
	
	
	while(has_sub_field("draft_page_content")): 	

		if( get_row_layout() == 'richtext_content_block' )
		{

        	$richtextcount = $richtextcount + 1;

		}

		if( get_row_layout() == 'richtext_content_block' )
		{

        	$attachmentcount = $attachmentcount + 1;

		}		
		
		


	endwhile;
	
	If($richtextcount > 0)
	{
		echo "<li>Rich text: " . $richtextcount . "</li>";
	}

	
	If($attachmentcount > 0)
	{
		echo "<li>Attachments: " . $attachmentcount . "</li>";
	}
	
	echo "<p>&nbsp;</p>";
	

	edit_post_link('&raquo; Edit draft content', '<p>', '</p>');


?>


</div>