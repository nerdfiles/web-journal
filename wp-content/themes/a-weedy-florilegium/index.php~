<?php 
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
 
 get_header() ?>

 
<!-- == 
  
  index.php 
  
== -->



<div class="hfeed">

<?php while ( have_posts() ) : the_post() ?>

<div id="post-<?php the_ID() ?>" class="<?php webjournal_post_class() ?>">

<div class="entry-meta">
<span class="meta-sep">&para;</span>
<span class="entry-date"><?php _e('Posted', 'webjournal') ?> <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php unset($previousday); printf(__('%1$s', 'webjournal'), the_date('d F Y', false)) ?></abbr></span>
<?php webjournal_author_link(); // Function for author link option ?>
<span class="meta-sep">&sect;</span>
<span class="entry-category"><?php the_category(' &sect; ') ?></span>
<span class="meta-sep">&Dagger;</span>
<span class="entry-comments"><?php comments_popup_link(__('Comments (0)', 'webjournal'), __('Comments (1)', 'webjournal'), __('Comments (%)', 'webjournal')) ?></span>
<span class="meta-sep">&deg;</span>
<span class="entry-tags"><?php the_tags(__('#: ', 'webjournal'), ", ", "") ?></span>
<?php edit_post_link(__('Edit ' + get_the_title(), 'webjournal'), "\t\t\t\t\t<span class=\"meta-sep\">&equiv;</span>\n\t\t\t\t\t<span class='entry-edit'>", "</span>\n"); ?>
</div>

<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf(__('Permalink to %s', 'webjournal'), wp_specialchars(get_the_title(), 1)) ?>" rel="bookmark"><?php the_title() ?></a></h2>

<div class="entry-content">

<?php the_content('<span class="more-link">'.__('Continue Reading &raquo;', 'webjournal').'</span>'); ?>

<?php link_pages('<div class="page-link">'.__('Pages: ', 'webjournal'), "</div>\n", 'number'); ?>

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
