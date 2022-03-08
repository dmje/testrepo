<div class="share-widget widget">
	
	<div class="widget-inner">
		
	<?php $widget_title = get_sub_field('widget_title'); ?>
	<?php if(get_sub_field('widget_title')){ ?>
		<h3 class="widgettitle"><?php echo $widget_title; ?></h3>
	<?php } else { ?>
		<h3 class="widgettitle">Share This</h3>
	<?php } ?>
		
		<?php $site_url = site_url(); ?>
		<?php $share_url = urlencode($site_url); ?>
		
		<ul class="share-buttons">
		  <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/color/Facebook.png"></a></li>
		  <li><a href="https://twitter.com/intent/tweet?source=<?php echo $share_url; ?>&text=:%20<?php echo $share_url; ?>" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/color/Twitter.png"></a></li>
		  <li><a href="https://plus.google.com/share?url=<?php echo $share_url; ?>" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/color/Google+.png"></a></li>
		  <li><a href="http://pinterest.com/pin/create/button/?url=<?php echo $share_url; ?>&description=" target="_blank" title="Pin it" onclick="window.open('http://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&description=' +  encodeURIComponent(document.title)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/color/Pinterest.png"></a></li>
		  <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&title=&summary=&source=<?php echo $share_url; ?>" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/color/LinkedIn.png"></a></li>
		  <li><a href="mailto:?subject=&body=:%20<?php echo $share_url; ?>" target="_blank" title="Email" onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/flat_web_icon_set/color/Email.png"></a></li>
		</ul>
	
	</div>
		
</div>