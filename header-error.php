<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" style="height:100%">

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
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/errorstyle.css" />
 <link href='//fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
 <link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>

<?php
        //wp_enqueue_script(array('jquery', 'jquery-ui-core'));
        wp_head();
?>

 <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'your-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
 <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'your-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
 <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

</head>

<body style="height:100%">

	<div id="container">

	<div id="intro" style="position:absolute; z-index:100;">
		<div class="header_well">
		<div id="logoheadimage"><img src="/falldeaf-content/themes/falldeafresponsive/img/smalllogo.png" alt="falldeaf logo"></div>
		<div id="title" class="head center"><a href="/"><?=bloginfo('name')?></a></div>
                <div id="tagline" class="head center"><?=bloginfo('description')?></div>
                </div>

			<div id="message"><div class="eicon"></div>Oh crap... this would be a good time to panic.</div>
	</div>

