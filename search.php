<?php get_header('small'); ?>
 
    <div id="content">
   
<?php if ( have_posts() ) : ?>    
 
<?php while ( have_posts() ) : the_post() ?>

	<div class="date_block cat<?=category_id_convert( get_the_category_name_without_html() );?>">
    		<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
			<br /><br />
			<?php comments_number('', '<span class="bubble_comment cat' . category_id_convert( get_the_category_name_without_html()  ) . '_color">1</span>', '<span class="bubble_comment cat' . category_id_convert( get_the_category_name_without_html()  ) . '_color">%</span>'); ?>
    		
    	</div>
    	<div class="picture_block cat<?=category_id_convert( get_the_category_name_without_html()  );?>">
			
    	</div>
    	<div class="story_block">
    			<span class="story_block_title">
	     			<a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'your-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a>
    			</span>
    			<br />
    			<span class="story_block_sub">
    				<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'your-theme' )  ); ?>
					<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
				</span>
				<br />
				<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'your-theme' ); ?></span><?php echo get_the_category_list(', '); ?></span>
			    <span class="meta-sep"> | </span>
			    <?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'your-theme' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
			    <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'your-theme' ), __( '1 Comment', 'your-theme' ), __( '% Comments', 'your-theme' ) ) ?></span>
			    <?php edit_post_link( __( 'Edit', 'your-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
    	</div>
    </div>

<?php endwhile; ?>
 
<?php else : ?>
 
<!-- here's where we'll put a search form if there're no posts -->
 
<?php endif; ?>  
 
</div><!-- #content --> 

<?php get_footer(); ?>