<div id="breadcrumb-wrap" class="wrap">

	<div id="breadcrumb-container" class="container">
		<div class="row">	
			<div class="col-sm-24">
				<div id="breadcrumb-inner">
			    <?php if( is_singular( 'tribe_events' ) ) : ?>
			 
			        <div id="breadcrumbs">
				        <span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"><a href="<?php echo home_url(); ?>" rel="v:url" property="v:title"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right divider"></i> <span rel="v:child" typeof="v:Breadcrumb"><a href="<?php echo home_url( 'events' ); ?>" rel="v:url" property="v:title">Events</a> <i class="fa fa-angle-right divider"></i> <span class="breadcrumb_last"><?php single_post_title(); ?></span></span></span></span></div>
			 
			    <?php else : ?>
			 
			        <?php yoast_breadcrumb( '<div id="breadcrumbs">', '</div>' ); ?>
			 
			    <?php endif; ?>
				</div>
			</div>
		</div>
	</div>

</div>