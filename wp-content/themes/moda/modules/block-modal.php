<section class="modal-block content-block container">
	
	<div class="row">
		
		<div class="content-block-inner">
	
			<div class="col-sm-24">
			
				<?php
					
				$modalurl = get_sub_field('url');
				$modalwidth = get_sub_field('width');
				$modalheight = get_sub_field('height');
				$linktext = get_sub_field('linktext');
				$modaltitle = get_sub_field('modaltitle');
				$fullwidthmodal = get_sub_field('fullwidthmodal');
				
				?>
				
				<a class='button trigger-iframe iframemodal' href="<?php echo $modalurl;?>"><?php echo $linktext;?>
				<i class="fa fa-external-link" aria-hidden="true"></i>
				</a>
				
				
				<div id="iframemodal" class="iziModal iframemodal"  data-iziModal-title="<?php echo $modaltitle;?>"></div>
				
				
				<style>
					
				.iziModal .iziModal-iframe 
				{
				    display: block;
				    border: 0px;
				    margin: 0px;
				}
				
				.iziModal-header-title h2
				{
					color:#ffffff;
				}	
					
				</style>
				
				
				  <script>
					jQuery(document).ready(function($)
					{
						$('#iframemodal').iziModal({
							headerColor: '#c03',
							padding: 0,
							<?php
								if($fullwidthmodal == 1)
								{
							?>
							width: $(window).width(),
							iframeHeight:$(window).height(),	
							<?php
								}
								else
								{
							?>		
							width: <?php echo $modalwidth;?>,
							iframeHeight:<?php echo $modalheight;?>,
							<?php
							}
							?>
							attached: '',
							timeout: 0,
							timeoutProgressbar: true,
							iframe : true,			
				    		iframeURL: '<?php echo $modalurl;?>'
						});
						$(document).on('click', '.iframemodal', function (event) {
						    event.preventDefault();
						    jQuery('#iframemodal').iziModal('open', event);
						});
					});
				  </script>
  
			</div>
  
  		</div>
		
	</div>
	
</section>
  