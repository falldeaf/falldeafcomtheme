<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 

<head>
    <title><?php
        if ( is_single() ) { single_post_title(); }      
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); } //get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); } //get_page_number(); }
    ?></title>
 
 <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
 <meta name="google-site-verification" content="OIVdYDnI5iKu9ejyU8NZHpv0tqqwzmEGcxRehaR2Lms" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="theme-color" content="#3EBC1D">
  
 <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <link href='//fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
 <link href='//fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
 <link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
 
<?php 
/*	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script(array('jquery', 'jquery-ui-core'));*/
	wp_head(); 
?>

 <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'your-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
 <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'your-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
 <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

</head>

<body>

<div id="outer">

    <div id="main">
	
        <div id="main_head_small">

            <div id="nav_box">
                <div id="left_side">
                    <a href="/">
                        <div id="logosmall" class="center"></div> <!-- <img src="<?=get_bloginfo('template_directory')?>" alt="My logo" title="My falldeaf logo" /></div> -->
                    
                        <div id="titlesmall">FALLDEAF.COM</div>
                    </a>
                </div>
                
                <div id="right_side">
                    <div id="taglinesmall"><?=get_bloginfo('description')?></div>
                    
                    <div id="navsmall">
                        <ul>
                        <?php 
        				$caterray = get_categories();
        				$count = 1;
        				foreach( $caterray as $category_array ) { ?>
    
                            <li><a href="/category/<?=$category_array->slug?>/"><?=$category_array->name?></a></li>
                            <!-- <span class="hexdescription"> <?=$category_array->description?> </span> -->

        				<?php $count++; } ?>
        				</ul>
                    </div>
                </div>
            </div>
    	</div>
