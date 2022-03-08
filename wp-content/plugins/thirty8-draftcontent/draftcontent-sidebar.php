<div id="latest-posts-widget" class="widget">
	



<?php

$statusnotes = "";
$draftstatus = "";

$draftstatus = get_field("draft_status");
$statusnotes = get_field("draft_notes");

$bgcolor = "#f5f5f5";
$statustext = "";


$richtextcount = 0;
$attachmentcount = 0;

$textcolor = "#000000";

switch($draftstatus)
{

	case "":
	
		$bgcolor = "#CC0000";
		$bordercolor = "#CC0000";
		$statustext = "No content submitted yet";
	
	break;
	
	case "none":
	
		$bgcolor = "#FFFAFA";
		$bordercolor = "#CC0000";
		$statustext = "No content submitted yet";
	
	break;	
	
	case "awaitingsignoff":
	
		$bgcolor = "#FFFAFA";
		$bordercolor = "#FFB56C";
		$statustext = "Awaiting sign-off";
	

	break;	
	
	case "signedoff":
	
		$bgcolor = "#FFFAFA";
		$bordercolor = "#80CC80";
		$statustext = "Signed off";

	break;			

	case "draft":
	
		$bgcolor = "#FFFAFA";
		$bordercolor = "#FFB56C";
		$statustext = "Draft";
	

	break;	

	case "complete":
	
		$bgcolor = "#00B8E6";
		$bordercolor = "#E6FAFF";
		$statustext = "Complete";
	

	break;	
	
	default:

		$bgcolor = "#CC0000";
		$bordercolor = "#CC0000";
		$statustext = "No content submitted yet";
		
	break;	
	

}
	
?>

		<div style="padding:10px; border:1px dashed #cccccc;">
		
			<p style="font-size:80%; color:<?php echo $textcolor;?>"><span style="color:<?php echo $bordercolor;?>">&#9673; </span>Content status: <?php echo $statustext;?></p>		
			
			<?php
				If($statusnotes)
				{
					echo "<hr />";
					echo "<p><strong>Notes</strong></p>";
					echo "<div style='font-size:12px'>" . $statusnotes . "</div>";
				}
			?>		
		
		</div>
	
</div>
