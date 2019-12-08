<?php get_header('small'); ?>
<?php the_post(); ?>

<div id="content">

<div id="intro_image"></div>

<div class="story_title_bar cat<?=category_id_convert( get_the_category_name_without_html() );?>">
	<div class="header_left_story">	
		<div class="entry-title"><?php the_title(); ?></div>
		<div id="publish_date_story">Published: <?=get_the_date('F j, Y');?></div>
	</div>
</div>

<?php the_content(); ?>
<div class="clearing"></div>

<p>--</p>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>     

<div class="clearing"></div>

<?php get_footer(); ?>
