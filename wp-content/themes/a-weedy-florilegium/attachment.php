<?php get_header(); ?>


<!-- == 
  
  attachment.php 
  
== -->


<div class="hfeed">

<?php the_post() ?>

<h2 class="page-title"><a href="<?php echo get_permalink($post->post_parent) ?>" rev="attachment"><?php echo get_the_title($post->post_parent) ?></a></h2>

<div id="post-<?php the_ID(); ?>" class="<?php webjournal_post_class(); ?>">
<h3 class="entry-title"><?php the_title(); ?></h3>
<div class="entry-content">
<div class="entry-attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>" title="<?php echo wp_specialchars( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a></div>
<div class="entry-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); ?></div>
<?php the_content('<span class="more-link">'.__('Continue reading &rsaquo;', 'webjournal').'</span>'); ?>

</div>
</div><!-- .post -->

<?php comments_template(); ?>

</div><!-- .hfeed -->
</div><!-- #content -->
</div><!-- #container -->

<div id="primary" class="sidebar">
<ul>
<li id="home-link">
<h3><a href="<?php bloginfo('home') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?>"><?php _e('&laquo; Home', 'webjournal'); ?></a></h3>
</li>
<li class="entry-meta">
<h3><?php _e('About This Post', 'webjournal') ?></h3>
<ul>
<li><?php printf(__('Posted by %s', 'webjournal'), webjournal_author_link() ) ?></li>
<li><?php printf(__('<abbr class="published" title="%1$sT%2$s">%3$s at %4$s</abbr>', 'webjournal'), get_the_time('Y-m-d'), get_the_time('H:i:sO'), get_the_time('F jS, Y'), get_the_time() ) ?></li>
<?php edit_post_link(__('Edit this entry', 'webjournal'),'<li class="entry-edit">&equiv; ','</li>') ?>
</ul>
</li>
</ul>
</div><!-- attachment.php #primary .sidebar -->

<div id="secondary" class="sidebar">
<ul>
<li class="entry-interact">
<h3><?php _e('Interact', 'webjournal') ?></h3>
<ul>
<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) : ?>
<li class="comment-link"><?php _e('<a href="#respond" title="Post a comment">Post a comment</a>', 'webjournal') ?></li>
<li class="trackback-link"><?php printf(__('<a href="%s" rel="trackback" title="Trackback URL for your post">Trackback URI</a>', 'webjournal'), get_trackback_url() ) ?></li>
<?php elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) : ?>
<li class="comment-link"><?php _e('Comments closed', 'webjournal') ?></li>
<li class="trackback-link"><?php printf(__('<a href="%s" rel="trackback" title="Trackback URL for your post">Trackback URI</a>', 'webjournal'), get_trackback_url() ) ?></li>
<?php elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) : ?>
<li class="comment-link"><?php _e('<a href="#respond" title="Post a comment">Post a comment</a>', 'webjournal') ?></li>
<li class="trackback-link"><?php _e('Trackbacks closed', 'webjournal') ?></li>
<?php elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) : ?>
<li class="comment-link"><?php _e('Comments closed', 'webjournal') ?></li>
<li class="trackback-link"><?php _e('Trackbacks closed', 'webjournal') ?></li>
<?php endif; ?>
</ul>
</li>
<li id="rss-links">
<h3><?php _e('RSS Feeds', 'webjournal') ?></h3>
<ul>
<li><?php comments_rss_link(__('Comments to this post', 'webjournal')); ?></li>
<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> RSS 2.0 Feed" rel="alternate" type="application/rss+xml"><?php _e('All posts', 'webjournal') ?></a></li>
<li><a href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo wp_specialchars(bloginfo('name'), 1) ?> Comments RSS 2.0 Feed" rel="alternate" type="application/rss+xml"><?php _e('All comments', 'webjournal') ?></a></li>
</ul>
</li>
<li id="search">
<h3><label for="s"><?php _e('Search', 'webjournal') ?></label></h3>
<form id="searchform" method="get" action="<?php bloginfo('home') ?>">
<div>
<input id="s" name="s" type="text" value="<?php echo wp_specialchars(stripslashes($_GET['s']), true) ?>" size="10" />
<input id="searchsubmit" name="searchsubmit" type="submit" value="<?php _e('Find', 'webjournal') ?>" />
</div>
</form>
</li>
</ul>
</div><!-- attachment.php #secondary .sidebar -->

<?php get_footer() ?>
