<?php 

// Customizer functions for this theme, dawg

function thirty8_customize_register( $wp_customize ) {
	
	// Custom Textarea Control
	
	class Thirty8_Customize_Textarea_Control extends WP_Customize_Control{
		
		public $type = 'textarea';
		
		public function render_content() {
			echo '<label>';
				echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
				echo '<span class="customize-control-description">' . esc_html( $this->description ) . '</span>';
				echo '<textarea rows="2" style="width: 100%;"';
				$this->link();
				echo '>' . esc_textarea( $this->value() ) . '</textarea>';
			echo '</label>';
		}
		
	}
	
	// Custom CPT Dropdown Control
	
	class Thirty8_Customize_CPT_Select_Control extends WP_Customize_Control {
        public $type = 'cpt_select';
        public $post_type = 'sidebar';
 
        // this will make out post type control public
 
        public function render_content() {
        $latest = new WP_Query( array(
            'post_type' => $this->post_type,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        ));
 
        ?>
 
        <label>
 
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <select <?php $this->link(); ?>>
                <?php
                while( $latest->have_posts() ) {
                $latest->the_post();
                echo "<option " . selected( $this->value(), get_the_ID() ) . " value='" . get_the_ID() . "'>" . the_title( '', '', false ) . "</option>";
                }
            ?>
            </select>
        </label>
        <?php
        }
    }
	
	
	// Custom Text
	
	$wp_customize->add_section( 'thirty8_custom_text' , array(
	    'title'      => 'Custom Text',
	    'priority'   => 30,
	) );
	
	$wp_customize->add_setting( 'thirty8_blogheader_text', array(
		'default' => 'Latest News'
	) );
	$wp_customize->add_control( new Thirty8_Customize_Textarea_Control(
		$wp_customize,
		'thirty8_blogheader_text',
		array(
			'label' => 'Blog Header Text',
			'description' => 'The title of your news/blog page.',
			'section' => 'thirty8_custom_text',
			'settings' => 'thirty8_blogheader_text'
		)
	) );
	
	$wp_customize->add_setting( 'thirty8_blogintro_text', array(
		'default' => ''
	) );
	$wp_customize->add_control( new Thirty8_Customize_Textarea_Control(
		$wp_customize,
		'thirty8_blogintro_text',
		array(
			'label' => 'Blog Intro Text',
			'description' => 'Some optional intro text on your news/blog page.',
			'section' => 'thirty8_custom_text',
			'settings' => 'thirty8_blogintro_text'
		)
	) );
	
	$wp_customize->add_setting( 'thirty8_readmore_text', array(
		'default' => 'Read More'
	) );
	$wp_customize->add_control( new Thirty8_Customize_Textarea_Control(
		$wp_customize,
		'thirty8_readmore_text',
		array(
			'label' => 'Read More Button Text',
			'description' => 'Will be used on all \'read more\' buttons on your site.',
			'section' => 'thirty8_custom_text',
			'settings' => 'thirty8_readmore_text'
		)
	) );
	
	$wp_customize->add_setting( 'thirty8_objectarchive_text', array(
		'default' => ''
	) );
	$wp_customize->add_control( new Thirty8_Customize_Textarea_Control(
		$wp_customize,
		'thirty8_objectarchive_text',
		array(
			'label' => 'Object Archive Intro Text',
			'description' => 'Some optional intro text on the Catalogue (All Objects) page.',
			'section' => 'thirty8_custom_text',
			'settings' => 'thirty8_objectarchive_text'
		)
	) );
	
	$wp_customize->add_setting( 'thirty8_footer_text', array(
		'default' => ''
	) );
	$wp_customize->add_control( new Thirty8_Customize_Textarea_Control(
		$wp_customize,
		'thirty8_footer_text',
		array(
			'label' => 'Footer Text',
			'description' => 'Useful for copyright notices or similar.',
			'section' => 'thirty8_custom_text',
			'settings' => 'thirty8_footer_text'
		)
	) );
	
	$wp_customize->add_setting( 'thirty8_signupheader_text', array(
		'default' => 'Signup for the Newsletter'
	) );
	$wp_customize->add_control( new Thirty8_Customize_Textarea_Control(
		$wp_customize,
		'thirty8_signupheader_text',
		array(
			'label' => 'Newsletter Signup Header Text',
			'description' => 'Header used in the newsletter signup area.',
			'section' => 'thirty8_custom_text',
			'settings' => 'thirty8_signupheader_text'
		)
	) );
	
	$wp_customize->add_setting( 'thirty8_signup_text', array(
		'default' => ''
	) );
	$wp_customize->add_control( new Thirty8_Customize_Textarea_Control(
		$wp_customize,
		'thirty8_signup_text',
		array(
			'label' => 'Newsletter Signup Text',
			'description' => 'Intro used in the newsletter signup sidebar block.',
			'section' => 'thirty8_custom_text',
			'settings' => 'thirty8_signup_text'
		)
	) );
	
	$wp_customize->add_setting( 'thirty8_signupaction_text', array(
		'default' => ''
	) );
	$wp_customize->add_control( new Thirty8_Customize_Textarea_Control(
		$wp_customize,
		'thirty8_signupaction_text',
		array(
			'label' => 'Newsletter Form Action',
			'description' => 'Mailchimp form action to connect your signup block to the correct mailing list.',
			'section' => 'thirty8_custom_text',
			'settings' => 'thirty8_signupaction_text'
		)
	) );
	
	// Images
	
	$wp_customize->add_section( 'thirty8_image_uploads' , array(
	    'title'      => 'Custom Images',
	    'priority'   => 31,
	) );
	
	$wp_customize->add_setting( 'thirty8_default_image_thumbnail');
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'thirty8_default_image_thumbnail',
		array(
			'label' => 'Default Image Thumbnail',
			'description' => 'This will be used on widget and news blocks when no featured image is available. 800px x 600px for best results.',
			'section' => 'thirty8_image_uploads',
			'settings' => 'thirty8_default_image_thumbnail'
		)
	) );
	
	$wp_customize->add_setting( 'thirty8_default_featured_page_image');
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'thirty8_default_featured_page_image',
		array(
			'label' => 'Default Featured Page Image',
			'description' => 'This will be used as a banner image when no Featured Image is found for a page. 1400px x 400px for best results.',
			'section' => 'thirty8_image_uploads',
			'settings' => 'thirty8_default_featured_page_image'
		)
	) );
	
	$wp_customize->add_setting( 'thirty8_default_featured_archive_image');
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'thirty8_default_featured_archive_image',
		array(
			'label' => 'Default Featured Archive Image',
			'description' => 'This will be used as a banner image for automatically generated archives such as the Blog index and category pages. 1400px x 400px for best results.',
			'section' => 'thirty8_image_uploads',
			'settings' => 'thirty8_default_featured_archive_image'
		)
	) );
	
	
	// Social Links
	
	$wp_customize->add_section( 'thirty8_social_links' , array(
	    'title'      => 'Social Links',
	    'priority'   => 33,
	) );
	
	$wp_customize->add_setting( 'thirty8_social_header', array(
		'default' => ''
	) );
	$wp_customize->add_control( new Thirty8_Customize_Textarea_Control(
		$wp_customize,
		'thirty8_social_header',
		array(
			'label' => 'Social Header',
			'description' => '',
			'section' => 'thirty8_social_links',
			'settings' => 'thirty8_social_header'
		)
	) );
	
	$wp_customize->add_setting( 'thirty8_facebook_link', array(
		'default' => ''
	) );
	$wp_customize->add_control(
	'thirty8_facebook_link',
		array(
			'label' => 'Facebook',
			'section' => 'thirty8_social_links',
			'settings' => 'thirty8_facebook_link'
		)
	);
	
	$wp_customize->add_setting( 'thirty8_twitter_link', array(
		'default' => ''
	) );
	$wp_customize->add_control(
	'thirty8_twitter_link',
		array(
			'label' => 'Twitter',
			'section' => 'thirty8_social_links',
			'settings' => 'thirty8_twitter_link'
		)
	);
	
	$wp_customize->add_setting( 'thirty8_googleplus_link', array(
		'default' => ''
	) );
	$wp_customize->add_control(
	'thirty8_googleplus_link',
		array(
			'label' => 'Google+',
			'section' => 'thirty8_social_links',
			'settings' => 'thirty8_googleplus_link'
		)
	);

	$wp_customize->add_setting( 'thirty8_linkedin_link', array(
		'default' => ''
	) );
	$wp_customize->add_control(
	'thirty8_linkedin_link',
		array(
			'label' => 'LinkedIn',
			'section' => 'thirty8_social_links',
			'settings' => 'thirty8_linkedin_link'
		)
	);
	
	$wp_customize->add_setting( 'thirty8_youtube_link', array(
		'default' => ''
	) );
	$wp_customize->add_control(
	'thirty8_youtube_link',
		array(
			'label' => 'YouTube',
			'section' => 'thirty8_social_links',
			'settings' => 'thirty8_youtube_link'
		)
	);	
	
	$wp_customize->add_setting( 'thirty8_vimeo_link', array(
		'default' => ''
	) );
	$wp_customize->add_control(
	'thirty8_vimeo_link',
		array(
			'label' => 'Vimeo',
			'section' => 'thirty8_social_links',
			'settings' => 'thirty8_vimeo_link'
		)
	);	

	$wp_customize->add_setting( 'thirty8_instagram_link', array(
		'default' => ''
	) );
	$wp_customize->add_control(
	'thirty8_instagram_link',
		array(
			'label' => 'Instagram',
			'section' => 'thirty8_social_links',
			'settings' => 'thirty8_instagram_link'
		)
	);
	
	$wp_customize->add_setting( 'thirty8_pinterest_link', array(
		'default' => ''
	) );
	$wp_customize->add_control(
	'thirty8_pinterest_link',
		array(
			'label' => 'Pinterest',
			'section' => 'thirty8_social_links',
			'settings' => 'thirty8_pinterest_link'
		)
	);

	$wp_customize->add_setting( 'thirty8_flickr_link', array(
		'default' => ''
	) );
	$wp_customize->add_control(
	'thirty8_flickr_link',
		array(
			'label' => 'Flickr',
			'section' => 'thirty8_social_links',
			'settings' => 'thirty8_flickr_link',
			'type' => 'text'
		)
	);
	
	
	// Set Sidebars
    
    $wp_customize->add_section( 'thirty8_blog_sidebars' , array(
	    'title'      => 'Blog Sidebars',
	    'priority'   => 34,
	) );
	
	$wp_customize->add_setting( 'thirty8_archive_sidebar' );
	$wp_customize->add_control( new Thirty8_Customize_CPT_Select_Control(
		$wp_customize,
		'thirty8_archive_sidebar',
		array(
			'label' => 'Archives Sidebar',
			'description' => 'Sidebar to display on blog archive pages.',
			'section' => 'thirty8_blog_sidebars',
			'settings' => 'thirty8_archive_sidebar'
		)
	) );
	
	$wp_customize->add_setting( 'thirty8_single_sidebar' );
	$wp_customize->add_control( new Thirty8_Customize_CPT_Select_Control(
		$wp_customize,
		'thirty8_single_sidebar',
		array(
			'label' => 'Single Post Sidebar',
			'description' => 'Sidebar to display on single posts.',
			'section' => 'thirty8_blog_sidebars',
			'settings' => 'thirty8_single_sidebar'
		)
	) );

}

add_action( 'customize_register', 'thirty8_customize_register' );


// Display Custom Text in theme

function thirty8_display_blogheader_text(){
	echo get_theme_mod('thirty8_blogheader_text', 'Latest News');
}
add_action('thirty8_blogheader_text', 'thirty8_display_blogheader_text');

function thirty8_display_blogintro_text(){
	echo get_theme_mod('thirty8_blogintro_text', '');
}
add_action('thirty8_blogintro_text', 'thirty8_display_blogintro_text');

function thirty8_display_readmore_text(){
	echo get_theme_mod('thirty8_readmore_text', 'Read More');
}
add_action('thirty8_readmore_text', 'thirty8_display_readmore_text');

function thirty8_display_objectarchive_text(){
	echo get_theme_mod('thirty8_objectarchive_text', '');
}
add_action('thirty8_objectarchive_text', 'thirty8_display_objectarchive_text');

function thirty8_display_footer_text(){
	echo get_theme_mod('thirty8_footer_text', '');
}
add_action('thirty8_footer_text', 'thirty8_display_footer_text');

function thirty8_display_signupheader_text(){
	echo get_theme_mod('thirty8_signupheader_text', '');
}
add_action('thirty8_signupheader_text', 'thirty8_display_signupheader_text');

function thirty8_display_signup_text(){
	echo get_theme_mod('thirty8_signup_text', '');
}
add_action('thirty8_signup_text', 'thirty8_display_signup_text');

function thirty8_display_signupaction_text(){
	echo get_theme_mod('thirty8_signupaction_text', '');
}
add_action('thirty8_signupaction_text', 'thirty8_display_signupaction_text');


// Display images in theme

function thirty8_display_site_logo(){ ?>

	<a id="site-logo" href="<?php echo home_url('/'); ?>">
		<img src="<?php echo get_theme_mod( 'thirty8_site_logo' ); ?>" alt="<?php bloginfo('name'); ?>" />
	</a>
	
<?php }
add_action('thirty8_site_logo', 'thirty8_display_site_logo');					


// Display Social Links in theme

function thirty8_display_social_header(){
	echo get_theme_mod('thirty8_social_header', '');
}
add_action('thirty8_social_header', 'thirty8_display_social_header');

function thirty8_display_facebook_link(){
	echo get_theme_mod('thirty8_facebook_link', '');
}
add_action('thirty8_facebook_link', 'thirty8_display_facebook_link');

function thirty8_display_twitter_link(){
	echo get_theme_mod('thirty8_twitter_link', '');
}
add_action('thirty8_twitter_link', 'thirty8_display_twitter_link');

function thirty8_display_googleplus_link(){
	echo get_theme_mod('thirty8_googleplus_link', '');
}
add_action('thirty8_googleplus_link', 'thirty8_display_googleplus_link');

function thirty8_display_linkedin_link(){
	echo get_theme_mod('thirty8_linkedin_link', '');
}
add_action('thirty8_linkedin_link', 'thirty8_display_linkedin_link');

function thirty8_display_youtube_link(){
	echo get_theme_mod('thirty8_youtube_link', '');
}
add_action('thirty8_youtube_link', 'thirty8_display_youtube_link');

function thirty8_display_vimeo_link(){
	echo get_theme_mod('thirty8_vimeo_link', '');
}
add_action('thirty8_vimeo_link', 'thirty8_display_vimeo_link');

function thirty8_display_instagram_link(){
	echo get_theme_mod('thirty8_instagram_link', '');
}
add_action('thirty8_instagram_link', 'thirty8_display_instagram_link');

function thirty8_display_pinterest_link(){
	echo get_theme_mod('thirty8_pinterest_link', '');
}
add_action('thirty8_pinterest_link', 'thirty8_display_pinterest_link');

function thirty8_display_flickr_link(){
	echo get_theme_mod('thirty8_flickr_link', '');
}
add_action('thirty8_flickr_link', 'thirty8_display_flickr_link');