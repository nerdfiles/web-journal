<?php
/*
Template Name: blog.nerdfiles.net > Home
*/

get_header() ?> 


<!-- == 
  
  template-home.php 
  
== -->



<div id="home" class="hfeed clearfix">

<h1 class="page-title">Home | nerdfiles.net</h1>

<div id="art" class="grid_4 alpha art">
<section>
<header><h2>Art</h2></header>
<?php $my_query = new WP_Query('category_name=music,music-review,music-download,photo,poetry&posts_per_page=5&orderby=date&order=DESC'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); 
$do_not_duplicate = $post->ID; ?>
<article class="~drop-shadow">
<header>
<h3 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
<div class="time">
<time><a href="/<?php echo get_the_date('Y'); ?>/<?php echo get_the_date('m'); ?>/<?php echo get_the_date('d'); ?>/"><?php the_date(); ?></a></time>
</div>
</header>
<?php //the_excerpt(); ?>
<footer>
<!--div class="entry-meta">
<span class="meta-sep">&para;</span>
<span class="entry-date"><?php _e('Posted', 'webjournal') ?> <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php unset($previousday); printf(__('%1$s', 'webjournal'), the_date('d F Y', false)) ?></abbr></span>
<?php if ( !is_author() ) : webjournal_author_hCard(); endif; // Displays if NOT author archive page ?>

<span class="meta-sep">&sect;</span>
<span class="entry-category"><?php if ( !is_category() ) { echo the_category(' &sect; '); } else { $other_cats = webjournal_other_cats(' &sect; '); echo $other_cats; } // Hides the current category if category archive ?></span>
-->

<span class="tag-links"><?php if ( !is_tag() ) { echo the_tags(__('<span class="meta-sep">&Dagger;</span>: ', 'webjournal'), ", ", ""); } else { $other_tags = webjournal_other_tags(', '); printf(__(':: %s', 'webjournal'), $other_tags); } ?></span>
<?php edit_post_link(__('Edit', 'webjournal'), "\t\t\t\t\t<span class=\"meta-sep\">&equiv;</span>\n\t\t\t\t\t<span class='entry-edit'>", "</span>\n"); ?>
<!--/div-->
</footer>
</article>
<?php endwhile; ?>
</section>
</div>

<div id="philosophy" class="grid_4 phil">
<section>
<header><h2>Philosophy</h2></header>
<?php $my_query = new WP_Query('category_name=philosophy,fair-trade,freethought,global,politics,wittgenstein,history,science,spinoza,theology,atheism,religion,readings,anarchism&posts_per_page=5&orderby=date&order=DESC'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); 
if( $post->ID == $do_not_duplicate ) continue; 
$do_not_duplicate = $post->ID; ?>
<article class="~drop-shadow">
<header>
<h3 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
<div class="time">
<time><a href="/<?php echo get_the_date('Y'); ?>/<?php echo get_the_date('m'); ?>/<?php echo get_the_date('d'); ?>/"><?php the_date(); ?></a></time>
</div>
</header>
<?php //the_excerpt(); ?>
<footer>
<!--div class="entry-meta">
<span class="meta-sep">&para;</span>
<span class="entry-date"><?php _e('Posted', 'webjournal') ?> <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php unset($previousday); printf(__('%1$s', 'webjournal'), the_date('d F Y', false)) ?></abbr></span>
<?php if ( !is_author() ) : webjournal_author_hCard(); endif; // Displays if NOT author archive page ?>

<span class="meta-sep">&sect;</span>
<span class="entry-category"><?php if ( !is_category() ) { echo the_category(' &sect; '); } else { $other_cats = webjournal_other_cats(' &sect; '); echo $other_cats; } // Hides the current category if category archive ?></span>
-->

<span class="tag-links"><?php if ( !is_tag() ) { echo the_tags(__('<span class="meta-sep">&Dagger;</span>: ', 'webjournal'), ", ", ""); } else { $other_tags = webjournal_other_tags(', '); printf(__(':: %s', 'webjournal'), $other_tags); } ?></span>
<?php edit_post_link(__('Edit', 'webjournal'), "\t\t\t\t\t<span class=\"meta-sep\">&equiv;</span>\n\t\t\t\t\t<span class='entry-edit'>", "</span>\n"); ?>
<!--/div-->
</footer>
</article>
<?php endwhile; ?>
</section>
</div>

<div id="life" class="grid_4 life">
<section>
<header><h2>Life</h2></header>
<?php $my_query = new WP_Query('category_name=podcasts,links,school,life,humor,news,school,foodstuffs&posts_per_page=5&orderby=date&order=DESC'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); 
if( $post->ID == $do_not_duplicate ) continue; 
$do_not_duplicate = $post->ID; ?>
<article class="~drop-shadow">
<header>
<h3 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
<div class="time">
<time><a href="/<?php echo get_the_date('Y'); ?>/<?php echo get_the_date('m'); ?>/<?php echo get_the_date('d'); ?>/"><?php the_date(); ?></a></time>
</div>
</header>
<?php //the_excerpt(); ?>
<footer>
<!--div class="entry-meta">
<span class="meta-sep">&para;</span>
<span class="entry-date"><?php _e('Posted', 'webjournal') ?> <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php unset($previousday); printf(__('%1$s', 'webjournal'), the_date('d F Y', false)) ?></abbr></span>
<?php if ( !is_author() ) : webjournal_author_hCard(); endif; // Displays if NOT author archive page ?>

<span class="meta-sep">&sect;</span>
<span class="entry-category"><?php if ( !is_category() ) { echo the_category(' &sect; '); } else { $other_cats = webjournal_other_cats(' &sect; '); echo $other_cats; } // Hides the current category if category archive ?></span>
-->

<span class="tag-links"><?php if ( !is_tag() ) { echo the_tags(__('<span class="meta-sep">&Dagger;</span>: ', 'webjournal'), ", ", ""); } else { $other_tags = webjournal_other_tags(', '); printf(__(':: %s', 'webjournal'), $other_tags); } ?></span>
<?php edit_post_link(__('Edit', 'webjournal'), "\t\t\t\t\t<span class=\"meta-sep\">&equiv;</span>\n\t\t\t\t\t<span class='entry-edit'>", "</span>\n"); ?>
<!--/div-->
</footer>
</article>
<?php endwhile; ?>
</section>
</div>

<div id="web" class="grid_4 omega web">
<section>
<header><h2>Web</h2></header>
<?php $my_query = new WP_Query('category_name=work,webdesign,webdev&posts_per_page=5&orderby=date&order=DESC'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); 
if( $post->ID == $do_not_duplicate ) continue; 
$do_not_duplicate = $post->ID; ?>
<article class="~drop-shadow">
<header>
<h3 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
<div class="time">
<time><a href="/<?php echo get_the_date('Y'); ?>/<?php echo get_the_date('m'); ?>/<?php echo get_the_date('d'); ?>/"><?php the_date(); ?></a></time>
</div>
</header>
<?php //the_excerpt(); ?>
<footer>
<!--div class="entry-meta">
<span class="meta-sep">&para;</span>
<span class="entry-date"><?php _e('Posted', 'webjournal') ?> <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php unset($previousday); printf(__('%1$s', 'webjournal'), the_date('d F Y', false)) ?></abbr></span>
<?php if ( !is_author() ) : webjournal_author_hCard(); endif; // Displays if NOT author archive page ?>

<span class="meta-sep">&sect;</span>
<span class="entry-category"><?php if ( !is_category() ) { echo the_category(' &sect; '); } else { $other_cats = webjournal_other_cats(' &sect; '); echo $other_cats; } // Hides the current category if category archive ?></span>
-->

<span class="tag-links"><?php if ( !is_tag() ) { echo the_tags(__('<span class="meta-sep">&Dagger;</span>: ', 'webjournal'), ", ", ""); } else { $other_tags = webjournal_other_tags(', '); printf(__(':: %s', 'webjournal'), $other_tags); } ?></span>
<?php edit_post_link(__('Edit', 'webjournal'), "\t\t\t\t\t<span class=\"meta-sep\">&equiv;</span>\n\t\t\t\t\t<span class='entry-edit'>", "</span>\n"); ?>
<!--/div-->
</footer>
</article>
<?php endwhile; ?>
</section>
</div>

</div><!-- .hfeed -->
</div><!-- #content -->

<?php do_action('home_disqus_comments'); ?>

</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

