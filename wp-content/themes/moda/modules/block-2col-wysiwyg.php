<section class="block-2col-wysiwyg content-block container">

	<div class="row">
		
		<div class="content-block-inner">
	
			<?php if(get_sub_field('section_title')){ ?>
				<h2 class="section-title col-sm-24"><?php the_sub_field('section_title'); ?></h2>
			<?php } ?>
	
			<div class="col-sm-12">
				<?php if(get_sub_field('column1_header')){ ?>
					<h3><?php the_sub_field('column1_header'); ?></h3>
				<?php } ?>
				<div><?php the_sub_field('column1_wysiwyg'); ?></div>
			</div>
			
			<div class="col-sm-12">
				<?php if(get_sub_field('column2_header')){ ?>
					<h3><?php the_sub_field('column2_header'); ?></h3>
				<?php } ?>
				<div><?php the_sub_field('column2_wysiwyg'); ?></div>
			</div>
		
		</div>
		
	</div>
	
</section>