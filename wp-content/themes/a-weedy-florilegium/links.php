
<?php
/*
Template Name: Links Page
*/
?>
<?php get_header() ?>


<!-- == 
  
  links.php 
  
== -->



<div class="hfeed">

<?php the_post() ?>

<div id="post-<?php the_ID(); ?>" class="<?php webjournal_post_class() ?>">
<h2 class="entry-title"><?php the_title() ?></h2>
<?php if ( get_post_custom_values('authorlink') ) printf(__('<div class="archive-meta">By %1$s</div>', 'webjournal'), webjournal_author_link() ) // Add a key/value of "authorlink" to show an author byline on a page ?>
<div class="entry-content">
<?php the_content() ?>

<ul id="linkcats" class="xoxo">
<?php wp_list_bookmarks('title_before=<h3>&title_after=</h3>&category_before=<li id="page-%id" class="%class">&after=</p></li>&between=<p>&show_description=1') ?>

</ul>
<?php edit_post_link(__('Edit this entry.', 'webjournal'),'<p class="entry-edit">','</p>') ?>

</div>
</div><!-- .post -->

<?php if ( get_post_custom_values('comments') ) comments_template() // Add a key/value of "comments" to load comments on a page ?>

</div><!-- .hfeed -->
</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>