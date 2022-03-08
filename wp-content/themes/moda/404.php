<?php get_header(); ?>
	
<div id="main-content">

	<div class="container">

		<div class="row">
	
			<div id="page-content" class="col-sm-16 col-sm-offset-4 index">
		
				<h1>Nothing Found</h1>
				
				<p>Apologies, but the page you requested could not be found. Perhaps searching will help.</p>
				<?php get_search_form(); ?>
			
				<script type="text/javascript">
					// focus on search field after it has loaded
					document.getElementById('s') && document.getElementById('s').focus();
				</script>
				
			</div>
		
		</div>
	
	</div>
	
</div>
	
<?php get_footer(); ?>