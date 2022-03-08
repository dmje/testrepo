<?php

// Customizer

load_template(get_template_directory() . '/includes/customizer.php');

// Text domain

load_theme_textdomain( 'custom', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);
	
	
// Load Font Awesome

function thirty8base_enqueue_awesome() {
	wp_enqueue_style( 'thirty8base-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), '4.3.0' ); 
}

add_action( 'wp_enqueue_scripts', 'thirty8base_enqueue_awesome' );	


// Load Javascript

function thirty8theme_load_scripts() {
	if (!is_admin()) {	
		// Register our Javascript
		wp_register_script('meanmenu', get_template_directory_uri() . '/js/jquery.meanmenu.min.js', array('jquery'), false, false);
		wp_register_script('matchheight', get_template_directory_uri() . '/js/jquery.matchHeight.js', array('jquery'), false, false);
		wp_register_script('fitvids', get_template_directory_uri() . '/js/fitvids.js', array('jquery'), false, false);
		wp_register_script('swipebox', get_template_directory_uri() . '/js/jquery.swipebox.min.js', array('jquery'), false, false);
		wp_register_script('app', get_template_directory_uri() . '/js/app.js', array('jquery'), false, false);
		// Load our Javascript
		wp_enqueue_script('meanmenu');
		wp_enqueue_script('matchheight');
		wp_enqueue_script('fitvids');
		wp_enqueue_script('swipebox');
		wp_enqueue_script('app');
		
		$style_ver = filemtime( get_stylesheet_directory() . '/style.css' );
		wp_enqueue_style( 'main_style', get_stylesheet_directory_uri() . '/style.css', '', $style_ver );
	}
}
add_action('wp_enqueue_scripts', 'thirty8theme_load_scripts');


// This is for modal box shizzle

function ad_add_izimodal_files() 
{
		wp_enqueue_style( 'izimodal', 'https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.4.1/css/iziModal.min.css', array(), '1.4.1', 'all');
		wp_enqueue_script( 'izimodal', 'https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.4.1/js/iziModal.min.js', array ('jquery'), false);
}

add_action( 'wp_enqueue_scripts', 'ad_add_izimodal_files' );


// Register widgets/sidebars

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Blog Sidebar',
		'id' => 'blog_sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

// Enable menus

add_theme_support( 'nav-menus' );

add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus(
		array(
			'primary' => __( 'Primary' ),
			'footer_1' => __( 'Footer' )
		)
	);
}


// Feed support 

add_theme_support('automatic-feed-links');


// Post thumbnails 

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 60, 60, true ); // hard crop mode
add_image_size( '650x400', 650, 400, true );	// newsletter
add_image_size( '400x300', 400, 300, true );	
add_image_size( '800x400', 800, 400, true );
add_image_size( '800x600', 800, 600, true );
add_image_size( '360x360', 360, 360, true );	
add_image_size( '890x360', 890, 360, true );	 


// http://css-tricks.com/snippets/wordpress/remove-width-and-height-attributes-from-inserted-images/

add_filter( 'post_thumbnail_html', 'thirty8_remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'thirty8_remove_width_attribute', 10 );

function thirty8_remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

// http://www.mightyminnow.com/2014/02/wordpress-captions-how-to-remove-default-10px-padding/

function thirty8_remove_caption_padding( $width ) {
	return $width - 10;
}
add_filter( 'img_caption_shortcode_width', 'thirty8_remove_caption_padding' );


// Check browser (and stuff it into our body class)

add_filter('body_class','thirty8theme_browser_body_class');
function thirty8theme_browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	
	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}

add_filter('body_class','thirty8theme_mobile_body_class');
// Add Mobile Body Class "wp-is-mobile" for mobile and "wp-is-not-mobile" for non-mobile device
function thirty8theme_mobile_body_class( $classes ){
    if ( wp_is_mobile() ) :
        $classes[] = 'wp-is-mobile';
    else :
        $classes[] = 'wp-is-not-mobile';
    endif;
    return $classes;
}


// Remove WordPress "junk" from the header file (remove lines if it's something here that you want to use)

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


// Remove rel attribute from the category list, for validation
function thirty8_remove_category_list_rel($output)
{
  $output = str_replace(' rel="category tag"', '', $output);
  return $output;
}
add_filter('wp_list_categories', 'thirty8_remove_category_list_rel');
add_filter('the_category', 'thirty8_remove_category_list_rel');


// Comments

// Custom callback to list comments
function custom_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $depth;
  ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class('comment-item') ?>>
    	<div class="comment-author-section clearfix">
	        <div class="comment-author vcard">
	        	<?php commenter_link() ?>
	        </div>
	        <div class="comment-meta">
	        <?php printf(__('%1$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'thirty8theme'),
	                    get_comment_date(),
	                    get_comment_time(),
	                    '#comment-' . get_comment_ID() );
	                    edit_comment_link(__('Edit', 'thirty8theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); 
	                    if($args['type'] == 'all' || get_comment_type() == 'comment') :
	                comment_reply_link(array_merge($args, array(
	                    'reply_text' => __('Reply to this comment','thirty8theme'),
	                    'login_text' => __('Log in to reply.','thirty8theme'),
	                    'depth' => $depth,
	                    'before' => ' <span class="meta-sep">|</span> <span class="comment-reply-link">',
	                    'after' => '</span>'
	                )));
	            endif;
	         ?>
	         </div>
	      </div>
        
  <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'thirty8theme') ?>
          <div class="comment-content clearfix">
            <?php comment_text() ?>
        	</div>
        <?php } // end custom_comments

// Custom callback to list pings
function custom_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
        ?>
            <li id="comment-<?php comment_ID() ?>" <?php comment_class('thirty8-g') ?>>
                <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'thirty8theme'),
                        get_comment_author_link(),
                        get_comment_date(),
                        get_comment_time() );
                        edit_comment_link(__('Edit', 'thirty8theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'thirty8theme') ?>
            <div class="comment-content">
                	<?php comment_text() ?>
            </div>
<?php } // end custom_pings

// Produces an avatar image with the hCard-compliant photo class
function commenter_link() {
    $commenter = get_comment_author_link();
    if ( preg_match( '~]* class=[^>]+>~', $commenter ) ) {
    	$commenter = preg_replace( '~(]* class=[\'"]?)~', '\\1url ' , $commenter );
	} else { $commenter = preg_replace( '/(<a )/', '\\1class="url "' , $commenter );
    }
    $avatar_email = get_comment_author_email();
    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 60 ) );
    echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}  


// Custom post types 

add_action( 'init', 'create_my_post_types' );

	function create_my_post_types() {
				
	register_post_type('sidebar', array(
		'labels' => array(
			'name' => __( 'Sidebars' ),
			'singular_name' => __( 'Sidebar' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Sidebar' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Sidebar' ),
			'new_item' => __( 'New Sidebar' ),
			'view' => __( 'View Sidebar' ),
			'view_item' => __( 'View Sidebar' ),
			'search_items' => __( 'Search Sidebars' ),
			'not_found' => __( 'No Sidebars found' ),
			'not_found_in_trash' => __( 'No Sidebars found in Trash' ),
		),
		'public' => false,
		'show_ui' => true,
		'publicly_queryable' => false,
		'exclude_from_search' => true,
		'menu_position' => 24,
		'menu_icon'   => 'dashicons-layout',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'sidebar', 'with_front' => false ),
		'supports' => array( 'title', 'editor' ),	
		'has_archive' => false
		) );	
			
	register_post_type('newsletter', array(
		'labels' => array(
			'name' => __( 'Newsletters' ),
			'singular_name' => __( 'Newsletter' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Newsletter' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Newsletter' ),
			'new_item' => __( 'New Newsletter' ),
			'view' => __( 'View Newsletters' ),
			'view_item' => __( 'View Newsletter' ),
			'search_items' => __( 'Search Newsletters' ),
			'not_found' => __( 'No Newsletters found' ),
			'not_found_in_trash' => __( 'No Newsletters found in Trash' ),
		),
		'public' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'menu_position' => 22,
		'menu_icon'   => 'dashicons-email-alt',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'newsletters', 'with_front' => 'false' ),
		'supports' => array( 'title', 'editor', 'thumbnail' ),	
		'has_archive' => 'newsletters' // Will use the post type slug, ie. example
		) );		
			
	}


// Function for displaying caption on featured image

function thirty8_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span class="wp-caption-text">'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}


// used for getting a custom size of a customizer uploaded image - retrieves the attachment ID from the file URL
function thirty8_pippin_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}


// Shortcodes

function thirty8base_pullquote( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'float' => '$align',
		), $atts));
	return '<blockquote class="shortcode-pullquote ' . $float . '">' . $content . '</blockquote>';
 }
 
add_shortcode('pullquote', 'thirty8base_pullquote');


// Set number of posts on a CPT index view

function thirty8_object_listings_count( $query ) {
    if ( (!is_admin()) && (is_post_type_archive( 'object' )) ) {
        $query->set( 'posts_per_page', 48 );
        return;
    }
}
add_action( 'pre_get_posts', 'thirty8_object_listings_count', 1 );


// Display the non-ACF meta fields in the back end 
// https://support.advancedcustomfields.com/forums/topic/acf-pro-5-6-0-unable-to-display-regular-custom-fields-metabox-on-cpts/

add_filter('acf/settings/remove_wp_meta_box', '__return_false');


// Add theme support for COS remappings

function custom_theme_setup() {
	add_theme_support( 'cos-remaps' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );


// Add option to show custom fields on objects

// from https://gregrickaby.com/2016/06/modify-wordpress-custom-post-type/

function show_object_custom_fields( $args, $post_type ) {

	// If not object CPT, bail.
	if ( 'object' !== $post_type ) {
		return $args;
	}

	// Add additional object CPT options.
	$object_args = array(
		'supports'    => array('custom-fields'),
	);

	// Merge args together.
	return array_merge( $args, $object_args );
}
add_filter( 'register_post_type_args', 'show_object_custom_fields', 10, 2 );


// Shortcodes

function thirty8_pullquote( $atts, $content = null ) 
{
	extract(shortcode_atts(array(
		'float' => '$align',
		), $atts));
	return '<blockquote class="shortcode-pullquote ' . $float . '">' . $content . '</blockquote>';
 }
 
add_shortcode('pullquote', 'thirty8_pullquote');


// cImage path

function GetResizedImageURL($src,$width=600,$height=800,$options='keepratio')
{
	// force https
	$src = str_replace('http://','https://',$src);
	
	$cimageroot = get_template_directory_uri() . '/cimage/imgd.php';
	
	if($options == 'croptofit')
	{
		$pathoptions = 'crop-to-fit';	
	}
	else
	{
		$pathoptions = 'keepratio';
	}
	
	if($height == 0)
	{
		// keep aspect ratio dependent on the width specified
		
		$base_resize_path = $cimageroot . '?src=' . $src . '&' . $pathoptions . '&width=' . $width;
	}
	else
	{

		if($width == 0)
		{
			// keep aspect ratio dependent on height specified
			
			$base_resize_path = $cimageroot . '?src=' . $src . '&' . $pathoptions . '&height=' . $height;
		}
		else
		{
			$base_resize_path = $cimageroot . '?src=' . $src . '&' . $pathoptions . '&width=' . $width . '&height=' . $height;
		}
	}
	
	// broken
	
	//$src = str_replace('http://','https://',$src);	
	//$base_resize_path = $src;	
		
	return $base_resize_path;	
}


// Return item description - used on repeater feature and search

function thirty8_get_item_details($postid)
{
	$item_details = array();
	$image_size = '650x400';
	$the_blurb = '';
	$attachment_id = '';

	$item_details['title'] = get_the_title($postid);
	$attachment_id = get_post_thumbnail_id($postid);	
	
	if(!$attachment_id)
	{
		if ( get_theme_mod( 'thirty8_default_image_thumbnail' ))
		{
			$item_details['image_src'] = get_theme_mod( 'thirty8_default_image_thumbnail' );
			$item_details['image_alt'] = 'MoDA logo';
		}
	} 
	else 
	{
		$imagesrc = wp_get_attachment_image_src( $attachment_id, $image_size );
		$item_details['image_src'] = $imagesrc[0];
		$item_details['image_alt'] = get_post_meta($attachment_id , '_wp_attachment_image_alt', true);
		
		if(!$item_details['image_alt'])
		{
			$item_details['image_alt'] = get_the_title($postid);
		}
	}	
	
	// Get fields depending on post type
	
	// Only used for debugging:	
	//$item_details['fullinfo'] = get_post($postid);
		
	switch (get_post_type($postid)) 
	{
				  
		case 'page':

			$item_details['blurb'] = get_field('page_summary',$postid);

		break;

		case 'post':

			$item_details['blurb'] = get_field('page_summary',$postid);
			
			// If no page summary, grab the excerpt
			
			if(!$item_details['blurb'])
			{
				$item_details['blurb'] = get_the_excerpt($postid);
			}							

			// If still nothing, grab the first sentence of the post content

			if(!$item_details['blurb'])
			{
				$item_details['blurb'] = get_post_field('post_content', $postid);
				$item_details['blurb'] = $array = explode('.',$item_details['blurb']);
				$item_details['blurb'] = strip_tags($array[0] . '.');				
			}

		break;
		
		case 'object';
		
			//$item_details['blurb'] = get_field('labelText',$postid);
			
			$item_details['blurb'] = GetObjectWebCaption($postid);
		
			if($item_details['blurb'])
			{				
				$item_details['blurb'] = $array = explode('.',$item_details['blurb']);
				$item_details['blurb'] = strip_tags($array[0] . '.');	
			}
			
			// Shorten blurb if needed
			if (strlen($item_details['blurb']) > 10)
			{
				//$item_details['blurb'] = substr($item_details['blurb'], 0, 7) . '...';			
			}
			
			
			// Change the post meta below to match the field you want to fetch for the object image		
				
			$item_details['image_src'] = get_post_meta($postid,'image')[0];
			$item_details['image_src'] = GetResizedImageURL($item_details['image_src'],650,400,'croptofit');
			$item_details['image_alt'] = get_the_title($postid);
		
		break;
		
		case 'tribe_events';
		
			// The event calendar event
		
			$item_details['blurb'] = get_field('page_summary',$postid);
		
		
		break;
		
		
		
		default:
		
			$the_blurb = '';
			
		break;	
	
	}
	
	return $item_details;
}

// Change OG image for single objects
// Based on snippet here https://gist.github.com/amboutwe/811e92b11e5277977047d44ea81ee9d4

add_filter( 'wpseo_opengraph_image', 'change_opengraph_image_url' );

function change_opengraph_image_url( $url ) 
{
	if(is_singular( 'object' ))
		{	
			$seo_image = cos_get_field('image');
			$seo_image = str_replace('v0_web.jpg', 'v0_high.jpg', $seo_image);
			return $seo_image;
		}
		
}


// Add comments to object CPT
add_post_type_support('object', 'comments');


// Function to try and sort out the hell of object descriptions

function GetObjectWebCaption($postid){
	
	$object_id = cos_get_field('uniqueID');
	$web_caption = '';
	
	
	if (strpos($object_id, 'ARC') !== false) {
		
		// It's an archive record
		
		$web_caption = cos_get_field('scope');
		
	} else {

		// It's an object record
		
		$object_labeltext = cos_get_field('labelText');	
		$split_labeltext = explode('|||',$object_labeltext);
		
		foreach($split_labeltext as $thing){
					
			if(strpos($thing, 'Web Caption:') !== false){
				$web_caption = $thing;
				$web_caption = str_replace('Web Caption:', '', $web_caption);
			}
			
		}
		
		
	}
		
	
	
	
	if($web_caption){
		return $web_caption;
	}
	
}



?>