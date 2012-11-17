<?php get_header(); ?>


<!-- == 
  
  single.php 
  
== -->



<div class="hfeed">

<?php the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="<?php webjournal_post_class(); ?>">

<h1 class="entry-title"><?php the_title(); ?></h1>
 
<div class="entry-content">

<?php the_content('<span class="more-link">'.__('Continue Reading &raquo;', 'webjournal').'</span>'); ?>

<?php link_pages('<div class="page-link">'.__('Pages: ', 'webjournal'), "</div>\n", 'number'); ?>

</div>

<div class="entry-meta">
<div class="entry-meta-inner">
<span class="meta-sep">&para;</span>
<span class="entry-date"><?php _e('Post\'d', 'webjournal') ?> <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php unset($previousday); printf(__('%1$s', 'webjournal'), the_date('d F Y', false)) ?></abbr></span>
<?php webjournal_author_hCard(); // Function for author link option ?> 
<span class="meta-sep">&sect;</span>
<span class="entry-category"><?php the_category(' &sect; ') ?></span>
<span class="meta-sep">&Dagger;</span>
<!--span class="entry-comments"><?php comments_popup_link(__('Comments (0)', 'webjournal'), __('Comments (1)', 'webjournal'), __('Comments (%)', 'webjournal')) ?></span-->
<span class="entry-tags"><?php the_tags(__('#', 'webjournal'), ", #", "") ?></span>
<?php edit_post_link(__('Edit this entry', 'webjournal'), "<div class='entry-edit'>", "</div>\n"); ?>
</div>
</div>

<?php trackback_rdf(); ?>

</div><!-- .post -->

<?php comments_template(); ?>

</div><!-- .hfeed -->
</div><!-- #content -->
</div><!-- #container -->

<?php get_footer() ?>
