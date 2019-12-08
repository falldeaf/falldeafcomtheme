<?php get_header('cat'); ?>

<a name="posts"></a>

<div class="category-title">Category: <?php single_cat_title() ?></div> <a href="#category"></a>

<div id="items">   

<?php //$the_query = new WP_Query('posts_per_page=12'); ?>

<?php //while ( $the_query->have_posts() ) { ?>
<?php while ( have_posts() ) : the_post() ?>

<?php //$the_query->the_post(); ?>

    <div id="post-<?php the_ID(); ?>" class="item">
    	<!-- <div class="date_block cat<?=category_id_convert( get_the_category_name_without_html() );?>">
    		<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
			<br /><br />
			<?php comments_number('', '<span class="bubble_comment cat' . category_id_convert( get_the_category_name_without_html()  ) . '_color">1</span>', '<span class="bubble_comment cat' . category_id_convert( get_the_category_name_without_html()  ) . '_color">%</span>'); ?>
    		
    	</div> -->

        <div id="picture_block_<?php the_ID();?>" class="picture_block">
    		
    		<a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'your-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
    		    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium'); 
    		    $newheight = (286 * $thumb[2] ) / $thumb[1] ?>

    		    <div style="height:<?=$newheight?>px; width:286px; background-image:url('<?=$thumb[0]?>');"></div>
    		</a>
    		<!-- <?php echo the_post_thumbnail('medium'); ?></a> -->
    				
    	</div>


    	<div class="story_block cat<?=category_id_convert( get_the_category_name_without_html()  );?>_story">

    			<div class="story_block_title">
	     			<a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'your-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?> </a>
    			</div>
    			
    			<div class="story_block_sub">
    				<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'your-theme' )  ); ?>
					<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
				</div>
				
				<div class="story_block_links">
					<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'your-theme' ); ?></span><?php echo get_the_category_list(', '); ?></span>
				    <span class="meta-sep"> | </span>
				    <?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'your-theme' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
				    <span class="comments-link"> Comments <?php comments_popup_link( __( 'Leave a comment', 'your-theme' ), __( '1 Comment', 'your-theme' ), __( '% Comments', 'your-theme' ) ) ?></span>
				    <?php edit_post_link( __( 'Edit', 'your-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
				    <span class="cat-links">
				</div>
			</div>
    </div>

<?php endwhile; ?>

</div> <!-- item -->

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav_above" class="navigation">
		<div class="nav_previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'falldeaf' ) ); ?></div>
		<div class="nav_next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'falldeaf' ) ); ?></div>
	</div><!-- #nav-above -->
<?php endif; ?>

<?php get_footer(); ?>