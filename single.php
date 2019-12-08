<?php get_header('small'); ?>
<?php the_post(); ?>

<div id="content">

<div id="intro_image"></div>

<div class="story_title_bar cat<?=category_id_convert( get_the_category_name_without_html() );?>">
	<div class="header_left_story">	
		
		<div class="publish_details"><i class="fa fa-calendar"></i> <?=get_the_date('F j, Y');?></div>
		<div class="publish_details"><i class="fa fa-folder"></i> <?=get_the_category_list(' ');?></div>
		<div class="publish_details"><i class="fa fa-tags"></i> <?=get_the_tag_list('', ', ');?></div>
		<div class="entry-title"><?php the_title(); ?></div>
	</div>

	<!--
	<div class="header_right_story">
    	
	<div>
    	    Responsive Google AD
    	    <style>
            .responsive { width: 234px; height: 60px; }
            @media(min-width: 550px) { .responsive { width: 300px; height: 250px; } }
            @media(min-width: 858px) { .responsive { width: 336px; height: 280px; } }
            </style>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
           
	    <ins class="adsbygoogle responsive"
                 style="display:inline-block"
                 data-ad-client="ca-pub-6120829251754620"
                 data-ad-slot="5082026995"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        <span> My google AD, I know most hackers and DIY'ers hate ads but it brings in around 5 bucks on a good month and I use it to subsidize my hosting fee's so you can get access to my code :) </span>
	</div>
	-->
</div>

<!-- 
<div id="story_tools">
			<?php //the_flattr_permalink() ?>
			<script type="text/javascript" src="http://www.reddit.com/static/button/button1.js"></script>
			<script type="text/javascript" src="http://www.stumbleupon.com/hostedbadge.php?s=2"></script>
			<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script><div class="g-plusone"></div>
 			<script type="text/javascript">
			//<![CDATA[
			(function() {
				document.write('<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="YourTwitter">Tweet</a>');
				var s = document.createElement('SCRIPT'), s1 = document.getElementsByTagName('SCRIPT')[0];
				s.type = 'text/javascript';
				s.async = true;
				s.src = 'http://platform.twitter.com/widgets.js';
				s1.parentNode.insertBefore(s, s1);
			})();
			//]]>
			</script>
</div>
-->

<?php the_content(); ?>
<div class="clearing"></div>

<p style="float:right;">&pi;</p>
<?php //wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>     

<div class="clearing"></div>

<!--
<div class="entry-utility">
     <?php printf( __( 'This entry was posted in %1$s%2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%5$s" title="Comments RSS to %4$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'your-theme' ),
      get_the_category_list(', '),
      get_the_tag_list( __( ' and tagged ', 'your-theme' ), ', ', '' ),
      get_permalink(),
      the_title_attribute('echo=0'),
      comments_rss() ) ?>

</div>
-->

<div class="story_close_item">
    <div></div>
    <span>Hey thanks for reading this far! Maybe you'll be interested in more of my projects? <a href="/">Check out my homepage</a> :)</span>
</div>

     
<?php comments_template('', true); ?>


<?php get_footer(); ?>
