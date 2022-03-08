<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	
	<title><?php wp_title(''); ?></title>
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />	
	
	<script type="text/javascript">
	var MTIProjectId='95ac2e2e-d4fa-4f54-9b2d-abcb7ee5d84f';
	 (function() {
	        var mtiTracking = document.createElement('script');
	        mtiTracking.type='text/javascript';
	        mtiTracking.async='true';
	         mtiTracking.src='mtiFontTrackingCode.js';
	        (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild( mtiTracking );
	   })();
	</script>
	<?php wp_head(); ?>
	
	<!--[if lt IE 9]>
	<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-MRQG9JV');</script>
	<!-- End Google Tag Manager -->

	<!--Pinterest verification-->
	<meta name="p:domain_verify" content="e2f95c18c86ebc8062a81c469ebeac1b"/>
	<!--//Pinterest verification-->

	<?php
	
	if(is_page_template('page-join_newsletter.php'))
	{
		// Include MailerLite code if it's the mailing list page
	?>

		<!-- MailerLite Universal -->
		
		<script>
		
		(function(m,a,i,l,e,r){ m['MailerLiteObject']=e;function f(){
		
		var c={ a:arguments,q:[]};var r=this.push(c);return "number"!=typeof r?r:f.bind(c.q);}
		
		f.q=f.q||[];m[e]=m[e]||f.bind(f.q);m[e].q=m[e].q||f.q;r=a.createElement(i);
		
		var _=a.getElementsByTagName(i)[0];r.async=1;r.src=l+'?v'+(~~(new Date().getTime()/1000000));
		
		_.parentNode.insertBefore(r,_);})(window, document, 'script', 'https://static.mailerlite.com/js/universal.js', 'ml');
		
		var ml_account = ml('accounts', '1681892', 'k4w1o3h3t8', 'load');
		
		</script>
		
		<!-- End MailerLite Universal -->

	
	<?php
	}
		
	?>

</head>

<body <?php body_class(); ?>>

<header id="masthead" class="wrap">
	
<?php
	if ( is_user_logged_in() && current_user_can( 'administrator' ) ){
		include "modules/admininfopanel.php";	
	} 	
?>	

	<div class="container">
	
		<div id="branding" class="row">
			
			<div id="site-logo" class="col-sm-8">
				<a href="<?php bloginfo( 'url' ); ?>">
					<?php get_template_part( 'logo' ); ?>
				</a>
			</div>
			
			<div class="col-sm-16">
				
				<div class="row">
					
					<div id="header-search" class="col-sm-12 col-sm-offset-12 col-md-7 col-md-offset-17">
						<?php get_search_form(); ?>
						
					</div>
					
				</div>
				
				<div id="primary-nav" class="row">	
					
					<nav id="main-nav" role="navigation" class="col-sm-24">
					<?php wp_nav_menu( array( 'menu'  => 'primary-navigation', 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-nav-menu' ) ); ?>
					</nav>
				
				</div>
				
			</div>
			
		</div><!-- /branding -->
	
	</div>

</header>

<?php if(!is_front_page()){ ?>
	<?php get_template_part('breadcrumb'); ?>
<?php } ?>