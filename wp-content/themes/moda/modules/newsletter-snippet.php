<?php
	
	$size = "thumbnail";

	$linkedpage1_url = get_sub_field('linked_page_1');	
	$linkedpage1_id = url_to_postid($linkedpage1_url); 	
	$linkedpage1_title = get_the_title($linkedpage1_id);
	
	
	if(get_sub_field('custom_text') == "")
	{
		$linkedpage1_blurb = get_field('page_summary',$linkedpage1_id);
	}
	else
	{
		$linkedpage1_blurb = get_sub_field('custom_text');
	}
	
		
	if(get_post_type($linkedpage1_id) == "page"){
		$linkedpage1_subhead = get_field('page_intro',$linkedpage1_id);
	} else {
		$linkedpage1_subhead = hh_post_type_header($linkedpage1_id);
	}

	$attachment_id1 = get_post_thumbnail_id($linkedpage1_id);
	$image1src = wp_get_attachment_image_src( $attachment_id1, $size );
	$image1src = $image1src[0];
	$image1alt = get_post_meta($attachment_id1 , '_wp_attachment_image_alt', true);	
	
	
?>

<table style="width: 650px;" border="0" cellspacing="0" cellpadding="0">
<tbody>
	<tr>
		<td class="imagecell">
			<img src="<?php echo $image1src; ?>" alt="" />
		</td>
		<td class="textcellimageleft">
			<h2><a href="<?php echo $linkedpage1_url;?>"><?php echo $linkedpage1_title;?></a></h2>
			<?php echo $linkedpage1_blurb;?>
		</td>
	</tr>
</table>