<?php

show_admin_bar(false);


function falldeaf_custom_upload_mimes( $existing_mimes ) {
	// add webm to the list of mime types
	$existing_mimes['py'] = 'text/plain';
	$existing_mimes['jscad'] = 'text/plain';

	// return the array back to the function with our added mime type
	return $existing_mimes;
}
add_filter( 'mime_types', 'falldeaf_custom_upload_mimes' );

add_theme_support( 'post-thumbnails' );
//set_post_thumbnail_size( 150, 150, true );
//set_post_thumbnail_size( 293 );

if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

//Responsive youtube embeds. Makes YT full content width, and shrinks along with browser window
add_filter('embed_oembed_html','resizeable_yt',1,3);
function resizeable_yt($html,$url,$args){
    $url_string = parse_url($url, PHP_URL_QUERY);
    parse_str($url_string, $id);
    if (isset($id['v'])) {
        return '<div class="clearing"></div><div class="video-container"><iframe width="'.$args['width'].'" height="'.$args['height'].'" src="//www.youtube.com/embed/'.$id['v'].'?rel=0&showinfo=0&autohide=1&color=white&theme=light" frameborder="0" allowfullscreen></iframe></div>';
    }
    return $html;
}

function add_custom_behavior_script() {
    if(is_single()){
    	wp_enqueue_script(
    		'custom-script',
    		get_stylesheet_directory_uri() . '/js/behavior.js',
    		array( 'jquery', 'jquery-effects-core' )
    	);
    }

/*
    if(is_home()){
    	wp_enqueue_script(
    		'custom-script',
    		get_stylesheet_directory_uri() . '/js/jquery.videobackground.js',
    		array( 'jquery', 'jquery-effects-core' )
    	);
    }
*/
}
add_action( 'wp_enqueue_scripts', 'add_custom_behavior_script' );

// Register widgetized areas
function theme_widgets_init() {
 // Area 1
 register_sidebar( array (
 'name' => 'Primary Widget Area',
 'id' => 'primary_widget_area',
 'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
 'after_widget' => "</li>",
 'before_title' => '<h3 class="widget-title">',
 'after_title' => '</h3>',
  ) );
 
 // Area 2
 register_sidebar( array (
 'name' => 'Secondary Widget Area',
 'id' => 'secondary_widget_area',
 'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
 'after_widget' => "</li>",
 'before_title' => '<h3 class="widget-title">',
 'after_title' => '</h3>',
  ) );
} // end theme_widgets_init
 
add_action( 'init', 'theme_widgets_init' );

$preset_widgets = array (
 'primary_widget_area'  => array( 'search', 'pages', 'categories', 'archives' ),
 'secondary_widget_area'  => array( 'links', 'meta' )
);
if ( isset( $_GET['activated'] ) ) {
 update_option( 'sidebars_widgets', $preset_widgets );
}
// update_option( 'sidebars_widgets', NULL );

// Check for static widgets in widget-ready areas
function is_sidebar_active( $index ){
  global $wp_registered_sidebars;
 
  $widgetcolums = wp_get_sidebars_widgets();
   
  if ($widgetcolums[$index]) return true;
 
 return false;
} // end is_sidebar_active

//don't auto add <p> tags!
//remove_filter('the_excerpt', 'wpautop');
//remove_filter('term_description','wpautop');

// Custom callback to list comments in the your-theme style
function custom_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
 $GLOBALS['comment_depth'] = $depth;
  ?>
   <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
    <div class="comment-author vcard"><?php commenter_link() ?></div>
    <div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'your-theme'),
       get_comment_date(),
       get_comment_time(),
       '#comment-' . get_comment_ID() );
       edit_comment_link(__('Edit', 'your-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
  <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'your-theme') ?>
          <div class="comment-content">
        <?php comment_text() ?>
    </div>
  <?php // echo the comment reply link
   if($args['type'] == 'all' || get_comment_type() == 'comment') :
    comment_reply_link(array_merge($args, array(
     'reply_text' => __('Reply','your-theme'),
     'login_text' => __('Log in to reply.','your-theme'),
     'depth' => $depth,
     'before' => '<div class="comment-reply-link">',
     'after' => '</div>'
    )));
   endif;
  ?>
<?php } // end custom_comments

// Custom callback to list pings
function custom_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
        ?>
      <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
       <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'your-theme'),
         get_comment_author_link(),
         get_comment_date(),
         get_comment_time() );
         edit_comment_link(__('Edit', 'your-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'your-theme') ?>
            <div class="comment-content">
       <?php comment_text() ?>
   </div>
<?php } // end custom_pings

// Produces an avatar image with the hCard-compliant photo class
function commenter_link() {
 $commenter = get_comment_author_link();
 if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
  $commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
 } else {
  $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
 }
 $avatar_email = get_comment_author_email();
 $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
 echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
} // end commenter_link

// For category lists on category archives: Returns other categories except the current one (redundant)
function cats_meow($glue) {
 $current_cat = single_cat_title( '', false );
 $separator = "\n";
 $cats = explode( $separator, get_the_category_list($separator) );
 foreach ( $cats as $i => $str ) {
  if ( strstr( $str, ">$current_cat<" ) ) {
   unset($cats[$i]);
   break;
  }
 }
 if ( empty($cats) )
  return false;
 
 return trim(join( $glue, $cats ));
} // end cats_meow

// For tag lists on tag archives: Returns other tags except the current one (redundant)
function tag_ur_it($glue) {
 $current_tag = single_tag_title( '', '',  false );
 $separator = "\n";
 $tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
 foreach ( $tags as $i => $str ) {
  if ( strstr( $str, ">$current_tag<" ) ) {
   unset($tags[$i]);
   break;
  }
 }
 if ( empty($tags) )
  return false;
 
 return trim(join( $glue, $tags ));
} // end tag_ur_it

// Get a category name and turn it into a number based on it's index in the 
// available categories in the word press cat array
function category_id_convert( $cat_name )
{
	$id = 1;
	$caterray = get_categories();
	foreach( $caterray as $category_array ) 
	{
		if($category_array->name == $cat_name) { return $id; }
		$id++;
	}
}

// return the category name with no html inside the_post loop
function get_the_category_name_without_html()
{
	$val = get_the_category();
	return $val[0]->name;
}

// figure out which page we're on based on name and return the appropriate class
// for the nav links and return tab_up or tab_down accordingly
function tab_page( $type, $name )
{
	switch ($type)
	{
	case 'home':
			if(is_home())
			{
				return "tab_up";
			} else {
				return "tab_down";
			}	
		break;
	case 'cat':
			if(is_category($name))
			{
				return "tab_up";
			} else {
				return "tab_down";
			}	
		break;
	}
}

// Get a random image attached to the post to display as a thumbnail
function catch_that_image()
{
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  //$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  //$first_img = $matches [1] [0];

  $iPostID = $post->ID;

    // Get images for this post
  $arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $iPostID );
  
  //print_r($arrImages);
  
  // If images exist for this page
  if($arrImages) 
  {
  	
        // Get array keys representing attached image numbers
        $arrKeys = array_keys($arrImages);
  
        $num_images = count($arrKeys);
        
		//Get the first image attachment
        $iNum = $arrKeys[ rand(0, ($num_images - 1) ) ];
        
        //print_r($iNum);

        // Get the thumbnail url for the attachment
        $sThumbUrl = wp_get_attachment_thumb_url($iNum);
        
		return $sThumbUrl;
  } else {
  	return "/images/default.jpg";
  }
}

function catch_those_images()
{
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  //$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  //$first_img = $matches [1] [0];

  $iPostID = $post->ID;

    // Get images for this post
  $arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $iPostID );
  
  //print_r($arrImages);
  
  // If images exist for this page
  if($arrImages) 
  {        
		return $arrImages;
  }
}

function print_images_as_a_jquery_gallery($imgArray, $post_id)
{
  global $post, $posts;
	//print_r($imgArray);
	//echo count($imgArray);
	//don't print gallery code if there's only one image or none
	if(count($imgArray) <= 1) { return 0; }

	//dont' go higher than 5 preview items
	$i = 1;
	//loop through
	foreach($imgArray as $imgObjects)
	{
		//make the button white if it's the first one
		if($i == 1) 
		{
			$color_if_first = "style='background-color:white;'";
		} else {
			$color_if_first = "";
		}
		
		echo "	<div iid='$imgObjects->ID' pid='$post_id' class='gallery_button_container' imgurl='" . wp_get_attachment_thumb_url($imgObjects->ID) . "'>\n
					<div id='gallery_button_" . $imgObjects->ID . "' class='gallery_button' $color_if_first></div>\n
				</div>\n\n";
		$i++;
		if($i >= 6) { break; }
	}

	return 1;
}

function print_image_as_link_to_story($sThumbUrl)
{
        // Build the <img> string
        $sImgString = '<a href="' . get_permalink() . '">' .
                            '<img class="loop_gallery_image" src="' . $sThumbUrl . '" width="287" alt="The Thumbnail Image" title="Thumbnail Image" />' .
                        '</a>';

        // Print the image
        echo $sImgString;
}

//add_filter( 'show_admin_bar', '__return_false' );
//Custom CSS Widget
add_action('admin_menu', 'custom_css_hooks');
add_action('save_post', 'save_custom_css');
add_action('wp_head','insert_custom_css');
function custom_css_hooks() {
	add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'post', 'normal', 'high');
	add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'page', 'normal', 'high');
}
function custom_css_input() {
	global $post;
	echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
	echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
}
function save_custom_css($post_id) {
	if (!wp_verify_nonce($_POST['custom_css_noncename'], 'custom-css')) return $post_id;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	$custom_css = $_POST['custom_css'];
	update_post_meta($post_id, '_custom_css', $custom_css);
}
function insert_custom_css() {
	if (is_page() || is_single()) {
		if (have_posts()) : while (have_posts()) : the_post();
			echo '<style type="text/css">'.get_post_meta(get_the_ID(), '_custom_css', true).'</style>';
		endwhile; endif;
		rewind_posts();
	}
}

?>
