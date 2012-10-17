<?php get_header() ?>

<!-- == 
  
  archive.php 
  
== -->


<div class="hfeed">

<?php the_post() ?>
<?php if ( is_day() ) : ?>

  <h2 class="page-title page-title-daily"><?php _e('daily:', 'webjournal') ?> <span class="page-subtitle"><?php the_time(__('l, F Y', 'webjournal')) ?></span></h2>

<?php elseif ( is_month() ) : ?>

  <h2 class="page-title page-title-monthly"><?php _e('monthly:', 'webjournal') ?> <span class="page-subtitle"><?php the_time(__('F Y', 'webjournal')) ?></span></h2>

<?php elseif ( is_year() ) : ?>

  <h2 class="page-title page-title-yearly"><?php _e('yearly:', 'webjournal') ?> <span class="page-subtitle"><?php the_time(__('Y', 'webjournal')) ?></span></h2>

<?php elseif ( is_author() ) : ?>

  <h2 class="page-title page-title-author"><?php _e('author:', 'webjournal') ?> <span class="page-subtitle"><?php webjournal_author_hCard() ?></span></h2>
  <div class="author-callout">
    <ul><?php if ( !(''== $authordata->user_description) ) : echo '<li>' . apply_filters('archive_meta', $authordata->user_description) . '</li>'; endif; ?><?php if ( !(''== $authordata->user_url) ) : echo '<li>' . apply_filters('archive_meta', $authordata->user_url) . '</li>'; endif; ?></ul>
  </div>

<?php elseif ( is_category() ) : ?>

  <h2 class="page-title"><?php _e('~/', 'webjournal') ?> <span class="page-subtitle"><?php echo single_cat_title(); ?></span></h2>

<?php elseif ( is_tag() ) : ?>

  <h2 class="page-title"><span class="archive-meta"><?php _e('#', 'webjournal') ?></span> <span class="page-subtitle"><?php single_tag_title(); ?></span></h2>

<?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>

  <h2 class="page-title"><?php _e('archives', 'webjournal') ?> <?php printf(__('%1$s archives', 'webjournal'), wp_specialchars(get_the_title(), 'double') ) ?></h2>

<?php 

endif;

rewind_posts();

while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID() ?>" class="<?php webjournal_post_class() ?>">
<h3 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf(__('Permalink to %s', 'webjournal'), wp_specialchars(get_the_title(), 1)) ?>" rel="bookmark"><?php the_title() ?></a></h3>
<div class="entry-content">
<?php the_excerpt('<span class="more-link">'.__('Continue Reading &raquo;', 'webjournal').'</span>') ?>

</div>
<div class="entry-meta">
<span class="meta-sep">&para;</span>
<span class="entry-date"><?php _e('Posted', 'webjournal') ?> <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php unset($previousday); printf(__('%1$s', 'webjournal'), the_date('d F Y', false)) ?></abbr></span>
<?php if ( !is_author() ) : webjournal_author_hCard(); endif; // Displays if NOT author archive page ?>

<span class="meta-sep">&sect;</span>
<span class="entry-category"><?php if ( !is_category() ) { echo the_category(' &sect; '); } else { $other_cats = webjournal_other_cats(' &sect; '); echo $other_cats; } // Hides the current category if category archive ?></span>
<span class="meta-sep">&Dagger;</span>
<span class="tag-links"><?php if ( !is_tag() ) { echo the_tags(__('Tagged: ', 'webjournal'), ", ", ""); } else { $other_tags = webjournal_other_tags(', '); printf(__('Also tagged: %s', 'webjournal'), $other_tags); } ?></span>
<?php edit_post_link(__('Edit ' + get_the_title(), 'webjournal'), "\t\t\t\t\t<span class=\"meta-sep\">&equiv;</span>\n\t\t\t\t\t<span class='entry-edit'>", "</span>\n"); ?>
</div>
</div><!-- .post -->

<?php endwhile ?>

<div id="nav-below" class="navigation">
<div class="nav-previous"><?php next_posts_link(__('&laquo; Earlier posts', 'webjournal')) ?></div>
<div class="nav-next"><?php previous_posts_link(__('Later posts &raquo;', 'webjournal')) ?></div>
</div>

</div><!-- .hfeed -->
</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>
